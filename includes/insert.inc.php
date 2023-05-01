<?php
include 'dbh.inc.php';

// insert consumer from admin panel
if (isset($_POST['insert-consumer'])) {
    $consumer_email = $_POST['consumer_email'];
    $consumer_password = $_POST['consumer_password'];

    $sql = "INSERT INTO consumer (consumer_email, consumer_password) VALUES ('$consumer_email','$consumer_password')";
    if (mysqli_query($conn, $sql)) {
        echo "Successfully inserted consumer record";
    } else {
        echo "Failed to insert consumer record";
    }
    header("refresh:1; url='../admin_dashboard.php'");
}
// insert booking into bookings table from consumer account
if (isset($_POST['booking_submit'])) {
    //$consumer_id = $_POST['consumer_id'];
    $select_date = $_POST['select_date'];
    $select_time = $_POST['select_time'];
    $select_broker = $_POST['select_broker'];

    $sql = "INSERT INTO booking (booking_date, booking_time, broker_id) VALUES ('$select_date','$select_time','$select_broker')";
    if (mysqli_query($conn, $sql)) {
        echo "Successfully inserted booking record";
    } else {
        echo "Failed to insert booking record";
    }
    header("refresh:1; url='../consumer_booking.php'");
}
