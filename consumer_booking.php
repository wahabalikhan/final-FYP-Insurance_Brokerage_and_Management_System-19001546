<?php
// fetching data as dropdown adapted from https://www.youtube.com/watch?v=BgRo1oJZlkA, php fill dropdown from mysql (phpmyadmin) database multiple columns, https://stackoverflow.com/questions/41734537/how-can-i-able-to-show-2-columns-in-a-dropdown
// date and time dropdown, https://www.sourcecodester.com/tutorials/php/11048/creating-simple-date-birth-dropdown-menu-using-phphtml.html?utm_content=cmp-true, https://stackoverflow.com/questions/37809280/php-display-time-in-dropdown
session_start();
include_once 'header.php';
require_once 'includes/functions.inc.php';

if (!isConsumer()) {
    header("location: login.php");
}

$sql_consumer = "SELECT * FROM consumer WHERE consumer_id='" . $_SESSION['session_id'] . "'";
$records_consumer = mysqli_query($conn, $sql_consumer);

$sql_broker = "SELECT * FROM broker";
$records_broker = mysqli_query($conn, $sql_broker);

$sql_booking = "SELECT * FROM booking";
$records_booking = mysqli_query($conn, $sql_booking);
?>

<body>
    <h1>bookings dashboard</h1>
    <?php while ($row = mysqli_fetch_array($records_consumer)) {
        echo $row['consumer_id'];
        echo $row['consumer_email'];
        echo $row['consumer_password'];
    } ?>

    <h2>Book</h2>
    <form action="includes/insert.inc.php" method="post"> <!-- action="includes/login.inc.php" is where user will be sent to when form submitted, using post method to hide sensitive data in URL but will still be passed -->
        <input type="date" name="select_date">
        <select name="select_time">
            <?php for ($hours = 0; $hours < 24; $hours++) {
                for ($mins = 0; $mins < 60; $mins += 30) {
                    $time = str_pad($hours, 2, '0', STR_PAD_LEFT) . ':' . str_pad($mins, 2, '0', STR_PAD_LEFT) . ':00';
                    echo '<option value= "' . $time . '">' . $time . '</option>'; }}?>
        </select>

        <select name="select_broker">
            <option>Select a broker</option>
            <?php while ($row = mysqli_fetch_array($records_broker)) {
                echo "<option>$row[broker_id]</option>";
                //echo "<option>$row[broker_id] - $row[broker_email]</option>";
            } ?>
        </select>
        <button type="submit" name="booking_submit">Book</button>
    </form>
    

    <h2>Upcoming bookings</h2>
    <?php while ($row = mysqli_fetch_array($records_booking)) {
        echo $row['booking_id']." ".$row['booking_date']." ".$row['booking_time']." ".$row['broker_id'];
        echo "<a class='delete' href=includes/delete.inc.php?booking_id=" . $row['booking_id'] . ">Delete</a>";
        echo "<br>";
    } ?>
</body>