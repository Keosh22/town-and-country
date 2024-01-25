<?php
session_start();
require_once "../includes/user-header.php";
require_once "../libs/server.php";
require_once "../includes/user-header.php";
require_once "../user-panel/user-nav.php";
date_default_timezone_set('Asia/Manila');
?>



<?php
$server = new Server;
$server->userAuthentication();
?>

<?php
$id = $_SESSION['user_id'];
$query = "SELECT * FROM homeowners_users WHERE id = :id";
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
    $middle_initial = $result['middle_initial'];
    $lastname = $result['lastname'];
    $email = $result['email'];
    $phone = $result['phone_number'];
    $blk = $result['blk'];
    $lot = $result['lot'];
    $street = $result['street'];
    $phase = $result['phase'];
    $status = $result['status'];
    $tenant = $result['tenant_name'];
  }
}



?>

<script>
    $(document).ready(function() {

      $("#confirm_password").prop("disabled", true);
      // ajax for current password mathced validation
      $("#current_password").on('keyup', function() {
        var current_password = $(this).val();
        $.ajax({
          url: '../user_ajax/validation_password.php',
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

      // Phone Number validation
      $("#phone_number").on('keyup', function() {
        var phone_number = $(this).val().trim();
        var number = /([0-9])/;

        if (phone_number.match(number) && phone_number.length == 11) {
          $("#phone_number").removeClass("input-danger");
          $("#phone_number").addClass("input-success");
          $("#phoneNumberHelpBlock").empty().append("<div id='phoneNumberHelpBlock' class='form-text text-success'>Valid phone number</div>");
          $("#update_info").prop('disabled', false);
        } else {
          $("#phone_number").removeClass("input-success");
          $("#phone_number").addClass("input-danger");
          $("#phoneNumberHelpBlock").empty().append("<div id='phoneNumberHelpBlock' class='form-text text-danger'>Invalid phone number</div>");
          $("#update_info").prop('disabled', true);
        }
      });



      $("#new_password,#current_password").on('keyup', function() {
        var password = $("#new_password").val().trim();
        var current_password = $("#current_password").val().trim();
        var number = /([0-9])/;
        var alphabet = /([A-Z])/;
        var special_characters = /([!, @, $, %, ^, &, *, +, #,.])/;

        // IF CURRENT PASSWORD IS EMPTY
        if(current_password === "" && password === ""){
          $("#newPasswordHelpBlock").empty();
          $("#changePasswordHelpBlock").empty();
        }



        // Strong pasword validation
        else if (password.length <= 7) {
          $("#newPasswordHelpBlock").empty().append('<div id="passwordHelpBlock" class="form-text text-danger">Your password must be 8-20 characters long</div> <div id="newPasswordHelpBlock" class="form-text text-danger">Must be contain letters and numbers.</div> <div id="newPasswordHelpBlock" class="form-text text-danger">Must be contain special symbols (!, @, $, %, ^, &, *, +, #, .)</div> ');
          $("#confirm_password").prop("disabled", true);
          $("#change_password").prop("disabled", true);
          $("#new_password").removeClass("input-success");
          $("#new_password").addClass("input-danger");

        } 

        else
        {
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



      //document ready end here
    });
  </script>



<?php
require "../user-views/profile.views.php";
include("../includes/footer.php");
?>