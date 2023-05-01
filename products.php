<?php
include_once 'header.php';
require_once 'includes/functions.inc.php';

if (isBroker()) {
    header("location: broker_dashboard.php");
}
if (isAdmin()) {
    header("location: admin_dashboard.php");
}
?>

<h1>Products</h1>

<?php
$sql = "SELECT * FROM products";
$records = mysqli_query($conn, $sql);
?>
<?php
while ($row = mysqli_fetch_array($records)) {
    echo $row['product_id'];
    echo $row['product_name'];
    echo $row['product_price'];
    echo $row['product_description'];
    echo "<br>";
}
?>