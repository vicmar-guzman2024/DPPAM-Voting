<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $username = htmlspecialchars(trim($_POST['username']));
    $password = trim($_POST['password']);
    $remember_me = isset($_POST['remember_me']) ? true : false;

    // Validate inputs
    if (empty($username) || empty($password)) {
        $_SESSION['error_message'] = "Please fill in all required fields.";
        $_SESSION['username_input'] = $username; // Store the username
        header("Location: ../vol_login.php");
        exit;
    }

    // Database credentials
    $servername = "localhost";
    $username_db = "root"; 
    $password_db = "";     
    $dbname = "dppam";     

    // Create database connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        error_log("Database Connection Error: " . $conn->connect_error); // Log the error
        die("Connection failed: Please try again later.");
    }

    // Query to fetch user by username
    $sql = "SELECT user_id, username, password, role, firstname, lastname 
            FROM users 
            WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        error_log("SQL Error: " . $conn->error); // Log the error
        die("Something went wrong. Please try again later.");
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $db_username, $db_password, $role, $firstname, $lastname);

    if ($stmt->fetch()) {
        if (password_verify($password, $db_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $db_username;
            $_SESSION['role'] = $role;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;

            if ($remember_me) {
                setcookie("user_token", hash('sha256', $username), time() + (86400 * 30), "/");
            }

            header("Location: ../vol_dashboard.php");
            exit;
        } else {
            // Incorrect password
            $_SESSION['error_message'] = "Incorrect password.";
            $_SESSION['username_input'] = $username; // Preserve username input
            header("Location: ../vol_login.php");
            exit;
        }
    } else {
        // User not found
        $_SESSION['error_message'] = "No user found with that username.";
        header("Location: ../vol_login.php");
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../vol_login.php");
    exit;
}

?>
