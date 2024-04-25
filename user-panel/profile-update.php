<?php
require_once "../libs/server.php";
session_start();


$server = new Server;

if (isset($_POST["update_info"])) {
  $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
  $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
  $middle_initial = strtoupper(filter_input(INPUT_POST, 'middle_initial', FILTER_SANITIZE_SPECIAL_CHARS));
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
  $phone = $_POST['phone_number'];
  $id = $_SESSION['user_id'];

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (!empty($firstname) || !empty($lastname) || !empty($email) || !empty($phone)) {

      $query1 = "SELECT email FROM homeowners_users WHERE email = :email LIMIT 1";
      $data1 = ["email" => $email];
      $connection1 = $server->openConn();
      $stmt1 = $connection1->prepare($query1);
      $stmt1->execute($data1);
      if ($stmt1->rowCount() > 0) {
        $query5 = "SELECT email FROM homeowners_users WHERE id = :user_id";
        $data5 = [
          "user_id" => $id
        ];
        $connection5 = $server->openConn();
        $stmt5 = $connection5->prepare($query5);
        $stmt5->execute($data5);
        if ($stmt5->rowCount() > 0) {
          if ($result5 = $stmt5->fetch()) {
            $email = $result5['email'];
          }
        }
        // $_SESSION['status'] = "Your Profile is Updated";
        // $_SESSION['text'] = "Your profile has been updated. If you want to update you email address, please try other email address account.";
        // $_SESSION['status_code'] = "info";
        // header("location: ../user/profile.php");

      }
      $query = "UPDATE homeowners_users SET firstname = :firstname, lastname = :lastname, middle_initial = :middle_initial, email = :email, phone_number = :phone_number  WHERE id = :id";
      $data = [
        "firstname" => $firstname,
        "lastname" => $lastname,
        "middle_initial" => $middle_initial,
        "email" => $email,
        "phone_number" => $phone,
        "id" => $id
      ];
      $path = "../user/profile.php";

      $_SESSION['status'] = "Update Success!";
      $_SESSION['text'] = "Your account has been updated successfully.";
      $_SESSION['status_code'] = "success";

      $server->update($query, $data, $path);
      // }
    } else {
      $_SESSION['status'] = "Update Failed!";
      $_SESSION['text'] = "Please fill all the required fields.";
      $_SESSION['status_code'] = "error";
      header("location: ../user/profile.php");
    }
  } else {
    $_SESSION['status'] = "Update Failed!";
    $_SESSION['text'] = "Email invalid";
    $_SESSION['status_code'] = "error";

    header("location: ../user/profile.php");
  }
}
