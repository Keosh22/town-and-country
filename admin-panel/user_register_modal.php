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

  $queryUsername = "SELECT * FROM admin_users WHERE username = :username";
  $dataUsername = ["username" => $username];
  $path = "../admin-panel/user.php";
  $result = $server->checkUsername($queryUsername,$dataUsername, $path);
  
  if($result){
    
  }
  
  // if (empty($username) || empty($password) || empty($firstname) || empty($lastname) || empty($email) || empty($phone_number)) {
  
   
  // } 
  else {
    $query = "INSERT INTO admin_users (username,password,firstname,lastname,email,phone_number) VALUES (:username, :password, :firstname, :lastname, :email, :phone_number)";

    $data = [
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
      <div class="modal-body">
        <!-- Form -->

        <form method="POST" action="user_register_modal.php" id="form_input">
          <div class="form-group">
            <label for="firstname" class="col-sm-3 control-label">Firstname</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
          </div>
          <div class="form-group">
            <label for="lastname" class="col-sm-3 control-label">Lastname</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="email" name="email" required>
            </div>
          </div>
          <div class="form-group">
            <label for="phone_number" class="col-sm-3 control-label">Phone number</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>
          </div>
          <div class="form-group">
            <label for="username" class="col-sm-3 control-label">Username</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
          </div>

          <div class="form-group ">
            <label for="password" class="col-sm-3 control-label">Password</label>

            <div class="col-sm-9" id="formText">
              <input type="password" class="form-control password-input" id="password" name="password" required>
            </div>

            <div id="passwordHelpBlock"></div>


          </div>
          <div class="form-group">
            <label for="confirm_password" class="control-label  d-inline-block confirm-password-input ">Confirm Password</label>

            <div class="col-sm-9">
              <input type="password" class="form-control confirm-password-input " id="confirm_password" name="confirm_password" required>
              <div id="confirmpasswordHelpBlock"></div>
            </div>
          </div>

          <div class="form-group">
            <label for="photo" class=" col-sm-3 control-label">Photo</label>

            <div class="col-sm-9">
              <input type="file" id="photo" name="photo">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-primary btn-flat" name="register"  class="register" id="register" disabled ><i class="fa fa-save"></i> Register</button>
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
      $('#form_input').find("input[type=text], input[type=password] , textarea").val("");
      $(".confirm-password-input").removeClass("input-success");
      $(".confirm-password-input").removeClass("input-danger");
      $("#register").prop("disabled", true);

    })

    // Strong Password Validation
    $("#password").on('keyup', function() {
      var password = $("#password").val().trim();
      var number = /([0-9])/;
      var alphabets = /([a-zA-Z])/;
      var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<,.])/;

      if (password.length <= 7 || password === "") {
        $("#passwordHelpBlock").empty().append('<div id="passwordHelpBlock" class="form-text text-danger">Your password must be 8-20 characters long</div>');
        $(".password-input").removeClass("input-success");
        $(".password-input").addClass("input-danger");
        $(this).focus();
      } else {
        $("#passwordHelpBlock").empty().append('<div id="passwordHelpBlock"></div>');
        if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {
          $(".password-input").addClass("input-success");
        } else {
          $("#register").prop("disabled", true);
          $("#passwordHelpBlock").empty().append('<div id="passwordHelpBlock" class="form-text text-danger">Must be contain letters and numbers.</div>');
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

    $("#username").on('blur', function(){
      <?php

         
      ?>
    });





  });
</script>