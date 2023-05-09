<?php
# Code adapted from https://www.youtube.com/watch?v=gCo6JqGMi30, How To Create A Login System In PHP For Beginners | Procedural MySQLi | PHP Tutorial
# user logged in on every page on application
session_start();
include 'includes/dbh.inc.php';
include 'includes/functions.inc.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Insurance Brokerage and Management System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* nav style */
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>

    <link href="assets/css/sidebar.css" rel="stylesheet">
    <link href="assets/css/form-validation.css" rel="stylesheet">

</head>

<!-- top nav-->
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">IBMS</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                    <?php
                    if (isset($_SESSION['session_id'])) {
                        if ($_SESSION['session_user_level'] === user_level_admin) {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='admin_dashboard.php'>
                                <span class='align-text-bottom'></span>
                                Dashboard
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='includes/logout.inc.php'>
                                <span class='align-text-bottom'></span>
                                Log out
                            </a>
                        </li>";
                        } else if ($_SESSION['session_user_level'] === user_level_broker) {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='broker_dashboard.php'>
                                <span class='align-text-bottom'></span>
                                Dashboard
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='broker_booking.php'>
                                <span class='align-text-bottom'></span>
                                Bookings
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='includes/logout.inc.php'>
                                <span class='align-text-bottom'></span>
                                Log out
                            </a>
                        </li>";
                        } else if ($_SESSION['session_user_level'] === user_level_consumer) {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='consumer_dashboard.php'>
                                <span class='align-text-bottom'></span>
                                Dashboard
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='consumer_booking.php'>
                                <span class='align-text-bottom'></span>
                                Bookings
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='quote.php'>
                                <span class='align-text-bottom'></span>
                                Quotes
                            </a>
                        </li>
                        <li class='nav-item'>
                        <a class='nav-link' href='product.php'>
                            <span class='align-text-bottom'></span>
                            Products
                        </a>
                    </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='includes/logout.inc.php'>
                                <span class='align-text-bottom'></span>
                                Log out
                            </a>
                        </li>";
                        }
                    } else {
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='index.php'>
                            <span class='align-text-bottom'></span>
                            Home
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='product.php'>
                            <span class='align-text-bottom'></span>
                            Products
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='login.php'>
                            <span class='align-text-bottom'></span>
                            Login
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='Register.php'>
                            <span class='align-text-bottom'></span>
                            Register
                        </a>
                    </li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>