<?php
# Code adapted from https://www.youtube.com/watch?v=gCo6JqGMi30, How To Create A Login System In PHP For Beginners | Procedural MySQLi | PHP Tutorial
session_start();
include_once 'header.php';
require_once 'includes/functions.inc.php';

if (!isBroker()) {
    header("location: login.php");
}

$sql = "SELECT * FROM brokers WHERE broker_id='".$_SESSION['session_id']."'";
$records = mysqli_query($conn, $sql);
?>

<body>
    <?php while ($row = mysqli_fetch_array($records)) {
            echo $row['broker_id'];
            echo $row['broker_fullname'];
            echo $row['broker_email'];
            echo $row['broker_password'];
            echo $row['broker_phone'];
            echo $row['broker_address'];
            echo "<br>";
    } ?>
</body>