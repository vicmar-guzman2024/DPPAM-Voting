<?php
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
?>
