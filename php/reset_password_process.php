<?php
session_start();
include('condb.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

function send_reset_password($get_firstname, $get_lastname, $get_email, $token)
{
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
    $mail->addAddress($get_email);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'DPPAM - Reset Password Notification';

    $email_template = "
        <h2>Good day!</h2>
        <h4>We have received a request to reset the password for your account.</h4>
        <p>If you initiated this request, please follow the instructions provided. If not, you can safely ignore this email.</p>

        <a href='http://localhost/DPPAM%20Voting/php/change_password.php?token=$token&email=$get_email'>Click Me</a>
    ";

    $mail->Body = $email_template;
    $mail->send();
}


if (isset($_POST['reset_pass_btn'])) {
    $email = mysqli_real_escape_string($sql_connection, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($sql_connection, $check_email);

    if (mysqli_num_rows($check_email_run) > 0) {

        $row = mysqli_fetch_array($check_email_run);
        $get_firstname = $row['firstname'];
        $get_lastname = $row['lastname'];
        $get_email = $row['email'];

        $update_token = "UPDATE users SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($sql_connection, $update_token);

        if ($update_token_run) {
            send_reset_password($get_firstname, $get_lastname, $get_email, $token);
            $_SESSION['status'] = "Password reset link has been sent to your email.";
            header("Location: ../reset_password.php");
            exit();
        } else {
            $_SESSION['status'] = "Something went wrong";
            header("Location: ../reset_password.php");
            exit();
        }
    } else {
        $_SESSION['status'] = "No email found";
        header("Location: ../reset_password.php");
        exit();
    }
}






if (isset($_POST['change_pass_btn'])) {
    $email = mysqli_real_escape_string($sql_connection, $_POST['email']);
    $new_password = mysqli_real_escape_string($sql_connection, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($sql_connection, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($sql_connection, $_POST['password_token']);

    if (!empty($token)) {
        if (!empty($email) && !empty($new_password) && !empty($confirm_password)) {
            // Check if the token is valid
            $check_token = "SELECT verify_token FROM users WHERE verify_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($sql_connection, $check_token);

            if (mysqli_num_rows($check_token_run) > 0) {
                if ($new_password === $confirm_password) {
                    // Hash the new password
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                    // Update the password in the database
                    $update_password = "UPDATE users SET password='$hashed_password' WHERE verify_token='$token' LIMIT 1";
                    $update_password_run = mysqli_query($sql_connection, $update_password);

                    if ($update_password_run) {
                        $new_token = md5(rand());
                        $update_to_new_token = "UPDATE users SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                        $update_to_new_token_run = mysqli_query($sql_connection, $update_to_new_token);
                        $_SESSION['status'] = "Password updated successfully!";
                        header("Location: ../user_login.php");
                        exit();
                    } else {
                        $_SESSION['status'] = "Failed to update password. Something went wrong!";
                        header("Location: change_password.php?token=$token&email=$email");
                        exit();
                    }
                } else {
                    $_SESSION['status'] = "Passwords do not match. Please try again.";
                    header("Location: change_password.php?token=$token&email=$email");
                    exit();
                }
            } else {
                $_SESSION['status'] = "Invalid token";
                header("Location: change_password.php?token=$token&email=$email");
                exit();
            }
        } else {
            $_SESSION['status'] = "All fields are required";
            header("Location: change_password.php?token=$token&email=$email");
            exit();
        }
    } else {
        $_SESSION['status'] = "No Token Available";
        header("Location: change_password.php");
        exit();
    }
}
