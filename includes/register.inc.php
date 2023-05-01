<?php

include 'dbh.inc.php';

if (isset($_POST['register-submit'])) {
    $consumer_email = $_POST['consumer_email'];
    $consumer_password = $_POST['consumer_password'];

    $sql = "SELECT * FROM consumers WHERE consumer_email = '$consumer_email'";
    $duplicate = mysqli_query($conn, $sql);

    if (mysqli_num_rows($duplicate) == 0) {
        $sql = "INSERT INTO 'consumers' ('consumer_email', 'consumer_password') VALUES ('$consumer_email', '$consumer_password')";
        mysqli_query($conn, $sql);

        session_start();
        $_SESSION['session_id'] = $row['consumer_id'];
        $_SESSION['session_email'] = $row['consumer_email'];
        $_SESSION['session_user_level'] = $row['user_level'];

        header("location: ../consumer_dashboard.php?register=success");
        exit();
    } else {
        header("Location: ../register.php?error=emailtaken=" . $consumer_email);
        exit();
    }
} else {
    header("Location: ../register.php");
    exit();
}
