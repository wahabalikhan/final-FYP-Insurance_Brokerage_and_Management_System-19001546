<?php

require 'dbh.inc.php';

if (isset($_POST['update-consumer'])) {
    $consumer_email = $_POST['consumer_email'];
    $consumer_password = $_POST['consumer_password'];

    $sql = "UPDATE consumer SET consumer_email='$_POST[consumer_email]', consumer_password='$_POST[consumer_password]',user_level ='$_POST[user_level]' WHERE consumer_id='$_POST[consumer_id]'";
    if (mysqli_query($conn, $sql)) {
        echo "Successfully updated consumer record";
    } else {
        echo "Failed to update consumer record";
    }
    header("refresh:1; url='../admin_dashboard.php'");
}

if (isset($_POST['update-broker'])) {
    $broker_email = $_POST['broker_email'];
    $broker_password = $_POST['broker_password'];

    $sql = "UPDATE broker SET broker_email='$_POST[broker_email]', broker_password='$_POST[broker_password]',user_level ='$_POST[user_level]' WHERE broker_id='$_POST[broker_id]'";
    if (mysqli_query($conn, $sql)) {
        echo "Successfully updated broker record";
    } else {
        echo "Failed to update broker record";
    }
    header("refresh:1; url='../admin_dashboard.php'");
}

if (isset($_POST['update-product'])) {
    $product_name = $_POST['product_name'];
    $cover_type = $_POST['cover_type'];
    $vehicle_type = $_POST['vehicle_type'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_id = $_POST['product_id'];

    $sql = "UPDATE product SET product_name='$_POST[product_name]', cover_type='$_POST[cover_type]',vehicle_type ='$_POST[vehicle_type]',product_price ='$_POST[product_price]',product_description ='$_POST[product_description]' WHERE product_id='$_POST[product_id]'";
    if (mysqli_query($conn, $sql)) {
        echo "Successfully updated product record";
    } else {
        echo "Failed to update product record";
    }
    header("refresh:1; url='../admin_dashboard.php'");
}
