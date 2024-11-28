<?php
$localhost = "localhost";
$user = "root";
$password = "";
$database = "dppam";

// Create connection
$sql_connection = new mysqli($localhost, $user, $password, $database);

// Check connection
if ($sql_connection->connect_error) {
    die("Connection failed: " . $sql_connection->connect_error);
}
?>
