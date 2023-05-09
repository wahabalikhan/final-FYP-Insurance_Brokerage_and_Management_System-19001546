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

if (isset($_POST['insert-broker'])) {
    $broker_email = $_POST['broker_email'];
    $broker_password = $_POST['broker_password'];

    $sql = "INSERT INTO broker (broker_email, broker_password) VALUES ('$broker_email','$broker_password')";
    if (mysqli_query($conn, $sql)) {
        echo "Successfully inserted broker record";
    } else {
        echo "Failed to insert broker record";
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

// insert product into products table from admin panel
if (isset($_POST['add-product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];

    $sql = "INSERT INTO product (product_name, product_price, product_description) VALUES ('$product_name','$product_price','$product_description')";
    if (mysqli_query($conn, $sql)) {
        echo "Successfully inserted product record";
    } else {
        echo "Failed to insert product record";
    }
    header("refresh:1; url='../admin_dashboard.php'");
}

if (isset($_POST['purchase_submit'])) {
    
    $product_id = $_POST['select_product'];
    $consumer_id = $_POST['select_consumer'];

    $sql = "INSERT INTO policies (product_id, consumer_id) VALUES ('$product_id','$consumer_id')";
    if (mysqli_query($conn, $sql)) {
        echo "Successfully inserted policy record";
    } else {
        echo "Failed to insert policy record";
    }
    header("refresh:1; url='../consumer_dashboard.php'");
}
