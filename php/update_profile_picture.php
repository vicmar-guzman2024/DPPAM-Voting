<?php
/*
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_picture'])) {
    $userId = $_SESSION['user_id']; // Ensure the user is logged in
    $targetDir = "profile_picture/";
    $fileName = basename($_FILES['profile_picture']['name']);
    $targetFilePath = $targetDir . $fileName;
    $uploadOk = true;

    // Validate image type
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedTypes)) {
        $uploadOk = false;
        $_SESSION['error_message'] = "Invalid file type. Only JPG, JPEG, PNG & GIF allowed.";
    }

    if ($uploadOk) {
        // Move uploaded file
        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $targetFilePath)) {
            // Save file path in the database
            $servername = "localhost";
            $username_db = "root";
            $password_db = "";
            $dbname = "dppam";

            $conn = new mysqli($servername, $username_db, $password_db, $dbname);

            if ($conn->connect_error) {
                die("Database connection failed: " . $conn->connect_error);
            }

            $sql = "UPDATE users SET profile_picture = ? WHERE user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $fileName, $userId);

            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Profile picture updated successfully.";
                header("Location: ../vol_dashboard.php");
                exit;
            } else {
                $_SESSION['error_message'] = "Database update failed.";
            }

            $stmt->close();
            $conn->close();
        } else {
            $_SESSION['error_message'] = "File upload failed.";
        }
    }

    header("Location: ../vol_dashboard.php");
    exit;
} else {
    $_SESSION['error_message'] = "Invalid request.";
    header("Location: ../vol_dashboard.php");
    exit;
}
*/
?>



<?php
session_start();
include('condb.php');

if (isset($_POST['change_profile_btn'])) {
    // Check if the file was uploaded
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        
        // Get file info
        $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
        $fileName = $_FILES['profile_picture']['name'];
        $fileSize = $_FILES['profile_picture']['size'];
        $fileType = $_FILES['profile_picture']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        // Allowed file extensions
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        
        // Check if file extension is allowed
        if (in_array($fileExtension, $allowedExtensions)) {
            // Generate a new file name to avoid collision
            $newFileName = uniqid('profile_', true) . '.' . $fileExtension;
            
            // Set the target directory where the file will be stored
            $uploadPath = "profile_picture/" . $newFileName;
            
            // Move the file to the server's directory
            if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                // Update the user's profile picture in the database
                $userEmail = $_SESSION['auth_user']['email'];  // Assuming the email is already stored in the session

                // Update query
                $updateQuery = "UPDATE users SET profile_picture = '$newFileName' WHERE email = '$userEmail' LIMIT 1";
                $updateQueryRun = mysqli_query($sql_connection, $updateQuery);
                
                if ($updateQueryRun) {
                    // Update session with the new profile picture
                    $_SESSION['auth_user']['profile_picture'] = $newFileName;

                    $_SESSION['status'] = "Profile picture updated successfully!";
                    header("Location: ../vol_dashboard.php");
                    exit();
                } else {
                    $_SESSION['status'] = "Failed to update profile picture in database.";
                    header("Location: ../vol_dashboard.php");
                    exit();
                }
            } else {
                $_SESSION['status'] = "Error uploading the file.";
                header("Location: ../vol_dashboard.php");
                exit();
            }
        } else {
            $_SESSION['status'] = "Invalid file type. Only JPG, PNG, and GIF are allowed.";
            header("Location: ../vol_dashboard.php");
            exit();
        }
    } else {
        $_SESSION['status'] = "No file uploaded or error during upload.";
        header("Location: ../vol_dashboard.php");
        exit();
    }
} else {
    // If the form is not submitted correctly
    $_SESSION['status'] = "Form submission error.";
    header("Location: ../vol_dashboard.php");
    exit();
}
?>
