<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCH | SIGNUP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- External CSS for Design -->
    <link rel="stylesheet" href="/styles/signup.css">
</head>
<body>
    <div class="container-xxl d-flex justify-content-center align-items-center min-vh-100">

        <!-- Main  -->
        <div class="row main-row">

            <!-- LEFT SIDE -->
            <!-- Logo and Title -->
            <div class="col-md-6 col-lg-8 col-xs-12 left-side d-flex flex-column align-items-center justify-content-center ">
                <img src="/img/logo.png">

                <h1 class="header-text text-center mb-5 title" >Town and Country Heights Subdivision</h1>
            </div>

            <!-- RIGHT SIDE -->
            <!-- forms -->
            <div class="col-md-6 col-lg-4 col-xs-12 right-side d-flex gap-4 flex-column align-items-center justify-content-center justify-content-lg-center">
               <div class="row">
                <div class="header-text text-center mb-1">
                    <!-- image logo -->
                    <img src="/img/login.png" class="img-fluid"  alt="">
                    <h1>WELCOME</h1>
                 
                </div>
               </div>

               <!-- Form Container -->
               <div class="input-group d-flex justify-content-center ">
                    <form action="/includes/signupHandler.php" method="post" class="form-group gap-3">
                        <div class="group gap-1 personal-information">
                            <!-- Personal Information -->
                            <p class="fs-6 fw-lighter mb-1">Personal Information</p>   
                            <div class="row">
                                          
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                    <input type="text" class="form-control firstname"  name="firstname" id="firstname" placeholder="Firstname">
                                </div>
    
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                    <input type="text" class="form-control lastname" name="lastname"id="lastname"  placeholder="Lastname">
                                </div>

                                <div class="col-xs-12 mb-2">
                                    <input type="email" class="form-control email" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="col-xs-12 mb-2">
                                    <small>Phone Number</small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">+63</div>
                                        </div>
                                        <input type="text" class="form-control phone-number" name="phone-number" id="inlineFormInputGroupUsername" placeholder="912-345-6789">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- ADDRESS -->
                        <div class="group address">
                            <p class="fs-6 fw-lighter mb-1">Address</p>   
                            <div class="row">
                                <div class="col-12 col-xs-12 mb-2">
                                    <input type="text" class="form-control street-address" name="street-address" id="address-line-1" placeholder="Street Address">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                    <input type="text" class="form-control phase" name="phase" id="Phase" placeholder="Phase">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                    <input type="text" class="form-control city" name="city" id="city" placeholder="City">
                                </div>
                            </div>
                        </div>
                        <!-- CREATE ACCOUNT -->
                        <div class="group gap-1 create-account">
                            <p class="fs-6 fw-lighter lh-lg mb-1">Create account</p>   
                            <div class="row">               
                                <div class="col-12 col-xs-12">
                                    <input type="text" class="form-control signup-username" name="username" id="username" placeholder="Username">
                                </div>

                                <div class="col-12 col-xs-12 mt-2">
                                    <input type="password" class="form-control signup-password" id="pasword" placeholder="Password">
                                </div>

                                <div class="ccol-12 col-xs-12 mt-2">
                                    <input type="password" name="pwd" class="form-control confirm-password" id="signup-confirm-password" placeholder="Confirm Password">
                                </div>
                            </div>                    
                        </div>
                        <!-- CHECKBOX RADIO BUTTON -->
                        <div class="group admin-user d-flex justify-content-center align-items-center">
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2 d-flex gap-2 justify-content-center">
                                        <input class="form-check-input" type="radio" name="admin" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Admin
                                          </label>
                                      </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-2 d-flex justify-content-center">
                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2 d-flex justify-content-center gap-2 ">
                                        <input class="form-check-input"
                                        name="homeowner-tenant"
                                        type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Homeowner/Tenant
                                        </label>
                                      </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- SUBMIT BUTTON -->
                        <button type="submit" class="signup-btn btn btn-primary" name="signup">SIGNUP</button>
                    </form>
               </div>
            </div>
        </div>
    </div>
</body>
</html>