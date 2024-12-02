<?php
session_start(); // Start the session

// Destroy all session data
session_unset();
session_destroy();

<<<<<<< HEAD:vol_account2.php
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
                    <img src="img/profile.jpg" alt="User Profile" class="img-fluid profileImg">
                    <button type="button" class="editProfile position-absolute top-50 start-100 translate-middle">
                    <i class="fa-solid fa-pen"></i>
                    </button>
                </div>

                <div>
                    <h4 class="profile-name">Vicmar M. Guzman</h4>
                    <p class="profile-email">vicmarguzman@gmail.com</p>
                </div>
                </div>

                <ul class="sidebar-nav mt-5">
                    <li class="sidebar-item">
                        <a href="vol_dashboard.php" class="sidebar-link py-3">
                        <i class="fa-solid fa-house-user"></i>Dashboard
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="vol_registration_info.php" class="sidebar-link py-3">
                        <i class="fa-solid fa-address-card"></i>Registration Info
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="vol_attachments.php" class="sidebar-link py-3">
                        <i class="fa-solid fa-file"></i>My Attachments
                        </a>
                    </li>

                    <li class="sidebar-item1">
                        <a href="vol_account_settings.php" class="sidebar-link py-3">
                        <i class="fa-solid fa-gear"></i>Profile Settings
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link py-3">
                        <i class="fa-solid fa-right-from-bracket"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Component -->
        <div class="main">

            <nav class="navbar navbar-expand d-flex flex-row justify-content-between align-items-center pe-lg-5 pe-3 ps-2">
                <div class="d-flex flex-row justify-content-center align-items-center">
                    <button class="btn1 toggle-btn" type="button" data-bs-theme="dark">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <img src="img/user_logo.png" alt="DPPAM Logo" height="50px" width="50px" class="img-fluid">
                    <h3 class="navbar-title">DPPAM Volunteer Portal</h3>
                </div>

                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <button type="button" class="btn"><i class="fa-solid fa-bell btn-icon"></i></button> 
                </div>
            </nav>

            <main class="container p-5">

                <div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div><a href="vol_account_settings.php" class="btn"><i class="bi bi-chevron-left"></i></a></div>
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
=======
// Redirect to the login page
header("Location: user_login.php");
exit();
?>
>>>>>>> 7e88c50a2d47f79dcdd2988e24838fbcf498309c:vol_logout.php
