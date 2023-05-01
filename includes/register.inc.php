<?php
require 'dbh.inc.php';

if (isset($_POST['register-submit'])) {
    $consumer_email = $_POST['consumer_email'];
    $consumer_password = $_POST['consumer_password'];

    $sql = "SELECT consumer_email FROM consumer WHERE consumer_email=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $consumer_email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);

        if ($resultCheck > 0) {
            header("Location: ../register.php?error=emailtaken=" . $email);
            exit();
        } else {
            $sql = "INSERT INTO consumer (consumer_email, consumer_password) VALUES (?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../register.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $consumer_email, $consumer_password);
                mysqli_stmt_execute($stmt);

                session_start();
                $_SESSION['session_id'] = $row['consumer_id'];
                $_SESSION['session_email'] = $row['consumer_email'];
                $_SESSION['session_user_level'] = $row['user_level'];
                header("Location: ../consumer_dashboard.php?register=success");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../register.php");
    exit();
}
