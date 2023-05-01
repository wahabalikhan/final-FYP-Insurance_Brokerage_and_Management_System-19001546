<?php
# Code adapted from https://www.youtube.com/watch?v=gCo6JqGMi30, How To Create A Login System In PHP For Beginners | Procedural MySQLi | PHP Tutorial

# Database handler that connects to database and able to pull data through referencing variable

# Using MAMP to connect to local database and server

# MAMP and PHPMyAdmin credentials
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "final-FYP-Insurance_Brokerage_and_Management_System-19001546";

# Open up connection to database
$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

# If connection fails, terminate connection/session and present error message
if (!$conn) {
    die("Connection to database failed: " . mysqli_connect_error());
}

?>