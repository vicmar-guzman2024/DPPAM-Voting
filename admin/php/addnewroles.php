<?php
include("connection.php");

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Add'])){

    $role_name = $_POST['category_name'];
    $descriptions = $_POST['descriptions'];
    // $file = $_POST['file'];

    $stmt = $sql_connection->prepare("INSERT INTO ROLES (ROLE_NAME, DESCRIPTIONS) VALUES (?,?)");
    $stmt->bind_param("ss", $role_name, $descriptions);
    $stmt->execute();
    $stmt->close();

}

?>