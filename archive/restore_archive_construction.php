<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;

  if(isset($_POST['payment_id'])){
    $_SESSION['status'] = "Failed!";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "error";
      $payment_id = filter_input(INPUT_POST, 'payment_id', FILTER_SANITIZE_SPECIAL_CHARS);
      $ACITVE = "ACTIVE";
      $INACTIVE = "INACTIVE";

      if(strlen($payment_id) > 0){
        
        $query = "UPDATE construction_payment SET archive = :ACTIVE WHERE id = :payment_id AND archive = :INACTIVE";
        $data = [
          "ACTIVE" => $ACITVE,
          "payment_id" => $payment_id,
          "INACTIVE" => $INACTIVE,
        ];
        $connection = $server->openConn();
        $stmt = $connection->prepare($query);
        $stmt->execute($data);
        if($stmt->rowCount() > 0){
          $_SESSION['status'] = "Success!";
          $_SESSION['text'] = "This record has been successfuly restored";
          $_SESSION['status_code'] = "success";
        } else {
          $_SESSION['status'] = "Failed!";
          $_SESSION['text'] = "";
          $_SESSION['status_code'] = "error";
        }
      }
  }

?>