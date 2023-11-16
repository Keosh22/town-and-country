<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
?>

<?php
session_start();
$server = new Server;
$server->adminAuthentication();
?>


<?php

$id = $_SESSION['admin_id'];
$query = "SELECT * FROM admin_users WHERE id = :id";
$data = ["id" => $id];
$connection = $server->openConn();
$stmt = $connection->prepare($query);
$stmt->execute($data);

$rowCount = $stmt->rowCount();

if ($rowCount > 0) {
  while ($result = $stmt->fetch()) {
    $id = $result['id'];
    $account_number = $result['account_number'];
    $username = $result['username'];
    $firstname = $result['firstname'];
    $lastname = $result['lastname'];
    $email = $result['email'];
    $phone = $result['phone_number'];
    $photo = $result['photo'];
  }
}

?>




<!-- Body starts here -->

<body>
  <div class="wrapper">
    <!-- SIDEBAR -->
    <?php
    require_once("../includes/sidebar.php");
    ?>

    <!-------------- Main body content ---------->
    <div class="main">

      <!-- NAVBAR -->
      <?php
      require_once("../includes/navbar.php");

      ?>

      <main class="content px-3 py-2">

        <div class="card">
          <div class="card-header">
            <h2>Profile</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">

              <p class="card-title fs-5 text-secondary divider personal-info">Personal Information</p>
              <div class="row mb-3 justify-content-center">

                <div class="row profile-container justify-content-center">
                  <img src="../uploads/<?php if ($photo == "") {
                                          echo 'default-profile.png';
                                        } else {
                                          echo $photo;
                                        } ?>" class="profile-photo rounded-circle shadow">
                </div>


                <p class="text-secondary text-center personal-info">ID # - <?php echo $account_number; ?></p>
                <div class="col-sm-4">
                  <label for="photo" class="form-label">Change photo:</label>

                  <!-- Change Profile Picture -->
                  <form method="POST" action="profile_photo.php" enctype="multipart/form-data">
                    <div class="d-flex gap-3">
                      <input type="file" name="photo" class="form-control" required>
                      <input class="btn btn-success " type="submit" name="change_photo" value="Change"></input>
                    </div>
                  </form>

                </div>
              </div>

              <form method="POST" action="profile_update.php">
                <div class="row gap-3">
                  <div class="col">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $firstname; ?>" required>
                  </div>
                  <div class="col">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $lastname; ?>" required>
                  </div>
                </div>
                <div class="row gap-3">
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
                  </div>
                </div>
                <div class="d-flex justify-content-end">
                  <input type="submit" class="btn btn-primary" name="update_info" value="Update">
                </div>
              </form>


              <form action="../admin-panel/profile_change_password.php" method="POST">
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

  <script>
    $(document).ready(function() {
      $("#confirm_password").prop("disabled", true);
      // ajax for current password mathced validation
      $("#current_password").on('keyup', function() {
        var current_password = $(this).val();
        $.ajax({
          url: '../ajax/validation_password.php',
          method: 'POST',
          data: {
            current_password: current_password
          },
          success: function(response) {
            $("#changePasswordHelpBlock").html(response);
          }
        });
      });


      // ajax for Change profile picture
      // $("#change_photo").on('click', function() {
      //   var file_data = $("#photo").prop("files")[0];
      //   var photo = new FormData();
      //   form_data.append('file', file_data);
      //   alert(photo);
      //   $.ajax({
      //     url: "../admin-panel/profile_photo.php",
      //     method: "POST",
      //     data: {
      //       photo: photo
      //     },
      //     success: function(response) {
      //       $(".profile-container").html(response);
      //     }
      //   });
      // });


      // 
      $("#new_password,#current_password").on('keyup', function() {
        var password = $("#new_password").val().trim();
        var current_password = $("#current_password").val().trim();
        var number = /([0-9])/;
        var alphabet = /([A-Z])/;
        var special_characters = /([!, @, $, %, ^, &, *, +, #,.])/;

        // Strong pasword validation
        if (password.length <= 7 || password === "") {
          $("#newPasswordHelpBlock").empty().append('<div id="passwordHelpBlock" class="form-text text-danger">Your password must be 8-20 characters long</div> <div id="newPasswordHelpBlock" class="form-text text-danger">Must be contain letters and numbers.</div> <div id="newPasswordHelpBlock" class="form-text text-danger">Must be contain special symbols (!, @, $, %, ^, &, *, +, #, .)</div> ');
          $("#confirm_password").prop("disabled", true);
          $("#change_password").prop("disabled", true);
          $("#new_password").removeClass("input-success");
          $("#new_password").addClass("input-danger");

        } else {
          $("#newPasswordHelpBlock").empty().append('<div id="newPasswordHelpBlock"></div>');

          if (password.match(number) && password.match(alphabet) && password.match(special_characters)) {
            $("#newPasswordHelpBlock").empty().append('<div id="newPasswordHelpBlock" class="form-text text-success">Strong Password</div>');
            $("#new_password").removeClass("input-danger");
            $("#new_password").addClass("input-success");




            // Validate if Current pass is same with new pass
            if (password === current_password) {
              $("#confirm_password").prop("disabled", true);
              $("#new_password").removeClass("input-success");
              $("#new_password").addClass("input-danger");
              $("#confirm_password").val("");


              $("#newPasswordHelpBlock").empty().append('<div id="newPasswordHelpBlock" class="form-text text-danger">Use different password.</div>');

            } else {
              $("#confirm_password").prop("disabled", false);
              $("#new_password").removeClass("input-danger");
              $("#new_password").addClass("input-success");
              $("#newPasswordHelpBlock").empty().append('<div id="newPasswordHelpBlock"></div>');
              // Confirm Password Validation
              $("#confirm_password,#new_password").on('keyup', function() {
                var password = $("#new_password").val().trim();
                var confirmPassword = $("#confirm_password").val().trim();

                if (confirmPassword != "" && password === confirmPassword) {
                  $("#change_password").prop("disabled", false);

                  $("#confirm_password").addClass("input-success");
                  $("#confirm_password").removeClass("input-danger");

                  $("#confirmPasswordHelpBlock").empty().append('<div id="newPasswordHelpBlock" class="form-text text-success">Password Matched</div>');
                } else {
                  $("#change_password").prop("disabled", true);
                  $("#confirm_password").addClass("input-danger");
                  $("#confirm_password").removeClass("input-success");


                  $("#confirmPasswordHelpBlock").empty().append('<div id="newPasswordHelpBlock" class="form-text text-danger">Password not Matched</div>');
                }
              });
            }
          } else {
            $("#change_password").prop("disabled", true);
            $("#confirm_password").val("");
            $("#confirm_password").prop("disabled", true);
            $("#newPasswordHelpBlock").empty().append('<div id="passwordHelpBlock" class="form-text text-danger">Your password must be 8-20 characters long</div> <div id="newPasswordHelpBlock" class="form-text text-danger">Must be contain letters and numbers.</div> <div id="newPasswordHelpBlock" class="form-text text-danger">Must be contain special symbols (!, @, $, %, ^, &, *, +, #, .)</div> ');
            $("#new_password").removeClass("input-success");
            $("#new_password").addClass("input-danger");
          }
        }

        // if (password === current_password) {
        //   $("#new_password").removeClass("input-success");
        //   $("#new_password").addClass("input-danger");


        //   $("#newPasswordHelpBlock").empty().append('<div id="newPasswordHelpBlock" class="form-text text-danger">Use different password.</div>');


        // } else {
        //   $("#new_password").removeClass("input-danger");
        //   $("#new_password").addClass("input-success");



        //   $("#newPasswordHelpBlock").empty().append('<div id="newPasswordHelpBlock"></div>');
        // }

      });



      // show icon 
      $("#showPassword").on('click', function() {
        var input = $("#current_password");
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
      // password show password
      $("#showPassword").on('click', function() {
        var input = $("#new_password");
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



      // document ready end here
    });
  </script>


  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>