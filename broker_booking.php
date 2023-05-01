<?php
// fetching data as dropdown adapted from https://www.youtube.com/watch?v=BgRo1oJZlkA, php fill dropdown from mysql (phpmyadmin) database multiple columns, https://stackoverflow.com/questions/41734537/how-can-i-able-to-show-2-columns-in-a-dropdown
// date and time dropdown, https://www.sourcecodester.com/tutorials/php/11048/creating-simple-date-birth-dropdown-menu-using-phphtml.html?utm_content=cmp-true, https://stackoverflow.com/questions/37809280/php-display-time-in-dropdown
session_start();
include_once 'header.php';
require_once 'includes/functions.inc.php';

if (!isBroker()) {
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
    <h2>Upcoming bookings</h2>
    <?php while ($row = mysqli_fetch_array($records_booking)) {
        echo $row['booking_id']." ".$row['booking_date']." ".$row['booking_time']." ".$row['broker_id'];
        echo "<a class='delete' href=includes/delete.inc.php?booking_id=" . $row['booking_id'] . ">Delete</a>";
        echo "<br>";
    } ?>
</body>