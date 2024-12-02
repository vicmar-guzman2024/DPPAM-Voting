<?php
session_start(); // Start the session

// Destroy all session data
session_unset();
session_destroy();

// Redirect to the login page with a query parameter
header("Location: user_login.php?logout=true");
exit();
