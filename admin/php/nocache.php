<?php 

// Prevent caching of the page by the browser
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // In the past

// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['username'])) {
    // Redirect to login page if session is not set (user is logged out)
    header("location: admin_sign_in.php");
    exit();
}

?>