<?php
include("php/connection.php");
include("php/dashboard.php");

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

  
  

  <title>Assignment Management</title>
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
                    <p><?php echo $username; ?></p>
                    
                </a></li>
                <hr class="text-dark">
                  <li><a class="dropdown-item" href="editprofile.php"><i class="fa-solid fa-user-pen pe-2"></i>Edit Profile</a></li>
                  <li><a class="dropdown-item" href="php/logout.php"><i class="fa-solid fa-arrow-right-from-bracket pe-2"></i>Logout</a></li>
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
                                <a href="addNewVolunteers.php" class="sidebar-link"><i class="fa-solid fa-user-plus pe-2"></i>Add New Volunteers</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="list_of_volunteers.php" class="sidebar-link"><i class="fa-solid fa-list-ul pe-2"></i>View Volunteers</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="submissions.php" class="sidebar-link">
                            <i class="fa-solid fa-school-flag pe-2"></i>Submissions</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="assignment_management.php" class="sidebar-link"> 
                            <i class="fa-solid fa-school-flag pe-2"></i>Schools & Precincts</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="attendance_tracking.php" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard"
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
                        <a href="id_generator.html" class="sidebar-link"><i class="fa-solid fa-id-card pe-2"></i>Generate ID</a>
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
            <main class="container-fluid p-5">

                <div>
                    
                    <h1 class="text-dark mb-4">Assignment Management</h1>

                    <!--ASSIGNMENT MANAGEMENT CONTENT-->
                    <div class="row">

                      <!-- Volunteer Category Dropdown -->
                      <div class="col-md-4 mb-3">
                        <select class="form-select" aria-label="Volunteer Category">
                          <option selected value="">Volunteer Category</option>
                          <option value="1">Category 1</option>
                          <option value="2">Category 2</option>
                          <option value="3">Category 3</option>
                        </select>
                      </div>

                      <!-- Search Bar -->
                      <div class="col-md-4 position-relative mb-3">
                        <span class="position-absolute top-50 start-0 translate-middle-y ms-4 text-muted">
                          <i class="fa fa-search"></i>
                        </span>
                        <input
                          type="text"
                          id="searchPrecinct"
                          class="form-control ps-5"
                          placeholder="Search precinct..."
                        />
                      </div>

                      <!-- Add New Precinct Button -->
                      <div class="col text-nowrap mb-3 ms-md-5">
                        <button type="button" class="btn btn-primary">Add New Precinct</button>
                      </div>
                    </div>
                    
                    <section class="mt-3 row row-cols-lg-3 row-cols-md-2 row-cols-1 g-4">
                        <!-- Start of Card -->
                        <?php
                        while ($row = $sql_result12->fetch_assoc()) {
                            $location = $row['LOCATION'];
                            $registered_volunteers = $row['TOTAL_VOLUNTEERS'];
                            $total_registered = 230; // assuming
                            $needed_volunteers = 25; // also assuming since no data yet
                        ?>
                        <div class="col precinct-card" data-location="<?php echo $location; ?>">
                            <div class="card shadow-sm border-0 h-100" style="border-radius: 10px;">
                                <!-- Card Header -->
                                <div class="card-header text-white text-center fw-bold py-3" style="background-color: #9e1b1e; border-radius: 10px 10px 0 0;">
                                    <?php echo htmlspecialchars($location); // Display the school name ?>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <div class="row text-center">
                                        <!-- Total Volunteers -->
                                        <div class="col">
                                            <h4 class="mb-1"><?php echo $total_registered ?></h4>
                                            <small class="text-muted">Total Volunteers</small>
                                        </div>
                                        <!-- Divider -->
                                        <div class="col-auto d-none d-md-block">
                                            <div class="vr"></div>
                                        </div>
                                        <!-- Registered Volunteers -->
                                        <div class="col">
                                            <h4 class="mb-1"><?php echo $registered_volunteers; ?></h4>
                                            <small class="text-muted">Registered Volunteers</small>
                                        </div>
                                        <!-- Divider -->
                                        <div class="col-auto d-none d-md-block">
                                            <div class="vr"></div>
                                        </div>
                                        <!-- Needed Volunteers -->
                                        <div class="col">
                                            <h4 class="text-danger mb-1"><?php echo "+".$needed_volunteers; ?></h4>
                                            <small class="text-muted">Needed Volunteers</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <!-- End of Card -->
                    </section>
                    
                    <!-- ayaw gumana sa external na javascript dito nalang yan -->
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Capture the search input field
                            const searchField = document.getElementById('searchPrecinct');
                            
                            searchField.addEventListener('input', function() {
                                const searchQuery = this.value.toLowerCase();  // Convert to lowercase for case-insensitive search
                                const cards = document.querySelectorAll('.precinct-card'); // All the card elements

                                cards.forEach(card => {
                                    const location = card.getAttribute('data-location').toLowerCase();  // Get location of each card
                                    
                                    // Compare search query with the location value
                                    if (location.includes(searchQuery)) {
                                        card.style.display = '';  // Show the card if it matches the search
                                    } else {
                                        card.style.display = 'none';  // Hide the card if it doesn't match
                                    }
                                });
                            });
                        });
                    </script>
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