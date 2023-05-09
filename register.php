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

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Register</h1>
    <div class="form-signin w-100 m-auto">
        <form action="includes/register.inc.php" method="post" style="max-width: 500px;"> <!-- action="includes/login.inc.php" is where user will be sent to when form submitted, using post method to hide sensitive data in URL but will still be passed-->

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="consumer_email">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="consumer_password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="register-submit">Register</button>
        </form>
    </div>
</main>


<script src="assets/js/bootstrap.bundle.min.js"></script>