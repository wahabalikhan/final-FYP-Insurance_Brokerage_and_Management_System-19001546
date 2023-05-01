<?php
    require 'dbh.inc.php';

    $sql_booking = "DELETE FROM booking WHERE booking_id='$_GET[booking_id]'";
    if (mysqli_query($conn, $sql_booking)) {
        echo "Successfully deleted booking record";
    } else {
        echo "Failed to delete booking record";
    }
    header("refresh:1; url='../consumer_booking.php'");