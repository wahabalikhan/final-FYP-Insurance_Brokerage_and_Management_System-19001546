<?php
# Code adapted from https://www.youtube.com/watch?v=gCo6JqGMi30, How To Create A Login System In PHP For Beginners | Procedural MySQLi | PHP Tutorial
session_start();
include_once 'header.php';
require_once 'includes/functions.inc.php';

if (!isConsumer()) {
    header("location: login.php");
}

$sql = "SELECT * FROM consumer WHERE consumer_id='" . $_SESSION['session_id'] . "'";
$records = mysqli_query($conn, $sql);

$sql_booking = "SELECT * FROM booking";
$records_booking = mysqli_query($conn, $sql_booking);
?>


<body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Consumer dashboard</h1>
        </div>
        <h4>Consumer information</h4>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Consumer email</th>
                        <th scope="col">Consumer password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($records)) {
                        echo "<tr>
                                <td>" . $row["consumer_email"] . "</td>
                                <td>" . $row["consumer_password"] . "</td>
                                </tr>";
                    } ?>
                </tbody>
            </table>
        </div>
        <h4>Upcoming appointments</h4>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Appointment ID</th>
                        <th scope="col">Appointment date</th>
                        <th scope="col">Appointment time</th>
                        <th scope="col">Broker</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_booking = "SELECT * FROM booking";
                    $records_booking = mysqli_query($conn, $sql_booking);
                    while ($row = mysqli_fetch_array($records_booking)) {
                        echo "<tr>
                                <td>" . $row["booking_id"] . "</td>
                                <td>" . $row['booking_date'] . "</td>
                                <td>" . $row["booking_time"] . "</td>
                                <td>" . $row["broker_id"] . "</td>
                                </tr>";
                    } ?>
                </tbody>
            </table>
            <h4>Policies taken out</h4>
            <?php
            $sql_policy = "SELECT * FROM product WHERE product_id IN (SELECT product_id FROM policies)";
            $records_policy = mysqli_query($conn, $sql_policy);

            while ($row = mysqli_fetch_array($records_policy)) {
                echo "
            <div class='card' style='width: 18rem;'>
                <div class='card-body'>
                    <h5 class='card-title'>" . $row['product_name'] . "</h5>
                    <h6 class='card-subtitle mb-2 text-muted'>" . $row['cover_type'] . "</h6>
                    <h6 class='card-subtitle mb-2 text-muted'>" . $row['vehicle_type'] . "</h6>
                    <h6 class='card-subtitle mb-2 text-muted'>" . $row['product_price'] . "</h6>
                    <p class='card-text'>" . $row['product_description'] . "</p>
                </div>
            </div>
        ";
            }
            ?>
    </main>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>