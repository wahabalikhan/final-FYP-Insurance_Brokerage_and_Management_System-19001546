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

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="consumer_password_repeat">
                <label for="floatingPassword">Repeat password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="register-submit">Register</button>
        </form>

        <?php
        # error-handling messages
        # GET to check for data we can see
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Sign up failed, missing fields.</p>";
            }
            if ($_GET["error"] == "invalidemailaddress") {
                echo "<p>Sign up failed, invalid email address.</p>";
            }
            if ($_GET["error"] == "passwordsdontmatch") {
                echo "<p>Sign up failed, passwords don't match.</p>";
            }
            if ($_GET["error"] == "stmtfailed") {
                echo "<p>Sign up failed, something went wrong. Try again!</p>";
            }
            if ($_GET["error"] == "emailaddressalreadyexists") {
                echo "<p>Sign up failed, email address already exists.</p>";
            }
            if ($_GET["error"] == "none") {
                echo "<p>Sign up successful!</p>";
            }
        }
        ?>
    </div>
</main>


<script src="assets/js/bootstrap.bundle.min.js"></script>

<?php
include_once 'footer.php';
?>