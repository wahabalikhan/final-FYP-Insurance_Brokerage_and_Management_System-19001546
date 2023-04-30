<?php
include_once 'header.php';

if (isNone()) {
    header("location: index.php");
}
if (isConsumer()) {
    header("location: consumer_dashboard.php");
}
if (isBroker()) {
    header("location: dashboard.php");
}

?>

<h1>Register</h1>

    <div class="register-form">
        <form action="includes/register.inc.php" method="post"> <!-- action="includes/register.inc.php" is where user will be sent to when form submitted, using post method to hide sensitive data in URL but will still be passed-->
            
            <input type="text" name="fullname" placeholder="Fullname">
            <input type="text" name="email" placeholder="Email address">
            <input type="password" name="password" placeholder="Password">
            <input type="number" name="phone" placeholder="Phone number">
            <input type="text" name="address" placeholder="Home address">
            <button type="submit" name="register-submit">Register</button>
        </form>
    </div>