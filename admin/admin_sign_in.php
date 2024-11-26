<?php
include ("database/condb.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/admin-sign-in.css">
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

  <section class="signInContainer d-flex flex-row justify-content-center align-items-center" style="height: 100vh;">

    <div class="containerOfLeftRight row row-cols-lg-2 row-cols-1 justify-content-between align-items-center">

        <div class="leftContainer d-lg-flex d-none flex-row justify-content-center align-items-start" style="height: 60vh;">
            <div><img src="../img/DPPAMLOGO.png" alt="" class="img-fluid pt-5" style="width: 100px; height: auto;"></div>
            <div><h4 class="text-center text-white mt-5">Diocese of Kalookan - <br>Public and Political Affairs Ministry</h4></div>
            <div><img src="../img/PPCRVLOGO.png" alt="" class="img-fluid pt-5" style="width: 100px; height: auto;"></div>
        </div>
        

        
        <form action="database/sign_in.php" method="POST" class="col-lg-5 col-12 p-4 rightContainer me-5"> 
        <div class="d-lg-none d-flex flex-row justify-content-around align-items-center gap-4 mb-3">
            <div><img src="../img/DPPAMLOGO.png" alt="" class="img-fluid" style="width: 100px; height: auto;"></div>
            <div><h4 class="text-center text-dark">Diocese of Kalookan - <br>Public and Political Affairs Ministry</h4></div>
            <div><img src="../img/PPCRVLOGO.png" alt="" class="img-fluid" style="width: 100px; height: auto;"></div>
        </div>
        <h4 class="mb-4">Sign In</h4>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
  <input type="text" class="form-control" name="USERNAME" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
  <input type="password" class="form-control" name="PASSWORD" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
</div>

<div class="row mb-4">
  <div class="col">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Remember me</label>
  </div>
  <div class="col">
    <a href="" class="float-end">Forgot Password?</a>
  </div>
</div>
<div>
  <button class="btn btn-primary w-100" name="login">Login</button>
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