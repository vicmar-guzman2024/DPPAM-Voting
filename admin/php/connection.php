<?php

$localhost = "localhost";
$user = "root";
$password = "";
$database = "DPPAM";

$sql_connection = new mysqli($localhost, $user, $password, $database);

if ($sql_connection->connect_error) {
    die("Connection failed: " . $sql_connection->connect_error);
};

?>