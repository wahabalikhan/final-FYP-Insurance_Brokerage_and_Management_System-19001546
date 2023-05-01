<?php
# Code adapted from https://www.youtube.com/watch?v=gCo6JqGMi30, How To Create A Login System In PHP For Beginners | Procedural MySQLi | PHP Tutorial
session_start();
include_once 'header.php';
require_once 'includes/functions.inc.php';

if (!isAdmin()) {
    header("location: login.php");
}

$sql = "SELECT * FROM admin WHERE admin_id='" . $_SESSION['session_id'] . "'";
$records = mysqli_query($conn, $sql);
?>


<!-- <body>
    <h1>admin dashboard</h1>
    <?php while ($row = mysqli_fetch_array($records)) {
        echo $row['admin_id'];
        echo $row['admin_email'];
        echo $row['admin_password'];
    } ?>
</body> -->

<body>
    <h1>admin dashboard</h1>

    <h2 class="panel-heading">Consumer panel</h2>
    <p class="heading">Add consumer</p>
    <table>
        <tr>
            <th>Consumer email</th>
            <th>Consumer password</th>
        </tr>
        <?php
        echo "<tr><form action='includes/insert.inc.php' method='POST'>
            <td><input type=text name=consumer_email value='" . $row["consumer_email"] . "'></td>
            <td><input type=text name=consumer_password value='" . $row["consumer_password"] . "'></td>
            <td><input type=hidden name=user_level value='" . $row["user_level"] . "'></td>
            <input type=hidden name=consumer_id value='" . $row["consumer_id"] . "'>
            <td><input type='submit' name='insert-consumer' value='Add'></td>
            </form><tr>";
        ?>
    </table>
    <?php
    $sql = "SELECT * FROM consumer";
    $records = mysqli_query($conn, $sql);
    ?>
    <p class="heading">Update consumers</p>
    <table>
        <tr>
            <th>Consumer email</th>
            <th>Consumer password</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($records)) {
            echo "<tr><form action='includes/update.inc.php' method='POST'>
                <td><input type=text name=consumer_email value='" . $row["consumer_email"] . "'></td>
                <td><input type=text name=consumer_password value='" . $row["consumer_password"] . "'></td>
                <td><input type=hidden name=user_level value='" . $row["user_level"] . "'></td>
                <input type=hidden name=consumer_id value='" . $row["consumer_id"] . "'>
                <td><input type='submit' value='Update'></td>
                </form><tr>";
        }
        ?>
    </table>
    <?php
    $sql = "SELECT * FROM consumer";
    $records = mysqli_query($conn, $sql);
    ?>
    <p class="heading">Remove consumer</p>
    <table>
        <tr>
            <th>Consumer email</th>
            <th>Consumer password</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($records)) {
            echo "<tr><td>" . $row['consumer_email'] . "</td>
                            <td>" . $row['consumer_password'] . "</td>
                            <td>" . $row['user_level'] . "</td>
                            <td><a class='delete' href=includes/delete.inc.php?consumer_id=" . $row['consumer_id'] . ">Delete</a></td>
                            <tr>";
        }
        ?>
    </table>
    <br>
    <br>
    <br>

    <h2 class="panel-heading">Broker panel</h2>
    <p class="heading">Add broker</p>
    <table>
        <tr>
            <th>broker email</th>
            <th>broker password</th>
        </tr>
        <?php
        echo "<tr><form action='includes/insert.inc.php' method='POST'>
            <td><input type=text name=broker_email value='" . $row["broker_email"] . "'></td>
            <td><input type=text name=broker_password value='" . $row["broker_password"] . "'></td>
            <td><input type=hidden name=user_level value='" . $row["user_level"] . "'></td>
            <input type=hidden name=broker_id value='" . $row["broker_id"] . "'>
            <td><input type='submit' name='add-broker' value='Add'></td>
            </form><tr>";
        ?>
    </table>
    <?php
    $sql = "SELECT * FROM broker";
    $records = mysqli_query($conn, $sql);
    ?>
    <p class="heading">Update brokers</p>
    <table>
        <tr>
            <th>broker email</th>
            <th>broker password</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($records)) {
            echo "<tr><form action='includes/update.inc.php' method='POST'>
                <td><input type=text name=broker_email value='" . $row["broker_email"] . "'></td>
                <td><input type=text name=broker_password value='" . $row["broker_password"] . "'></td>
                <td><input type=hidden name=user_level value='" . $row["user_level"] . "'></td>
                <input type=hidden name=broker_id value='" . $row["broker_id"] . "'>
                <td><input type='submit' value='Update'></td>
                </form><tr>";
        }
        ?>
    </table>
    <?php
    $sql = "SELECT * FROM broker";
    $records = mysqli_query($conn, $sql);
    ?>
    <p class="heading">Remove broker</p>
    <table>
        <tr>
            <th>broker email</th>
            <th>broker password</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($records)) {
            echo "<tr><td>" . $row['broker_email'] . "</td>
                            <td>" . $row['broker_password'] . "</td>
                            <td>" . $row['user_level'] . "</td>
                            <td><a class='delete' href=includes/delete.inc.php?broker_id=" . $row['broker_id'] . ">Delete</a></td>
                            <tr>";
        }
        ?>
    </table>
    <br>

    <h2 class="panel-heading">product panel</h2>
    <p class="heading">Add product</p>
    <table>
        <tr>
            <th>product name</th>
            <th>product price</th>
            <th>product description</th>
        </tr>
        <?php
        echo "<tr><form action='includes/insert.inc.php' method='POST'>
            <td><input type=text name=product_name value='" . $row["product_name"] . "'></td>
            <td><input type=text name=product_price value='" . $row["product_price"] . "'></td>
            <td><input type=text name=product_description value='" . $row["product_description"] . "'></td>
            <input type=hidden name=product_id value='" . $row["product_id"] . "'>
            <td><input type='submit' name='add-product' value='Add'></td>
            </form><tr>";
        ?>
    </table>
    <br>
    <?php
    $sql = "SELECT * FROM product";
    $records = mysqli_query($conn, $sql);
    ?>
    <p class="heading">Update product</p>
    <table>
        <tr>
            <th>product name</th>
            <th>product price</th>
            <th>product description</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($records)) {
            echo "<tr><form action='includes/update.inc.php' method='POST'>
                <td><input type=text name=product_name value='" . $row["product_name"] . "'></td>
                <td><input type=text name=product_price value='" . $row["product_price"] . "'></td>
                <td><input type=text name=product_description value='" . $row["product_description"] . "'></td>
                <input type=hidden name=product_id value='" . $row["product_id"] . "'>
                <td><input type='submit' name='update-product' value='Update'></td>
                </form><tr>";
        }
        ?>
    </table>
    <br>
    <?php
    $sql = "SELECT * FROM product";
    $records = mysqli_query($conn, $sql);
    ?>
    <p class="heading">Remove product</p>
    <table>
        <tr>
            <th>product name</th>
            <th>product price</th>
            <th>product description</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($records)) {
            echo "<tr>
            <td>" . $row['product_id'] . "</td>
            <td>" . $row['product_name'] . "</td>
            <td>" . $row['product_price'] . "</td>
            <td>" . $row['product_description'] . "</td>
            <td><a class='delete' href=includes/delete.inc.php?product_id=" . $row['product_id'] . ">Delete</a></td>
            <tr>";
        }
        ?>
    </table>
    <a href="http://localhost:8888/phpMyAdmin/?lang=en">PHPMyAdmin database access link</a>
    <script src="assets/js/app.js"></script>
</body>