<?php
    require 'dbh.inc.php';

    $sql_consumer = "UPDATE consumer SET consumer_email='$_POST[consumer_email]', consumer_password='$_POST[consumer_password]' WHERE consumer_id='$_POST[consumer_id]'";
    if (mysqli_query($conn, $sql_consumer)) {
        echo "Successfully updated consumer record";
    } else {
        echo "Failed to update consumer record ";
    }
    header("refresh:1; url='../admin_dashboard.php'");

    $sql_broker = "UPDATE broker SET broker_email='$_POST[broker_email]', broker_password='$_POST[broker_password]' WHERE broker_id='$_POST[broker_id]'";
    if (mysqli_query($conn, $sql_broker)) {
        echo "Successfully updated broker record";
    } else {
        echo "Failed to update broker record ";
    }
    header("refresh:1; url='../admin_dashboard.php'");

    $sql_product = "UPDATE product SET product_name='$_POST[product_name]', product_price='$_POST[product_price]', product_description='$_POST[product_description]' WHERE product_id='$_POST[product_id]'";
    if (mysqli_query($conn, $sql_product)) {
        echo "Successfully updated product record";
    } else {
        echo "Failed to update product record ";
    }
    header("refresh:1; url='../admin_dashboard.php'");