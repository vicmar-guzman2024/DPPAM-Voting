<?php
include('php/condb.php');
include('php/authentication.php');

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

  
  


  <title>Account Settings</title>
</head>

<body>
    
    <div class="wrapper">

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="" style="min-height: 100vh;">
                <div class="d-flex flex-column justify-content-center align-items-center mt-5 gap-3">
                    <div class="position-relative">
                    <img src="php/profile_picture/<?= !empty($_SESSION['auth_user']['profile_picture']) ? $_SESSION['auth_user']['profile_picture'] : 'default_profile.jpg'; ?>" 
                    alt="User Profile" 
                    class="img-fluid profileImg">

                        <div class="btn-group dropend">
                            <button type="button" class="editProfile position-absolute top-0 start-100 translate-middle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-camera"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <!-- Dropdown menu links -->
                                
                                <li><button id="seeProfileBtn" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profileModal">See Profile</button></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"data-bs-target="#editProfilePictureModal">Edit profile</a></li>
                            </ul>
                        </div>

                    </div>

                    <!-- Modal for showing profile picture -->
                    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="profileModalLabel">Profile Picture</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="userProfileImageModal">
                                    <img src="php/profile_picture/<?= !empty($_SESSION['auth_user']['profile_picture']) ? $_SESSION['auth_user']['profile_picture'] : 'default_profile.jpg'; ?>" 
                                    alt="User Profile" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for changing profile picture-->
                    <div class="modal fade" id="editProfilePictureModal" tabindex="-1"
                        aria-labelledby="editProfilePictureModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered  modal-md-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProfilePictureModalLabel">Edit Profile Picture</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="profilePictureForm" method="POST" enctype="multipart/form-data"
                                    action="php/update_profile_picture.php">
                                    <div class="modal-body text-center">
                                        <!-- Current Profile Picture -->
                                        <div id="profilePictureContainer">
                                            <img src="php/profile_picture/<?= !empty($_SESSION['auth_user']['profile_picture']) ? $_SESSION['auth_user']['profile_picture'] : 'default_profile.jpg'; ?>" 
                                            id="currentProfilePicture"
                                            alt="User Profile" 
                                            class="img-fluid img-thumbnail"
                                            width="300"
                                            style="cursor: move;">
                                        </div>

                                        <!-- Crop and Done Buttons -->
                                        <div id="cropControls" style="display: none;" class="my-3">
                                            <button type="button" id="cropButton" class="btn btn-primary">Crop</button>
                                            <button type="button" id="doneButton" class="btn btn-success"
                                                style="display: none;">Done</button>
                                        </div>

                                        <!-- File Input -->
                                        <div class="mb-3">
                                            <label for="profilePicture" class="form-label">Choose a new profile
                                                picture:</label>
                                            <input type="file" class="form-control" id="profilePicture"
                                                name="profile_picture" accept="image/*" required>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="change_profile_btn" class="btn btn-primary" id="saveChangesButton">Save
                                            Changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                    <div>
                        <h4 class="profile-name"><?= $_SESSION['auth_user']['firstname'] . ' ' . $_SESSION['auth_user']['lastname']; ?></h4>    
                        <p class="profile-email"><?= $_SESSION['auth_user']['email']; ?></p>
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

                    <li class="sidebar-item1">
                        <a href="vol_account_settings.php" class="sidebar-link py-3">
                            <i class="fa-solid fa-gear"></i>Profile Settings
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="javascript:void(0);" class="sidebar-link py-3" onclick="showConfirmModal()">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </a>
                    </li>

                    <div id="logoutModal" class="modal">
                        <div class="modal-content">
                            <span class="close-btn" onclick="closeModal()">&times;</span>
                            <h3 class="message">Are you sure you want to log out?</h3>
                            <div class="animated-character">
                                <img src="img/logout.gif" alt="Waving Character">
                            </div>
                            <a href="vol_logout.php" class="confirm-btn btn text-white">Yes, log me out</a>

                            
                            <!-- 
                                <button class="confirm-btn" onclick="logout()">Yes, log me out</button>
                            -->

                        </div>
                    </div>

                    <style>
                        /**
                        .modal {
                            display: none; 
                            position: fixed;
                            z-index: 1; 
                            left: 0;
                            top: 0;
                            width: 100%;
                            height: 100%;
                            background-color: rgba(0, 0, 0, 0.5); 
                            overflow: auto;
                            padding-top: 60px;
                        }

                        .message{
                            font-size: 18px;
                            font-weight: bold;
                        }

                        .modal-content {
                            background-color: #fff;
                            margin: 5% auto;
                            padding: 20px;
                            border: 1px solid #888;
                            width: 70%;
                            top: 50px;
                            max-width: 400px;
                            text-align: center;
                        }
                            */

                        #logoutModal {
                            display: none; 
                            position: fixed;
                            z-index: 1; 
                            left: 0;
                            top: 0;
                            width: 100%;
                            height: 100%;
                            background-color: rgba(0, 0, 0, 0.5); 
                            overflow: auto;
                            padding-top: 60px;
                        }

                        #logoutModal .message{
                            font-size: 18px;
                            font-weight: bold;
                        }

                        #logoutModal .modal-content {
                            background-color: #fff;
                            margin: 5% auto;
                            padding: 20px;
                            border: 1px solid #888;
                            width: 70%;
                            top: 50px;
                            max-width: 400px;
                            text-align: center;
                        }

                        .close-btn {
                            color: #aaa;
                            font-size: 28px;
                            font-weight: bold;
                            position: absolute;
                            top: 10px;
                            right: 20px;
                        }

                        .close-btn:hover,
                        .close-btn:focus {
                            color: black;
                            text-decoration: none;
                            cursor: pointer;
                        }

                        .confirm-btn,
                        .cancel-btn {
                            background-color: #4CAF50; 
                            color: white;
                            padding: 10px 20px;
                            margin: 10px;
                            border: none;
                            cursor: pointer;
                            border-radius: 5px;
                            font-size: 16px;
                        }

                        .confirm-btn:hover {
                            background-color: #45a049;
                        }

                        .cancel-btn {
                            background-color: #f44336; 
                        }

                        .cancel-btn:hover {
                            background-color: #da190b;
                        }

                        .animated-character img {
                            width: 130px;
                            animation: wave 1.5s ease-in-out infinite;
                        }

                    </style>

                    <script>
                        function showConfirmModal() {
                            document.getElementById("logoutModal").style.display = "block";
                        }

                        function closeModal() {
                            document.getElementById("logoutModal").style.display = "none";
                        }

                        function logout() {
                            window.location.href = "user_login.php";
                        }
                    </script>

                </ul>
            </div>
        </aside>

        <!-- Main Component -->
        <div class="main">

            <div class="dashboard-header d-flex justify-content-between align-items-center shadow-sm">
                <div class="d-flex align-items-center">
                    <img src="img/user_logo.png" alt="DPPAM Logo" height="60" width="60" class="img-fluid me-3">
                    <h3 class="dashboard-header-title mb-0">DPPAM Volunteer Portal</h3>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <button type="button" class="btn"><i class="fa-solid fa-bell btn-icon"></i></button>
                </div>
            </div>

            
            <nav class="navbar navbar-expand px-3 navbar-light">
                <!-- Button for sidebar toggle -->
                <button class="btn toggle-btn" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>

            <main class="container p-5" style="max-width: 950px; margin-top: 10px;">

                <div>
                    
                    <h3 class="message-1">Account Settings</h3>

                    <!--DASHBOARD CONTENT-->

                    <section class="contentBox1 p-1">
                        <div class="row1">
                            <div class="col1 d-flex1 flex-column justify-content-center align-items-center gap-2">

                                <!-- Edit Profile -->
                                <div class="box-container1">
                                    <a href="vol_account_editprofile.php" class="btn d-flex flex-row justify-content-between align-items-center w-100">
                                        <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                            <div>
                                              <i class="fa-solid fa-user fs-5"></i>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-start">Edit Profile</span>
                                                <span class="text-muted">Change profile name, number, email.</span>
                                            </div>
                                        </div>

                                        <div>
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </a>
                                </div>

                                <!-- Change Password -->
                                <div class="box-container1">
                                    <a href="vol_account_changepass.php" class="btn d-flex flex-row justify-content-between align-items-center w-100">
                                        <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                            <div>
                                                <i class="fa-solid fa-lock fs-5"></i>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-start">Change Password</span>
                                                <span class="text-muted">Update and strengthen account security.</span>
                                            </div>
                                        </div>

                                        <div>
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </a>
                                </div>

                                <!-- QR Codes -->
                                <div class="box-container1">
                                    <a href="vol_account_qr.php" class="btn d-flex flex-row justify-content-between align-items-center w-100">
                                        <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                            <div>
                                                <i class="fa-solid fa-qrcode fs-5"></i>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-start">Attendance</span>
                                                <span class="text-muted">My QR Code for Attendance Monitoring.</span>
                                            </div>
                                        </div>

                                        <div>
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </a>
                                </div>

                                <!-- Notification -->
                                <div class="box-container2">
                                    <div class="d-flex flex-row justify-content-between align-items-center ps-3 w-100">
                                        <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                            <div>
                                                <i class="fa-solid fa-bell fs-5"></i>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-start">Notification</span>
                                                <span class="text-muted">Customize your notification preferences.</span>
                                            </div>
                                        </div>

                                        <div>
                                            <!-- Toggle Button -->
                                            <button type="button" class="btn" onclick="toggleOnOff()" id="toggleButton">
                                                <i id="toggleIcon" class="bi bi-toggle-on"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

                </div>
            </main>
        </div>
    </div>


    <script src="vol-portal.js"></script>
    <!--bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
    </script>
</body>
</html>