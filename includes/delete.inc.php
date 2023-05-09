<?php
    require 'dbh.inc.php';

    $sql_consumer = "DELETE FROM consumer WHERE consumer_id='$_GET[consumer_id]'";
    if (mysqli_query($conn, $sql_consumer)) {
        echo "Successfully deleted consumer record";
    } else {
        echo "Failed to delete consumer record";
    }
    header("refresh:1; url='../admin_dashboard.php'");

    $sql_broker = "DELETE FROM broker WHERE broker_id='$_GET[broker_id]'";
    if (mysqli_query($conn, $sql_broker)) {
        echo "Successfully deleted broker record";
    } else {
        echo "Failed to delete broker record";
    }
    header("refresh:1; url='../admin_dashboard.php'");

    $sql_booking = "DELETE FROM booking WHERE booking_id='$_GET[booking_id]'";
    if (mysqli_query($conn, $sql_booking)) {
        echo "Successfully deleted booking record";
    } else {
        echo "Failed to delete booking record";
    }
    header("refresh:1; url='../admin_dashboard.php'");

    $sql_product = "DELETE FROM product WHERE product_id='$_GET[product_id]'";
    if (mysqli_query($conn, $sql_product)) {
        echo "Successfully deleted product record";
    } else {
        echo "Failed to delete product record";
    }
    header("refresh:1; url='../admin_dashboard.php'");