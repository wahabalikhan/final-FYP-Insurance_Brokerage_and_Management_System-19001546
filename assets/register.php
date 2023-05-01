<?php
include_once 'header.php';

if (isNone()) {
    header("location: index.php");
}
if (isConsumer()) {
    header("location: consumer_dashboard.php");
}
if (isBroker()) {
    header("location: broker_dashboard.php");
}
if (isAdmin()) {
    header("location: admin_dashboard.php");
}

?>

<h1>Register</h1>

<form action="includes/register.inc.php" method="POST"> <!-- action="includes/register.inc.php" is where user will be sent to when form submitted, using post method to hide sensitive data in URL but will still be passed-->
    <input type="text" name="consumer_email" placeholder="Email address">
    <input type="password" name="consumer_password" placeholder="Password">
    <button type="submit" name="register-submit">Register</button>
</form>