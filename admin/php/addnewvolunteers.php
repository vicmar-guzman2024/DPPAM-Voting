<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    // Required fields
    $date = $_POST['dateOfRegistration'];

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $name = $fname . " " . $mname . " " . $lname;

    $nickname = $_POST['nickname'];
    $dateofBirth = date('Y-m-d', strtotime($_POST['birthDate']));
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $civil_status = $_POST['civil_status'];
    $citizenship = $_POST['citizenship'];
    $address = $_POST['residence_address'];
    $occupation = $_POST['occupation'];
    $company = $_POST['company_name'];
    $position = $_POST['position'];
    $years_in_service = $_POST['years_in_service'];
    $voter_status = $_POST['voter_status'];
    $precint_no = $_POST['precinct_no'];
    $polling_place = $_POST['polling_place'];
    $no_reason = $_POST['no_reason'];
    $email = $_POST['email'];

    // Optional fields with default values
    $cellphone_no = !empty($_POST['cellphone_no']) ? $_POST['cellphone_no'] : 'N/A';
    $telephone_no = !empty($_POST['telephone_no']) ? $_POST['telephone_no'] : 'N/A';
    $fox_no = !empty($_POST['fox_no']) ? $_POST['fox_no'] : 'N/A';
    $company_telephone_no = !empty($_POST['company_telephon_no']) ? $_POST['company_telephon_no'] : 'N/A';

    $ppcrv_org_membership = $_POST['ppcrv_org_membership'];
    $prev_ppcrv_exp_date = date('Y-m-d', strtotime($_POST['prev_ppcrv_exp_date']));

    $prev_ppcrv_exp_ass = $_POST['prev_ppcrv_exp_ass'];

    if ($prev_ppcrv_exp_ass == 'Others') {
        $others_prev_ppcrv_exp_ass = $_POST['others_prev_ppcrv_exp_ass'];
        $combined_ppcrv_exp_ass = $prev_ppcrv_exp_ass . ", " . $others_prev_ppcrv_exp_ass;
    } else {
        $combined_ppcrv_exp_ass = $prev_ppcrv_exp_ass;
    }

    $pref_ppcrv_vol_ass = $_POST['pref_ppcrv_vol_ass'];

    if ($pref_ppcrv_vol_ass == 'Others') {
        $others_pref_ppcrv_vol_ass = $_POST['others_pref_ppcrv_vol_ass'];
        $combined_pref_ppcrv_vol_ass = $pref_ppcrv_vol_ass . ", " . $others_pref_ppcrv_vol_ass;
    } else {
        $combined_pref_ppcrv_vol_ass = $pref_ppcrv_vol_ass;
    }

    $status = "PENDING";

    // Handle the file upload for one_x_one_id
    $target_dir = "php/1x1picture/";
    $one_x_one_id = "";

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);  // Create the directory with full permissions
    }

    if (isset($_FILES['one_x_one_id']) && $_FILES['one_x_one_id']['error'] == UPLOAD_ERR_OK) {
        $file_name = basename($_FILES['one_x_one_id']['name']);
        $target_file = $target_dir . $file_name;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['one_x_one_id']['tmp_name'], $target_file)) {
            $one_x_one_id = $target_file;
        } else {
            echo "Error: Failed to upload file.";
            exit;
        }
    } else {
        echo "Error: No file uploaded or upload error occurred.";
        exit;
    }

    // Prepare the SQL statement
    $stmt = $sql_connection->prepare("INSERT INTO registration_infos 
        (registration_date,
        name,
        nickname,
        birthDate,
        age,
        gender,
        civil_status,
        citizenship,
        residence_address,
        cellphone_no,
        occupation,
        telephone_no,
        email,  
        company_name, 
        company_telephone_no, 
        ppcrv_org_membership,
        position,
        years_in_service,
        prev_ppcrv_experience_date, 
        prev_ppcrv_experience_assignment,
        is_voter,
        precincts,
        polling_place,
        no_reason, 
        preffered_volunteer_assignment, 
        1by1_picture, 
        status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

    // Bind the parameters
    $stmt->bind_param(
        "sssssssssssssssssssssssssss",  // Ensure there are 31 placeholders
        $date,
        $name,
        $nickname,
        $dateofBirth,
        $age,
        $gender,
        $civil_status,
        $citizenship,
        $address,
        $cellphone_no,
        $occupation,
        $telephone_no,
        $email,
        $company,
        $company_telephone_no,
        $ppcrv_org_membership,
        $position,
        $years_in_service,
        $prev_ppcrv_exp_date,
        $combined_ppcrv_exp_ass,
        $voter_status,
        $precint_no,
        $polling_place,
        $no_reason,
        $combined_pref_ppcrv_vol_ass,
        $one_x_one_id,  // Path to the uploaded image
        $status
    );
    
    
    // Execute the statement
    if ($stmt->execute()) {
        header("location: submissions.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>
