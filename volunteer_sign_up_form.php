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

    <!--BOOTSTRAP ICON CDN-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


  <title>Volunteer - Sign Up</title>
</head>

<body>

  <!--MAIN CONTENT-->


  <section class="signInContainer p-5" style="height: 100%;">
    <h1 class="text-center">DPPAM Voting</h1>

    <form action="php/sign_up_process.php" method="POST" 
    class="container mt-5 py-5 px-4 shadow-lg rounded" 
    style="max-width: 500px; background-color: #f9f9f9;">

    <div class="d-flex flex-column justify-content-start align-items-center mb-3">
        <div class="d-flex flex-row justify-content-center align-items-center gap-5 mb-3">
            <img src="img/DPPAMLOGO.png" alt="" height="80px" width="80px">
            <h2>Sign Up</h2>
            <img src="img/PPCRVLOGO.png" alt="" height="80px" width="80px">
        </div>
    </div>

    <!-- Hidden Role Field -->
    <input type="hidden" class="form-control" name="role" value="Volunteer">

    <!-- First Name Input -->
    <div class="mb-3">
        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" required>
    </div>

    <!-- Last Name Input -->
    <div class="mb-3">
        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" required>
    </div>

    <!-- Phone Number Input -->
    <div class="mb-3">
        <input type="tel" class="form-control" name="phone_num" id="phone" placeholder="Phone: (XXXX-XXX-YYYY)" 
               maxlength="13" pattern="\d{4}-\d{3}-\d{4}" inputmode="numeric" required 
               oninput="validatePhoneInput(this)">
    </div>

    <!-- Email Input -->
    <div class="mb-3">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email address" required>
    </div>

    <!-- Password Input -->
    <div class="mb-3 position-relative">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" oninput="checkPasswordStrength()" required>
        <button type="button" class="btn position-absolute top-50 start-100 translate-middle" style="margin-left: -25px;" onclick="togglePassword('password', 'currentIcon')">
            <i id="currentIcon" class="bi bi-eye-slash"></i>
        </button>
    </div>
    <div id="password-strength" class="text-danger"></div> <!-- Password strength indicator -->

    <!-- Confirm Password Input -->
    <div class="mb-3 position-relative">
        <input type="password" class="form-control py-2" name="confirm_password" id="confirmPass" placeholder="Confirm password" oninput="checkPasswordsMatch()" required>
        <button type="button" class="btn position-absolute top-50 start-100 translate-middle" style="margin-left: -25px;" onclick="togglePassword('confirmPass', 'newIcon')">
            <i id="newIcon" class="bi bi-eye-slash"></i>
        </button>
    </div>
    <div id="password-match-message" class="mt-2"></div> <!-- Password match message -->

    <!-- Submit Button -->
    <div class="d-grid gap-2 mt-3">
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </div>

    <!-- Link to Login -->
    <div class="d-grid mt-3">
        <p class="text-center">Already have an account? <a href="user_login.php" class="text-primary">Login</a></p>
    </div>
</form>


      
      
 </section>




 <script>
    function togglePassword(inputId, iconId) {
        const passwordField = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        // Toggle the password field's type between "password" and "text"
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye"); // Change icon to open eye
        } else {
            passwordField.type = "password";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash"); // Change icon to eye with slash
        }
    }


    // Restrict user to input letter in phone number field
    function validatePhoneInput(input) {
        // Allow only numeric characters and hyphens, and format as 09XX-XXX-YYYY
        input.value = input.value.replace(/[^0-9-]/g, '').replace(/(\d{4})(\d{3})(\d{4})/, '$1-$2-$3');
    }





    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === "password") {
            input.type = "text";
            icon.className = "bi bi-eye";
        } else {
            input.type = "password";
            icon.className = "bi bi-eye-slash";
        }
    }

    function checkPasswordStrength() {
        const password = document.getElementById("password").value;
        const strengthIndicator = document.getElementById("password-strength");
        let strength = "Weak";
        let strengthClass = "text-danger";

        // Check password strength using regex for different patterns
        const lengthCheck = password.length >= 8;
        const upperCheck = /[A-Z]/.test(password);
        const lowerCheck = /[a-z]/.test(password);
        const numberCheck = /\d/.test(password);
        const specialCheck = /[!@#$%^&*(),.?":{}|<>]/.test(password);

        // Determine strength based on criteria
        if (lengthCheck && upperCheck && lowerCheck && numberCheck && specialCheck) {
            strength = "Very Strong";
            strengthClass = "text-success";
        } else if (lengthCheck && upperCheck && lowerCheck && numberCheck) {
            strength = "Strong";
            strengthClass = "text-info";
        } else if (lengthCheck && (upperCheck || lowerCheck) && numberCheck) {
            strength = "Medium";
            strengthClass = "text-warning";
        } else if (password.length >= 6) {
            strength = "Weak";
            strengthClass = "text-danger";
        }

        // Update the strength indicator
        strengthIndicator.textContent = strength;
        strengthIndicator.className = `mb-3 ${strengthClass}`;
    }


    // Function to check if passwords match
    function checkPasswordsMatch() {
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirmPass").value;
        const passwordMatchMessage = document.getElementById("password-match-message");

        if (password === confirmPassword) {
            passwordMatchMessage.textContent = "Passwords match!";
            passwordMatchMessage.className = "mt-2 text-success";
        } else {
            passwordMatchMessage.textContent = "Passwords do not match.";
            passwordMatchMessage.className = "mt-2 text-danger";
        }
    }
    
</script>
  




  <!--bootstrap js-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>