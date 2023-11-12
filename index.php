<!-- SERVER -->
<?php require_once("./libs/server.php"); ?>

<?php
$userserver = new Server; // Open/Close connection
session_start();
//$userserver->adminSessionLogin();
?>


<?php
// Set HTTP request to POST method if login btn is clicked
if (isset($_POST['login_submit'])) {


    $login_Username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $login_Pass = $_POST["pwd"];
    
    if (empty($login_Username) || empty($login_Pass)) {

        $_SESSION['status'] = "Login Failed!";
        $_SESSION['text'] = "Please fill all the fields!";
        $_SESSION['status_code'] = "warning";
    } else {        
        $query = "SELECT * FROM homeowners_users WHERE username = :username"; //Updated DB 'homeowners_users' table
        $data = ["username" =>  $login_Username];
        $path = "./user/home.php";
        $pass = $login_Pass;
        $userserver->userLogin($query, $data, $pass, $path);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Poppins FONT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Box Icon -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />


  <!------------- CSS Styles  ------------------->

  <!-- General CSS styles -->
  <link rel="stylesheet" href="./styles/general.css">
  <title>TCH System</title>

  <!-- Admin dashboard CSS styles -->
  <link rel="stylesheet" href="./styles/admin-dashboard.css">

  <!-- Login CSS -->
  <link rel="stylesheet" href="./styles/login.css">

  <!-- Signup CSS -->
  <link rel="stylesheet" href="./styles/signup.css">

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>
<body>
    <!-- MAIN  -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">


        <div class="row main-row d-flex">
            <!-- LEFT SIDE -->
            <!-- title and logo -->
            <div class="col-xxl-8 col-xl-6 col-l-6 col-md-6 col-sm-0 left-side d-flex flex-column align-items-center justify-content-lg-center justify-content-sm-start ">
                <img src="./img/logo.png" class="img-fluid" alt="">
                <h1 class="h1 header-text text-center mb-5 title">Town and Country Heights Subdivision</h1>
            </div>

            <!-- RIGHT SIDE -->
            <!-- Input and buttons -->
            <div class="col-xxl-4 col-xl-6 col-l-6  col-md-6 col-sm-12 right-side d-flex flex-column align-items-center justify-content-sm-center   
            justify-content-lg-center">
                <!-- UPPER PART -->
                <div class="row">
                    <div class="header-text text-center mb-5">
                        <img src="./img/login.png" class="login-img " alt="">
                        <h1 class="h1">WELCOME</h1>
                    </div>
                </div>

                <!-- FORMS -->
                <div class="input-group d-flex justify-content-center text-center">
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
                        </div>

                        <div class="form-group">
                            <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>

                        <!-- SUBMIT BUTTON -->
                        <input type="submit" class="login-btn btn btn-primary" name="login_submit" value="Log In"></input>

                        <!-- FORGOT PASSWORD -->
                        <div class="row forgot-password">
                            <a href="#!">Forgot password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   <!-- Bootstrap Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- Script -->
<script src="./scripts/script.js"></script>

<!-- Sweet Alert Script -->
<script src="./libraries/sweetalert.js"></script>

<!-- DataTable JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>


<?php
// ----------------- Pop up Alert ---------------- 
if (isset($_SESSION['status']) && $_SESSION['status'] != "") {
?>
  <script>
    swal({
        title: " <?php echo $_SESSION['status'] ?>",
        text: "<?php echo $_SESSION['text'] ?>",
        icon: "<?php echo $_SESSION['status_code'] ?>",
        buttons: "Okay",
      })
      .then((buttons) => {
        if (buttons) {
          <?php
          unset($_SESSION['status']);
          unset($_SESSION['text']);
          unset($_SESSION['status_code']);
          // session_unset();
          // session_destroy();
          ?>
        }
      });
  </script>
<?php
}
?>

</body>

</html>