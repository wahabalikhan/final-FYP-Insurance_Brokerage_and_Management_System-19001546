<?php
# Code adapted from https://www.youtube.com/watch?v=gCo6JqGMi30, How To Create A Login System In PHP For Beginners | Procedural MySQLi | PHP Tutorial

if (isset($_POST['login-submit'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    require_once 'dbh.inc.php';

    $sql = "SELECT * FROM brokers WHERE broker_email=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $dbPassword = $row['broker_password'];

            if ($password != $dbPassword) {
                header("Location: ../login.php?error=wrongpassword");
                exit();
            } else if ($password == $dbPassword) {
                session_start();
                $_SESSION['session_id'] = $row['broker_id'];
                $_SESSION['session_email'] = $row['broker_email'];
                $_SESSION['session_user_level'] = $row['user_level'];

                header("Location: ../dashboard.php?login=success");
                exit();
            } else {
                header("Location: ../login.php?error=wrongpassword");
                exit();
            }
        } else {
            header("Location: ../login.php?error=nouser");
            exit();
        }
    }
} else {
    header("Location: ../login.php");
    exit();
}
