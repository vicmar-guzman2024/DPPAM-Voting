<?php
// Start the session
session_start();
include('php/condb.php');

// Retrieve user details from the session
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$username = $_SESSION['username'];

// Fetch user data
$user_id = $_SESSION['user_id'];
$sql = "SELECT firstname, lastname, username, profile_picture FROM users WHERE user_id = ?";
$stmt = $sql_connection->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($firstname, $lastname, $email, $profile_image);
$stmt->fetch();
$stmt->close();
$sql_connection->close();

// Determine profile image
$image_path = $profile_image ? "php/profile_picture/$profile_image" : "php/profile_picture/default_profile.jpg";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/vol-portal.css">
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

  
  


  <title>Change Password</title>
</head>

<body>
    
    <div class="wrapper">

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="" style="min-height: 100vh;">

                <div class="d-flex flex-column justify-content-center align-items-center mt-5 gap-3">
                    <div class="position-relative">
                        <img src="img/DPPAMLOGO.png" alt="User Profile" class="img-fluid profileImg">
                        <button type="button" class="editProfile position-absolute top-50 start-100 translate-middle">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </div>

                    <div>
                      <!--Name-->
                      <h4>Vicmar M. Guzman</h4>
                    </div>
                </div>

                

                <ul class="sidebar-nav mt-5">
                    <li class="sidebar-item">
                        <a href="vol_portal.html" class="sidebar-link py-3"><i class="fa-solid fa-house me-2"></i>Dashboard</a>
                    </li>
                    
                    <li class="sidebar-item">
                      <a href="#" class="sidebar-link py-3"><i class="fa-solid fa-school-flag me-2"></i>Volunteer Form Info</a>
                    </li>
                    
                    

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link py-3"><i class="fa-solid fa-file-image me-2"></i>My Attachments</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="account_settings.html" class="sidebar-link py-3"><i class="fa-solid fa-gear me-2"></i>Profile Settings</a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Component -->
        <div class="main">

            <nav class="navbar navbar-expand navbar-light bg-light d-flex flex-row justify-content-between align-items-center pe-lg-5 pe-3 ps-2">
                <!-- Button for sidebar toggle -->
                <div class="d-flex flex-row justify-content-center align-items-center">
                <button class="btn toggle-btn" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon"></span>
                </button>

                
                <img src="img/DPPAMLOGO.png" alt="DPPAM Logo" height="50px" width="50px" class="img-fluid">
                <h3>DPPAM Volunteer Portal</h3>
                </div>

                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                    <button type="button" class="btn"><i class="fa-solid fa-bell text-dark fs-5"></i></button>
                    <button type="button" class="btn"><i class="fa-solid fa-chevron-down text-dark fs-4"></i></button>
                </div>
            </nav>

            <main class="container p-5">

                <div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div><a href="account_settings.html" class="btn"><i class="bi bi-chevron-left"></i></a></div>
                        <div><h3 class="text-dark">Change Password</h3></div>
                    </div>

                    <!--DASHBOARD CONTENT-->

                    <section class="p-5 contentBox">

                        <form action="" class="row">

                            <!-- Current Password Field -->
                             <div class="col-md-7 mb-4 position-relative"> 
                                <input type="password" class="form-control py-2" id="currentPass" placeholder="Current password">
                                <button type="button" class="btn position-absolute top-50 start-100 translate-middle bg-light" style="margin-left: -35px;" onclick="togglePassword('currentPass', 'currentIcon')">
                                    <i id="currentIcon" class="bi bi-eye-slash"></i>
                                </button>
                            </div>
                            
                            <!-- New Password Field -->
                             <div class="col-md-7 mb-4 position-relative"> 
                                <input type="password" class="form-control py-2" id="newPass" placeholder="New password">
                                <button type="button" class="btn position-absolute top-50 start-100 translate-middle bg-light" style="margin-left: -35px;" onclick="togglePassword('newPass', 'newIcon')">
                                    <i id="newIcon" class="bi bi-eye-slash"></i>
                                </button>
                            </div>
                            
                            <!-- Confirm New Password Field -->
                             <div class="col-md-7 mb-4 position-relative">
                                <input type="password" class="form-control py-2" id="confirmNewPass" placeholder="Confirm new password">
                                <button type="button" class="btn position-absolute top-50 start-100 translate-middle bg-light" style="margin-left: -35px;" onclick="togglePassword('confirmNewPass', 'confirmIcon')">
                                    <i id="confirmIcon" class="bi bi-eye-slash"></i>
                                </button>
                            </div>
                            
                            <!-- Save button -->
                             <div class="col-12 mb-4">
                                <button type="submit" class="btn btn-primary px-5">Save</button>
                            </div>  



                        </form>

                        
                    </section>

                    

                    

                    
                    
                      
                    
                </div>
            </main>
        </div>
    </div>

    






<script src="vol-portal.js"></script>


  <!--bootstrap js-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>