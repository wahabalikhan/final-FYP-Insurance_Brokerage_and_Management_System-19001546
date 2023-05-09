<?php
session_start();

include_once 'header.php';
require_once 'includes/functions.inc.php';

if (!isConsumer()) {
    header("location: login.php");
}

$sql_consumer = "SELECT * FROM consumer";
$records_consumer = mysqli_query($conn, $sql_consumer);
?>

<body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>search</h1>
        </div>

        <?php
        if (isset($_POST['quote_submit'])) {
            $car_reg = $_POST['car_reg'];
            $vehicle_type = $_POST['vehicle_type'];
            $cover = $_POST['cover'];

            $sql = "INSERT INTO quote (car_reg, vehicle_type, cover_type) VALUES ('$car_reg','$vehicle_type','$cover')";
            if (mysqli_query($conn, $sql)) {
                $sql_select = "SELECT * FROM product WHERE vehicle_type='" . $vehicle_type . "' AND cover_type='" . $cover . "'";
                if (mysqli_query($conn, $sql_select)) {
                    $records_product = mysqli_query($conn, $sql_select);
                    while ($row = mysqli_fetch_array($records_product)) {
                        echo "<div class='card' style='width: 18rem;'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . $row['product_name'] . "</h5>
                            <h6 class='card-subtitle mb-2 text-muted'>" . $row['cover_type'] . "</h6>
                            <h6 class='card-subtitle mb-2 text-muted'>" . $row['vehicle_type'] . "</h6>
                            <h6 class='card-subtitle mb-2 text-muted'>" . $row['product_price'] . "</h6>
                            <p class='card-text'>" . $row['product_description'] . "</p>
                        </div>
                    </div>";
                    }
                }
            } else {
                echo "Failed to insert quote record";
            }
            header("refresh:1; url='search_results.php'");
        } ?>

        <form action="includes/insert.inc.php" method="post">
            <select name="select_product">
                <label>Select a product</label>
                <?php

                $sql_product = "SELECT * FROM product WHERE vehicle_type='" . $vehicle_type . "' AND cover_type='" . $cover . "'";
                $records_product = mysqli_query($conn, $sql_product);

                while ($row = mysqli_fetch_array($records_product)) {
                    echo "<option>$row[product_id]</option>";
                } ?>
            </select>

            <select name="select_consumer">
                <?php

                $sql_consumer2 = "SELECT consumer_id FROM consumer";
                $records_consumer2 = mysqli_query($conn, $sql_consumer2);

                while ($row = mysqli_fetch_array($records_consumer2)) {
                    echo "<option>$row[consumer_id]</option>";
                } ?>
            </select>

            <button type="submit" name="purchase_submit">Purchase</button>
        </form>

    </main>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>