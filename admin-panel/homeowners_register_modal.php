<?php
require_once("../libs/server.php");
?>

<?php

$server = new Server;

if(isset($_POST['register'])){
  $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
  $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
  $middle_initial = filter_input(INPUT_POST, 'middle_initial', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $phone_number = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_SPECIAL_CHARS);
  $blk = filter_input(INPUT_POST, 'blk', FILTER_SANITIZE_SPECIAL_CHARS);
  $lot = filter_input(INPUT_POST, 'lot', FILTER_SANITIZE_SPECIAL_CHARS);
  $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_SPECIAL_CHARS);
  $phase = filter_input(INPUT_POST, 'phase', FILTER_SANITIZE_SPECIAL_CHARS);
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_SPECIAL_CHARS);
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
        <form action="" method="POST" id="form-input">

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
              <label for="middleInitial" class="form-label">M.I.</label>
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
                  <span class="input-group-text" id="username">@</span>
                  <input type="text" class="form-control" id="username" name="username" required>
                </div>
              </div>
              <div class="col-lg-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="col-lg-6"><label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat pull left" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="register" class="register" id="register">Register</button>
              </div>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
   $("#addHomeowners").on('hidden.bs.modal', function(e){
    $("#form-input").find("input[type=text], input[type=password], select[class=form-select]").val("");
   });  
  });
</script>