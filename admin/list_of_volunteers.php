<?php 
include ("php/connection.php");
include ("php/dashboard.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/admin-style.css">
  <!--bootstrap 5-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <!--Font awesome CDN-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
   integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
   crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!--BOOTSTRAP ICON CDN-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

   <!--JS CHART CDN-->
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  
  


  <title>List of Volunteers</title>
</head>

<body>


    <!--LOGO AND HEADER-->
    <section class="header d-flex flex-row justify-content-between align-items-center gap-4 px-4 py-2">
        
        <div class="d-flex flex-row justify-content-center align-items-center gap-4">
            <div><img src="../img/DPPAMLOGO.png" alt="" width="70px" height="70px" class="img-fluid logo"></div>
            <div><h4 class="text-white">DPPAM Volunteers Management and Tracking System</h4></div>
        </div>

        <div class="d-flex flex-row justify-content-center align-items-center gap-4">

            <!--NOTIFICATION-->
            <div class="dropdown">
                
                <button type="button" class="btn bellBtn position-relative" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-bell text-dark fs-4"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                      99+
                      <span class="visually-hidden">unread messages</span>
                    </span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end pt-0 notif-container" aria-labelledby="dropdownMenuButton">
                    
                    <div class="sticky-top d-flex flex-column justify-content-center align-items-center p-2 notif-text mb-4">
                        <h3>Notifications</h3>
                    </div>

                    
                    <a href="" class="btn btn-sm">
                      <div class="row row-cols-3 align-items-center justify-content-evenly mb-3">
                        <div class="col-md-2"><img src="../img/DPPAMLOGO.png" alt="" style="width: 50px; height: 50px;"></div>
                        <div class="col-md-8"><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia, expedita.</span></div>
                        
                        <div class="position-relative col-md-1">
                            <span class="position-absolute top-0 start-50 translate-middle p-2 bg-success border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                              </span>
                        </div>
                    </div>
                    </a>
                    <a href="" class="btn btn-sm">
                      <div class="row row-cols-3 align-items-center justify-content-evenly mb-3">
                        <div class="col-md-2"><img src="../img/DPPAMLOGO.png" alt="" style="width: 50px; height: 50px;"></div>
                        <div class="col-md-8"><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia, expedita.</span></div>
                        
                        <div class="position-relative col-md-1">
                            <span class="position-absolute top-0 start-50 translate-middle p-2 bg-success border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                              </span>
                        </div>
                    </div>
                    </a>
                    <a href="" class="btn btn-sm">
                      <div class="row row-cols-3 align-items-center justify-content-evenly mb-3">
                        <div class="col-md-2"><img src="../img/DPPAMLOGO.png" alt="" style="width: 50px; height: 50px;"></div>
                        <div class="col-md-8"><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia, expedita.</span></div>
                        
                        <div class="position-relative col-md-1">
                            <span class="position-absolute top-0 start-50 translate-middle p-2 bg-success border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                              </span>
                        </div>
                    </div>
                    </a>
                    <a href="" class="btn btn-sm">
                      <div class="row row-cols-3 align-items-center justify-content-evenly mb-3">
                        <div class="col-md-2"><img src="../img/DPPAMLOGO.png" alt="" style="width: 50px; height: 50px;"></div>
                        <div class="col-md-8"><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia, expedita.</span></div>
                        
                        <div class="position-relative col-md-1">
                            <span class="position-absolute top-0 start-50 translate-middle p-2 bg-success border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                              </span>
                        </div>
                    </div>
                    </a>
                    <a href="" class="btn btn-sm">
                      <div class="row row-cols-3 align-items-center justify-content-evenly mb-3">
                        <div class="col-md-2"><img src="../img/DPPAMLOGO.png" alt="" style="width: 50px; height: 50px;"></div>
                        <div class="col-md-8"><span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia, expedita.</span></div>
                        
                        <div class="position-relative col-md-1">
                            <span class="position-absolute top-0 start-50 translate-middle p-2 bg-success border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                              </span>
                        </div>
                    </div>
                    </a>                    
                  </div>
            </div>

            <!--PROFILE-->
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../img/DPPAMLOGO.png" alt="Admin Profie" width="50px" height="50px" class="img-fluid">
                </button>
                <ul class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton1" style="width: 250px;">
                  <li><a class="dropdown-item d-flex flex-row justify-content-center align-items-center" href="#">
                    <img src="../img/DPPAMLOGO.png" alt="" width="50px" height="50px" class="img-fluid">
                    <p>Vicmar M. Guzman</p>
                    
                </a></li>
                <hr class="text-dark">
                  <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user-pen pe-2"></i>Edit Profile</a></li>
                  <li><a class="dropdown-item" href="#"><i class="fa-solid fa-arrow-right-from-bracket pe-2"></i>Logout</a></li>
                </ul>
              </div>
        </div>
            
    </section>




    <div class="wrapper">

        <!-- Sidebar -->
        <aside id="sidebar">
            <div style="min-height: 100vh;">

                <ul class="sidebar-nav mt-5">
                    <li class="sidebar-item">
                        <a href="index.php" class="sidebar-link active">
                            <i class="fa-solid fa-house pe-2"></i>Dashboard</a>
                    </li>
                    <li class="sidebar-item"><a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages"><i class="fa-solid fa-user-group pe-2"></i>Volunteers</a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="missions.html" class="sidebar-link"><i class="fa-solid fa-user-plus pe-2"></i>Missions</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="addNewVolunteers.html" class="sidebar-link"><i class="fa-solid fa-user-plus pe-2"></i>Add New Volunteers</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="list_of_volunteers.php" class="sidebar-link"><i class="fa-solid fa-list-ul pe-2"></i>View Volunteers</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="submissions.html" class="sidebar-link">
                            <i class="fa-solid fa-school-flag pe-2"></i>Submissions</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-school-flag pe-2"></i>Schools & Precincts</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard"
                            aria-expanded="false" aria-controls="dashboard">
                            <i class="fa-solid fa-user-check pe-2"></i>Attendance Tracking</a>
                        <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i class="fa-solid fa-user-plus pe-2"></i>Check-in / Check-out</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i class="fa-solid fa-list-ul pe-2"></i>Attendance Reports</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#auth"
                            aria-expanded="false" aria-controls="auth">
                            <i class="fa-solid fa-list-check pe-2"></i>Role Management</a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i class="fa-solid fa-clipboard-check pe-2"></i>Assign Roles</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i class="fa-solid fa-user-check pe-2"></i>View Role Assignments</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link"><i class="fa-solid fa-id-card pe-2"></i>Generate ID</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-location-dot pe-2"></i>Church Locator</a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Component -->
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom navbar-light bg-light">
                <!-- Button for sidebar toggle -->
                <button class="btn toggle-btn" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <main class="container px-5 pt-3">

                <div>
                    
                    <h5 class="text-dark mb-4">List of Volunteers</h5>

                    <!--LIST OF Volunteers CONTENT-->

                    <section class=" mb-5">

                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-2 dashboard">
                            
                            <div class="col ">
                                <div class="dashboardBox d-flex flex-row justify-content-start align-items-center gap-5 p-3" style="width: 100%;">
                                    
                                    <div>
                                        <i class="fa-solid fa-person-chalkboard"></i>
                                    </div>

                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        
                                        <div><span>Total volunteers</span></div>

                                        <div>
                                            <h1 class="text-danger"><?php echo $total_volunteers; ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col ">
                                <div class="dashboardBox d-flex flex-row justify-content-start align-items-center gap-5 p-3" style="width: 100%;">
                                    
                                    <div>
                                        <i class="fa-solid fa-person-chalkboard"></i>
                                    </div>

                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        
                                        <div><span>New volunteers</span></div>

                                        <div>
                                            <h1 class="text-danger">87</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col ">
                                <div class="dashboardBox d-flex flex-row justify-content-start align-items-center gap-5 p-3" style="width: 100%;">
                                    
                                    <div>
                                        <i class="fa-solid fa-person-chalkboard"></i>
                                    </div>

                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        
                                        <div><span>Active volunteers</span></div>

                                        <div>
                                            <h1 class="text-danger"><?php echo $total_assigned; ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col ">
                                <div class="dashboardBox d-flex flex-row justify-content-start align-items-center gap-5 p-3" style="width: 100%;">
                                    
                                    <div>
                                        <i class="fa-solid fa-person-chalkboard"></i>
                                    </div>

                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        
                                        <div><span>Inactive volunteers</span></div>

                                        <div>
                                            <h1 class="text-danger"><?php echo $total_inactive ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col ">
                                <div class="dashboardBox d-flex flex-row justify-content-start align-items-center gap-5 p-3" style="width: 100%;">
                                    
                                    <div>
                                        <i class="fa-solid fa-person-chalkboard"></i>
                                    </div>

                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        
                                        <div><span>Deactivated volunteers</span></div>

                                        <div>
                                            <h1 class="text-danger"><?php echo $total_deactivated; ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>




                        <!-- the function will be in dashboard.php -->
                        <div class="row align-items-center my-5 g-3">
                            <!-- "All" Button -->
                            <div class="col-auto">
                                <button type="button" class="btn btn-outline-secondary px-5">All</button>
                            </div>

                                <!-- City Dropdown -->
                                <div class="col-md-3">
                                    <select class="form-select" aria-label="Select City" id="citySelect" onchange="filterParishes(); updateChart();">
                                        <option selected>Select City</option>
                                        <?php while ($row = mysqli_fetch_assoc($sql_result)) { ?>
                                            <option value="<?php echo $row['CITY']; ?>">
                                                <?php echo $row['CITY']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <!-- Parish Dropdown -->
                                <div class="col-md-3">
                                    <select class="form-select" aria-label="Select Parish" id="parishSelect" onchange="updateChart();">
                                        <option selected>Name of Parish</option>
                                        <?php while ($row = mysqli_fetch_assoc($sql_result2)) { ?>
                                            <option class="parish-option" data-city="<?php echo $row['CITY']; ?>" value="<?php echo $row['PARISH_NAME']; ?>">
                                                <?php echo $row['PARISH_NAME']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                            <section class="mb-5 border py-3">
                        <div>
                            <div>
                                <canvas id="myChart" width="1200" height="600"></canvas>
                            </div>
                        </div>

                    <script>
                      // THE FUNCTION SCRIPT IS AT THE ADMIN.JS
                      // PHP arrays injected into JavaScript 
                      // DONT REMOVE THIS SHIT!
                      var allLabels = <?php echo json_encode($labels); ?>; // Full list of parish names
                      var allCities = <?php echo json_encode($cityData); ?>; // City for each parish
                      var allRegisteredData = <?php echo json_encode($registeredData); ?>; // Registered data
                      var allNeededData = <?php echo json_encode($neededData); ?>; // Needed data
                    </script>
                </section>

                <div class="row align-items-center my-5 g-3">

                            <!-- "All Status" Dropdown -->
                            <div class="col-md-3">
                                    <select class="form-select" aria-label="All Status" id="allStatus">
                                        <option selected>All Status</option>
                                            <option value="ACTIVE">ACTIVE</option>
                                            <option value="INACTIVE">INACTIVE</option>
                                            <option value="DEACTIVATED">DEACTIVATED</option>
                                    </select>
                                </div>

                                <!-- "Mission" Dropdown -->
                            <div class="col-md-3">
                                    <select class="form-select" aria-label="mission" id="missions">
                                        <option selected>Select Mission</option>
                                            <?php while($row = mysqli_fetch_assoc($sql_result5)){ ?>
                                                <option value="<?php echo $row['MISSION_NAME']; ?>"><?php echo $row['MISSION_NAME']; ?></option>
                                            <?php } ?>       
                                    </select>
                                </div>

                                <!-- "Precincts" Dropdown -->
                            <div class="col-md-3">
                                <select class="form-select" aria-label="precincts" id="precincts">
                                    <option selected>Select Precincts</option>
                                        <?php while($row = mysqli_fetch_assoc($sql_result8)){ ?>
                                            <option value="<?php echo $row['PRECINCT']; ?>"><?php echo $row['PRECINCT']; ?></option>
                                        <?php } ?>
                                </select>

                                </div>

                             <!-- SEARCH BAR -->
                             <div class="col-md-3 position-relative">
                                <span class="position-absolute top-0 start-0 mt-2 ms-4"><i class="fa fa-search"></i></span>
                                <input type="text" id="searchVol" class="form-control ps-5" placeholder="Search here...">
                            </div>

                            <!-- TABLE -->
                            <section class="table-responsive p-3">
                            <table class="table align-middle table-bordered border border-dark">
                                    <thead>
                                        <tr class="bg-danger">
                                            <th scope="col"><span class="text-white">Volunteer ID</span></th>
                                            <th scope="col"><span class="text-white">Precinct #</span></th>
                                            <th scope="col"><span class="text-white">Volunteer Name</span></th>
                                            <th scope="col"><span class="text-white">Parishioner of</span></th>
                                            <th scope="col"><span class="text-white">Preferred Volunteer Assignment</span></th>
                                            <th scope="col"><span class="text-white">Status</span></th>
                                            <th scope="col"><span class="text-white">Action</span></th>
                                        </tr>
                                    </thead>
                                    <tbody id="listtable">
                                        <?php while ($row = mysqli_fetch_assoc($sql_result7)) { 
                                            $fname = $row['FIRST_NAME'];
                                            $lname = $row['LAST_NAME'];
                                            $flname = $fname . " " . $lname;
                                        ?>
                                        <tr class="listrow">
                                            <th scope="row"><?php echo $row['VOLUNTEERS_ID']; ?></th>
                                            <td><?php // echo $row['PRECINCT_ID']; ?></td>
                                            <td><?php echo $flname; ?></td>
                                            <td><?php echo $row['ASSIGNED_PARISH']; ?></td>
                                            <td><?php echo $row['ASSIGNED_ASSIGNMENT']; ?></td>
                                            <td><?php echo $row['STATUS']; ?></td>
                                            <td>
                                                <div class="d-flex flex-wrap flex-md-nowrap justify-content-start align-items-center gap-2">
                                                    <a href="#" class="btn btn-outline-primary d-flex align-items-center">
                                                        <i class="bi bi-pencil-square fs-6 me-1"></i> Edit
                                                    </a>
                                                    <a href="#" class="btn btn-outline-danger d-flex align-items-center">
                                                        <i class="bi bi-trash fs-6 me-1"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                    </section>
                </div>
            </main>
        </div>
    </div>

<script src="admin.js"></script>

  <!--bootstrap js-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous">
  </script>
</body>

</html>