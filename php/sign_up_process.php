
<?php
/*
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
            // $_SESSION['success_sign_up_message'] = "Account created successfully. You can now log in.";
            header("Location: ../vol_registration.php"); // Redirect to the login page
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
    */

session_start(); 
include('condb.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

function send_email_verify($firstname, $lastname, $email, $verify_token){
    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);    

    // Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->Username   = 'vicmarrrrr.2002@gmail.com';            // SMTP username
    $mail->Password   = 'ybfmfruyfursakmt';                     // SMTP password
    $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_SMTPS';          // Enable implicit TLS encryption
    $mail->Port       = 587;                                    // TCP port to connect to

    // Recipients
    $mail->setFrom('vicmarrrrr.2002@gmail.com', 'DPPAM');
    $mail->addAddress($email);     // Add a recipient
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'DPPAM Email Verification';

    $email_template = "
        <h2>You have registered with DPPAM</h2>
        <h4>Email verified! Please complete the form to continue registration.</h4><br>
        <a href='http://localhost/DPPAM%20Voting/php/verify_email.php?token=$verify_token'>Click Me</a>
    ";

    $mail->Body = $email_template;
    $mail->send();
}
 
if (isset($_POST['sign_up_btn'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone_num = $_POST['phone_num'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];
    $verify_token = md5(rand());

    // Store the user input in session if email already exists
    $_SESSION['temp_firstname'] = $firstname;
    $_SESSION['temp_lastname'] = $lastname;
    $_SESSION['temp_phone_num'] = $phone_num;

    // Check if email exists
    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($sql_connection, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['status'] = 'Email already exists';

        // Redirect based on role
        if ($role === 'Admin') {
            header("Location: ../admin_sign_up_form.php");
        } elseif ($role === 'Coordinator') {
            header("Location: ../coordinator_sign_up_form.php");
        } elseif ($role === 'Volunteer') {
            header("Location: ../vol_signup.php");
        } else {
            header("Location: ../vol_signup.php"); // Default fallback
        }
        exit(); // Stop execution after redirect
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert New User
        $query = "INSERT INTO users(firstname, lastname, email, phone_num, password, role, verify_token) 
                  VALUES('$firstname','$lastname','$email','$phone_num','$hashed_password','$role','$verify_token')";
        $query_run = mysqli_query($sql_connection, $query);

        if ($query_run) {
            // Send email verification (ensure the function send_email_verify exists and works)
            send_email_verify("$firstname", "$lastname", "$email", "$verify_token");
            $_SESSION['status'] = 'Registered Successfully. Check your email address to complete the registration process';

            // Clear the temporary session data after successful registration
            unset($_SESSION['temp_firstname']);
            unset($_SESSION['temp_lastname']);
            unset($_SESSION['temp_phone_num']);

            // Redirect based on role
            if ($role === 'Admin') {
                header("Location: ../user_login.php");
            } elseif ($role === 'Coordinator') {
                header("Location: ../user_login.php");
            } elseif ($role === 'Volunteer') {
                header("Location: ../vol_signup.php");
            } else {
                header("Location: ../user_login.php"); // Default fallback
            }
        } else {
            $_SESSION['status'] = 'Registration Failed';
            header("Location: ../vol_signup.php");
        }
        exit(); // Stop execution after redirect
    }
}

?>


