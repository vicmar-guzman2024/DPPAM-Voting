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
$stmt3 = $sql_connection->prepare("SELECT CITY, PARISH_NAME FROM PARISHES"); // registered and needed
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
    // $registeredData[] = $row['REGISTERED']; // Registered volunteers
    // $neededData[] = $row['NEEDED'];         // Needed volunteers
}
$stmt3->close();

// First, get the list of all assigned schools
$stmt4 = $sql_connection->prepare("SELECT DISTINCT ASSIGNED_SCHOOL FROM PRECINCTS");
$stmt4->execute();
$sql_result4 = $stmt4->get_result();

// Prepare the array to hold the schools and their corresponding parish IDs
$schools = [];

if ($sql_result4->num_rows > 0) {
    // Loop through each school and fetch its corresponding parish ID
    while ($row = mysqli_fetch_assoc($sql_result4)) {
        $ASSIGNED_SCHOOL = $row['ASSIGNED_SCHOOL'];

        // Now, get the corresponding parish_id for the assigned_school
        $stmt5 = $sql_connection->prepare("SELECT DISTINCT PARISH_ID FROM PRECINCTS WHERE ASSIGNED_SCHOOL = ?");
        $stmt5->bind_param("s", $ASSIGNED_SCHOOL);
        $stmt5->execute();
        $sql_result5 = $stmt5->get_result();

        // Get the parish ID and store it in the array
        while ($row5 = mysqli_fetch_assoc($sql_result5)) {
            $parish_id = $row5['PARISH_ID'];

            // Store the assigned school and its corresponding parish_id
            $schools[] = ['assigned_school' => $ASSIGNED_SCHOOL, 'parish_id' => $parish_id];
        }
    }
}

// Now that we have the assigned schools and their parish IDs, fetch them using a JOIN
$stmt6 = $sql_connection->prepare("
    SELECT DISTINCT pr.assigned_school, pr.parish_id 
    FROM precincts pr 
    JOIN parishes p ON pr.parish_id = p.parishes_id
    WHERE pr.parish_id IN (" . implode(',', array_map('intval', array_column($schools, 'parish_id'))) . ")
");
$stmt6->execute();
$sql_result6 = $stmt6->get_result();

$stmt4->close();
$stmt5->close();
$stmt6->close();  // Close the third query

?>
