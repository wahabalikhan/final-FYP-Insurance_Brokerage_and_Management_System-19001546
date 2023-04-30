<?php
    session_start();
    define('user_level_none', 'none');
    define('user_level_broker', 'broker');

    require 'dbh.inc.php';

    function isNone() {
        if ($_SESSION['session_user_level'] == user_level_none) {
            return true;
        } else {
            return false;
        }
    }

    function isBroker() {
        if ($_SESSION['session_user_level'] == user_level_broker) {
            return true;
        } else {
            return false;
        }
    }