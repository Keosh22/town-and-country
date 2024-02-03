<?php
// Server
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;


if (isset($_POST['delete_property_btn'])) {
  $user_id = $_SESSION['admin_id'];
  $property_id = filter_input(INPUT_POST, 'delete_property_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, 'delete_property_password', FILTER_SANITIZE_SPECIAL_CHARS);
  $INACTIVE = "INACTIVE";

  if (!empty($password)) {
    $query = "SELECT * FROM admin_users WHERE id = :id";
    $data = ["id" => $user_id];
    $pass = $password;
    $isTrue = $server->verifyPassword($query, $data, $pass);

    // if password is correct
    if ($isTrue) {

      $query1 = "UPDATE property_list SET archive = :INACTIVE WHERE id = :property_id";
      $data1 = [
        "INACTIVE" => $INACTIVE,
        "property_id" => $property_id
      ];
      $connection1 = $server->openConn();
      $stmt1 = $connection1->prepare($query1);
      $stmt1->execute($data1);
      if ($stmt1->rowCount() > 0) {
        $_SESSION['status'] = "Property Delete Success";
        $_SESSION['text'] = "";
        $_SESSION['status_code'] = "success";
      } else {
          $_SESSION['status'] = "Property Deletion Failed!";
          $_SESSION['text'] = "You input a wrong password";
          $_SESSION['status_code'] = "error";
      }


      // // archive query
      // $query_archive = "INSERT INTO archive_property_list (property_id, homeowners_id, blk, lot, phase, street, tenant) SELECT id,homeowners_id, blk, lot, phase, street, tenant FROM property_list WHERE id = :property_id";
      // $data_archive = ["property_id" => $property_id];
      // $connection = $server->openConn();
      // $stmt_archive = $connection->prepare($query_archive);
      // $stmt_archive->execute($data_archive);
      // $count = $stmt_archive->rowCount();

      // // delete query
      // $query_delete = "DELETE FROM property_list WHERE id = :id";
      // $data_delete = ["id" => $property_id];
      // $stmt_delete = $connection->prepare($query_delete);
      // $stmt_delete->execute($data_delete);




      // if($count > 0){
      //   $_SESSION['status'] = "Property Delete Success";
      //   $_SESSION['text'] = "";
      //   $_SESSION['status_code'] = "success";
      // } else {
      //   $_SESSION['status'] = "Property Deletion Failed!";
      //   $_SESSION['text'] = "You input a wrong password";
      //   $_SESSION['status_code'] = "error";
      // }

    } else {
      $_SESSION['status'] = "Property Deletion Failed!";
      $_SESSION['text'] = "You input a wrong password";
      $_SESSION['status_code'] = "error";
    }
  }
  header("location: ../admin-panel/property_list.php");
}
?>