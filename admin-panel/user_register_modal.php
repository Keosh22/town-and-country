<?php
// Server
require_once("../libs/server.php");
?>

<?php

$server = new Server;
if (isset($_POST['register'])) {
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $confirm_password = $_POST['confirm_password'];
  $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
  $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $phone_number = $_POST['phone_number'];
  // $filename = $_FILES["photo"]["name"];
  // $tmpName = $_FILES["photo"]["tmp_name"];


  // Username Validation
  // $queryUsername = "SELECT * FROM admin_users WHERE username = :username";
  // $dataUsername = ["username" => $username];
  // $path = "../admin-panel/user.php";
  // $result = $server->checkUsername($queryUsername, $dataUsername, $path);










  if (empty($username) && empty($password) && empty($confirm_password) && empty($firstname) && empty($email) && empty($email) && empty($phone_number)) {
  }

  // if (empty($username) || empty($password) || empty($firstname) || empty($lastname) || empty($email) || empty($phone_number)) {


  // } 
  else {
    // Account Number generator
    $queryAccountNumber = "SELECT * FROM admin_users ORDER BY account_number DESC LIMIT 1";
    $connection = $server->openConn();
    $stmt = $connection->prepare($queryAccountNumber);
    $stmt->execute();

    if ($rowCount = $stmt->rowCount() > 0) {
      if ($row = $stmt->fetch()) {
        // ADM001
        $id = $row['account_number'];
        // 001
        $get_number = str_replace("ADM", "", $id);
        // 001 + 1 = 2
        $id_increment = $get_number + 1;
        // Add 0 to the left max. 3 digits
        $get_string = str_pad($id_increment, 3, 0, STR_PAD_LEFT);

        $account_number = "ADM" . $get_string;

        // Insert data 
        $query = "INSERT INTO admin_users (account_number,username,password,firstname,lastname,email,phone_number) VALUES (:account_number, :username, :password, :firstname, :lastname, :email, :phone_number)";

        $data = [
          "account_number" => $account_number,
          "username" => $username,
          "password" => $password,
          "firstname" => $firstname,
          "lastname" => $lastname,
          "email" => $email,
          "phone_number" => $phone_number
        ];

        $path = "../admin-panel/user.php";

        $server->register($query, $data, $path);
      }
    }
  }
}





?>




<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Add User Account</b></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body mx-3">
        <!-- Form -->

        <form method="POST" action="user_register_modal.php" id="form_input">

          <!-- <div class="form-group">
            <label for="account_number" class="col-sm-4 control-label">Account Number</label>
            <input type="text" class="form-control" id="account_number" name="account_number" disabled>
          </div> -->

          <div class="row">
            <div class="col">
              <!-- FIRSTNAME -->
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Firstname</label>
                <div class="">
                  <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
              </div>
            </div>
            <div class="col">
              <!-- LASTNAME -->
              <div class="form-group">
                <label for="lastname" class="col-sm-3 control-label">Lastname</label>
                <div class="">
                  <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
              </div>
            </div>
          </div>

          <!-- EMAIL -->
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>

            <div class="">
              <input type="text" class="form-control" id="email" name="email" required>
            </div>
          </div>
          <div class="form-group">
            <label for="phone_number" class=" control-label">Phone number</label>

            <div class="">
              <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>
          </div>

          <!----- USERNAME -->

          <div class="form-group">
            <label for="username" class="col-sm-3 control-label">Username</label>

            <input type="text" class="form-control" id="username" name="username" required>

            <div id="usernameHelpBlock"></div>
          </div>


          <!----- PASSWORD ----->
          <div class="form-group ">
            <!-- label -->
            <label for="password" class="col-sm-3 control-label">Password</label>
            <!-- input -->
            <div class=" d-flex align-items-center" id="formText">
              <input type="password" class="form-control password-input" id="password" name="password" required>
              <!-- <span class="toggle-password"><i toggle="#confirm_password" class='bx bx-hide password-icon'></i></span> -->
            </div>
            <div id="passwordHelpBlock"></div>
          </div>

          <!----- CONFIRM PASSWORD ----->
          <div class="form-group">
            <!-- label -->
            <label for="confirm_password" class="control-label  d-inline-block confirm-password-input ">Confirm Password</label>
            <!-- input -->
            <div class=" d-flex align-items-center">
              <input type="password" class="form-control confirm-password-input " id="confirm_password" name="confirm_password" required disabled>
              <!-- show icon -->
              <!-- <span class="toggle-confirm-password"><i toggle="#confirm_password" class='bx bx-hide confirm-password-icon'></i></span> -->
            </div>
            <div id="confirmpasswordHelpBlock"></div>
          </div>
          <div class="col">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" value="" id="showPassword">
              <label for="showPassword" class="form-check-label text-secondary">Show password</label>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat pull-left" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-flat" name="register" class="register" id="register" disabled>Register</button>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    // Clear input in modal when close
    $('#addnew').on('hidden.bs.modal', function(e) {
      $(".password-input").blur();
      $("#passwordHelpBlock").empty().append('<div id="passwordHelpBlock"></div>');
      $("#confirmpasswordHelpBlock").empty().append('<div id="passwordHelpBlock"></div>');
      $(".password-input").removeClass("input-success");
      $(".password-input").removeClass("input-danger");
      $('#form_input').find("input[type=text], input[type=password]").val("");
      $(".confirm-password-input").removeClass("input-success");
      $(".confirm-password-input").removeClass("input-danger");
      $("#register").prop("disabled", true);
      $("#usernameHelpBlock").empty().append('<div id="usernameHelpBlock"></div>');
      $("#username").removeClass("input-danger");
      $("#username").removeClass("input-success");
      $("#showPassword").prop('checked', false);
      $("#password").attr('type', "password");
      $("#confirm_password").attr('type', "password");
    })



    // Strong Password Validation
    $("#password").on('keyup', function() {
      var password = $("#password").val().trim();
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
    $("#confirm_password,#password").on('keyup', function() {
      var confirmPassword = $("#confirm_password").val().trim();
      var password = $("#password").val().trim();

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



    // USERNAME VALIDATION AJAX REQUEST
    $("#username").on('keyup', function() {

      var username = $(this).val();

      $.ajax({
        url: '../ajax/validation_username.php',
        method: 'POST',
        data: {
          username: username
        },
        success: function(respone) {
          $("#usernameHelpBlock").html(respone);
        }
      });
    });


    // password show password
    $("#showPassword").on('click', function() {

      var input = $("#password");

      if (input.attr('type') == "password") {
        input.attr('type', 'text');
      } else {
        input.attr('type', 'password');
      }
    });

    // confirm password show password
    $("#showPassword").on('click', function() {

      var input = $("#confirm_password");
      if (input.attr('type') == "password") {
        input.attr('type', 'text');
      } else {
        input.attr('type', 'password')
      }
    });



  });
</script>