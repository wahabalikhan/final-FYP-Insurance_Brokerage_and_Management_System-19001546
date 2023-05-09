<?php
session_start();
define('user_level_none', 'none');
define('user_level_consumer', 'consumer');
define('user_level_broker', 'broker');
define('user_level_admin', 'admin');

require 'dbh.inc.php';

function isNone() {
    if ($_SESSION['session_user_level'] == user_level_none) {
        return true;
    } else {
        return false;
    }
}

function isConsumer() {
    if ($_SESSION['session_user_level'] == user_level_consumer) {
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

function isAdmin() {
    if ($_SESSION['session_user_level'] == user_level_admin) {
        return true;
    } else {
        return false;
    }
}

function emptyLogin($consumer_email, $consumer_password)
{
    # returns true or false statement
    $result = "";
    # empty()—check if there is data or no data that will be in function
    if (empty($consumer_email) || empty($consumer_password)) {
        # if empty fields, then return true
        $result = true;
    } else {
        # no empty fields, then return false
        $result = false;
    }
    return $result;
}
