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
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  
  <!-- Font awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- BOOTSTRAP ICON CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <title>Volunteer Form Information</title>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <aside id="sidebar">
      <div class="" style="min-height: 100vh;">
        <div class="d-flex flex-column justify-content-center align-items-center mt-5 gap-3">
           <div class="position-relative">
              <img src="<?php echo htmlspecialchars($image_path); ?>" alt="User Profile" class="img-fluid profileImg">
                <div class="btn-group dropend">
                  <button type="button" class="editProfile position-absolute top-0 start-100 translate-middle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-camera"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li><button id="seeProfileBtn" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profileModal">See Profile</button></li>
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal"data-bs-target="#editProfilePictureModal">Edit profile</a></li>
                  </ul>
                </div>
             </div>

            <div class="modal fade" id="editProfilePictureModal" tabindex="-1" aria-labelledby="editProfilePictureModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editProfilePictureModalLabel">Edit Profile Picture</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form id="profilePictureForm" method="POST" enctype="multipart/form-data" action="php/update_profile_picture.php">
                    <div class="modal-body text-center">
                                        <div id="profilePictureContainer" style="height: 300px; width: 100%;">
                                            <img id="currentProfilePicture"
                                                src="<?php echo htmlspecialchars($image_path); ?>"
                                                class="img-thumbnail img-fluid mb-3" alt="Profile Picture" width="300"
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
                                        <button type="submit" class="btn btn-primary" id="saveChangesButton">Save
                                            Changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                    <div>
                        <h4 class="profile-name"><?php echo htmlspecialchars($firstname . ' ' . $lastname); ?></h4>
                        <p class="profile-email"><?php echo htmlspecialchars($username); ?></p>
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
            <a href="vol_account_settings.php" class="sidebar-link py-3">
            <i class="fa-solid fa-right-from-bracket"></i>Logout
            </a>
          </li>
        </ul>
      </div>
    </aside>

    <!-- Main Content -->
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
          <h3 class="message-1">Volunteer Registration Information</h3>

          <!-- Table -->
          <section class="contentBox1 p-3">
            <div class="row headers mb-3">
                <div class="col-3 text-center"><strong>Status</strong></div>
                <div class="col-3 text-center"><strong>Registration Process</strong></div>
                <div class="col-3 text-center"><strong>Activity Log</strong></div>
                <div class="col-3 text-center"><strong>Action</strong></div>
            </div>

            <div class="row rowBox">
                <div class="col-3 text-center">
                    <span class="bg-success text-white status rounded">Complete</span>
                </div>
                <div class="col-3 text-center pd1">Personal Details</div>
                <div class="col-3 text-center">
                    <span class="text-muted pd">Modified at:</span> <strong>10/22/2024</strong>
                </div>
                <div class="col-3 text-center">
                    <a href="personal_details.html"><i class="bi bi-pencil-square fs-5"></i></a>
                </div>
            </div>

            <div class="row rowBox">
                <div class="col-3 text-center">
                    <span class="bg-danger text-white status rounded">Incomplete</span>
                </div>
                <div class="col-3 text-center pd1">Assignments</div>
                <div class="col-3 text-center">
                    <span class="text-muted">Modified at:</span> <strong>10/22/2024</strong>
                </div>
                <div class="col-3 text-center">
                    <a href="assignments.html"><i class="bi bi-pencil-square fs-5"></i></a>
                </div>
            </div>

            <div class="row rowBox">
                <div class="col-3 text-center">
                    <span class="bg-success text-white status rounded">Complete</span>
                </div>
                <div class="col-3 text-center pd1">Attached Documents</div>
                <div class="col-3 text-center">
                    <span class="text-muted">Modified at:</span> <strong>10/22/2024</strong>
                </div>
                <div class="col-3 text-center">
                    <a href="attached_documents.html"><i class="bi bi-pencil-square fs-5"></i></a>
                </div>
            </div>
          </section>
        </div>
      </main>
    </div>
  </div>

  <!-- SCRIPT FOR UPDATING USERS' PROFILE PICTURE -->
  <script src="profile_picture_handler.js"></script>
  <script src="vol-portal.js"></script>

  <!-- CROPPER JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

  <!-- Scripts -->
  <script src="vol-portal.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
          crossorigin="anonymous"></script>
</body>

</html>
