<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    // Required fields
    $date = $_POST['dateOfRegistration'];
    $name = $_POST['name'];
    $nickname = $_POST['nickname'];
    $dateofBirth = date('Y-m-d', strtotime($_POST['birthDate']));
    $sex = $_POST['sex'];
    $civil_status = $_POST['civilstatus'];
    $citizenship = $_POST['citizenship'];
    $address = $_POST['residence_address'];
    $occupation = $_POST['occupation'];
    $company = $_POST['company'];

    // Optional fields with default values
    $cellphone_no = !empty($_POST['cellphone_no']) ? $_POST['cellphone_no'] : 'N/A';
    $telephone_no = !empty($_POST['telephone_no']) ? $_POST['telephone_no'] : 'N/A';
    $fox_no = !empty($_POST['fox_no']) ? $_POST['fox_no'] : 'N/A';
    $company_telephone_no = !empty($_POST['company_telephon_no']) ? $_POST['company_telephon_no'] : 'N/A';

    $ppcrv_org_membership = $_POST['ppcrv_org_membership'];
    $onexoneID = $_POST['oneXoneID'];
    // $valid_id = $_POST['valid_id'];
    $prev_ppcrv_exp_date = date('Y-m-d', strtotime($_POST['prev_ppcrv_exp_date']));

    $prev_ppcrv_exp_ass = $_POST['prev_ppcrv_exp_ass'];

        if ($prev_ppcrv_exp_ass == 'Others') {
            $others_prev_ppcrv_exp_ass = $_POST['others_prev_ppcrv_exp_ass'];
            $combined_ppcrv_exp_ass = $prev_ppcrv_exp_ass . ", " . $others_prev_ppcrv_exp_ass;
        } else {
            $others_prev_ppcrv_exp_ass = "";
            $combined_ppcrv_exp_ass = $prev_ppcrv_exp_ass . ", " .  $others_prev_ppcrv_exp_ass;
        }

    $pref_ppcrv_vol_ass = $_POST['pref_ppcrv_vol_ass'];

        if ($pref_ppcrv_vol_ass == 'Others') {
            $others_pref_ppcrv_vol_ass = $_POST['others_pref_ppcrv_vol_ass'];
            $combined_pref_ppcrv_vol_ass = $pref_ppcrv_vol_ass . ", " . $others_pref_ppcrv_vol_ass;
        } else {
            $others_pref_ppcrv_vol_ass = "";
            $combined_pref_ppcrv_vol_ass = $pref_ppcrv_vol_ass . ", ". $others_pref_ppcrv_vol_ass;
        }

    $status = "PENDING";

    // Prepare the SQL statement
    $stmt = $sql_connection->prepare("INSERT INTO registration_infos 
        (date, name, nickname, birthDate, gender, civil_status, citizenship, residence_address, telephone_no, 
        occupation, cellphone_no, fox_no, company_name, company_telephone_no, ppcrv_org_membership, 
        prev_ppcrv_experience_date, prev_ppcrv_experience_assignment, preffered_volunteer_assignment, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind the parameters
    $stmt->bind_param(
        "sssssssssssssssssss",
        $date,
        $name,
        $nickname,
        $dateofBirth,
        $sex,
        $civil_status,
        $citizenship,
        $address,
        $telephone_no,
        $occupation,
        $cellphone_no,
        $fox_no,
        $company,
        $company_telephone_no,
        $ppcrv_org_membership,
        $prev_ppcrv_exp_date,
        $combined_ppcrv_exp_ass,
        $combined_pref_ppcrv_vol_ass,
        $status
    );
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Record saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>
