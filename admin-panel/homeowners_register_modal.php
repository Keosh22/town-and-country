<?php
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;
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
        <form action="row" method="POST" id="form-input">

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
              <input type="text" class="form-control" id="blk" name="blk">
            </div>
            <div class="col-3">
              <label for="lot" class="form-label">Lot#</label>
              <input type="text" class="form-control" id="lot" name="lot">
            </div>
            <div class="col-6">
              <label for="street" class="form-label">Street</label>
              <input type="text" class="form-control" id="street" name="street">
            </div>
            <div class="col-md-6">
              <label for="phase" class="form-label">Phase#</label>
              <select name="phase" id="phase" class="form-select">
              <option value=""></option>
                <option value="1">Phase 1</option>
                <option value="2">Phase 2</option>
                <option value="3">Phase 3</option>
                <option value="4">Phase 4</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="status" class="form-label">Status</label>
              <select name="status" id="status" class="form-select" required>
              <option value=""></option>
                <option value="1">Member</option>
                <option value="2">Non-member</option>
                <option value="3">Tenant</option>
              </select>
            </div>

            <div class="row">
              <p class="fs-5 text-secondary divider personal-info mt-4">Account Information</p>
              <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                  <span class="input-group-text" id="username">@</span>
                  <input type="text" class="form-control" id="username" name="username">
                </div>
              </div>
              <div class="col-lg-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="col-lg-6"><label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
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