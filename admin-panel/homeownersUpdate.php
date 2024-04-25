<?php
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;
if (isset($_POST['update_btn'])) {
  $homeowners_id = filter_input(INPUT_POST, 'homeowners_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $firstname = filter_input(INPUT_POST, 'firstname_update', FILTER_SANITIZE_SPECIAL_CHARS);
  $lastname = filter_input(INPUT_POST, 'lastname_update', FILTER_SANITIZE_SPECIAL_CHARS);
  $middle_initial = filter_input(INPUT_POST, 'middle_initial_update', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email_update', FILTER_SANITIZE_EMAIL);
  $phone_number = filter_input(INPUT_POST, 'phone_number_update', FILTER_SANITIZE_SPECIAL_CHARS);
  // $status = filter_input(INPUT_POST, 'status_update', FILTER_SANITIZE_SPECIAL_CHARS);
  $blk = filter_input(INPUT_POST, 'blk_update', FILTER_SANITIZE_SPECIAL_CHARS);
  $lot = filter_input(INPUT_POST, 'lot_update', FILTER_SANITIZE_SPECIAL_CHARS);
  $phase = filter_input(INPUT_POST, 'phase_update', FILTER_SANITIZE_SPECIAL_CHARS);
  $street = filter_input(INPUT_POST, 'street_update', FILTER_SANITIZE_SPECIAL_CHARS);
  $position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_SPECIAL_CHARS);
  $ACTIVE = "ACTIVE";


  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (empty($firstname) && empty($lastname)  && empty($middle_initial)  && empty($email)  && empty($phone_number)  && empty($blk)  && empty($lot)  && empty($phase)  && empty($street) && empty($position)) {
    } else {

      // // Check if there is current property registered
      // $query3 = "SELECT blk,lot,phase,street FROM property_list WHERE 
      //   blk = :blk AND
      //   lot = :lot AND
      //   phase = :phase AND
      //   street = :street
      //   ";
      // $data3 = [
      //   "blk" => $blk,
      //   "lot" => $lot,
      //   "phase" => $phase,
      //   "street" => $street
      //   ];
      // $connection3 = $server->openConn();
      // $stmt3 = $connection3->prepare($query3);
      // $stmt3->execute($data3);
      // if ($stmt3->rowCount() > 0) {
      //   $_SESSION['status'] = "Failed!";
      //   $_SESSION['text'] = "Property already exist!";
      //   $_SESSION['status_code'] = "error";

      // } else {

      // }

      // Validates Email

      // Validates Email
      $query4 = "SELECT email FROM homeowners_users WHERE email = :email AND archive = :ACTIVE LIMIT 1";
      $data4 = [
        "email" => $email,
        "ACTIVE" => $ACTIVE
      ];
      $connection4 = $server->openConn();
      $stmt4 = $connection4->prepare($query4);
      $stmt4->execute($data4);
      if ($stmt4->rowCount() > 0) {
        $query5 = "SELECT email FROM homeowners_users WHERE id = :homeowners_id";
        $data5 = [
          "homeowners_id" => $homeowners_id
        ];
        $connection5 = $server->openConn();
        $stmt5 = $connection5->prepare($query5);
        $stmt5->execute($data5);
        if($stmt5->rowCount() > 0){
          if($result5 = $stmt5->fetch()){
            $email = $result5['email'];
          }
        }
        // $_SESSION['status'] = "Failed!";
        // $_SESSION['text'] = "Email already exist!";
        // $_SESSION['status_code'] = "error";
        // header("location: ../admin-panel/homeowners.php");
      }

      $query = "SELECT * FROM homeowners_users WHERE id = :homeowners_id";
      $data = ["homeowners_id" => $homeowners_id];
      $connection = $server->openConn();
      $stmt = $connection->prepare($query);
      $stmt->execute($data);
      $count = $stmt->rowCount();

      if ($count > 0) {
        while ($result = $stmt->fetch()) {
          $account_number = $result['account_number'];
          $firstname_fetch = $result['firstname'];
          $lastname_fetch  = $result['lastname'];
          $middle_initial_fetch  = $result['middle_initial'];
          $email_fetch  = $result['email'];
          $phone_number_fetch  = $result['phone_number'];
          // $status_fetch  = $result['status'];
          $blk_fetch  = $result['blk'];
          $lot_fetch  = $result['lot'];
          $phase_fetch  = $result['phase'];
          $street_fetch  = $result['street'];
          $position_fetch = $result['position'];
        }

        $query = "UPDATE homeowners_users SET firstname = :firstname, lastname = :lastname, middle_initial = :middle_initial, email = :email, phone_number = :phone_number, blk = :blk, lot = :lot, phase = :phase, street = :street, position = :position WHERE id = :homeowners_id";
        $data = [
          "firstname" => $firstname,
          "lastname" => $lastname,
          "middle_initial" => $middle_initial,
          "email" => $email,
          "phone_number" => $phone_number,
          "blk" => $blk,
          "lot" => $lot,
          "phase" => $phase,
          "street" => $street,
          "position" => $position,
          "homeowners_id" => $homeowners_id
        ];
        $connection = $server->openConn();
        $stmt = $connection->prepare($query);
        $stmt->execute($data);
        $count = $stmt->rowCount();
        $changed = "The following information has been updated: ";
        // Get the value that has been changed
        if ($firstname_fetch == $firstname && $lastname_fetch == $lastname && $middle_initial_fetch == $middle_initial && $email_fetch == $email && $phone_number_fetch == $phone_number && $blk_fetch == $blk && $lot_fetch == $lot && $phase_fetch == $phase && $street_fetch == $street && $position == $position_fetch) {
          $_SESSION['status'] = "No information has been changed!";
          $_SESSION['text'] = "";
          $_SESSION['status_code'] = "info";
        } else {
          // validate what information has been changed
          if ($firstname_fetch != $firstname) {
            $changed .= " FIRSTNAME,";
          }
          if ($lastname_fetch != $lastname) {
            $changed .= " LASTNAME,";
          }
          if ($middle_initial_fetch != $middle_initial) {
            $changed .= " MIDDLE INITIAL,";
          }
          if ($email_fetch != $email) {
            $changed .= " EMAIL,";
          }
          if ($phone_number_fetch != $phone_number) {
            $changed .= " PHONE NUMBER,";
          }

          if ($blk_fetch != $blk) {
            $changed .= " BLK,";
          }
          if ($lot_fetch != $lot) {
            $changed .= " LOT,";
          }
          if ($phase_fetch != $phase) {
            $changed .= " PHASE,";
          }
          if ($street_fetch != $street) {
            $changed .= " STREET,";
          }
          if ($position_fetch != $position) {
            $changed .= " POSITION,";
          }
          $_SESSION['status'] = "Success!";
          $_SESSION['text'] = $changed;
          $_SESSION['status_code'] = "success";
          // Activity log
          $action = "Update homeowners information of " . $account_number . ": " . $firstname . " = " . $changed . "";
          $server->insertActivityLog($action);
        }
      }
      // }
    }
  } else {
    $_SESSION['status'] = "Failed!";
    $_SESSION['text'] = "Email Invalid!";
    $_SESSION['status_code'] = "error";
  }
}
header("location: ../admin-panel/homeowners.php");
?>


