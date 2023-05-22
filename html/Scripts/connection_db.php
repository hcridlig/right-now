<?php
require_once 'env_retrieve.php';

// Establish a connection to the MySQL database
$servername = $DB_HOST;
$username = $DB_USER;
$password = $DB_PASS;
$dbname = "projet";

$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>