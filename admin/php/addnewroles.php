<?php
include("connection.php");

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Add'])){

    $mission_name = $_POST['mission_name'];
    $mission_descriptions = $_POST['mission_description'];
    // $file = $_POST['file'];

    $stmt = $sql_connection->prepare("INSERT INTO MISSIONS (MISSION_NAME, MISSION_DESCRIPTION) VALUES (?,?)");
    $stmt->bind_param("ss", $mission_name, $mission_description);
    $stmt->execute();
    $stmt->close();

}

?>