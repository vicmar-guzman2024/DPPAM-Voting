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

// Prepare data for the chart TOTAL OF REGISTERED VOTER PER PARISH
$stmt3 = $sql_connection->prepare("
    SELECT 
        P.PARISH_NAME,
        P.CITY, 
        P.PARISHES_ID,
        COUNT(Vr.ASSIGNED_PARISH) AS TOTAL_ASSIGNED
    FROM 
        PARISHES P
    LEFT JOIN 
        VOLUNTEERS Vr
    ON 
        P.PARISHES_ID = Vr.PARISH_ID
    GROUP BY 
        P.PARISH_NAME, P.CITY, P.PARISHES_ID;
");
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
    $registeredData[] = $row['TOTAL_ASSIGNED']; // Registered volunteers
    $neededData[] = 35;         // Needed volunteers
}
$stmt3->close();

// school dropdown
$stmt4 = $sql_connection->prepare("
    SELECT DISTINCT
        pr.LOCATION, 
        p.PARISH_NAME 
    FROM PRECINCTS pr
    JOIN PARISHES p ON pr.PARISH_ID = p.PARISHES_ID
    WHERE pr.LOCATION IS NOT NULL
    ORDER BY p.PARISH_NAME, pr.LOCATION
");
$stmt4->execute();
$sql_result4 = $stmt4->get_result();
$stmt4->close();

// missions.php / list of volunteers dropdown
$stmt5 = $sql_connection->prepare("SELECT MISSION_NAME, MISSION_DESCRIPTION FROM MISSIONS");
$stmt5->execute();
$sql_result5 = $stmt5->get_result();
$stmt5->close();

// submissions.php / list of volunteers dropdown
$stmt6 = $sql_connection->prepare("SELECT NAME, STATUS, REGISTRATION_DATE FROM REGISTRATION_INFOS ");
$stmt6->execute();
$sql_result6 = $stmt6->get_result();
$stmt6->close();

// list_of_volunteers.php
$stmt7 = $sql_connection->prepare("SELECT VOLUNTEERS_ID, PRECINCT_ID, FIRST_NAME, LAST_NAME, ASSIGNED_PARISH, ASSIGNED_ASSIGNMENT, STATUS FROM VOLUNTEERS");
$stmt7->execute();
$sql_result7 = $stmt7->get_result();
$stmt7->close();

// LIST OF VOLUNTEERS PRECINCT DROPDOWN
$stmt8 = $sql_connection->prepare("SELECT DISTINCT PRECINCT FROM PRECINCTS");
$stmt8->execute();
$sql_result8 = $stmt8->get_result();
$stmt8->close();

// pie chart
$stmt9 = $sql_connection->prepare("
    SELECT 
        DISTINCT
        LOCATION
    FROM 
        PRECINCTS
    GROUP BY 
        LOCATION
");
$stmt9->execute();
$sql_result9 = $stmt9->get_result();

$registered_Vol = [];
$needed_Vol = [];
$assigned_schoool = [];

while ($row = mysqli_fetch_assoc($sql_result9)) {
    $registered_Vol[] = 50; // Registered volunteers for the chart
    $needed_Vol[] =  35; // Placeholder for needed volunteers, update as required
    $assigned_schoool[] = $row['LOCATION'];
} 

$stmt9->close();

// dashboard first blocks
$stmt10 = $sql_connection->prepare("
    SELECT 
        COUNT(VOLUNTEERS_ID) AS TOTAL_VOLUNTEERS,  
        (SELECT COUNT(*) FROM VOLUNTEERS WHERE STATUS = 'ACTIVE') AS TOTAL_ASSIGNED,  
        (SELECT COUNT(*) FROM REGISTRATION_INFOS WHERE STATUS = 'PENDING') AS TOTAL_PENDING  
    FROM 
        VOLUNTEERS 
");
$stmt10->execute();
$sql_result10 = $stmt10->get_result();

// total volunteers, assigned, pending assignments
if ($data = $sql_result10->fetch_assoc()) {
    $total_volunteers = $data['TOTAL_VOLUNTEERS'];  // All volunteers
    $total_assigned = $data['TOTAL_ASSIGNED'];      // Active volunteers
    $total_pending = $data['TOTAL_PENDING'];       // Pending registrations
} else {
    $total_volunteers = $total_assigned = $total_pending = 0; // Default values
} 
$stmt10->close();

// ASSIGNMENT MANAGEMENT SELECTION SCHOOL 
$stmt11 = $sql_connection->prepare("
    SELECT DISTINCT 
        pr.LOCATION,  -- Select distinct school names
        COUNT(V.VOLUNTEERS_ID) AS REGISTERED_VOLUNTEERS -- Count registered volunteers
    FROM 
        PRECINCTS pr
    LEFT JOIN 
        VOLUNTEERS V
    ON 
        pr.LOCATION = V.ASSIGNED_ASSIGNMENT  -- Join precincts with volunteers on assigned school
    GROUP BY 
        pr.LOCATION
    ORDER BY 
        pr.LOCATION
");
$stmt11->execute();
$sql_result11 = $stmt11->get_result();
$stmt11->close();

// assignments fetch data MANAGEMENT
$stmt12 = $sql_connection->prepare("
    SELECT 
        pr.LOCATION, 
        COUNT(DISTINCT a.VOLUNTEER_ID) AS TOTAL_VOLUNTEERS
    FROM 
        PRECINCTS pr
    LEFT JOIN 
        ASSIGNMENTS a
    ON 
        pr.PARISH_ID = a.PARISH_ID
    GROUP BY 
        pr.LOCATION
    ORDER BY 
        pr.LOCATION
");

$stmt12->execute();
$sql_result12 = $stmt12->get_result();
$stmt12->close();

// ajax time for DROPDOWN SCHOOL 
if (isset($_POST['location'])) {
    $location = $_POST['location'];

    // Prepare and execute the query to fetch the total registered voters for the selected location
    $stmt13 = $sql_connection->prepare("
        SELECT
             SUM(REGISTERED_VOTERS) AS TOTAL_REGISTERED
        FROM 
            PRECINCTS
        WHERE
             LOCATION = ?
    ");
    $stmt13->bind_param('s', $location); // Bind the location to the query
    $stmt13->execute();
    $sql_result13 = $stmt13->get_result();

    // Fetch the result and return the total registered voters
    if ($row = mysqli_fetch_assoc($sql_result13)) {
        echo $row['TOTAL_REGISTERED'];
          // This will be the response for the AJAX request
    } else {
        echo "No Registered Voters";  // In case no data is found
    }

    $stmt13->close();
}



?>
