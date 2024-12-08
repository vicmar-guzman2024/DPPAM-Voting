<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/vol-sign-up.css">
  <!--bootstrap 5-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!--Font awesome CDN-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src= 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> 


  <title>Volunteers - Sign Up Form</title>

</head>

<body>

  <!--MAIN CONTENT-->

  <div class="container py-5">
    <h4>Add Information</h4>
    <p class="text-muted">Input your personal information and save changes</p>
    <div class="row justify-content-center border"> 
        <div class="col-12"> 
            <div class="px-0 pt-4 pb-0 mt-3 mb-3"> 
            <form id="form" class="px-5" action="php/registration.php" method="post" enctype="multipart/form-data">
    <ul id="progressbar" class="pe-4"> 
        <li class="active" id="step1"> 
            <strong>Details</strong> 
        </li> 
        <li id="step2"><strong>Assignments</strong></li> 
        <li id="step3"><strong>Pledge</strong></li> 
        <li id="step4"><strong>Documents</strong></li> 
    </ul> 
    <br>

    <!-- STEP 1 -->
    <fieldset> 
        <h2>Step 1: Input your personal information</h2> 
        <hr class="text-dark">
        <div class="row">
        <div class="col-md-6 mb-4">
        <label for="name" class="form-label">Fullname</label>
        <div class="input-group">
            <input type="text" aria-label="First name" class="form-control" placeholder="First name" name="fname" id="firstname">
            <input type="text" aria-label="Middle name" class="form-control" placeholder="Middle name" name="midname" id="middlename">
            <input type="text" aria-label="Last name" class="form-control" placeholder="Last name" name="lname" id="lastname">
        </div>
        <input type="hidden" name="full_name" id="fullName">
        </div>
            <div class="col-md-6 mb-4">
                <label for="nickname" class="form-label">Nickname</label>
                <input type="text" class="form-control" id="nickname" name="nickname">
            </div>

            <div class="col-md-2 mb-4">
                <label for="birthDate" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="birthDate" name="birthdate">
            </div>

            <div class="col-md-2 mb-4">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>

            <div class="col-md-2 mb-4">
                <label for="sex" class="form-label">Sex</label>
                <select id="sex" name="gender" class="form-select">
                    <option selected>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="col-md-3 mb-4">
                <label for="civilStatus" class="form-label">Civil Status</label>
                <select id="civilStatus" name="civil_status" class="form-select">
                    <option selected>Single</option>
                    <option>Married</option>
                    <option>Divorced</option>
                    <option>Widowed</option>
                    <option>Separated</option>
                </select>
            </div>
            <div class="col-md-3 mb-4">
                <label for="citizenship" class="form-label">Citizenship</label>
                <input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="Filipino">
            </div>

            <div class="col-md-9 mb-4">
                <label for="address" class="form-label">Residence Address</label>
                <input type="text" class="form-control" id="address" name="residence_address">
            </div>
            <div class="col-md-3 mb-4">
                <label for="tel" class="form-label">Telephone No.</label>
                <input type="tel" class="form-control" id="tel" name="telephone_no">
            </div>

            <div class="col-md-4 mb-4">
                <label for="occupation" class="form-label">Occupation</label>
                <input type="text" class="form-control" id="occupation" name="occupation">
            </div>
            <div class="col-md-4 mb-4">
                <label for="celNo" class="form-label">Cellphone No.</label>
                <input type="tel" class="form-control" id="celNo" name="cellphone_no">
            </div>
            
            <div class="col-md-4 mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="col-md-9 mb-4">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company_name">
            </div>
            <div class="col-md-3 mb-4">
                <label for="tel" class="form-label">Telephone No.</label>
                <input type="tel" class="form-control" id="tel" name="company_telephone_no">
            </div>
        </div>
        <input type="button" name="next-step" class="next-step" value="Next" /> 
    </fieldset>  
    
    

    <!-- STEP 2 -->
    <fieldset> 
        <h2>Step 2: Previous roles and current preferred assignments</h2> 
        <hr class="dark-text">
        <div class="row">
            <div class="col-md-9 mb-4">
                <label for="orgMember" class="form-label">Parish Organization Membership</label>
                <input type="text" class="form-control" id="orgMember" name="ppcrv_org_membership" placeholder="Committees">
            </div>

            <div class="col-md-3 mb-4">
                <label for="position" class="form-label">Position</label>
                <input type="text" class="form-control" id="position" name="position">
            </div>

            
            <div class="col-md-6 mb-4">
                <label for="years_in_service" class="form-label">For current PPCRV Member: No. of years in service</label>
                <input type="number" class="form-control" id="years_in_service" name="years_in_service">
            </div>

            <div class="col-md-6 mb-4">
                <label for="dateExp" class="form-label">Previous PPCRV Experience Date</label>
                <input type="date" class="form-control" id="dateExp" name="prev_ppcrv_experience_date">
            </div>

            <div class="col-md-9 mb-4">
                <label for="prevExpAss" class="form-label">Previous PPCRV Experience Assignment</label>
                <select id="prevExpAss" name="prev_ppcrv_experience_assignment" class="form-select">
                    <option selected disabled>Select options</option>
                    <option value="Previous Assignment 1">Previous Assignment 1</option>
                    <option value="Previous Assignment 2">Previous Assignment 2</option>
                    <option value="Previous Assignment 3">Previous Assignment 3</option>
                    <option value="Others">Others</option>
                </select>

                <div id="selected-prevExpAss" class="mt-3">
                    <!-- Selected options with 'x' buttons will appear here -->
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <label for="otherPrevExpAss" class="form-label">Others</label>
                <input type="text" class="form-control" id="otherPrevExpAss" name="other_prev_experience_assignment" disabled>
            </div>

                <!-- REGISTERED VOTER??? -->
                    <div class="col-12 mb-4">
                    <!-- Question and Radio Buttons -->
                    <div class="d-flex flex-column flex-md-row gap-3 align-items-center">
                        <p class="mb-0">Are you a registered voter?</p>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="voterStatus" id="yes" value="Yes">
                        <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="voterStatus" id="no" value="No">
                        <label class="form-check-label" for="no">No</label>
                        </div>
                    </div>

                    <!-- Conditional Inputs -->
                    <div class="row g-3 mt-3">
                        <!-- Precinct Number (Yes) -->
                        <div class="col-md-6 d-flex align-items-center gap-2">
                        <label for="precinctNo" class="form-label text-nowrap mb-0">If Yes, Precinct No.</label>
                        <input type="text" class="form-control" id="precinctNo" name="precinctNo" placeholder="Precinct No.">
                        </div>
                        <!-- Polling Place (Yes) -->
                        <div class="col-md-6 d-flex align-items-center gap-2">
                        <label for="pollingPlace" class="form-label text-nowrap mb-0">Polling Place</label>
                        <input type="text" class="form-control" id="pollingPlace" name="pollingPlace" placeholder="Polling Place">
                        </div>
                        <!-- Reason (No) -->
                        <div class="col-md-6 d-flex align-items-center gap-2">
                        <label for="no_reason" class="form-label text-nowrap mb-0">If No, Reason Why</label>
                        <input type="text" class="form-control" id="no_reason" name="no_reason" placeholder="Reason">
                        </div>
                    </div>
                    </div>


            <div class="col-md-9 mb-4">
                <label for="prefVolAss" class="form-label">Preferred Activity Assignments</label>
                <select id="prefVolAss" name="preferred_volunteer_assignment" class="form-select">
                    <option selected disabled>Select options</option>
                    <option value="Preferred Assignment 1">Preferred Assignment 1</option>
                    <option value="Preferred Assignment 2">Preferred Assignment 2</option>
                    <option value="Preferred Assignment 3">Preferred Assignment 3</option>
                    <option value="Others">Others</option>
                </select>

                <div id="selected-prefVolAss" class="mt-3">
                    <!-- Selected options for Preferred Volunteer Assignments will appear here -->
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <label for="otherPrefVolAss" class="form-label">Others</label>
                <input type="text" class="form-control" id="otherPrefVolAss" name="other_preferred_volunteer_assignment" disabled>
            </div>
        </div>

        <input type="button" name="next-step" class="next-step" value="Next" /> 
        <input type="button" name="previous-step" class="previous-step" value="Previous" /> 
    </fieldset> 

    <!-- STEP 3 -->
    <fieldset> 
        <h2>Step 3: Confirm your pledge to volunteer and support our mission</h2> 
        <hr class="text-dark mb-5">
        
        <h3 class="text-center mb-5">PPCRV Pledge</h3>

        <p class="lh-lg text-center">Lorem ipsum dolor sit amet...</p>

        <div class="form-check mt-5 d-flex flex-row justify-content-center align-items-center gap-3">
            <input class="form-check-input" type="radio" name="pledge" id="pledge" required>
            <label class="form-check-label text-muted fst-italic" for="pledge">By selecting this, you commit to fulfilling your volunteer responsibilities.</label>
        </div>

        <input type="button" name="next-step" class="next-step" value="Next" /> 
        <input type="button" name="previous-step" class="previous-step" value="Previous" /> 
    </fieldset> 

    <!-- STEP 4 -->
    <fieldset>  
        <h2>Step 4: Upload the required documents to complete your registration</h2> 
        <hr class="text-dark mb-5">
        
        <!-- 1X1 ID -->
        <div class="mb-3">
            <label class="custom-file-input form-label" for="oneXoneID">
                <i class="icon fas fa-upload"></i>
                <input type="file" id="oneXoneID" name="one_x_one_id">
                <span class="file-name" id="oneXoneIDfileName">Upload your 1x1 picture</span>
            </label>
        </div>

        <!-- VALID ID -->
        <div class="mb-3">
            <label class="custom-file-input form-label" for="validID">
                <i class="icon fas fa-upload"></i>
                <input type="file" id="validID" name="valid_id" required>
                <span class="file-name" id="validIDfileName">Upload any valid ID</span>
            </label>
        </div>
        
        <input type="submit" name="next-step" class="next-step" value="Submit" /> 
        <input type="button" name="previous-step" class="previous-step" value="Previous" /> 
    </fieldset>
</form>

            </div> 
        </div> 
    </div> 
</div> 


  

    <!--Volunteer Sign Up JS-->
   <script src="vol-sign-up.js"></script>


   


  <!--bootstrap js-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>