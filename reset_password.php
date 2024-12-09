<?php
session_start();
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


  <title>Reset Password</title>
</head>

<body>

  <!--MAIN CONTENT-->

  


  <section class="signInContainer d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">  

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



    <div class="containerOfLeftRight row row-cols-lg-2 row-cols-1 justify-content-between align-items-start">

        <div class="leftContainer col-lg-6 col-12 d-flex flex-row justify-content-center align-items-start" style="height: 60vh;">
            <div><img src="img/DPPAMLOGO.png" alt="" class="img-fluid pt-5" style="width: 100px; height: auto;"></div>
            <div><h4 class="text-center text-white mt-5">Diocese of Kalookan - <br>Public and Political Affairs Ministry</h4></div>
            <div><img src="img/PPCRVLOGO.png" alt="" class="img-fluid pt-5" style="width: 100px; height: auto;"></div>
        </div>
        

        
        <form class="col-lg-5 col-12 p-4 rightContainer me-5" action="php/reset_password_process.php" method="POST">
    <h4 class="mb-4">Reset Password</h4>

    <div class="input-group mb-4">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
        <input type="text" name="email" id="username" class="form-control" placeholder="Email Address" required>
    </div>


    <div>
        <button class="btn btn-primary w-100" name="reset_pass_btn" type="submit">Send Password Reset Link</button>
    </div>
</form>

    </div>
  </section>




  <!--bootstrap js-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>