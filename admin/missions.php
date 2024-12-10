<?php
include("php/dashboard.php");
include("php/addnewroles.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/admin-style.css" />
    <!--bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!--Font awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--JS CHART CDN-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Missions</title>
</head>

<body>
    <!-- LOGO AND HEADER -->
<section class="header d-flex flex-row justify-content-between align-items-center gap-4 px-4 py-2">
    <div class="d-flex flex-row justify-content-center align-items-center gap-4">
        <div>
            <img src="../img/DPPAMLOGO.png" alt="" width="70px" height="70px" class="img-fluid logo" />
        </div>
        <div>
            <h4 class="text-white">
                DPPAM Volunteers Management and Tracking System
            </h4>
        </div>
    </div>

    <div class="d-flex flex-row justify-content-center align-items-center gap-4">
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

        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../img/DPPAMLOGO.png" alt="Admin Profile" width="50px" height="50px" class="img-fluid" />
            </button>
            <ul class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton1" style="width: 250px">
                <li>
                    <a class="dropdown-item d-flex flex-row justify-content-center align-items-center" href="#">
                        <img src="../img/DPPAMLOGO.png" alt="" width="50px" height="50px" class="img-fluid" />
                        <p>Vicmar M. Guzman</p>
                    </a>
                </li>
                <hr class="text-dark" />
                <li>
                    <a class="dropdown-item" href="#"><i class="fa-solid fa-user-pen pe-2"></i>Edit Profile</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#"><i class="fa-solid fa-arrow-right-from-bracket pe-2"></i>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</section>


    <div class="wrapper">

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="" style="min-height: 100vh">

                <!-- Sidebar Navigation -->

                <ul class="sidebar-nav mt-5">
                    <li class="sidebar-item">
                        <a href="index.php" class="sidebar-link active">
                            <i class="fa-solid fa-house pe-2"></i>Dashboard</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages"
                            aria-expanded="false" aria-controls="pages"><i
                                class="fa-solid fa-user-group pe-2"></i>Volunteers</a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="missions.php" class="sidebar-link"><i
                                        class="fa-solid fa-user-plus pe-2"></i>Missions</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="addNewVolunteers.php" class="sidebar-link"><i class="fa-solid fa-user-plus pe-2"></i>Add New
                                    Volunteers</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="list_of_volunteers.php" class="sidebar-link"><i class="fa-solid fa-list-ul pe-2"></i>View
                                    Volunteers</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="submissions.php" class="sidebar-link">
                            <i class="fa-solid fa-school-flag pe-2"></i>Submissions</a>
                    </li>
                    
                    <li class="sidebar-item">
                        <a href="assignment_management.php" class="sidebar-link">
                            <i class="fa-solid fa-school-flag pe-2"></i>Schools &
                            Precincts</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="attendance_tracking.php" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard"
                            aria-expanded="false" aria-controls="dashboard">
                            <i class="fa-solid fa-user-check pe-2"></i>Attendance
                            Tracking</a>
                        <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i class="fa-solid fa-user-plus pe-2"></i>Check-in /
                                    Check-out</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i class="fa-solid fa-list-ul pe-2"></i>Attendance
                                    Reports</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#auth"
                            aria-expanded="false" aria-controls="auth">
                            <i class="fa-solid fa-list-check pe-2"></i>Role Management</a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i class="fa-solid fa-clipboard-check pe-2"></i>Assign
                                    Roles</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i class="fa-solid fa-user-check pe-2"></i>View Role
                                    Assignments</a>
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

            <main class="container p-5">
                <div>
                        <h1 class="text-dark mb-4">Missions</h1>

                    <!--MISSION CONTENT-->
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

                        <label for="numberOfVol" class="col-auto col-form-label">Total number of Volunteers: </label>
                        <div class="col-auto">
                          <select class="form-select text-danger" aria-label="numberOfVol">
                            <option selected>2024</option>
                            <option value="1">...</option>
                            <option value="2">...</option>
                            <option value="3">...</option>
                          </select>
                        </div>

                        <div class="col-auto">
                            <!--BUTTON TRIGGER MODAL-->   
                            <button type="button" class="btn btn-primary text-nowrap" data-bs-toggle="modal" data-bs-target="#AddNewMissionModal">
                                <i class="fa-solid fa-plus me-3"></i>Add new mission
                            </button>
                        </div>

                        <!--Add new mission MODAL-->
                        <div class="mt-5 modal fade" id="AddNewMissionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="modalTitle">Add New Mission</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="php/addnewroles.php" method="POST">
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Category</label>
                                            <input type="text" class="form-control" id="category" name="mission_name" placeholder="Category Name">

                                        </div> 

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="mission_description" placeholder="Description" style="height: 100px;"></textarea>
                                            
                                        </div>

                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Icon / Graphic</label>
                                            <input class="form-control" type="file" id="formFile" name="icon">
                                          </div>
                                    
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <button type="submit" class="btn btn-primary px-4" name="Add">Add</button>
                                </div>
                            </form>
                              </div>
                            </div>
                          </div>
                      </div>
                    
                      <section class="mb-4">
    <div class="row row-cols-1 row-cols-md-2 row-cols-md-2 row-cols-xl-3 row-cols-xxl-4 g-3 mission">
        <?php 
            // Default icon for roles without specific mapping
            $defaultIcon = 'fa-users';

            // Mapping predefined roles to their icons
            $roleIcons = [
                'Voters Education & Media Group (VEMG)' => 'fa-person-chalkboard',
                'Accountable Material Verifiable Audit Trail Team (AMVATT)' => 'fa-list-check',
                'Polling Precinct Poll Watcher (PPMW)' => 'fa-clipboard-check',
                'Voters Assistance Desk (VAD)' => 'fa-user-group',
                'Technical Witness of Truth (SWOT)' => 'fa-file-pen',
                'Unofficial Parallel Count Encoders (UCPE)' => 'fa-circle-check',   
                'Logistics & Foods Team (LFT)' => 'fa-keyboard',
                'Transportation & Communications Group (TCG)' => 'fa-square-phone',
                'Finance & Solicitation Group (FSG)' => 'fa-file-invoice-dollar',
                'Post Election Poll Watching (PEPW)' => 'fa-keyboard',
            ];

            while ($row = mysqli_fetch_assoc($sql_result5)) {
                $mission_name = $row['MISSION_NAME'];
                $mission_descriptions = $row['MISSION_DESCRIPTION'];
                $mission = $mission_name . " " . $mission_descriptions;

                // Use predefined icon if role exists, otherwise default icon
                $icon = $roleIcons[$mission] ?? $defaultIcon;
        ?>
        <div class="col">
            <div class="missionBox card text-center p-3 h-100 d-flex flex-column justify-content-between">
                <!-- Top Section -->
                <div class="mb-3 d-flex flex-row justify-content-center align-content-center gap-4">
                    <h1>20</h1>
                    <span>Volunteers</span>
                    <div class="mt-2">
                        <i class="fa-solid <?php echo $icon; ?> fa-2x"></i>
                    </div>
                </div>

                <!-- Mission Description -->
                <div>
                    <p class="mb-0">
                        <?php echo $mission; ?>
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>
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
        crossorigin="anonymous"></script>
</body>

</html>