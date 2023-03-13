<?php

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "test_login_session";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: Please Contact Your Administrator ");
}