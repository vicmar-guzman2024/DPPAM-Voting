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

  
  
 

  <title>Assignments</title>
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

                    <li class="sidebar-item1">
                        <a href="vol_registration_info.php" class="sidebar-link py-3">
                        <i class="fa-solid fa-address-card"></i>Registration Info
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="vol_attachments.php" class="sidebar-link py-3">
                        <i class="fa-solid fa-file"></i>My Attachments
                        </a>
                    </li>

                    <li class="sidebar-item">
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

            <main class="container-fluid p-5">

                <div>
                    
                    <div class="d-flex flex-row align-items-center mb-4 gap-3">
                        <div><a href="vol_registration_info.php" class="btn"><i class="bi bi-chevron-left"></i></a></div>
                        <div>
                            <h3 class="text-dark mb-1">Volunteer Form Information</h3>
                            <h6 class="text-muted">Assignments</h6>
                        </div>
                    </div>

                    <!--DASHBOARD CONTENT-->

                    <form action="" class="contentBox p-5">
                        <!--STEP 2-->
                        <div class="row">
                            <div class="col-md-9 mb-4">
                                <label for="orgMember" class="form-label">PPCRV Organization Membership</label>
                                <input type="text" class="form-control" id="orgMember" placeholder="Committees">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="dateExp" class="form-label">Previous PPCRV Experience Date</label>
                                <input type="date" class="form-control" id="dateExp">
                            </div>

                            <div class="col-md-9 mb-4">
                                <label for="prevExpAss" class="form-label">Previous PPCRV Experience Assignment</label>
                                <select id="prevExpAss" class="form-select">
                                    <option selected>Ewan ano ba 'to</option>
                                    <option>...</option>
                                    <option>...</option>
                                    <option>...</option>
                                  </select>
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="otherPrevExpAss" class="form-label">Others</label>
                                <input type="text" class="form-control" id="otherPrevExpAss">
                            </div>

                            <div class="col-md-9 mb-4">
                                <label for="prefVolAss" class="form-label">Preferred Volunteer Assignments</label>
                                <select id="prefVolAss" class="form-select">
                                    <option selected>Ewan ano ba 'to</option>
                                    <option>...</option>
                                    <option>...</option>
                                    <option>...</option>
                                  </select>
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="otherPrevExpAss" class="form-label">Others</label>
                                <input type="text" class="form-control" id="otherPrevExpAss">
                            </div>
                        </div>


                        <input type="button" name="save" class="bg-success btn text-white px-5" value="Save" /> 
                    </form>

                    
                    
                        

                    
                      
                    
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