<?php
include("php/dashboard.php");
include("php/addnewvolunteers.php");



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

  
  


  <title>Add New Volunteer</title>
</head>

<body>


    <!--LOGO AND HEADER-->
    <section class="header d-flex flex-row justify-content-between align-items-center gap-4 px-4 py-2">
        
        <div class="d-flex flex-row justify-content-center align-items-center gap-4">
            <div><img src="../img/DPPAMLOGO.png" alt="" width="70px" height="70px" class="img-fluid logo"></div>
            <div><h4 class="text-white">DPPAM Volunteers Management and Tracking System</h4></div>
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
            <div class="" style="min-height: 100vh;">

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
                                <a href="#" class="sidebar-link"><i class="fa-solid fa-list-ul pe-2"></i>View Volunteers</a>
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

                 <!--ADD NEW VOLUNTEERS FORM-->
                <h1 class="text-dark mb-4">Add New Volunteer</h1>

                <form action="addnewvolunteers.php" method="POST" class="row mt-5">
                    
                    <section class="contentBox p-5">
                        
                        <div class="d-flex flex-column flex-md-row justify-content-start align-items-center gap-3 gap-md-5 mb-5">
                            <!-- Logo Section -->
                            <div class="text-center text-md-start">
                                <img src="../img/PPCRVLOGO.png" alt="PPCRV LOGO" class="img-fluid" style="max-width: 150px;">
                            </div>
                        
                            <!-- Text Section -->
                            <div class="d-flex flex-column justify-content-center align-items-center align-items-md-start text-center text-md-start">
                                <h3 class="mb-2">PARISH PASTORAL COUNCIL FOR RESPONSIBLE VOTING</h3>
                                <p class="mb-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum, rem!</p>
                                <p class="mb-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum, rem!</p>
                                <p class="mb-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum, rem!</p>
                            </div>
                        </div>
                        
    
                        
                            <div class="row row-cols-1 row-cols-lg-2 g-3 mb-3">
                        
                                <!-- Password Fields -->
                                <div class="col-lg-8 mt-5">
                                    <div class="mb-3 row align-items-center">
                                        <label for="archOrDiocese" class="col-12 col-md-3 col-form-label">Arch/Diocese: </label>
                                        <div class="col-12 col-md-9">
                                            <input type="text" class="form-control" id="archOrDiocese" name="archOrDiocese">
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label for="parish" class="col-12 col-md-3 col-form-label">Parish: </label>
                                        <div class="col-12 col-md-9">
                                            <input type="text" class="form-control" id="parish" name="parish">
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label for="city" class="col-12 col-md-3 col-form-label">City: </label>
                                        <div class="col-12 col-md-9">
                                            <input type="text" class="form-control" id="city" name="city">
                                        </div>
                                    </div>
                                </div>
                        
                                <!-- File Upload -->
                                <div class="col-lg-4 mt-0 mt-md-5">
                                    <div class="mb-3">
                                        <label class="custom-file-input form-label" for="oneXoneID">
                                            <i class="icon fas fa-upload"></i>
                                            <input type="file" id="oneXoneID" name="oneXoneID">
                                            <span class="file-name" id="oneXoneIDfileName">Upload your 1x1 picture</span>
                                        </label>
                                    </div>
                                </div>
                        
                            </div>
    
    
                            <h5 class="text-center my-5">Volunteer Registration Form</h5>
                            <div class="mb-3 row">
                                <label for="dateOfRegistration" class="col-sm-2 col-form-label">Date:</label>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" id="dateOfRegistration" name="dateOfRegistration" required>
                                </div>
                            </div>
    
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi a hic quo quis natus deserunt veniam tempora, et deleniti voluptates recusandae, nostrum vitae eius sit architecto! Ad porro maxime autem deleniti magnam obcaecati alias saepe nesciunt reiciendis similique tempora, odio dolor adipisci provident repellat, dolorum odit neque dicta mollitia? Ea.</p>
    
    
                            <div class="row">
                            <div class="col-md-6 mb-4">
        <label for="name" class="form-label">Fullname</label>
        <div class="input-group">
            <input type="text" aria-label="First name" class="form-control" placeholder="First name" name="fname" id="firstname">
            <input type="text" aria-label="Middle name" class="form-control" placeholder="Middle name" name="midname" id="middlename">
            <input type="text" aria-label="Last name" class="form-control" placeholder="Last name" name="lname" id="lastname">
        </div>
        <input type="hidden" name="full_name" id="fullName">
        </div>
                                <div class="col-md-6 mb-4">
                                    <label for="nickname" class="form-label">Nickname</label>
                                    <input type="text" class="form-control" id="nickname" name="nickname">
                                </div>
    
                                <div class="col-md-2 mb-4">
                <label for="birthDate" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="birthDate" name="birthdate">
            </div>

            <div class="col-md-2 mb-4">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>

            <div class="col-md-2 mb-4">
                <label for="sex" class="form-label">Sex</label>
                <select id="sex" name="gender" class="form-select">
                    <option selected>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="col-md-3 mb-4">
                <label for="civilStatus" class="form-label">Civil Status</label>
                <select id="civilStatus" name="civil_status" class="form-select">
                    <option selected>Single</option>
                    <option>Married</option>
                    <option>Divorced</option>
                    <option>Widowed</option>
                    <option>Separated</option>
                </select>
            </div>
            <div class="col-md-3 mb-4">
                <label for="citizenship" class="form-label">Citizenship</label>
                <input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="Filipino">
            </div>

            <div class="col-md-9 mb-4">
                <label for="address" class="form-label">Residence Address</label>
                <input type="text" class="form-control" id="address" name="residence_address">
            </div>
            <div class="col-md-3 mb-4">
                <label for="tel" class="form-label">Telephone No.</label>
                <input type="tel" class="form-control" id="tel" name="telephone_no">
            </div>
    
            <div class="col-md-4 mb-4">
                <label for="occupation" class="form-label">Occupation</label>
                <input type="text" class="form-control" id="occupation" name="occupation">
            </div>
            <div class="col-md-4 mb-4">
                <label for="celNo" class="form-label">Cellphone No.</label>
                <input type="tel" class="form-control" id="celNo" name="cellphone_no">
            </div>
            
            <div class="col-md-4 mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
    
            <div class="col-md-9 mb-4">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company_name">
            </div>
            <div class="col-md-3 mb-4">
                <label for="tel" class="form-label">Telephone No.</label>
                <input type="tel" class="form-control" id="tel" name="company_telephone_no">
            </div>
                                
                            </div>
    
                            <div class="row">

                                <div class="col-md-9 mb-4">
                <label for="orgMember" class="form-label">Parish Organization Membership</label>
                <input type="text" class="form-control" id="orgMember" name="ppcrv_org_membership" placeholder="Committees">
            </div>

            <div class="col-md-3 mb-4">
                <label for="position" class="form-label">Position</label>
                <input type="text" class="form-control" id="position" name="position">
            </div>
    
            <div class="col-md-6 mb-4">
                <label for="years_in_service" class="form-label">For current PPCRV Member: No. of years in service</label>
                <input type="number" class="form-control" id="years_in_service" name="years_in_service">
            </div>

            <div class="col-md-6 mb-4">
                <label for="dateExp" class="form-label">Previous PPCRV Experience Date</label>
                <input type="date" class="form-control" id="dateExp" name="prev_ppcrv_experience_date">
            </div>
    
            <div class="col-md-9 mb-4">
                <label for="prevExpAss" class="form-label">Previous PPCRV Experience Assignment</label>
                <select id="prevExpAss" name="prev_ppcrv_experience_assignment" class="form-select">
                <?php
                                        while ($row = $sql_result5->fetch_assoc()) {
                                            $role_name = $row['ROLE_NAME'];
                                            $description = $row['DESCRIPTIONS'];
                                            $options .= "<option value=\"$role_name\">$role_name $description</option>";
                                        } ?>
                                            <option selected disabled>Select options</option>
                                                <?php echo $options; ?>
                    <option value="Others">Others</option>
                </select>

                <div id="selected-prevExpAss" class="mt-3">
                    <!-- Selected options with 'x' buttons will appear here -->
                </div>
            </div>
                                
                                
                                <div class="col-md-3 mb-4">
                                    <label for="otherPrevExpAss" class="form-label">Others</label>
                                    <input type="text" class="form-control" id="otherPrevExpAss" name="others_prev_ppcrv_exp_ass" disabled>
                                </div>

                                <!-- REGISTERED VOTER??? -->
                    <div class="col-12 mb-4">
                    <!-- Question and Radio Buttons -->
                    <div class="d-flex flex-column flex-md-row gap-3 align-items-center">
                        <p class="mb-0">Are you a registered voter?</p>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="voterStatus" id="yes" value="Yes">
                        <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="voterStatus" id="no" value="No">
                        <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>

                    <!-- Conditional Inputs -->
                    <div class="row g-3 mt-3">
                        <!-- Precinct Number (Yes) -->
                        <div class="col-md-6 d-flex align-items-center gap-2">
                        <label for="precinctNo" class="form-label text-nowrap mb-0">If Yes, Precinct No.</label>
                        <input type="text" class="form-control" id="precinctNo" name="precinctNo" placeholder="Precinct No.">
                        </div>
                        <!-- Polling Place (Yes) -->
                        <div class="col-md-6 d-flex align-items-center gap-2">
                        <label for="pollingPlace" class="form-label text-nowrap mb-0">Polling Place</label>
                        <input type="text" class="form-control" id="pollingPlace" name="pollingPlace" placeholder="Polling Place">
                        </div>
                        <!-- Reason (No) -->
                        <div class="col-md-6 d-flex align-items-center gap-2">
                        <label for="no_reason" class="form-label text-nowrap mb-0">If No, Reason Why</label>
                        <input type="text" class="form-control" id="no_reason" name="no_reason" placeholder="Reason">
                        </div>
                    </div>
                    </div>

                    <div class="col-md-9 mb-4">
                <label for="prefVolAss" class="form-label">Preferred Activity Assignments</label>
                <select id="prefVolAss" name="preferred_volunteer_assignment" class="form-select">
                <?php
                                        while ($row = $sql_result5->fetch_assoc()) {
                                            $role_name = $row['ROLE_NAME'];
                                            $description = $row['DESCRIPTIONS'];
                                            $options .= "<option value=\"$role_name\">$role_name $description</option>";
                                        } ?>
                                            <option selected disabled>Select options</option>
                                                <?php echo $options; ?> 
                    <option value="Others">Others</option>
                </select>

                <div id="selected-prefVolAss" class="mt-3">
                    <!-- Selected options for Preferred Volunteer Assignments will appear here -->
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <label for="otherPrefVolAss" class="form-label">Others</label>
                <input type="text" class="form-control" id="otherPrefVolAss" name="other_preferred_volunteer_assignment" disabled>
            </div>

                            </div>
    
                            <h5 class="text-center mb-3">PPCRV Pledge</h5>
    
                            <p class="lh-lg">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione quisquam alias voluptas architecto facilis, 
                                labore quaerat soluta neque commodi blanditiis repellendus quos. Nesciunt quod culpa consectetur, odit rerum 
                                expedita dolorem dicta atque esse dolores consequuntur obcaecati qui! Voluptatem autem quod deleniti, excepturi 
                                doloremque atque, saepe eius cum labore laudantium recusandae ullam enim voluptate reprehenderit non beatae! Nihil 
                                eveniet perferendis iure ullam officiis recusandae ex tempore voluptatum aut, eaque tenetur ratione, laborum dignissimos 
                                veniam vitae quod sunt corporis eos? Sapiente aut distinctio obcaecati quia reprehenderit praesentium harum sint cum 
                                veniam voluptatibus quod, nobis quaerat? Corporis eveniet ea sint in reiciendis repellat enim rerum ex harum a provident
                                 assumenda id, quae aperiam, exercitationem maiores deserunt nulla libero! Excepturi exercitationem provident vitae, 
                                 quibusdam iste dolorum pariatur quam, animi temporibus recusandae et aperiam, eligendi corporis suscipit minus voluptas
                                  explicabo. Facilis perspiciatis necessitatibus explicabo sit assumenda nostrum sed ab eaque veniam praesentium, aspernatur
                                  officiis cum.
                            </p>
    
                            <!--FORM FOOTER-->
                            <div>
                                    <p class="text-center my-5" style="text-decoration: overline;">&nbsp;&nbsp;&nbsp;&nbsp;Applicant's Signature&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                <div style="border: 2px solid #000" class="mb-1"></div>
                                <p>Action Taken:</p>
    
                                <div class="row">
                                    <div class="col-md-4 d-flex flex-column justify-content-center align-items-center gap-4">
                                        <div>
                                            <p>Recommending Approval:</p>
                                        </div>
    
                                        <div style="border-top: 2px solid #000; width: 100%;">
                                            <p class="text-center mb-5">PPCRV President/Parish Coordinator</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex flex-column justify-content-center align-items-center gap-4">
                                        <div>
                                            <p>Approved by:</p>
                                        </div>
    
                                        <div style="border-top: 2px solid #000; width: 100%;">
                                            <p class="text-center mb-5">Parish Priest</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex flex-column justify-content-center align-items-center gap-4">
                                        <div>
                                            <p>Noted by:</p>
                                        </div>
    
                                        <div style="border-top: 2px solid #000; width: 100%;">
                                            <p class="text-center mb-5">Congressional District Coordinator</p>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="text-center row justify-content-center align-items-center">
                                    <div class="col-md-3">
                                        <p class="mb-md-0 mb-4">Issued Membership No.</p>
                                    </div>
                                    <div class="col-md-3" style="border-bottom: 2px solid #000; height: 1rem;"></div>
                                </div>
                                
                            </div>
                    </section>

                    <!-- BUTTON SAVE / CANCEL -->
                    <div class="d-flex flex-row justify-content-end align-items-center gap-3 mt-5">
                        <button class="btn btn-danger" type="button">Cancel</button>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#confirmationModal">Save</button>
                    </div>

                    <!-- CONFIRMATION MODAL -->
                    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModal" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title text-center">Reminder</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque assumenda vel reiciendis, odit modi aliquam.</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn px-4" data-bs-dismiss="modal" name="cancel">Cancel</button>
                              <button type="Submit" class="btn btn-primary px-5" id="save" name="save">Save</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </form>
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