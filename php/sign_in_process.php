<?php
session_start(); // Start the session for storing user info

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $username = htmlspecialchars(trim($_POST['username']));
    $password = trim($_POST['password']);
    $remember_me = isset($_POST['remember_me']) ? true : false;

    // Connect to the database
    $servername = "localhost";
    $username_db = "root";  // Change to your database username
    $password_db = "";      // Change to your database password
    $dbname = "dppam";  // Change to your database name

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to get user by username
    $stmt = $conn->prepare("SELECT user_id, username, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $db_username, $db_password, $role);

    if ($stmt->fetch()) {
        // Verify password
        if (password_verify($password, $db_password)) {
            // Successful login
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $db_username;
            $_SESSION['role'] = $role;

            // Set cookie if "Remember me" is checked
            if ($remember_me) {
                setcookie("username", $username, time() + (86400 * 30), "/"); // 30 days
            }

            // Redirect to the dashboard or homepage
            header("Location: ../vol_dashboard.php");  // Change to your desired page
            exit;
        } else {
            // Invalid password
            echo "<p style='color: red;'>Incorrect password.</p>";
        }
    } else {
        // User not found
        echo "<p style='color: red;'>No user found with that username.</p>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
