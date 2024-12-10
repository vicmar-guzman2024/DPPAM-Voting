<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Redirect to login page
//header("location: ../admin_sign_in.php");
header("location: ../../user_login.php");
exit();
    
?>
