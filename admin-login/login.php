
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THC | LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="/styles/login.css">
</head>
<body>
    <!-- MAIN  -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">


        <div class="row main-row d-flex">
            <!-- LEFT SIDE -->
            <!-- title and logo -->
            <div class="col-xxl-8 col-xl-6 col-l-6 col-md-6 col-sm-0 left-side d-flex flex-column align-items-center justify-content-lg-center justify-content-sm-start ">
                <img src="/img/logo.png" class="img-fluid" alt="">
                <h1 class="h1 header-text text-center mb-5 title" >Town and Country Heights Subdivision</h1>
            </div>

            <!-- RIGHT SIDE -->
            <!-- Input and buttons -->
            <div class="col-xxl-4 col-xl-6 col-l-6  col-md-6 col-sm-12 right-side d-flex flex-column align-items-center justify-content-sm-center   
            justify-content-lg-center">
               <!-- UPPER PART -->
               <div class="row">
                    <div class="header-text text-center mb-5">
                        <img src="/img/login.png" class="login-img "  alt="">
                        <h1 class="h1">WELCOME</h1>
                    </div>
               </div>

                <!-- FORMS -->
               <div class="input-group d-flex justify-content-center text-center">
                    <form action="/includes/loginHandler.php" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>

                        <!-- SUBMIT BUTTON -->
                        <button type="submit" class="login-btn btn btn-primary">LOGIN</button>

                        <!-- FORGOT PASSWORD -->
                        <div class="row forgot-password">
                            <a href="#!">Forgot password?</a>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </div>
</body>
</html>


