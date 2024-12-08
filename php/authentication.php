<?php
session_start();


if(!isset($_SESSION['authenticated'])){
    $_SESSION['status'] = "Login to access dashboard";
    header('Location: user_login.php');
    exit(0);

}

?>