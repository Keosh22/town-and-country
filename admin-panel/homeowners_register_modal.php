<?php
require_once("../libs/server.php");
?>

<?php

$server = new Server;



if (isset($_POST['register'])) {
  $account_number = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_SPECIAL_CHARS);
  $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
  $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
  $middle_initial = filter_input(INPUT_POST, 'middle_initial', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $phone_number = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_SPECIAL_CHARS);
  $blk = filter_input(INPUT_POST, 'blk', FILTER_SANITIZE_SPECIAL_CHARS);
  $lot = filter_input(INPUT_POST, 'lot', FILTER_SANITIZE_SPECIAL_CHARS);
  $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_SPECIAL_CHARS);
  $phase = filter_input(INPUT_POST, 'phase', FILTER_SANITIZE_SPECIAL_CHARS);
  $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);



  if (empty($firstname) && empty($lastname) && empty($middle_initial) && empty($email) && empty($phone_number) && empty($blk) && empty($lot) && empty($street) && empty($phase) && empty($username) && empty($password) && empty($confirm_password)) {
  } else {
    $query = "INSERT INTO homeowners_users (account_number, username, password, firstname, lastname, middle_initial, email, phone_number, blk, lot, street, phase, status ) VALUES (:account_number, :username, :password, :firstname, :lastname, :middle_initial, :email, :phone_number, :blk, :lot, :street, :phase, :status)";
    $data = [
      "account_number" => $account_number,
      "username" => $username,
      "password" => $password,
      "firstname" => $firstname,
      "lastname" => $lastname,
      "middle_initial" => $middle_initial,
      "email" => $email,
      "phone_number" => $phone_number,
      "blk" => $blk,
      "lot" => $lot,
      "street" => $street,
      "phase" => $phase,
      "status" => $status
    ];
    $path = "../admin-panel/homeowners.php";
    $server->register($query, $data, $path);
  }
}
?>



