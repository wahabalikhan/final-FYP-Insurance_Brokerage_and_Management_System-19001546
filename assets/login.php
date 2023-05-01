<?php
include_once 'header.php';
require_once 'includes/functions.inc.php';

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

<h1>Log in</h1>

<p>consumer login</p>
<div class="consumer-login-form">
    <form action="includes/login.inc.php" method="post"> <!-- action="includes/login.inc.php" is where user will be sent to when form submitted, using post method to hide sensitive data in URL but will still be passed-->

        <input type="text" name="consumer_email" placeholder="Email address">
        <input type="password" name="consumer_password" placeholder="Password">
        <button type="submit" name="consumer_login_submit">Log in</button>
    </form>
</div>

<p>broker login</p>
<div class="broker-login-form">
    <form action="includes/login.inc.php" method="post"> <!-- action="includes/login.inc.php" is where user will be sent to when form submitted, using post method to hide sensitive data in URL but will still be passed-->

        <input type="text" name="broker_email" placeholder="Email address">
        <input type="password" name="broker_password" placeholder="Password">
        <button type="submit" name="broker_login_submit">Log in</button>
    </form>
</div>

<p>admin login</p>
    <div class="admin-login-form">
        <form action="includes/login.inc.php" method="post"> <!-- action="includes/login.inc.php" is where user will be sent to when form submitted, using post method to hide sensitive data in URL but will still be passed-->

            <input type="text" name="admin_email" placeholder="Email address">
            <input type="password" name="admin_password" placeholder="Password">
            <button type="submit" name="admin_login_submit">Log in</button>
        </form>
    </div>