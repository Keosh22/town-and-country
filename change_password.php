<!-- HEADER -->
<?php
// require_once("./includes/user-header.php"); 
?>
<!-- SERVER -->
<?php require_once("./libs/server.php"); ?>

<?php
$userserver = new Server; // Open/Close connection
session_start();
$userserver->userSessionLogin();
$userserver->changePasswordAuthentication();
?>


<?php




// if (isset($_GET['update_password'])) {
//   if (isset($_GET['token_input']) && isset($_GET['homeowners_id_input']) && isset($_GET['email_address_input']) && isset($_GET['new_password']) && isset($_GET['confirm_password'])) {


//     $token = $_GET['token_input'];
//     $email = $_GET['email_address_input'];
//     $id = filter_input(INPUT_GET, 'homeowners_id_input', FILTER_SANITIZE_SPECIAL_CHARS);
//     $new_password = $_GET['new_password'];
//     $confirm_password = $_GET['confirm_password'];
//     $hash_password = password_hash($_GET['new_password'], PASSWORD_DEFAULT);

//     if ($new_password == $confirm_password) {
//       $query1 = "UPDATE homeowners_users SET password = :hash_password WHERE id = :id AND token = :token AND email = :email";
//       $data1 = [
//         "hash_password" => $hash_password,
//         "id" => $id,
//         "token" => $token,
//         "email" => $email
//       ];
//       $connection1 = $userserver->openConn();
//       $stmt1 = $connection1->prepare($query1);
//       $stmt1->execute($data1);
//       if ($stmt1->rowCount() > 0) {
       
//         $_SESSION['status'] = "Success!";
//         $_SESSION['text'] = "Your password has been changed successfuly";
//         $_SESSION['status_code'] = "success";
        
//         header("location: index.php");
//         unset($_SESSION['token_verify']);
//         unset($_SESSION['forgot_password_timestamp']);
     
//       } else {
//         $_SESSION['status'] = "Error!";
//         $_SESSION['text'] = "Something went wrong";
//         $_SESSION['status_code'] = "error";
//       }
//     }
//   }
// }




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Data Table script -->
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>




  <!-- Poppins FONT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Box Icon -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />





  <!------------- CSS Styles  ------------------->

  <!-- USER PAGE CSS -->
  <link rel="stylesheet" href="./styles/user-panel.css">


  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>


  <div class="row row-register justify-content-center align-items-center overflow-hidden">
    <div class="col-lg-5 col-md-6 col-sm-7 col-8 bg-white shadow-lg rounded">
      <h2 class="text-center mt-3">Change Password</h2>
      <p class="text-center text-muted">This page will expire afer 10 minutes</p>

      <!-- Login Form -->
      <form action="change_password_user.php" method="GET">
        <!-- token -->
        <input type="hidden" class="form-control" id="token_input" name="token_input" value="<?php if (isset($_GET['token'])) {
                                                                                                echo  filter_input(INPUT_GET, 'token', FILTER_SANITIZE_SPECIAL_CHARS);
                                                                                              }  ?>" readonly>
        <!-- Homeownersid -->
        <input type="hidden" class="form-control" id="homeowners_id_input" name="homeowners_id_input" value="<?php if (isset($_GET['id'])) {
                                                                                                                echo  filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
                                                                                                              }  ?>" readonly>

        <div class="row my-3 g-3 ">
          <div class="col-12">
            <div class="form-floating">
              <input class="form-control " type="text" id="email_address_input" name="email_address_input" placeholder="email_address" value="<?php if (isset($_GET['email'])) {
                                                                                                                                                echo  filter_input(INPUT_GET, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
                                                                                                                                              }  ?>" readonly>
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
          <div class="col-12 d-flex justify-content-center">
            <button class="btn btn-success" id="update_password" name="update_password">Update Password</button>
          </div>
        </div>


      </form>
    </div>
  </div>

  </div>



  <!-- Bootstrap Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- Script -->
  <!-- <script src="./scripts/script.js"></script> -->

  <!-- Sweet Alert Script -->
  <script src="./libraries/sweetalert.js"></script>

  <!-- DataTables CDN -->
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>



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






  <?php
  // ----------------- Pop up Alert ---------------- 
  if (isset($_SESSION['status']) && $_SESSION['status'] != "") {
  ?>
    <script>
      swal({
          title: " <?php echo $_SESSION['status'] ?>",
          text: "<?php echo $_SESSION['text'] ?>",
          icon: "<?php echo $_SESSION['status_code'] ?>",
          buttons: "Okay",
        })
        .then((buttons) => {
          if (buttons) {
            <?php
            unset($_SESSION['status']);
            unset($_SESSION['text']);
            unset($_SESSION['status_code']);
            // session_unset();
            // session_destroy();
            ?>
          }
        });


      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
          form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
      })()
    </script>
  <?php
  }
  ?>

</body>

</html>