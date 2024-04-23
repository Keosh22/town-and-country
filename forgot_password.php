<!-- HEADER -->
<?php
// require_once("./includes/user-header.php"); 
?>
<!-- SERVER -->
<?php

require_once("./libs/server.php");

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


function send_reset_pass($id, $email, $name, $token)
{



  $MAILHOST = "smtp.gmail.com";
  $USERNAME = "buenavideskeosh@gmail.com";
  $PASSWORD = "xyfhwkhjldfhytyw";
  $SEND_FROM = "buenavideskeosh@gmail.com";
  $SEND_FROM_NAME = "TCH Homeowners Association";

  $SUBJECT = "RESET PASSOWRD LINK";
  $BODY = '<div class="container-fluid">
  <div class="row">
    <div class="col-12 text-center mb-3">
      <a href="#"><img class="logo-img text-center" src="../img/logo.png" alt=""></a>
    </div>
    <div class="col-12 text-center">
      <h1><b>Password Reset</b></h1>
    </div>
    <div class="row">
      <div class="col-12">
      <h4><b>Hi ' . $name . ',</b> </h4>
      </div>
      <div class="col-12">
      <p>We received a request to reset the password of your account.
      </p>
        <br>
        <p>To reset the password click on the link below.
        </p>
        <br>
        <a type="button" class="btn btn-success" href="http://localhost/town-and-country/change_password.php?token=' . $token . '&email=' . $email . '&id=' . $id . '">Click Me</a>
      </div>
      <br>
      <br>
    </div>
  </div>
</div>';

  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->Host = $MAILHOST;
  $mail->Username = $USERNAME;
  $mail->Password = $PASSWORD;
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;
  $mail->setFrom($SEND_FROM, $SEND_FROM_NAME);
  $mail->addAddress($email);

  $mail->isHTML(true);
  $mail->Subject = $SUBJECT;
  $mail->Body = $BODY;
  $mail->AltBody = $BODY;

  if (!$mail->send()) {
    return "Email not send";
  } else {
    return "Email Sent";
  }
}

?>


<?php
$userserver = new Server; // Open/Close connection
session_start();
$userserver->userSessionLogin();

?>


<?php

if (isset($_POST['send_link'])) {
  $email_address = filter_input(INPUT_POST, 'email_address', FILTER_SANITIZE_SPECIAL_CHARS);
  if (isset($_POST['email_address'])) {
    $query1 = "SELECT id,email,firstname FROM homeowners_users WHERE email = :email_address LIMIT 1";
    $data1 = ["email_address" => $email_address];
    $connection1 = $userserver->openConn();
    $stmt1 = $connection1->prepare($query1);
    $stmt1->execute($data1);
    if ($stmt1->rowCount() > 0) {
      if ($result1 = $stmt1->fetch()) {
        $homeowners_user_id = $result1['id'];
        $email_add = $result1['email'];
        $firstname = $result1['firstname'];
      }

      // Update Token
      $token_verify = md5(rand());
      $query2 = "UPDATE homeowners_users SET token = :token WHERE email = :email AND id = :id";
      $data2 = ["token" => $token_verify, "email" => $email_add, "id" => $homeowners_user_id];
      $connection2 = $userserver->openConn();
      $stmt2 = $connection2->prepare($query2);
      $stmt2->execute($data2);
      if ($stmt2->rowCount() > 0) {
        $_SESSION['status'] = "Success!";
        $_SESSION['text'] = "Please check your email for a password reset link.";
        $_SESSION['status_code'] = "success";

        $_SESSION['token_verify'] = $token_verify;
        $_SESSION['forgot_password_timestamp'] = time();
        send_reset_pass($homeowners_user_id, $email_add, $firstname, $token_verify);
      }
    } else {
      $_SESSION['status'] = "You enter wrong email address";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "error";
    }
  }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
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
      <div class="row">
        <div class="col-3">
          <a href="./index.php" class=""><i class='bx bx-arrow-back text-secondary bx-tada-hover fs-1 my-2'></i></a>
        </div>
        <div class="col-6">
          <h2 class="text-center mt-3">Reset Password</h2>
        </div>
      </div>
      <p class="text-center text-muted">Enter your registered email address and we'll send you the link to reset your password.</p>

      <!-- Login Form -->
      <form action="" method="POST">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bx bx-user"></i></span>
          <input type="email" class="form-control input" placeholder="Email Address" id="email_address" name="email_address" required>
        </div>
        <div class="d-grid col-6 mx-auto">
          <input type="submit" class="btn btn-success" value="Send" name="send_link" id="send_link">
        </div>
        <div class="row my-3">

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
    </script>
  <?php
  }
  ?>

</body>

</html>