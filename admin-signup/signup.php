<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/signup.css">
</head>
<body>
    <div class="container-xxl d-flex justify-content-center align-items-center min-vh-100">

        <div class="row main-row">

            <div class="col-md-6 col-lg-6 col-xs-12 left-side d-flex flex-column align-items-center justify-content-center ">
                <img src="/img/logo.png">
                <h1 class="header-text text-center mb-5 title" >Town and Country Heights Subdivision</h1>
            </div>

            <div class="col-md-6 col-lg-6 col-xs-12 right-side d-flex flex-column align-items-center justify-content-center justify-content-lg-center">
               <div class="row">
                <div class="header-text text-center mb-1">
                    <img src="login.png" class="img-fluid"  alt="">
                    <h1>WELCOME</h1>
                 
                </div>
               </div>

               <div class="input-group d-flex justify-content-center ">
                    
                    <form action="" class="form-group gap-3">
                        <div class="group gap-1">
                            <p class="fs-6 fw-lighter mb-1">Personal Information</p>   
                            <div class="row">
                                          
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Firstname">
                                </div>
    
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <input type="text" class="form-control" id="lastname"  placeholder="Lastname">
                                </div>

                                <div class="col-xs-12 mb-3">
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                                </div>
                                <div class="col-xs-12 mb-3">
                                    <small>Phone Number</small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">+63</div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="912-345-6789">
                                    </div>

                                </div>
                            </div>
    
                        </div>
                        
                        <div class="group">
                            <p class="fs-6 fw-lighter mb-1">Address</p>   

                            <div class="row">
                                                    
                                <div class="col-12 col-xs-12 mb-3">
                                    <input type="text" class="form-control" id="address-line-1" aria-describedby="" placeholder="Street Address">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <input type="text" class="form-control" id="Phase" aria-describedby="" placeholder="Phase">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <input type="text" class="form-control" id="city" aria-describedby="" placeholder="City">
                                </div>
                            </div>
                        </div>

                        <div class="group gap-1">
                            <p class="fs-6 fw-lighter lh-lg mb-1">Create account</p>   

                            <div class="row">
                                                    
                                <div class="col-12 col-xs-12">
                                    <input type="text" class="form-control" id="username" aria-describedby="" placeholder="Username">
                                </div>

                                <div class="col-12 col-xs-12 mt-3">
                                    <input type="text" class="form-control" id="pasword" aria-describedby="" placeholder="Password">
                                </div>

                                <div class="ccol-12 col-xs-12 mt-3">
                                    <input type="text" class="form-control" id="confirm-password" aria-describedby="" placeholder="Confirm Password">
                                </div>
                            </div>                        
                        </div>

                        <button type="submit" class="signup-btn btn btn-primary">SIGNUP</button>

                    </form>
               </div>



            </div>

        </div>
    </div>
</body>
</html>