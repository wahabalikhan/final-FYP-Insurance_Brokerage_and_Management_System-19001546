<?php
    include 'dbh.inc.php';
    
    if (isset($_POST['insert-consumer'])) {
        $consumer_email = $_POST['consumer_email'];
        $consumer_password = $_POST['consumer_password'];

        $sql = "INSERT INTO consumers (consumer_email, consumer_password) VALUES ('$consumer_email','$consumer_password')";
        if (mysqli_query($conn, $sql)) {
            header("refresh:1; url='../admin_dashboard.php'");
        } else {
            header("refresh:1; url='../admin_dashboard.php'");
        }
        header("refresh:1; url='../admin_dashboard.php'");
    }