<?php 
session_start();
include('condb.php');

if (isset($_POST['login_btn'])) {

    if (!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))) {

        $email = mysqli_real_escape_string($sql_connection, $_POST['email']);
        $password = mysqli_real_escape_string($sql_connection, $_POST['password']);
        $remember_me = isset($_POST['remember_me']) ? $_POST['remember_me'] : null; // Check if "Remember Me" is checked

        $login_query = "SELECT firstname, lastname, email, phone_num, verify_token, email_status, profile_picture, role, password 
                        FROM users WHERE email='$email' LIMIT 1";
        $login_query_run = mysqli_query($sql_connection, $login_query);

        if (mysqli_num_rows($login_query_run) > 0) {
            $row = mysqli_fetch_array($login_query_run);

            // Verify the hashed password
            if (password_verify($password, $row['password'])) {

                // Check if the email is verified
                if ($row['email_status'] == "1") {
                    $_SESSION['authenticated'] = true;
                    $_SESSION['auth_user'] = [
                        'firstname' => $row['firstname'],
                        'lastname' => $row['lastname'],
                        'email' => $row['email'],
                        'phone_num' => $row['phone_num'],
                        'profile_picture' => $row['profile_picture'],
                        'role' => $row['role'] // Save the role in session
                    ];

                    // "Remember Me" functionality
                    if ($remember_me) {
                        // Set a cookie to remember the user (valid for 30 days)
                        setcookie('email', $email, time() + (30 * 24 * 60 * 60), "/"); // expires in 30 days
                        setcookie('password', $password, time() + (30 * 24 * 60 * 60), "/"); // expires in 30 days
                    } else {
                        // Clear cookies if not "Remember Me"
                        if (isset($_COOKIE['email'])) {
                            setcookie('email', '', time() - 3600, '/'); 
                        }
                        if (isset($_COOKIE['password'])) {
                            setcookie('password', '', time() - 3600, '/');
                        }
                    }

                    $_SESSION['status'] = "Logged in successfully";

                    // Redirect based on user role
                    if ($row['role'] == 'VOLUNTEER') {
                        header("Location: ../vol_dashboard.php");
                    } elseif ($row['role'] == 'COORDINATOR') {
                        header("Location: ../coordinator_dashboard.php");
                    } elseif ($row['role'] == 'ADMIN') {
                        header("Location: ../admin/id_generator.html");
                    } else {
                        $_SESSION['status'] = "Invalid role detected";
                        header("Location: ../user_login.php");
                    }
                    exit();
                } else {
                    $_SESSION['input_email'] = $email; // Save email input for feedback
                    $_SESSION['status'] = "Verify your email address to login";
                    header("Location: ../user_login.php");
                    exit();
                }
            } else {
                $_SESSION['input_email'] = $email; // Save email input for feedback
                $_SESSION['status'] = "Invalid password. Please try again.";
                header("Location: ../user_login.php");
                exit();
            }
        } else {
            $_SESSION['status'] = "Invalid email. Please check your input.";
            header("Location: ../user_login.php");
            exit();
        }
    } else {
        $_SESSION['status'] = "Fill out all fields";
        header("Location: ../user_login.php");
        exit();
    }
}
?>










/*
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $username = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);
    $remember_me = isset($_POST['remember_me']) ? true : false;

    // Validate inputs
    if (empty($username) || empty($password)) {
        $_SESSION['error_message'] = "Please fill in all required fields.";
        $_SESSION['username_input'] = $username; // Store the username
        header("Location: ../user_login.php");
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

    // Query to fetch user by email
    $sql = "SELECT user_id, email, password, role, firstname, lastname 
            FROM users 
            WHERE email = ?";
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
            $_SESSION['email'] = $db_username;
            $_SESSION['role'] = $role;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;

            if ($remember_me) {
                setcookie("user_token", hash('sha256', $email), time() + (86400 * 30), "/");
            }

            // Redirect based on role
            switch ($role) {
                case 'ADMIN':
                    header("Location: ../admin/index.php");
                    break;
                case 'COORDINATOR':
                    header("Location: ../coordinator_dashboard.php");
                    break;
                case 'VOLUNTEER':
                    header("Location: ../vol_dashboard.php");
                    break;
                default:
                    $_SESSION['error_message'] = "Invalid role specified.";
                    header("Location: ../user_login.php");
            }
            exit;
        } else {
            // Incorrect password
            $_SESSION['error_message'] = "Incorrect password.";
            $_SESSION['username_input'] = $username; // Preserve username input
            header("Location: ../user_login.php");
            exit;
        }
    } else {
        // User not found
        $_SESSION['error_message'] = "No user found with that email.";
        header("Location: ../user_login.php");
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../user_login.php");
    exit;
}
*/


