<?php
require_once("../includes/header.php");
require_once("../libs/server.php");
?>
<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$server = new Server; // Open/Close connection
session_start();
$server->adminSessionLogin();

?>


<!-- <div class="spinner_wrapper">
  <div class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div> -->
<!-- MAIN  -->
<div class="container d-flex justify-content-center align-items-center min-vh-100">


  <div class="row main-row d-flex">
    <!-- LEFT SIDE -->
    <!-- title and logo -->
    <div class="col-xxl-8 col-xl-6 col-l-6 col-md-6 col-sm-0 left-side d-flex flex-column align-items-center justify-content-lg-center justify-content-sm-start ">
      <img src="<?php echo DIR ?>img/logo.png" class="img-fluid" alt="">
      <h1 class="h1 header-text text-center mb-5 title">Town and Country Heights Subdivision</h1>
    </div>

    
    <!-- RIGHT SIDE -->
    <!-- Input and buttons -->
    <div class="col-xxl-4 col-xl-6 col-l-6  col-md-6 col-sm-12 right-side d-flex flex-column align-items-center justify-content-sm-center   
            justify-content-lg-center">
   
      <!-- UPPER PART -->
      <div class="row">
      <div class="col">
        <a href="../admin/index.php" class="float-right"><i class='bx bx-arrow-back text-secondary bx-tada-hover fs-1 '></i></a>
      </div>
        <div class="header-text text-center mb-5">
          <img src="<?php echo DIR ?>img/login.png" class="login-img " alt="">
          <h1 class="h1">Forgot Password Admin,</h1>
        </div>
      </div>

      <!-- FORMS -->
      <div class="input-group d-flex justify-content-center text-center">
        <form action="forgot_password_link.php" method="post">
          <div class="input-group mb-3">
            <span class="input-group-text"><i class="bx bx-user"></i></span>
            <input type="text" class="form-control input" placeholder="Email Address" id="email_address" name="email_address" required>
          </div>



          <!-- SUBMIT BUTTON -->
          <div class="d-grid col-6 mx-auto">
            <input type="submit" class="btn btn-success" value="Send" name="send_link" id="send_link">
          </div>

          <!-- FORGOT PASSWORD -->

        </form>
      </div>
    </div>
  </div>
</div>