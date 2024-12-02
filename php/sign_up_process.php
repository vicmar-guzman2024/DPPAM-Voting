<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone_num = htmlspecialchars(trim($_POST['phone_num']));
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $role = $_POST['role']; // The role will be passed via hidden input

    // Error handling
    $errors = [];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate phone number (if any specific format is needed, customize further)
    if (!preg_match('/^\d{4}-\d{3}-\d{4}$/', $phone_num)) {
        $errors[] = "Invalid phone number format. Please use (XXXX-XXX-YYYY).";
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Check password strength
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    // Ensure the role is valid
    $valid_roles = ['Volunteer', 'Coordinator', 'Admin']; // Define allowed roles
    if (!in_array($role, $valid_roles)) {
        $errors[] = "Invalid role specified.";
    }

    // Process data if no errors
    if (empty($errors)) {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Database connection details
        $servername = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "dppam";

        // Create connection
        $conn = new mysqli($servername, $username, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, username, phone_num, password, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $firstname, $lastname, $email, $phone_num, $hashed_password, $role);

        if ($stmt->execute()) {
            // Set success message in session and redirect
            $_SESSION['success_message'] = "Account created successfully. You can now log in.";
            header("Location: ../vol_login.php"); // Redirect to the login page
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
        echo "<a href='javascript:history.back()'>Go Back</a>";
    }
} else {
    echo "Invalid request.";
}
?>
