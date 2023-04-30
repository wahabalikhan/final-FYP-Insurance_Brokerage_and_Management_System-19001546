<?php
include_once 'header.php';
require_once 'includes/functions.inc.php';

if (isBroker()) {
    header("location: dashboard.php");
}
if (isNone()) {
    header("location: login.php");
}

?>

<h1>Log in</h1>

    <p>broker login</p>
    <div class="login-form">
        <form action="includes/login.inc.php" method="post"> <!-- action="includes/login.inc.php" is where user will be sent to when form submitted, using post method to hide sensitive data in URL but will still be passed-->

            <input type="text" name="email" placeholder="Email address">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="login-submit">Log in</button>
        </form>
    </div>