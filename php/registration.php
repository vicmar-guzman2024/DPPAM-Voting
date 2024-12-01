<?php
// Include the database connection file (if you have one)
include('../php/condb.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data with checks for optional fields
    $date = date('l, F j, Y');
    $name = $_POST['name'];
    $nickname = $_POST['nickname'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $civil_status = $_POST['civil_status'];
    $citizenship = $_POST['citizenship'];
    $residence_address = $_POST['residence_address'];
    $telephone_no = $_POST['telephone_no'];
    $occupation = $_POST['occupation'];
    $cellphone_no = $_POST['cellphone_no'];
    $fox_no = $_POST['fox_no'];
    $company_name = $_POST['company_name'];
    $company_telephone_no = $_POST['company_telephone_no'];
    $ppcrv_org_membership = $_POST['ppcrv_org_membership'];
    $prev_ppcrv_experience_date = $_POST['prev_ppcrv_experience_date'];
    $prev_ppcrv_experience_assignment = $_POST['prev_ppcrv_experience_assignment'];
    $other_prev_ppcrv_experience_assignment = isset($_POST['other_prev_experience_assignment']) ? $_POST['other_prev_experience_assignment'] : '';
    
    // Combine experience assignment
    $combinedExperienceAssignment = $prev_ppcrv_experience_assignment;
    if (!empty($other_prev_ppcrv_experience_assignment)) {
        $combinedExperienceAssignment .= " , " . $other_prev_ppcrv_experience_assignment;
    } elseif ($prev_ppcrv_experience_assignment === 'Others' && empty($other_prev_ppcrv_experience_assignment)) {
        $combinedExperienceAssignment .= " , No specific assignment provided";
    }
    
    $preferred_volunteer_assignment = $_POST['preferred_volunteer_assignment'];
    $other_preferred_volunteer_assignment = isset($_POST['other_preferred_volunteer_assignment']) ? $_POST['other_preferred_volunteer_assignment'] : '';
    
    // Combine preferred volunteer assignment
    $combinedVolunteerAssignment = $preferred_volunteer_assignment;
    if (!empty($other_preferred_volunteer_assignment)) {
        $combinedVolunteerAssignment .= " , " . $other_preferred_volunteer_assignment;
    } elseif ($preferred_volunteer_assignment === 'Others' && empty($other_preferred_volunteer_assignment)) {
        $combinedVolunteerAssignment .= " , No specific assignment provided";
    }

    // Now handle your SQL insert statement
    // Ensure that your query has the correct number of columns and values
}

    // File upload handling (for 1x1 picture and valid ID)
$one_x_one_id = $_FILES['one_x_one_id']['name'];
$valid_id = $_FILES['valid_id']['name'];

// Define target directory
$target_dir = "1x1picture/";

// Ensure the target directory exists, if not, create it
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);  // Creates the directory with full permissions
}

// Generate unique file names to avoid overwriting files
$unique_one_x_one = time() . "_" . basename($one_x_one_id); // Add timestamp to the file name
$unique_valid_id = time() . "_" . basename($valid_id); // Add timestamp to the file name

// Create the full target file paths
$target_file_one_x_one = $target_dir . $unique_one_x_one;
$target_file_valid_id = $target_dir . $unique_valid_id;

// Move the uploaded files to the target directory
if (move_uploaded_file($_FILES["one_x_one_id"]["tmp_name"], $target_file_one_x_one) && 
    move_uploaded_file($_FILES["valid_id"]["tmp_name"], $target_file_valid_id)) {

    // Prepare SQL query to insert data into the database
    $sql = "INSERT INTO registration_infos (
        date, name, nickname, birthdate, gender, civil_status, citizenship, residence_address, 
        telephone_no, occupation, cellphone_no, fox_no, company_name, company_telephone_no, 
        ppcrv_org_membership, prev_ppcrv_experience_date, prev_ppcrv_experience_assignment, PREFFERED_VOLUNTEER_ASSIGNMENT, 1BY1_PICTURE, valid_id
    ) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind statement
    if ($stmt = $sql_connection->prepare($sql)) {
        $stmt->bind_param("ssssssssssssssssssss", $date, $name, $nickname, $birthdate, $gender, $civil_status, 
            $citizenship, $residence_address, $telephone_no, $occupation, $cellphone_no, $fox_no, 
            $company_name, $company_telephone_no, $ppcrv_org_membership, $prev_ppcrv_experience_date, 
            $combinedExperienceAssignment, 
            $combinedVolunteerAssignment, 
            $unique_one_x_one, $unique_valid_id); // Bind the unique file names instead of the original file names

        // Execute the statement
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $sql_connection->error;
    }
} else {
    echo "Sorry, there was an error uploading your files.";
}


// Close connection
$sql_connection->close();
?>
