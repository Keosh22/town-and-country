<body>
<div class="wrapper">
   
    <!-------------- Main body content ---------->
    <div class="main">



      <main class="content px-3 py-2">

        <div class="card card-border">
          <div class="card-header d-flex flex-row align-items-center gap-3">
            <div class="back-button" >
              <a href="home.php">
                <span class="material-symbols-outlined">
                    arrow_back
                </span>
              </a>
            </div>
            <h2>Profile</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">

              <p class="card-title fs-5 text-secondary divider personal-info">Personal Information</p>
              <div class="row mb-3 justify-content-center">

                <!-- <div class="row profile-container justify-content-center">
                  <img src="../uploads/<?php //if ($photo == "") {
                                          //echo 'default-profile.png';
                                        //} else {
                                        //  echo $photo;
                                       // } ?>" class="profile-photo rounded-circle shadow">
                </div> -->


                <!-- <p class="text-secondary text-center personal-info">ID # - <?php //echo $account_number; ?></p>
                <div class="col-sm-4">
                  <label for="photo" class="form-label">Change photo:</label> -->

                  <!-- Change Profile Picture -->
                  <!-- <form method="POST" action="profile_photo.php" enctype="multipart/form-data">
                    <div class="d-flex gap-3">
                      <input type="file" name="photo" class="form-control" required>
                      <input class="btn btn-success " type="submit" name="change_photo" value="Change"></input>
                    </div>
                  </form> -->

                </div>
              </div>

              <form method="POST" action="../user-panel/profile-update.php">
                <!-- Name Information -->
                <div class="row gap-3">
                  <div class="col">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" value="<?= $firstname ?>" required>
                  </div>
                  <div class="col">
                    <label for="middle_initial" class="form-label">Middle Initial</label>
                    <input type="text" class="form-control" name="middle_initial" id="middle_initial" value="<?php echo $middle_initial; ?>" required>
                  </div>
                  <div class="col">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $lastname; ?>" required>
                  </div>
                </div>

                <!-- Address -->
                <div class="row gap-3 mt-4">
                  <div class="col-lg-2">
                    <label for="block" class="form-label">Block</label>
                    <input type="text" class="form-control" name="block" id="block" value="<?php echo $blk; ?>" disabled>
                  </div>
                  <div class="col">
                    <label for="lot" class="form-label">Lot</label>
                    <input type="text" class="form-control" name="lot" id="lot" value="<?php echo $lot; ?>" disabled>
                  </div>
                  <div class="col">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" class="form-control" name="street" id="street" value="<?php echo $street; ?>" disabled>
                  </div>
                  <div class="col">
                    <label for="phase" class="form-label">Phase</label>
                    <input type="text" class="form-control" name="phase" id="phase" value="<?php echo $phase; ?>" disabled>
                  </div>
  
                </div>
                                            

                <!-- Login information -->
                <div class="row gap-3 mt-4">
                  <div class="col-lg-5">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>" disabled>
                  </div>
                  <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" required>
                  </div>
                  <div class="col">
                    <label for="phone_number" class="form-label">Phone #</label>
                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $phone; ?>" required>
                    <div id='phoneNumberHelpBlock'></div>
                  </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                  <input type="submit" class="btn btn-primary" name="update_info" id="update_info" value="Update">
                </div>
              </form>


              <!--  PASSWORD  -->

              <form action="../user-panel/profile_update_password.php" method="POST">
                <p class="card-title fs-5 text-secondary divider personal-info mt-4">Change Password</p>
                <div class="row gap-3">
                  <div class="col-lg-5">

                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" class="form-control current_password_input" name="current_password" id="current_password" required>
                    <!-- show icon -->
                    <span class="toggle-current-password"><i toggle="#current_password" class='bx bx-show bx-show-changepass current-password-icon'></i></span>
                    <div id="changePasswordHelpBlock"></div>
                  </div>
                  <div class="col">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="new_password" id="new_password" required>
                    <!-- show icon -->
                    <span class="toggle-password"><i toggle="#new_password" class='bx bx-show bx-show-changepass password-icon'></i></span>
                    <div id="newPasswordHelpBlock"></div>
                  </div>
                  <div class="col">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>

                    <!-- show icon -->
                    <span class="toggle-confirm-password"><i toggle="#confirm_password" class='bx bx-show bx-show-changepass confirm-password-icon'></i></span>
                    <div id="confirmPasswordHelpBlock"></div>
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" value="" id="showPassword">
                      <label for="showPassword" class="form-check-label text-secondary">Show password</label>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-end mt-2">
                  <input type="submit" class="btn btn-primary" id="change_password" name="change_password" value="Update" disabled>
                </div>

              </form>




            </div>
            <!-- form -->

          </div>
        </div>




      </main>




      <!-- wrapper end here -->
    </div>
  </div>

    
</body>

<script>
    $(document).ready(function() {

      $("#update_info").mouseenter(function(){
        $("#update_info").css("background-color", "green");
      })

    })



</script>