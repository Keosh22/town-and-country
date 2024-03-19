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
$server->changePasswordAuthenticationAdmin();



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
          <h1 class="h1">Change Password</h1>
        </div>
      </div>

      <!-- FORMS -->
      <div class="input-group d-flex justify-content-center text-center">
        <form action="change_password_admin.php" method="GET">
          <input type="hidden" class="form-control" id="token_input" name="token_input" value="<?php if (isset($_GET['token'])) {
                                                                                                echo filter_input(INPUT_GET, 'token', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                                                                              } ?>">
          <input type="hidden" class="form-control" id="admin_id" name="admin_id" value="<?php if (isset($_GET['id'])) {
                                                                                          echo filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                                                                        } ?>">

          <div class="row my-3 g-3 ">
            <div class="col-12">
              <div class="form-floating">
                <input class="form-control " type="text" id="email_address_input" name="email_address_input" placeholder="email_address" value="<?php if (isset($_GET['email'])) {
                                                                                                                                                  echo filter_input(INPUT_GET, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                                                                                                                                } ?>" readonly>
                <label for="email_address">Email Address</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <input class="form-control " type="password" id="new_password" name="new_password" placeholder="New Password" required>
                <label for="new_password">New Password</label>
                <div id="passwordHelpBlock"></div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <input class="form-control " type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                <label for="confirm_password">Confirm Password</label>
                <div id="confirmpasswordHelpBlock"></div>
              </div>
            </div>
            <div class="col-12">
              <input type="checkbox" id="show_password" class="form-check-input">
              <label for="show_password" class="form-label text-secondary">Show password</label>
            </div>

          </div>

          <!-- SUBMIT BUTTON -->
          <div class="d-grid col-6 mx-auto">
            <input type="submit" class="btn btn-success" value="Send" name="update_password" id="update_password">
          </div>

          <!-- FORGOT PASSWORD -->

        </form>
      </div>
    </div>
  </div>
</div>


<script>
    $(document).ready(function() {
      // Strong Password Validation
      $("#new_password").on('keyup', function() {
        var password = $("#new_password").val().trim();
        var number = /([0-9])/;
        var alphabets = /([A-Z])/;
        var special_characters = /([!, @, $, %, ^, &, *, +, #,.])/;

        if (password.length <= 7 || password === "") {
          $("#passwordHelpBlock").empty().append('<div id="passwordHelpBlock" class="form-text text-danger">Your password must be 8-20 characters long</div> <div id="newPasswordHelpBlock" class="form-text text-danger">Must be contain letters and numbers.</div> <div id="newPasswordHelpBlock" class="form-text text-danger">Must be contain special symbols (!, @, $, %, ^, &, *, +, #, .)</div> ');
          $(".password-input").removeClass("input-success");
          $(".password-input").addClass("input-danger");
          $(this).focus();
        } else {
          $("#passwordHelpBlock").empty().append('<div id="passwordHelpBlock"></div>');
          if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {
            $("#passwordHelpBlock").empty().append('<div id="passwordHelpBlock" class="form-text text-success">Strong password</div>');
            $("#confirm_password").prop("disabled", false);
            $(".password-input").addClass("input-success");
          } else {
            $("#confirm_password").prop("disabled", true);
            $("#register").prop("disabled", true);
            $("#passwordHelpBlock").empty().append('<div id="passwordHelpBlock" class="form-text text-danger">Your password must be 8-20 characters long</div> <div id="newPasswordHelpBlock" class="form-text text-danger">Must be contain letters and numbers.</div> <div id="newPasswordHelpBlock" class="form-text text-danger">Must be contain special symbols (!, @, $, %, ^, &, *, +, #, .)</div> ');
            $(".password-input").removeClass("input-success");
            $(".password-input").addClass("input-danger");
            $(this).focus();
          }
        }
      });




      // Confirm Password Validation
      $("#confirm_password,#new_password").on('keyup', function() {
        var confirmPassword = $("#confirm_password").val().trim();
        var password = $("#new_password").val().trim();

        if (confirmPassword != "" && password === confirmPassword) {
          $("#register").prop("disabled", false);
          $(".confirm-password-input").addClass("input-success");

          $(".confirm-password-input").removeClass("input-danger");

          $("#confirmpasswordHelpBlock").empty().append('<div id="passwordHelpBlock" class="form-text text-success">Password Matched</div>');
        } else {
          $("#register").prop("disabled", true);
          $("#confirmpasswordHelpBlock").empty().append('<div id="passwordHelpBlock" class="form-text text-danger">Password Not Matched</div>');
          $(".confirm-password-input").addClass("input-danger");
          $(".confirm-password-input").removeClass("input-success");
        }
      });


      // Show Password
      $("#show_password").on('click', function() {
        var password = $("#new_password");
        var confirm_password = $("#confirm_password");

        if (password.attr('type') == "password" && confirm_password.attr('type') == "password") {
          password.attr('type', 'text');
          confirm_password.attr('type', 'text');
        } else {
          password.attr('type', 'password');
          confirm_password.attr('type', 'password');
        }
      })

    });
  </script>