<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['id_arr']) && isset($_POST['password']) ) {

  $payment_id_arr = $_POST['id_arr'];
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
  $INACTIVE = "INACTIVE";
  $admin_id = $_SESSION['admin_id'];


  $query1 = "SELECT * FROM admin_users WHERE id = :admin_id";
  $data1 = ["admin_id" => $admin_id];
  $isTrue = $server->verifyPassword($query1, $data1, $password);

  if (!empty($payment_id_arr) || !empty($password)) {

    if ($isTrue) {

      $connection1 = $server->openConn();
      $stmt1 = $connection1->prepare($query1);
      $stmt1->execute($data1);
      if ($stmt1->rowCount() > 0) {
        while ($result1 = $stmt1->fetch()) {
          $account_number = $result1['account_number'];
          $firstname = $result1['firstname'];
        }
      }
  
      // Payment ID ARRAY (LOOP THE PAYMENT ID ARRAY)
      foreach ($payment_id_arr as $payment_id) {
  
        $query2 = "UPDATE payments_list SET archive = :INACTIVE WHERE id = :payment_id";
        $data2 = ["INACTIVE" => $INACTIVE, "payment_id" => $payment_id];
        $connection2 = $server->openConn();
        $stmt2 = $connection2->prepare($query2);
        $stmt2->execute($data2);
        $_SESSION['status'] = "Success";
        $_SESSION['text'] = "The log has been archived successfully";
        $_SESSION['status_code'] = "success";
        
      }
    
      

      $action = "Archive the multiple payments Membership Fee";
      $server->insertActivityLog($action);
    } else {
      $_SESSION['status'] = "Failed!";
      $_SESSION['text'] = "You input a wrong password";
      $_SESSION['status_code'] = "error";
    }


  } else {
    $_SESSION['status'] = "Failed!";
    $_SESSION['text'] = "No item was selected!";
    $_SESSION['status_code'] = "error";
  }




  
} else {
}
?>