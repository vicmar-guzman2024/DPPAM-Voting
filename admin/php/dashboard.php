<?php
include("connection.php");

// Dropdown queries
$stmt = $sql_connection->prepare("SELECT DISTINCT CITY FROM PARISHES");
$stmt->execute();
$sql_result = $stmt->get_result();
$stmt->close();

$stmt2 = $sql_connection->prepare("SELECT PARISH_NAME, CITY FROM PARISHES");
$stmt2->execute();
$sql_result2 = $stmt2->get_result();
$stmt2->close();

// Prepare data for the chart
$stmt3 = $sql_connection->prepare("
    SELECT 
        P.PARISH_NAME,
        P.CITY, 
        P.PARISHES_ID, 
        Pr.TOTAL_OF_RV
    FROM 
        PARISHES P
    INNER JOIN 
        PRECINCTS Pr
    ON 
        P.PARISHES_ID = Pr.PARISH_ID
    GROUP BY 
        P.PARISH_NAME, P.CITY, P.PARISHES_ID;
"); // registered and needed
$stmt3->execute();
$sql_result3 = $stmt3->get_result();

$labels = [];
$cityData = [];
$registeredData = [];
$neededData = [];

// Map data from the database
while ($row = mysqli_fetch_assoc($sql_result3)) {
    $labels[] = $row['PARISH_NAME'];         // Parish names for chart labels
    $cityData[] = $row['CITY'];             // Cities corresponding to parishes
     $registeredData[] = $row['TOTAL_OF_RV']; // Registered volunteers
    // $neededData[] = $row['NEEDED'];         // Needed volunteers
}
$stmt3->close();

$stmt4 = $sql_connection->prepare("
    SELECT DISTINCT
        pr.ASSIGNED_SCHOOL, 
        p.PARISH_NAME 
    FROM PRECINCTS pr
    JOIN PARISHES p ON pr.PARISH_ID = p.PARISHES_ID
    WHERE pr.ASSIGNED_SCHOOL IS NOT NULL
    ORDER BY p.PARISH_NAME, pr.ASSIGNED_SCHOOL
");
$stmt4->execute();
$sql_result4 = $stmt4->get_result();
$stmt4->close();

// missions.php / list of volunteers dropdown
$stmt5 = $sql_connection->prepare("SELECT ROLE_NAME, DESCRIPTIONS FROM ROLES");
$stmt5->execute();
$sql_result5 = $stmt5->get_result();
$stmt5->close();

// submissions.php / list of volunteers dropdown
$stmt6 = $sql_connection->prepare("SELECT NAME, STATUS, REGISTRATION_DATE FROM REGISTRATION_INFOS ");
$stmt6->execute();
$sql_result6 = $stmt6->get_result();
$stmt6->close();

// list_of_volunteers.php
$stmt7 = $sql_connection->prepare("SELECT VOLUNTEERS_ID, PRECINCT_NO, FIRST_NAME, LAST_NAME, ASSIGNED_PARISH, ASSIGNED_ASSIGNMENT, STATUS FROM VOLUNTEERS");
$stmt7->execute();
$sql_result7 = $stmt7->get_result();
$stmt7->close();

// LIST OF VOLUNTEERS PRECINCT DROPDOWN
$stmt8 = $sql_connection->prepare("SELECT DISTINCT PRECINCT FROM PRECINCTS");
$stmt8->execute();
$sql_result8 = $stmt8->get_result();
$stmt8->close();

$stmt9 = $sql_connection->prepare("
    SELECT 
        DISTINCT
        Pr.ASSIGNED_SCHOOL,
        Pr.TOTAL_OF_RV
    FROM 
        PRECINCTS Pr
    GROUP BY 
        Pr.ASSIGNED_SCHOOL
");
$stmt9->execute();
$sql_result9 = $stmt9->get_result();

$registered_Vol = [];
$needed_Vol = [];
$assigned_schoool = [];

while ($row = mysqli_fetch_assoc($sql_result9)) {
    $registered_Vol[] = $row['TOTAL_OF_RV']; // Registered volunteers for the chart
    $needed_Vol[] =  50; // Placeholder for needed volunteers, update as required
    $assigned_schoool[] = $row['ASSIGNED_SCHOOL'];
}

$stmt9->close();



?>
