<?php
require_once("../libs/server.php");
require_once("../libs/PhpMailer.php");

DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$server = new Server; // Open/Close connection
$send_email = new Mailer;

session_start();

if (isset($_POST['send_link'])) {
  $email = filter_input(INPUT_POST, 'email_address', FILTER_SANITIZE_SPECIAL_CHARS);

  if (empty($email)) {
  } else {
    $query1 = "SELECT id, firstname, email FROM admin_users WHERE email = :email LIMIT 1";
    $data1 = ["email" => $email];
    $connection1 = $server->openConn();
    $stmt1 = $connection1->prepare($query1);
    $stmt1->execute($data1);
    if ($stmt1->rowCount() > 0) {
      if ($result1 = $stmt1->fetch()) {
        $admin_id = $result1['id'];
        $admin_firstname = $result1['firstname'];
        $admin_email = $result1['email'];
      }

      // Update Token
      $token_verify = md5(rand());
      $query2 = "UPDATE admin_users SET token = :token WHERE email = :email AND id = :id";
      $data2 = ["token" => $token_verify, "email" => $admin_email, "id" => $admin_id];
      $connection2 = $server->openConn();
      $stmt2 = $connection2->prepare($query2);
      $stmt2->execute($data2);
      if ($stmt2->rowCount() > 0) {
        $_SESSION['status'] = "Success!";
        $_SESSION['text'] = "Please check your email for a password reset link.";
        $_SESSION['status_code'] = "success";

        $_SESSION['token_verify'] = $token_verify;
        $_SESSION['forgot_password_timestamp'] = time();

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
            <h4><b>Hi ' . $admin_firstname . ',</b> </h4>
            </div>
            <div class="col-12">
            <p>We received a request to reset the password of your account.
            </p>
              <br>
              <p>To reset the password click on the link below.
              </p>
              <br>
              <a type="button" class="btn btn-success" href="http://localhost/town-and-country/admin/change_password.php?token=' . $token_verify . '&email=' . $admin_email . '&id=' . $admin_id . '">Click Me</a>
            </div>
            <br>
            <br>
          </div>
        </div>
      </div>';
        $send_email->sendMail($admin_email, $SUBJECT, $BODY);
      }
    } else {
      $_SESSION['status'] = "You enter wrong email address";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "error";
    }
  }
  header("location: ../admin/index.php");
}













?>