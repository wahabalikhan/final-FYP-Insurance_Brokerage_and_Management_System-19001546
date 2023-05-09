<?php
session_start();
include_once 'header.php';
require_once 'includes/functions.inc.php';

if (!isConsumer()) {
    header("location: login.php");
}


$sql_consumer = "SELECT * FROM consumer WHERE consumer_id='" . $_SESSION['session_id'] . "'";
$records_consumer = mysqli_query($conn, $sql_consumer);


$sql_quote = "SELECT * FROM quote";
$records_quote = mysqli_query($conn, $sql_quote);
?>

<body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Quotes</h1>
        </div>
        <h4>Quote form</h4>


        <form action="search_results.php" method="post"> <!-- action="includes/login.inc.php" is where user will be sent to when form submitted, using post method to hide sensitive data in URL but will still be passed -->
            <input type="text" name="car_reg" placeholder="Vehicle registration">

            <select name="vehicle_type">
            <option>Select a vehicle type</option>
                <option value="saloon">Saloon</option>
                <option value="hatchback">Hatchback</option>
            </select>

            <select name="cover">
            <option>Select a cover type</option>
                <option value="third-party">Third-party</option>
                <option value="comprehensive">Comprehensive</option>
            </select>

            <button type="submit" name="quote_submit">Submit</button>
            </form>
            <br>




        <h4>Previous quotes</h4>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Quote ID</th>
                        <th scope="col">Car registration</th>
                        <th scope="col">Vehicle type</th>
                        <th scope="col">Cover type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_quote = "SELECT * FROM quote";
                    $records_quote = mysqli_query($conn, $sql_quote);
                    while ($row = mysqli_fetch_array($records_quote)) {
                        echo "<tr>
                                <td>" . $row["quote_id"] . "</td>
                                <td>" . $row['car_reg'] . "</td>
                                <td>" . $row["vehicle_type"] . "</td>
                                <td>" . $row["cover_type"] . "</td>
                                </tr>";
                    } ?>
                </tbody>
            </table>
        </div>
    </main>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
