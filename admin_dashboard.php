<?php
# Code adapted from https://www.youtube.com/watch?v=gCo6JqGMi30, How To Create A Login System In PHP For Beginners | Procedural MySQLi | PHP Tutorial
session_start();
include_once 'header.php';
require_once 'includes/functions.inc.php';

if (!isAdmin()) {
    header("location: login.php");
}

$sql_consumer = "SELECT * FROM consumer";
$records_consumer = mysqli_query($conn, $sql_consumer);

$sql_broker = "SELECT * FROM broker";
$records_broker = mysqli_query($conn, $sql_broker);

$sql_product = "SELECT * FROM product";
$records_product = mysqli_query($conn, $sql_product);
?>

<body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Admin Dashboard</h1>
        </div>

        <h2>Consumers</h2>
        <br>
        <h4>Add consumer</h4>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Consumer email</th>
                        <th scope="col">Consumer password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo "<tr><form action='includes/insert.inc.php' method='post'>
                                <td><input type=text name=consumer_email value='" . $row["consumer_email"] . "'></td>
                                <td><input type=text name=consumer_password value='" . $row["consumer_password"] . "'></td>
                                <td><input type=hidden name=user_level value='" . $row["user_level"] . "'></td>
                                <td><input type=hidden name=consumer_id value='" . $row["consumer_id"] . "'></td>
                                <td><input type='submit' name='insert-consumer' value='Add'></td>
                            </form></tr>"; ?>
                </tbody>
            </table>
        </div>
        <br>
        <h4>Update consumer</h4>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Consumer email</th>
                        <th scope="col">Consumer password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($records_consumer)) {
                        echo "<tr><form action='includes/update.inc.php' method='post'>
                                <td><input type=text name=consumer_email value='" . $row["consumer_email"] . "'></td>
                                <td><input type=text name=consumer_password value='" . $row["consumer_password"] . "'></td>
                                <td><input type=hidden name=user_level value='" . $row["user_level"] . "'></td>
                                <td><input type=hidden name=consumer_id value='" . $row["consumer_id"] . "'></td>
                                <td><button type='submit' name='update-consumer' value='Update'>Update</td>
                                </form></tr>";
                    } ?>
                </tbody>
            </table>
        </div>
        <br>
        <h4>Delete consumer</h4>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Consumer email</th>
                        <th scope="col">Consumer password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_consumer = "SELECT * FROM consumer";
                    $records_consumer = mysqli_query($conn, $sql_consumer);
                    while ($row = mysqli_fetch_array($records_consumer)) {
                        echo "<tr>
                                <td>" . $row['consumer_email'] . "</td>
                                <td>" . $row["consumer_password"] . "</td>
                                <td><a class='delete' href=includes/delete.inc.php?consumer_id=" . $row['consumer_id'] . ">Delete</a></td>
                                </tr>";
                    } ?>
                </tbody>
            </table>
        </div>
        <br>
        <h2>Brokers</h2>
        <br>
        <h4>Add broker</h4>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Broker email</th>
                        <th scope="col">Broker password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo "<tr><form action='includes/insert.inc.php' method='post'>
                                <td><input type=text name=broker_email value='" . $row["broker_email"] . "'></td>
                                <td><input type=text name=broker_password value='" . $row["broker_password"] . "'></td>
                                <td><input type=hidden name=user_level value='" . $row["user_level"] . "'></td>
                                <td><input type=hidden name=broker_id value='" . $row["broker_id"] . "'></td>
                                <td><input type='submit' name='insert-broker' value='Add'></td>
                            </form></tr>"; ?>
                </tbody>
            </table>
        </div>
        <br>
        <h4>Update broker</h4>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Broker email</th>
                        <th scope="col">Broker password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($records_broker)) {
                        echo "<tr><form action='includes/update.inc.php' method='post'>
                                <td><input type=text name=broker_email value='" . $row["broker_email"] . "'></td>
                                <td><input type=text name=broker_password value='" . $row["broker_password"] . "'></td>
                                <td><input type=hidden name=user_level value='" . $row["user_level"] . "'></td>
                                <td><input type=hidden name=broker_id value='" . $row["broker_id"] . "'></td>
                                <td><button type='submit' name='update-broker' value='Update'>Update</td>
                                </form></tr>";
                    } ?>
                </tbody>
            </table>
        </div>
        <br>
        <h4>Delete broker</h4>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Broker email</th>
                        <th scope="col">Broker password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_broker = "SELECT * FROM broker";
                    $records_broker = mysqli_query($conn, $sql_broker);
                    while ($row = mysqli_fetch_array($records_broker)) {
                        echo "<tr>
                                <td>" . $row['broker_email'] . "</td>
                                <td>" . $row["broker_password"] . "</td>
                                <td><a class='delete' href=includes/delete.inc.php?broker_id=" . $row['broker_id'] . ">Delete</a></td>
                                </tr>";
                    } ?>
                </tbody>
            </table>
        </div>
        <br>
        <h2>Products</h2>
        <br>
        <h4>Add product</h4>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Product name</th>
                        <th scope="col">Cover type</th>
                        <th scope="col">Vehicle type</th>
                        <th scope="col">Product price</th>
                        <th scope="col">Product description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo "<tr><form action='includes/insert.inc.php' method='post'>
                                <td><input type=text name=product_name value='" . $row["product_name"] . "'></td>
                                <td><input type=text name=cover_type value='" . $row["cover_type"] . "'></td>
                                <td><input type=text name=vehicle_type value='" . $row["vehicle_type"] . "'></td>
                                <td><input type=text name=product_price value='" . $row["product_price"] . "'></td>
                                <td><input type=text name=product_description value='" . $row["product_description"] . "'></td>
                                <td><input type=hidden name=product_id value='" . $row["product_id"] . "'></td>
                                <td><input type='submit' name='insert-product' value='Add'></td>
                            </form></tr>"; ?>
                </tbody>
            </table>
        </div>
        <br>
        <h4>Update product</h4>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Product name</th>
                        <th scope="col">Product price</th>
                        <th scope="col">Product description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($records_product)) {
                        echo "<tr><form action='includes/update.inc.php' method='post'>
                                <td><input type=text name=product_name value='" . $row["product_name"] . "'></td>
                                <td><input type=text name=product_price value='" . $row["product_price"] . "'></td>
                                <td><input type=text name=product_description value='" . $row["product_description"] . "'></td>
                                <td><input type=hidden name=product_id value='" . $row["product_id"] . "'></td>
                                <td><input type='submit' name='update-product' value='Update'></td>
                                </form></tr>";
                    } ?>
                </tbody>
            </table>
        </div>
        <br>
        <h4>Delete product</h4>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Product name</th>
                        <th scope="col">Product price</th>
                        <th scope="col">Product description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_product = "SELECT * FROM product";
                    $records_product = mysqli_query($conn, $sql_product);
                    while ($row = mysqli_fetch_array($records_product)) {
                        echo "<tr>
                                <td>" . $row['product_name'] . "></td>
                                <td>" . $row["product_price"] . "></td>
                                <td>" . $row["product_description"] . "></td>
                                <td><a class='delete' href=includes/delete.inc.php?product_id=" . $row['product_id'] . ">Delete</a></td>
                                </tr>";
                    } ?>
                </tbody>
            </table>
        </div>
        <a href="http://localhost:8888/phpMyAdmin5/index.php?route=/database/structure&server=1&db=final-FYP-Insurance_Brokerage_and_Management_System-19001546">PHPMyAdmin database</a>
    </main>
    </div>
    </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>