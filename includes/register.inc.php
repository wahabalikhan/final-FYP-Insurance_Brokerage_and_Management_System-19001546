<?php

if (isset($_POST['register-submit'])) {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    require_once 'dbh.inc.php';

    $sql = "INSERT INTO consumers (consumer_fullname, consumer_email, consumer_password, consumer_phone, consumer_address) VALUES (?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=createuserfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $fullname, $email, $password, $phone, $address);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    session_start();
    $_SESSION['session_id'] = $row['consumer_id'];
    $_SESSION['session_email'] = $row['consumer_email'];
    $_SESSION['session_user_level'] = $row['user_level'];
    
    header("location: ../consumer_dashboard.php?register=success");
    exit();
} else {
    header("Location: ../register.php");
    exit();
}

    /* $sql = "INSERT INTO consumers (consumer_fullname, consumer_email, consumer_password, consumer_phone, consumer_address) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "sssss", $fullname, $email, $password, $phone, $address);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);

        if ($resultCheck > 0) {
            header("Location: ../register.php?error=usertaken&mail=" . $email);
            exit();
        } else {
            $sql = "INSERT INTO consumers (consumer_fullname, consumer_email, consumer_password, consumer_phone, consumer_address) VALUES (?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../register.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "sssss", $fullname, $email, $password, $phone, $address);
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
    */
    # insert data into database */
