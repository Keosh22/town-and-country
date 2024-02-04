<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;



if (isset($_POST['register'])) {
  $account_number = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_SPECIAL_CHARS);
  $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
  $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
  $middle_initial = filter_input(INPUT_POST, 'middle_initial', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $phone_number = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_SPECIAL_CHARS);
  $blk = filter_input(INPUT_POST, 'blk', FILTER_SANITIZE_SPECIAL_CHARS);
  $lot = filter_input(INPUT_POST, 'lot', FILTER_SANITIZE_SPECIAL_CHARS);
  $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_SPECIAL_CHARS);
  $phase = filter_input(INPUT_POST, 'phase', FILTER_SANITIZE_SPECIAL_CHARS);
  $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);
  $date_created = date("Y-m-d H:i:sA", strtotime("now"));
  $ACTIVE = "ACTIVE";




  if (empty($firstname) && empty($lastname) && empty($middle_initial) && empty($email) && empty($phone_number) && empty($blk) && empty($lot) && empty($street) && empty($phase) && empty($username) && empty($password) && empty($confirm_password)) {
  } else {

      // Check if there is current property registered
      $query3 = "SELECT blk,lot FROM property_list WHERE 
      blk = :blk AND
      lot = :lot AND
      archive = :ACTIVE
      ";
        $data3 = [
          "blk" => $blk,
          "lot" => $lot,
          "ACTIVE" => $ACTIVE
        ];
        $connection3 = $server->openConn();
        $stmt3 = $connection3->prepare($query3);
        $stmt3->execute($data3);
        if ($stmt3->rowCount() > 0) {
          $_SESSION['status'] = "Failed!";
          $_SESSION['text'] = "Property already exist!";
          $_SESSION['status_code'] = "error";
          header("location: ../admin-panel/homeowners.php");
        } else {


    $query = "INSERT INTO homeowners_users (account_number, username, password, firstname, lastname, middle_initial, email, phone_number, blk, lot, street, phase, status, date_created ) VALUES (:account_number, :username, :password, :firstname, :lastname, :middle_initial, :email, :phone_number, :blk, :lot, :street, :phase, :status, :date_created)";
    $data = [
      "account_number" => $account_number,
      "username" => $username,
      "password" => $password,
      "firstname" => $firstname,
      "lastname" => $lastname,
      "middle_initial" => $middle_initial,
      "email" => $email,
      "phone_number" => $phone_number,
      "blk" => $blk,
      "lot" => $lot,
      "street" => $street,
      "phase" => $phase,
      "status" => $status,
      "date_created" => $date_created
    ];
    $path = "../admin-panel/homeowners.php";
    $server->register($query, $data, $path);

    $query1 = "SELECT id,account_number FROM homeowners_users WHERE account_number = :account_number";
    $data1 = ["account_number" => $account_number];
    $connection1 = $server->openConn();
    $stmt1 = $connection1->prepare($query1);
    $stmt1->execute($data1);
    if ($stmt1->rowCount() > 0) {
      while ($result1 = $stmt1->fetch()) {
        $homeowners_id = $result1['id'];
      }
    }

  

      $query2 = "INSERT INTO property_list (homeowners_id, blk, lot, phase, street) VALUES (:homeowners_id, :blk, :lot, :phase, :street)";
      $data2 = [
        "homeowners_id" => $homeowners_id,
        "blk" => $blk,
        "lot" => $lot,
        "phase" => $phase,
        "street" => $street
      ];
      $connection2 = $server->openConn();
      $stmt2 = $connection2->prepare($query2);
      $stmt2->execute($data2);
    }


    $action = "Register homeowners account of " . $account_number . ": " . $firstname . "";
    $server->insertActivityLog($action);
    $server->insertCollection();
  }
}
?>
