<?php
session_start();
include('condb.php');

if(isset($_GET['token'])){

    $token = $_GET['token'];
    $verify_query = "SELECT verify_token, email_status FROM users WHERE verify_token = '$token' LIMIT 1";
    $verify_query_run = mysqli_query($sql_connection, $verify_query);

    if(mysqli_num_rows($verify_query_run) > 0){

        $row = mysqli_fetch_array($verify_query_run);
        
        if($row['email_status']== "0"){

            $clicked_token = $row['verify_token'];
            $update_query = "UPDATE users SET email_status='1' WHERE verify_token = '$clicked_token' LIMIT 1 ";
            $update_query_run = mysqli_query($sql_connection, $update_query);

            if($update_query_run){
                $user_email_query = "SELECT email FROM users WHERE verify_token = '$clicked_token' LIMIT 1";
                $user_email_result = mysqli_query($sql_connection, $user_email_query);
                $user_email = mysqli_fetch_assoc($user_email_result)['email'];
                
                $_SESSION['user_email'] = $user_email; // Save user email to session
                $_SESSION['status'] = "Email verified! Please complete the form to continue registration.";
                header("Location: ../vol_registration.php");
                exit(0);
            }

            else {
                $_SESSION['status'] = "Email verification failed.";
                header("Location: ../user_login.php");
                exit(0);
            }
        }

        else {
            $_SESSION['status'] = "Email already verified. Please login.";
            header("Location: ../user_login.php");
            exit(0);
        }
    }

    else{
        $_SESSION['status'] = "Token does not exists.";
        header("Location: ../user_login.php");
    }
}

else {
    $_SESSION['status'] = "Not allowed";
    header("Location: ../user_login.php");
}

?>