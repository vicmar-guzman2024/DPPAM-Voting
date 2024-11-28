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

  
  
 

  <title>Volunteer's Portal</title>
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

                    <li class="sidebar-item1">
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
                        <a href="vol_logout.php" class="sidebar-link py-3">
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
                    <img src="img/user_logo.png" alt="DPPAM Logo" height="50px" width="50px" class="img-fluid">
                    <h3 class="navbar-title">DPPAM Volunteer Portal</h3>
                </div>

                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <button type="button" class="btn"><i class="fa-solid fa-bell btn-icon"></i></button> 
                </div>
            </nav>

            <main class="container-fluid p-5">

                <div>
                    
                    <h3 class="text-dark mb-1">Welcome back, Vicmar!</h3>
                    <p class="text-muted mb-4">Volunteer since: 09/22/2020</p>

                    <!--DASHBOARD CONTENT-->
 
                    <section class="contentBox p-3">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2 dashboard">

                            <div class="col">
                                <div class="p-2 d-flex flex-column justify-content-center align-items-center border mb-2">
                                        <div>
                                            <p class="text-muted">You are currently registered as a:</p>
                                        </div>
                                        <div><h4>POLL WATCHER</h4></div>
                                  </div>

                                  <div class="p-2 d-flex flex-row justify-content-center align-items-center border gap-2">
                                    <div>
                                        <img src="img/pollWatcher.png" alt="" style="width: 100%; height: auto;" class="img-fluid">
                                    </div>
                                    <div><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis officiis excepturi iure veniam odio saepe sequi doloremque vero, veritatis et.</p></div>
                              </div>
                            </div>

                            <div class="col">
                              <div class="p-2 d-flex flex-column justify-content-center align-items-center border mb-2">
                                      <div>
                                          <p class="text-muted">You assigned school:</p>
                                      </div>
                                      <div><h4 class="text-center">Quezon Elementary School</h4></div>
                                </div>

                                <div class="p-2 d-flex flex-row justify-content-center align-items-center border gap-2">
                                  <div>
                                      <img src="img/assignedSchool.png" alt="" style="width: 100%; height: auto;">
                                  </div>
                                  <div><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis officiis excepturi iure veniam odio saepe sequi doloremque vero, veritatis et.</p></div>
                            </div>
                          </div>

                          <div class="col">
                            <div class="p-2 d-flex flex-column justify-content-center align-items-center border mb-2">
                                    <div>
                                        <p class="text-muted">Your upcoming scheduled event:</p>
                                    </div>
                                    <div><h4>Election Day Poll Watching</h4></div>
                              </div>

                              <div class="p-2 d-flex flex-row justify-content-center align-items-center border gap-2">
                                <div>
                                    <img src="img/elecDay.png" alt="" style="width: 100%; height: auto;">
                                </div>
                                <div><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis officiis excepturi iure veniam odio saepe sequi doloremque vero, veritatis et.</p></div>
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
    crossorigin="anonymous"></script>
</body>

</html>