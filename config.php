<?php
    session_start();
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'foodie_store');

    $mysqli = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Checking for connections
    if ($mysqli->connect_error) {
        die('Connect Error (' .$mysqli->connect_errno . ') '.$mysqli->connect_error);
    }
?>