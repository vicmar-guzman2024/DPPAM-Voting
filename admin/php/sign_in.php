<?php
include("connection.php");

if (isset($_POST['login'])) {
    $USERNAME = $_POST['USERNAME'];
    $PASSWORD = $_POST['PASSWORD'];
    $Error_Message = "";

    // Validate inputs
    if (empty($USERNAME)) {
        $Error_Message = "Username is required";
    } elseif (empty($PASSWORD)) {
        $Error_Message = "Password is required";
    }

    if (!empty($Error_Message)) {
        echo "<script>alert('$Error_Message')</script>";
        header("location: ../admin_sign_in.php");
        exit();
    }

    $stmt = $sql_connection->prepare("SELECT USERNAME, PASSWORD, STATUS, USER_ID FROM USERS WHERE USERNAME = ?");
    $stmt->bind_param("s", $USERNAME);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){
        $user = $result->fetch_assoc();
    
        // Check the user's status
        if ($user['STATUS'] === "INACTIVE") {
            echo "<script>alert('Account is terminated');</script>";
            header("location: ../admin_sign_in.php");
            exit(); 
        }
        
        // If passwords match
        if($PASSWORD === $user['PASSWORD']){
            // Start the session
            session_start();
            
            // Store user data in session (this will persist until the user logs out)
            $_SESSION['username'] = $USERNAME;
            $_SESSION['user_id'] = $user['USER_ID']; // You can also store other details here
            
            // Redirect to the index page if logged in successfully
            header("location: ../index.php");
        } else {
            echo "<script>alert('Invalid credentials');</script>";
            header("location: ../admin_sign_in.php");
        }
    } else {
        echo "<script>alert('User Not Found');</script>";
        header("location: ../admin_sign_in.php");
    }

    $stmt->close();
}

?>




// use this if the password is in hash

include ("connection.php");

if(isset($_POST['login'])){

    $USERNAME = $_POST['Username'];
    $PASSWORD = $_POST['Password'];
    $Error_Message = "";

    // Validate the input fields
    if(empty($USERNAME)){
        $Error_Message = "Username is Required";
    } elseif(empty($PASSWORD)){
        $Error_Message = "Password is Required";
    }

    if(!empty($Error_Message)){
        echo "<script>alert('$Error_Message')</script>";
        header("location: ../admin_sign_in.html");
        exit(); // Make sure to exit here to prevent further execution
    }

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT USERNAME, PASSWORD, STATUS FROM USERS WHERE USERNAME=?";
    $stmt = $sql_connection->prepare($sql);
    $stmt->bind_param("s", $USERNAME); // "s" denotes string type
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){
    $user = $result->fetch_assoc();

    // Check the user's status
    if ($user['STATUS'] === "INACTIVE") {
        // Account is terminated
        echo "<script>alert('Account is terminated');</script>";
        header("location: ../admin_sign_in.html");
        exit(); // Stop further execution
    }

    // Use password_verify() to compare hashed password
    if(password_verify($PASSWORD, $user['PASSWORD'])){
        // Start the session and store user info
        session_start();
        $_SESSION['username'] = $USERNAME;  // You can also store user ID or other data here

        header("location: ../index.php");
    } else {
        // Incorrect password
        echo "<script>alert('Invalid credentials');</script>";
        header("location: ../admin_sign_in.html");
    }
} else {
    // Username not found
    echo "<script>alert('Invalid credentials');</script>";
    header("location: ../admin_sign_in.html");
}


    $stmt->close();
}