<!-- Modal Homeowners Regsitration -->
<div id="addHomeowners" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><b>Add Homeowners Account</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
      </div>

      <div class="modal-body mx-3">
        <form action="homeowners_register_modal.php" method="POST" id="form-input">

          <div class="row gy-3">
            <p class="fs-5 text-secondary divider personal-info mt-4">Personal Information</p>
            <div class="col-md-5">
              <label for="firstname" class="form-label">Firstname</label>
              <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div class="col-md-5">
              <label for="lastname" class="form-label">Lastname</label>
              <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="col-md-2">
              <label for="middle_initial" class="form-label">M.I.</label>
              <input type="text" class="form-control" id="middle_initial" name="middle_initial" required>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-md-6">
              <label for="phone_number" class="form-label">Phone Number</label>
              <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            <div class="col-3">
              <label for="blk" class="form-label">Blk#</label>
              <input type="text" class="form-control" id="blk" name="blk" required>
            </div>
            <div class="col-3">
              <label for="lot" class="form-label">Lot#</label>
              <input type="text" class="form-control" id="lot" name="lot" required>
            </div>
            <div class="col-6">
              <label for="street" class="form-label">Street</label>
              <select name="street" id="street" class="form-select" required>
                <option></option>
                <option>Jackfruit</option>
                <option>Golden Shower</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="phase" class="form-label">Phase#</label>
              <select name="phase" id="phase" class="form-select" required>
                <option value=""></option>
                <option value="PH1">Phase 1</option>
                <option value="PH2">Phase 2</option>
                <option value="PH3">Phase 3</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="status" class="form-label">Status</label>
              <select name="status" id="status" class="form-select" required>
                <option value=""></option>
                <option value="Member">Member</option>
                <option value="Non-member">Non-member</option>
                <option value="Tenant">Tenant</option>
              </select>
            </div>

            <div class="row">
              <p class="fs-5 text-secondary divider personal-info mt-4">Account Information</p>
              <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                  <span class="input-group-text" id="#username">@</span>
                  <input value="" type="text" class="form-control" id="username" name="username" required>
                </div>
              </div>
              <div class="col-lg-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control password-input" id="password" name="password" required>
                <span toggle="#password" class="toggle-password"><i class="bx bx-hide bx-show-changepass password-icon"></i></span>
                <div id="passwordHelpBlock"></div>
              </div>
              <div class="col-lg-6"><label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                <span class="toggle-confirm-password"><i toggle="#confirm_password" class="bx bx-hide bx-show-changepass confirm-password-icon"></i>
                </span>
                <div id="confirmpasswordHelpBlock"></div>
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat pull left" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="register" class="register" id="register" disabled>Register</button>
              </div>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    // Clear input when close
    $("#addHomeowners").on('hidden.bs.modal', function(e) {
      $("#form-input").find("input[type=text], input[type=password], select[class=form-select]").val("");
      $(".password-input").removeClass("input-success");
      $(".password-input").removeClass("input-danger");
      $("#passwordHelpBlock").empty().append('<div id="passwordHelpBlock"></div>');
      $("#register").prop('disabled', true);
      $(".confirm-password-input").removeClass("input-success");
      $(".confirm-password-input").removeClass("input-danger");
      $("#confirmpasswordHelpBlock").empty().append('<div id="confirmpasswordHelpBlock"></div>');
      
    });


    $("#addHomeowners").on('show.bs.modal', function(e) {
      
      // Show Account number
      $.ajax({
        url: '../ajax/homeowners_acc_generator.php',
        success: function(response) {
          $("#username").prop('value', response);
        }
      });
    });


    // password show password
    $(".toggle-password").on('click', function() {
      $(".password-icon").toggleClass("bx-hide bx-show");
      var input = $("#password");

      if (input.attr('type') == "password") {
        input.attr('type', 'text');
      } else {
        input.attr('type', 'password');
      }
    });

    // confirm password show password
    $(".toggle-confirm-password").on('click', function() {
      $(".confirm-password-icon").toggleClass("bx-hide bx-show");
      var input = $("#confirm_password");
      if (input.attr('type') == "password") {
        input.attr('type', 'text');
      } else {
        input.attr('type', 'password')
      }
    });

    // password validation
    $("#password,#confirm_password").on('keyup', function() {
      var password = $("#password").val().trim();
      var number = /([0-9])/;
      var alphabet = /([A-Z])/;
      var chars = /([!, @, $, %, ^, &, *, +, #,.])/;

      // Checked if password is 8 char long
      if (password.length <= 7) {
        $("#register").prop('disabled', true);
        $("#passwordHelpBlock").empty().append('<div id="passwordHelpBlock" class="form-text text-danger">Your password must be 8-20 characters long</div>');
        $(".password-input").removeClass("input-success");
        $(".password-input").addClass("input-danger");
      } else {
        $("#passwordHelpBlock").empty().append('<div id="passwordHelpBlock"></div>');

        // checked if password contains numbers and special char
        if (password.match(number) && password.match(alphabet) && password.match(chars)) {
          $("#register").prop('disabled', false);
          $("#passwordHelpBlock").empty().append('<div id="passwordHelpBlock" class="form-text text-success">Strong password</div>');
          $(".password-input").removeClass("input-danger");
          $(".password-input").addClass("input-success");
        } else {
          $("#register").prop('disabled', true);
          $("#passwordHelpBlock").empty().append('<div id="newPasswordHelpBlock" class="form-text text-danger">Must be contain uppercase letters and numbers.</div> <div id="newPasswordHelpBlock" class="form-text text-danger">Must be contain special symbols (!, @, $, %, ^, &, *, +, #, .)</div>');
          $(".password-input").removeClass("input-success");
          $(".password-input").addClass("input-danger");
        }

        // Confirm password validation
        var password = $("#password").val().trim();
        var confirmPassword = $("#confirm_password").val().trim();

        if (confirmPassword != "" && password === confirmPassword) {
          $("#register").prop('disabled', false);
          $(".confirm-password-input").addClass("input-success");
          $(".confirm-password-input").removeClass("input-danger");
          $("#confirmpasswordHelpBlock").empty().append('<div id="confirmpasswordHelpBlock" class="form-text text-success">Password Matched</div>');
        } else {
          $("#register").prop('disabled', true);
          $(".confirm-password-input").removeClass("input-success");
          $(".confirm-password-input").addClass("input-danger");
          $("#confirmpasswordHelpBlock").empty().append('<div id="confirmpasswordHelpBlock" class="form-text text-danger">Password Not Matched</div>');
        }

      }
    });








  });
</script>