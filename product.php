<?php
session_start();
include_once 'header.php';
require_once 'includes/functions.inc.php';

if (isBroker()) {
    header("location: broker_dashboard.php");
}
if (isAdmin()) {
    header("location: admin_dashboard.php");
}
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Products</h1>
    <div class="row">
        <?php
        $sql = "SELECT * FROM product";
        $records = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($records)) {
            echo "
            <div class='card' style='width: 18rem;'>
                <div class='card-body'>
                    <h5 class='card-title'>" . $row['product_name'] . "</h5>
                    <h6 class='card-subtitle mb-2 text-muted'>" . $row['cover_type'] . "</h6>
                    <h6 class='card-subtitle mb-2 text-muted'>" . $row['vehicle_type'] . "</h6>
                    <h6 class='card-subtitle mb-2 text-muted'>" . $row['product_price'] . "</h6>
                    <p class='card-text'>" . $row['product_description'] . "</p>
                    <form action='view_product.php' method'post'>
                        <input type=hidden name=product_id value='" . $row["product_id"] . "'>
                        <input type=hidden name=product_name value='" . $row["product_name"] . "'>
                        <input type=hidden name=cover_type value='" . $row["cover_type"] . "'>
                        <input type=hidden name=vehicle_type value='" . $row["vehicle_type"] . "'>
                        <input type=hidden name=product_price value='" . $row["product_price"] . "'>
                        <button type='submit' value='submit' name='view_submit'>View</button>
                    </form>
                    <a href='quote.php' class='card-link'>Purchase</a>
                </div>
            </div>
        ";
        }
        ?>
    </div>
</main>


<script src="assets/js/bootstrap.bundle.min.js"></script>