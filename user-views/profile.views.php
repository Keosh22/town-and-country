<style>
  /* Custom CSS to remove number input arrows */
  .form-control::-webkit-inner-spin-button,
  .form-control::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
</style>

<body>
  <main>

    <div class="card card-border">
      <div class="card-header d-flex flex-row align-items-center gap-3">
        <div class="back-button">
          <a href="home.php">
            <i class="fa-solid fa-arrow-left" style="color: #000000;"></i>
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
                                // } 
                                ?>" class="profile-photo rounded-circle shadow">
        </div> -->


            <!-- <p class="text-secondary text-center personal-info">ID # - <?php //echo $account_number; 
                                                                            ?></p>
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
          <div class="row d-flex justify-content-evenly">
            <div class="col col-lg-4 col-12">
              <label for="firstname" class="form-label">Firstname</label>
              <input type="text" class="form-control" name="firstname" id="firstname" value="<?= $firstname ?>" required>
            </div>

            <div class="col col-lg-4 col-12 ">
              <label for="middle_initial" class="form-label">Middle Initial</label>
              <input type="text" class="form-control" name="middle_initial" id="middle_initial" value="<?php echo $middle_initial; ?>" required>
            </div>

            <div class="col col-lg-4 col-12 ">
              <label for="lastname" class="form-label">Lastname</label>
              <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $lastname; ?>" required>
            </div>
          </div>

          <!-- Address -->
          <div class="row mt-4 d-flex justify-content-evenly">

            <div class="col col-lg-3 col-sm-6 col-12">
              <label for="block" class="form-label">Block</label>
              <input type="text" class="form-control" name="block" id="block" value="<?php echo $blk; ?>" disabled>
            </div>

            <div class="col col-lg-3 col-sm-6 col-12">
              <label for="lot" class="form-label">Lot</label>
              <input type="text" class="form-control" name="lot" id="lot" value="<?php echo $lot; ?>" disabled>
            </div>

            <div class="col col-lg-3 col-sm-6 col-12">
              <label for="street" class="form-label">Street</label>
              <input type="text" class="form-control" name="street" id="street" value="<?php echo $street; ?>" disabled>
            </div>

            <div class="col col-lg-3 col-sm-6 col-12">
              <label for="phase" class="form-label">Phase</label>
              <input type="text" class="form-control" name="phase" id="phase" value="<?php echo $phase; ?>" disabled>
            </div>

          </div>


          <!-- Login information -->
          <div class="row mt-4">
            <div class="col col-md-6">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>" disabled>
            </div>
            <div class="col col-md-3 col-12">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="col col-md-3 col-12">
              <label for="phone_number" class="form-label">Phone #</label>
              <input type="number" class="form-control" name="phone_number" id="phone_number" value="<?php echo $phone; ?>" maxlength="10" required>
              <div id='phoneNumberHelpBlock'></div>
            </div>
          </div>
          <div class="d-flex justify-content-end mt-3">
            <a class="btn btn-secondary mx-2" id="edit_btn">Edit</a>
            <input type="submit" class="btn btn-primary" name="update_info" id="update_info" value="Update">
          </div>
        </form>



        <!--  PASSWORD  -->

        <form action="../user-panel/profile_update_password.php" method="POST">
          <p class="card-title fs-5 text-secondary divider personal-info mt-4">Change Password</p>

          <div class="row">
            <div class="col col-md-4">

              <label for="current_password" class="form-label">Current Password</label>
              <input type="password" class="form-control current_password_input" name="current_password" id="current_password" maxlength="64" required disabled>
              <!-- show icon -->
              <span class="toggle-current-password"><i toggle="#current_password" class='bx bx-show bx-show-changepass current-password-icon'></i></span>
              <div id="changePasswordHelpBlock"></div>
            </div>
            <div class="col col-md-4 col-12">
              <label for="new_password" class="form-label">New Password</label>
              <input type="password" class="form-control" name="new_password" id="new_password" maxlength="64" required disabled>
              <!-- show icon -->
              <span class="toggle-password"><i toggle="#new_password" class='bx bx-show bx-show-changepass password-icon'></i></span>
              <div id="newPasswordHelpBlock"></div>
            </div>
            <div class="col col-md-4 col-12">
              <label for="confirm_password" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" name="confirm_password" id="confirm_password" maxlength="64" required>

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
            <a class="btn btn-secondary mx-2" id="change_password_btn">Change</a>
            <input type="submit" class="btn btn-primary" id="change_password" name="change_password" value="Update" disabled>
          </div>

        </form>




      </div>
      <!-- form -->

    </div>
    </div>




  </main>

</body>

<script>
  $(document).ready(function() {
    $("#firstname, #middle_initial, #lastname, #email, #phone_number").prop('disabled', true);
    $("#update_info").prop('disabled', true);
    // $("#update_info").mouseenter(function() {
    //   $("#update_info").css("background-color", "green");
    // })


    // Change Password Btn
    $("#change_password_btn").on('click', function(e){
      swal({
        title: 'Change Password Confirmation',
        text: 'Are you sure want to ' + action + '',
        icon: 'warning',
        buttons: true,
        dangerMode: true
      })
      .then((proceed) => {
        if(proceed){

          $("#current_password, #new_password").prop('disabled', function(i, val){
            if(val){
              $("#change_password_btn").html('Cancel');
              action = "cancel";
            } else {
              $("#change_password_btn").html('Change');
              action = "proceed";
             location.reload();
            }
            return !val;
          });
          $("#change_password_btn").toggleClass('btn-danger');

        } else {
          swal('Change Password Cancel');
        }
      })
    });


    // Edit Information
    var action = "proceed"
    $("#edit_btn").on('click', function(e) {
      
      swal({
          title: 'Update Confirmation',
          text: 'Are you sure want to ' + action +'?',
          icon: 'warning',
          buttons: true,
          dangerMode: true
        })
        .then((proceed) => {
          if (proceed) {

            $("#firstname, #middle_initial, #lastname, #email, #phone_number, #update_info").prop("disabled", function(i, val) {
              if(val){
                $("#edit_btn").html('Cancel');
                action = "cancel";
              } else {
                $("#edit_btn").html('Edit');
                action = "proceed";
              }
              return !val;
            });
            $("#edit_btn").toggleClass('btn-danger');
          
            $("#phone_number").on('keydown', function(e) {
              if ($(this).val().length > 10) {
                $(this).val($(this).val().slice(0, 10));
              }
            });
            
          } else {
            swal("Update Canceled");
          }
        })




    });
  })
</script>