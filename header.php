<?php
# Code adapted from https://www.youtube.com/watch?v=gCo6JqGMi30, How To Create A Login System In PHP For Beginners | Procedural MySQLi | PHP Tutorial
# user logged in on every page on application
session_start();
include 'includes/dbh.inc.php';
include 'includes/functions.inc.php';

$sql = "SELECT * FROM brokers";
$records = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logo.png" type="image/png">
    <title>Insurance Brokerage and Management System</title>

    <!-- Stylesheetss-->
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<header>
    <ul>
        <?php
        # check if broker logged in
        if (isset($_SESSION['session_id'])) {
            if ($_SESSION['session_user_level'] == user_level_broker) {
                echo "<li><a href='dashboard.php'>Home</a></li>";
            echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
            }
        } else {
            echo "<li><a href='index.php'>Home</a></li>";
            echo "<li><a href='login.php'>Login</a></li>";
        }
        ?>
    </ul>
</header>