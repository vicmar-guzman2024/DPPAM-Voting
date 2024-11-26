<?php
include ("../database/condb.php");

if(isset($_POST["login"])){

    // Get the values from the POST request
    $username = isset($_POST['USERNAME']) ? $_POST['USERNAME'] : '';
    $password = isset($_POST['PASSWORD']) ? $_POST['PASSWORD'] : '';

    // Prevent SQL Injection by using prepared statements
    if($username && $password) {
        $stmt = $sql_connection->prepare("SELECT USERNAME, PASSWORD FROM admin_user WHERE USERNAME = ?");
        $stmt->bind_param("s", $username);  // "s" means string
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            // Password verification (if you're storing hashed passwords)
            if ($password === $row['PASSWORD']) { // Change to password_verify() if passwords are hashed
                // Successful login, redirect to the main page
                header("Location: ../index.php");
                exit(); // Ensure no further code is executed after header redirection
            } else {
                echo "Invalid username or password.";
            }
        } else {
            echo "Invalid username or password.";
        }

        $stmt->close();
    } else {
        echo "Please enter both username and password.";
    }
}
?>
