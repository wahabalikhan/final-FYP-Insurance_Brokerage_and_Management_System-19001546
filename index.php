<?php
include_once 'header.php';
if (empty($_GET['status'])) {
    session_destroy();
    header('Location:index.php?status=1');
    exit;
}
?>

<p>hello</p>
<h1>Home page</h1>