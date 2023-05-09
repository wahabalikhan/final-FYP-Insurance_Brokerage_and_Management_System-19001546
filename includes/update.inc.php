<?php

require 'dbh.inc.php';

    $consumer_sql = "UPDATE consumers SET consumer_email='$_POST[consumer_email]', consumer_password='$_POST[consumer_password]',user_level ='$_POST[user_level]' WHERE consumer_id='$_POST[consumer_id]'";
    if (mysqli_query($conn, $consumer_sql)) {
        echo "Successfully updated record";
    } else {
        echo "Failed to update record ";
    }
    header("refresh:1; url='../consumer_dashboard.php'");

    $sql = "UPDATE consumers SET consumer_email='$_POST[consumer_email]', consumer_password='$_POST[consumer_password]',user_level ='$_POST[user_level]' WHERE consumer_id='$_POST[consumer_id]'";
    if (mysqli_query($conn, $sql)) {
        echo "Successfully updated record";
    } else {
        echo "Failed to update record ";
    }
    header("refresh:1; url='../admin.php'");

    if (isset($_POST['update-consumer'])) {
        $consumer_email = $_POST['consumer_email'];
        $consumer_password = $_POST['consumer_password'];
    
        $sql = "UPDATE consumers SET consumer_email='$_POST[consumer_email]', consumer_password='$_POST[consumer_password]',user_level ='$_POST[user_level]' WHERE consumer_id='$_POST[consumer_id]'";
        if (mysqli_query($conn, $sql)) {
            echo "Successfully updated consumer record";
        } else {
            echo "Failed to update consumer record";
        }
        header("refresh:1; url='../consumer_dashboard.php'");
    }