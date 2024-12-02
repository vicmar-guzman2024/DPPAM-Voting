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

   <!--JS CHART CDN-->
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  
  


  <title>Admin</title>
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
                        <a href="index.html" class="sidebar-link active">
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
            <main class="container p-5">

                <div>
                    
                    <h1 class="text-dark mb-4">Dashboard</h1>

                    <!--DASHBOARD CONTENT-->

                    <div class="row mb-5">
                      <label for="year" class="col-auto col-form-label">Filter by year (From - To): </label>
                      <div class="col-auto">
                        <select class="form-select text-danger" aria-label="year">
                          <option selected>2024</option>
                          <option value="1">...</option>
                          <option value="2">...</option>
                          <option value="3">...</option>
                        </select>
                        
                      </div>
                    </div>

                    <section class=" mb-5">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-2 dashboard">
                            <div class="col ">
                                <div class="dashboardBox d-flex flex-row justify-content-between align-items-center gap-3 p-3" style="width: 100%;">
                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        <div>
                                            <h1>20</h1>
                                        </div>
                                        <div><span>Total number of volunteers</span></div>
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-person-chalkboard"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboardBox d-flex flex-row justify-content-between align-items-center gap-3 p-3" style="width: 100%;">
                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        <div>
                                            <h1>20</h1>
                                        </div>
                                        <div><span>Attendance summary</span></div>
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-person-chalkboard"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboardBox d-flex flex-row justify-content-between align-items-center gap-3 p-3" style="width: 100%;">
                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        <div>
                                            <h1>20</h1>
                                        </div>
                                        <div><span>Volunteer assigned</span></div>
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-person-chalkboard"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dashboardBox d-flex flex-row justify-content-between align-items-center gap-3 p-3">
                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        <div>
                                            <h1>20</h1>
                                        </div>
                                        <div><span>Pending assignments</span></div>
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-person-chalkboard"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- the function will be in dashboard.php -->
                    <div class="row mb-5">
                        <h3 class="mb-3">Overview</h3>

                          <!-- City Dropdown -->
                          <div class="col-md-3 mb-3 mb-md-0">
                              <select class="form-select" aria-label="city" id="citySelect" onchange="filterParishes(); filterSchools(); updateChart();">
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
                              <select class="form-select" aria-label="parish" id="parishSelect" onchange="updateChart();">
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
                            <h3>Registered Volunteers</h3>
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

                    <div class="row mb-5">
                      <div class="col-md-3">
                        <select class="form-select" aria-label="parish">
                          <option selected>Name of School</option>
                          <option value="1">...</option>
                          <option value="2">...</option>
                          <option value="3">...</option>
                        </select>
                      </div>
                    </div>

                    <section class="row row-cols-lg-2 row-cols-1">
                        <div class="col-lg-3 d-flex flex-column gap-2 mb-4 dashboard">
                          <!-- Dashboard Box 1 -->
                          <div class="col">
                            <div class="dashboardBox d-flex flex-row justify-content-between align-items-center gap-3 p-3" style="width: 100%;">
                              <div class="d-flex flex-column justify-content-center align-items-start">
                                <div><h1>20</h1></div>
                                <div><span>Lorem ipsum dolor sit amet.</span></div>
                              </div>
                              <div><i class="fa-solid fa-person-chalkboard"></i></div>
                            </div>
                          </div>
                      
                          <!-- Dashboard Box 2 -->
                          <div class="col">
                            <div class="dashboardBox d-flex flex-row justify-content-between align-items-center gap-3 p-3" style="width: 100%;">
                              <div class="d-flex flex-column justify-content-center align-items-start">
                                <div><h1>20</h1></div>
                                <div><span>Lorem ipsum dolor sit amet.</span></div>
                              </div>
                              <div><i class="fa-solid fa-person-chalkboard"></i></div>
                            </div>
                          </div>
                      
                          <!-- Dashboard Box 3 -->
                          <div class="col">
                            <div class="dashboardBox d-flex flex-row justify-content-between align-items-center gap-3 p-3" style="width: 100%;">
                              <div class="d-flex flex-column justify-content-center align-items-start">
                                <div><h1>20</h1></div>
                                <div><span>Lorem ipsum dolor sit amet.</span></div>
                              </div>
                              <div><i class="fa-solid fa-person-chalkboard"></i></div>
                            </div>
                          </div>
                        </div>
                      
                        <!-- Chart Section -->
                        <div class="col-lg-9">
                          <div class="row row-cols-md-2 row-cols-1 d-flex justify-content-center align-items-center">
                            <!-- Pie Chart Section -->
                            <div class="col-md-6 mb-4">
                              <canvas id="pieChart"></canvas>
                              <script>
                                const pieChartCtx = document.getElementById('pieChart').getContext('2d');
                                const pieData = {
                                  labels: ['Red', 'Blue', 'Yellow'],
                                  datasets: [{
                                    label: 'My First Dataset',
                                    data: [300, 50, 100],
                                    backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
                                    hoverOffset: 4
                                  }]
                                };
                                new Chart(pieChartCtx, { type: 'doughnut', data: pieData });
                              </script>
                            </div>
                      
                            <!-- Bar Chart Section -->
                            <div class="col-md-6 mb-4">
                              <canvas id="myChart2"></canvas>
                              <script>
                                const myChart2Ctx = document.getElementById('myChart2').getContext('2d');
                                new Chart(myChart2Ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: ['John', 'Pedro', 'Juan'],
                                    datasets: [
                                      { label: 'Cats', data: [2, 3, 1], backgroundColor: 'rgb(255, 99, 132)', borderWidth: 1 },
                                      { label: 'Dogs', data: [1, 4, 1], backgroundColor: 'rgb(54, 162, 235)', borderWidth: 1 }
                                    ]
                                  },
                                  options: {
                                    indexAxis: 'y',
                                    scales: {
                                      x: { beginAtZero: true, stacked: true },
                                      y: { stacked: true }
                                    }
                                  }
                                });
                              </script>
                            </div>
                          </div>
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