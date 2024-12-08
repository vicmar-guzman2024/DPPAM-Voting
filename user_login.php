<?php
session_start();

$username_input = isset($_SESSION['username_input']) ? $_SESSION['username_input'] : '';
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
unset($_SESSION['username_input'], $_SESSION['error_message']); // Clear after usage

// Retrieve success message, if any
$success_sign_up_message = isset($_SESSION['success_sign_up_message']) ? $_SESSION['success_sign_up_message'] : '';
unset($_SESSION['success_sign_up_message']); // Clear message after use

// LOGIN FIRST (ALERT)
if (isset($_SESSION['login_required_alert'])) {
    $modalMessage = htmlspecialchars($_SESSION['login_required_alert']);
    unset($_SESSION['login_required_alert']); 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <!--bootstrap 5-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!--Font awesome CDN-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


  <title>Sign In</title>
</head>

<body>

  <!--MAIN CONTENT-->

  


  <section class="signInContainer d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">  

    <!-- Display Success Message -->
  <?php if (!empty($success_sign_up_message)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($success_sign_up_message) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

    
  <!-- DISPLAY LOGIN ALERT (MODAL) -->
        <?php if (!empty($modalMessage)): ?>
        <!-- Simple Modal -->
        <div class="modal fade" id="alertModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Notice!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php echo $modalMessage; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Okay</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Auto-trigger the modal -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var alertModal = new bootstrap.Modal(document.getElementById('alertModal'));
                alertModal.show();
            });
        </script>
    <?php endif; ?>


    <?php
    if(isset($_SESSION['status'])){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h6><?= $_SESSION['status']; ?></h6>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['status']);
    }
    
    ?>



    <div class="containerOfLeftRight row row-cols-lg-2 row-cols-1 justify-content-between align-items-center">

        <div class="leftContainer col-lg-6 col-12 d-flex flex-row justify-content-center align-items-start" style="height: 60vh;">
            <div><img src="img/DPPAMLOGO.png" alt="" class="img-fluid pt-5" style="width: 100px; height: auto;"></div>
            <div><h4 class="text-center text-white mt-5">Diocese of Kalookan - <br>Public and Political Affairs Ministry</h4></div>
            <div><img src="img/PPCRVLOGO.png" alt="" class="img-fluid pt-5" style="width: 100px; height: auto;"></div>
        </div>
        

        
        <form class="col-lg-5 col-12 p-4 rightContainer me-5" action="php/sign_in_process.php" method="POST">
    <h4 class="mb-4">Sign In</h4>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
        <input type="text" name="email" id="username" class="form-control" placeholder="Username" value="<?= htmlspecialchars($username_input) ?>" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
        <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
    </div>

    <div class="row mb-4">
        <div class="col">
            <input type="checkbox" class="form-check-input" name="remember_me" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        <div class="col">
            <a href="" class="float-end">Forgot Password?</a>
        </div>
    </div>
    <div>
        <button class="btn btn-primary w-100" name="login_btn" type="submit">Login</button>
    </div>

    <hr class="text-dark mt-5">
    <div class="col d-flex flex-row justify-content-center align-items-center">
        <p>Don't have an account? <a href="choose_role.html" class="text-primary">Sign Up</a></p>
    </div>
</form>





    </div>

  </section>

  <!-- Error Modal -->
  <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $error_message; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to show the modal -->
    <?php if (!empty($error_message)): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        });
    </script>
    <?php endif; ?>




  <!--bootstrap js-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>