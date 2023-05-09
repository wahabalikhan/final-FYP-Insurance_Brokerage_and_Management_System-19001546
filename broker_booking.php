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
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Appointment</h1>
        </div>
        <h4>Upcoming appointments</h4>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Appointment ID</th>
                        <th scope="col">Appointment date</th>
                        <th scope="col">Appointment time</th>
                        <th scope="col">Broker</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_booking = "SELECT * FROM booking";
                    $records_booking = mysqli_query($conn, $sql_booking);
                    while ($row = mysqli_fetch_array($records_booking)) {
                        echo "<tr>
                                <td>" . $row["booking_id"] . "</td>
                                <td>" . $row['booking_date'] . "</td>
                                <td>" . $row["booking_time"] . "</td>
                                <td>" . $row["broker_id"] . "</td>
                                </tr>";
                    } ?>
                </tbody>
            </table>
        </div>
    </main>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>