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

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Log in</h1>
    <div class="form-signin w-100 m-auto">
        <form action="includes/login.inc.php" method="post" style="max-width: 500px;"> <!-- action="includes/login.inc.php" is where user will be sent to when form submitted, using post method to hide sensitive data in URL but will still be passed-->
            <h1 class="h3 mb-3 fw-normal">Consumer login</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="consumer_email">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="consumer_password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="consumer_login_submit">Sign in</button>
        </form>
        <br>
        <form action="includes/login.inc.php" method="post" style="max-width: 500px;"> <!-- action="includes/login.inc.php" is where user will be sent to when form submitted, using post method to hide sensitive data in URL but will still be passed-->
            <h1 class="h3 mb-3 fw-normal">Broker login</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="broker_email">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="broker_password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="broker_login_submit">Sign in</button>
        </form>
        <br>
        <form action="includes/login.inc.php" method="post" style="max-width: 500px;"> <!-- action="includes/login.inc.php" is where user will be sent to when form submitted, using post method to hide sensitive data in URL but will still be passed-->
            <h1 class="h3 mb-3 fw-normal">Admin login</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="admin_email">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="admin_password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="admin_login_submit">Sign in</button>
        </form>
    </div>
</main>


<script src="assets/js/bootstrap.bundle.min.js"></script>