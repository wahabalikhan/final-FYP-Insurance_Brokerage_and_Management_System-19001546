<?php
# Code adapted from https://www.youtube.com/watch?v=gCo6JqGMi30, How To Create A Login System In PHP For Beginners | Procedural MySQLi | PHP Tutorial
session_start();
include_once 'header.php';
require_once 'includes/functions.inc.php';

if (!isConsumer()) {
    header("location: login.php");
}

$sql = "SELECT * FROM consumer WHERE consumer_id='".$_SESSION['session_id']."'";
$records = mysqli_query($conn, $sql);
?>

<body>
    <h1>consumer dashboard</h1>
    <?php while ($row = mysqli_fetch_array($records)) {
            echo $row['consumer_id'];
            echo $row['consumer_email'];
            echo $row['consumer_password'];
    } ?>
</body>