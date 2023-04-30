<?php
# Code adapted from https://www.youtube.com/watch?v=gCo6JqGMi30, How To Create A Login System In PHP For Beginners | Procedural MySQLi | PHP Tutorial

//consumer login

if (isset($_POST['consumer_login_submit'])) {
    $consumer_email = $_REQUEST['consumer_email'];
    $consumer_password = $_REQUEST['consumer_password'];

    require_once 'dbh.inc.php';

    $sql = "SELECT * FROM consumers WHERE consumer_email=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $consumer_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $dbPassword = $row['consumer_password'];

            if ($consumer_password != $dbPassword) {
                header("Location: ../login.php?error=wrongpassword");
                exit();
            } else if ($consumer_password == $dbPassword) {
                session_start();
                $_SESSION['session_id'] = $row['consumer_id'];
                $_SESSION['session_email'] = $row['consumer_email'];
                $_SESSION['session_user_level'] = $row['user_level'];

                header("Location: ../consumer_dashboard.php?login=success");
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
} else if (isset($_POST['broker_login_submit'])) {
    $broker_email = $_REQUEST['broker_email'];
    $broker_password = $_REQUEST['broker_password'];

    require_once 'dbh.inc.php';

    $sql = "SELECT * FROM brokers WHERE broker_email=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $broker_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $dbPassword = $row['broker_password'];

            if ($broker_password != $dbPassword) {
                header("Location: ../login.php?error=wrongpassword");
                exit();
            } else if ($broker_password == $dbPassword) {
                session_start();
                $_SESSION['session_id'] = $row['broker_id'];
                $_SESSION['session_email'] = $row['broker_email'];
                $_SESSION['session_user_level'] = $row['user_level'];

                header("Location: ../broker_dashboard.php?login=success");
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
} if (isset($_POST['admin_login_submit'])) {
    $admin_email = $_REQUEST['admin_email'];
    $admin_password = $_REQUEST['admin_password'];

    require_once 'dbh.inc.php';

    $sql = "SELECT * FROM admin WHERE admin_email=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $admin_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $dbPassword = $row['admin_password'];

            if ($admin_password != $dbPassword) {
                header("Location: ../login.php?error=wrongpassword");
                exit();
            } else if ($admin_password == $dbPassword) {
                session_start();
                $_SESSION['session_id'] = $row['admin_id'];
                $_SESSION['session_email'] = $row['admin_email'];
                $_SESSION['session_user_level'] = $row['user_level'];

                header("Location: ../admin_dashboard.php?login=success");
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
