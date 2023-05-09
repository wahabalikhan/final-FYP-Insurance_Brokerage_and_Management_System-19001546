<?php

session_start();
define('user_level_admin', 'admin');
define('user_level_broker', 'broker');
define('user_level_consumer', 'consumer');
define('user_level_none', 'none');

require 'dbh.inc.php';

function isNone()
{
    if ($_SESSION['session_user_level'] == user_level_none) {
        return true;
    } else {
        return false;
    }
}
function isConsumer()
{
    if ($_SESSION['session_user_level'] == user_level_consumer) {
        return true;
    } else {
        return false;
    }
}

function isBroker()
{
    if ($_SESSION['session_user_level'] == user_level_broker) {
        return true;
    } else {
        return false;
    }
}

function isAdmin() {
    if ($_SESSION['session_user_level'] == user_level_admin) {
        return true;
    } else {
        return false;
    }
}

# consumer stuff

# Code adapted from https://www.youtube.com/watch?v=gCo6JqGMi30, How To Create A Login System In PHP For Beginners | Procedural MySQLi | PHP Tutorial

# all functions that can be referenced to do something in website
function emptyConsumerRegister($consumer_email, $consumer_password, $consumer_password_repeat)
{
    # returns true or false statement
    $result = "";

    # empty()—check if there is data or no data that will be in function
    if (empty($consumer_email) || empty($consumer_password) || empty($consumer_password_repeat)) {
        # if empty fields, then return true
        $result = true;
    } else {
        # no empty fields, then return false
        $result = false;
    }

    return $result;
}

function invalidConsumerEmailAddress($consumer_email)
{
    # returns true or false statement
    $result = "";

    # check if email is correct
    if (!filter_var($consumer_email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function passwordConsumerMatch($consumer_password, $consumer_password_repeat)
{
    # returns true or false statement
    $result = "";

    # check if passwords match
    if ($consumer_password !== $consumer_password_repeat) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function emailAddressConsumerExists($conn, $consumer_email)
{
    # connect to database and check if exists first, have to create SQL statement. ? is a placeholder as we are using prepared statements to connect to database—run SQL statement first and then fill vars with user data once validated
    $sql = "SELECT * FROM consumer WHERE consumer_email = ?;";

    # submit SQL statement to database using prepared statement, initialising new prepared statement—have to connect to database

    #using prepared statements to prevent users from entering malicious data e.g. code into inputs that can destroy database
    $stmt = mysqli_stmt_init($conn);

    # check if any errors in prepared/SQL statement when running in database, check if fails first—best practice for all languages
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    # if not failed, pass data from user
    # [prepared statement, type of data being passed, data submitted by user]
    mysqli_stmt_bind_param($stmt, "s", $consumer_email);

    # execute statement
    mysqli_stmt_execute($stmt);

    # grab data from database
    $resultData = mysqli_stmt_get_result($stmt);

    # check if result from statement, fetching data as associative array. If get result from database, return true. Using names rather index numbers for columns
    if ($row = mysqli_fetch_assoc($resultData)) {
        # if data in database with this email address, then grab this data for login function

        # return all data from database if user exists in database, can use this data to log in user—multiple purposes
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createConsumerUser($conn, $consumer_email, $consumer_password)
{
    # insert data into database
    $sql = "INSERT INTO consumer (consumer_email, consumer_password) VALUES (?, ?);";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=createuserfailed");
        exit();
    }

    #hashing password, auto updated function to ensure security from hackers, PASSWORD_DEFAULT—using default algorithm to hash
    $consumer_hashed_password = password_hash($consumer_password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $consumer_email, $consumer_hashed_password);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $emailExists = emailAddressConsumerExists($conn, $consumer_email);

    session_start();
    $_SESSION["session_id"] = $emailExists["consumer_id"];
    $_SESSION["session_email"] = $emailExists["consumer_email"];
    $_SESSION['session_user_level'] = $emailExists["user_level"];
    header("location: ../login.php");
    exit();
}

function emptyConsumerLogin($consumer_email, $consumer_password)
{
    # returns true or false statement
    $result = "";

    # empty()—check if there is data or no data that will be in function
    if (empty($consumer_email) || empty($consumer_password)) {
        # if empty fields, then return true
        $result = true;
    } else {
        # no empty fields, then return false
        $result = false;
    }
    return $result;
}

function loginConsumerUser($conn, $consumer_email, $consumer_password)
{
    $emailExists = emailAddressConsumerExists($conn, $consumer_email);

    # error handler—if returned as false, doesn't exist
    if ($emailExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    #check password from consumer with hashed password in database
    $password_hashed = $emailExists["consumer_password"];
    $check_password = password_verify($consumer_password, $password_hashed);

    if ($check_password === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($check_password === true) {
        # login user through sessions, store data in session through starting session first
        session_start();
        $_SESSION["session_id"] = $emailExists["consumer_id"];
        $_SESSION["session_email"] = $emailExists["consumer_email"];
        $_SESSION['session_user_level'] = $emailExists["user_level"];
        header("location: ../consumer_dashboard.php");
        exit();
    }
}







# broker stuff

function invalidBrokerEmailAddress($broker_email)
{
    # returns true or false statement
    $result = "";

    # check if email is correct
    if (!filter_var($broker_email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function emailAddressBrokerExists($conn, $broker_email)
{
    # connect to database and check if exists first, have to create SQL statement. ? is a placeholder as we are using prepared statements to connect to database—run SQL statement first and then fill vars with user data once validated
    $sql = "SELECT * FROM broker WHERE broker_email = ?;";

    # submit SQL statement to database using prepared statement, initialising new prepared statement—have to connect to database

    #using prepared statements to prevent users from entering malicious data e.g. code into inputs that can destroy database
    $stmt = mysqli_stmt_init($conn);

    # check if any errors in prepared/SQL statement when running in database, check if fails first—best practice for all languages
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    # if not failed, pass data from user
    # [prepared statement, type of data being passed, data submitted by user]
    mysqli_stmt_bind_param($stmt, "s", $broker_email);

    # execute statement
    mysqli_stmt_execute($stmt);

    # grab data from database
    $resultData = mysqli_stmt_get_result($stmt);

    # check if result from statement, fetching data as associative array. If get result from database, return true. Using names rather index numbers for columns
    if ($row = mysqli_fetch_assoc($resultData)) {
        # if data in database with this email address, then grab this data for login function

        # return all data from database if user exists in database, can use this data to log in user—multiple purposes
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function emptyBrokerLogin($broker_email, $broker_password)
{
    # returns true or false statement
    $result = "";

    # empty()—check if there is data or no data that will be in function
    if (empty($broker_email) || empty($broker_password)) {
        # if empty fields, then return true
        $result = true;
    } else {
        # no empty fields, then return false
        $result = false;
    }
    return $result;
}

/*function loginBrokerUser($conn, $broker_email, $broker_password) {
    $broker_email = $_POST['broker_email'];
    $broker_password = $_POST['broker_password'];

    $sql = "SELECT * FROM broker WHERE broker_email=?;";
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
                $_SESSION["session_id"] = $_POST['broker_id'];
                $_SESSION["session_email"] = $_POST['broker_email'];
                $_SESSION['session_user_level'] = $_POST['user_level'];

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
} */







# admin stuff

/*function loginAdminUser($conn, $admin_email, $admin_password) {
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

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
                $_SESSION["session_id"] = $row['admin_id'];
                $_SESSION["session_email"] = $row['admin_email'];
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
} */