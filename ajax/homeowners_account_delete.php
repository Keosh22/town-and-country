<?php
require_once("../libs/server.php");
?>
<?php
$server = new Server;
session_start();
if (isset($_POST['homeowners_id'])) {
  $homeowners_id = filter_input(INPUT_POST, 'homeowners_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $ACTIVE = "ACTIVE";
  $INACTIVE = "INACTIVE";

  // Check first if there is current property registered in this account
  $query1 = "SELECT homeowners_id FROM property_list WHERE homeowners_id = :homeowners_id AND archive = :ACTIVE";
  $data1 = ["homeowners_id" => $homeowners_id, "ACTIVE" => $ACTIVE];
  $connection1 = $server->openConn();
  $stmt1 = $connection1->prepare($query1);
  $stmt1->execute($data1);
  if ($stmt1->rowCount() > 0) {
    $_SESSION['status'] = "Failed!";
    $_SESSION['text'] = "Sorry, you can't delete this account. ";
    $_SESSION['status_code'] = "error";
  } else {

    // Delete all payment records
    $query2 = "SELECT homeowners_id FROM payments_list WHERE homeowners_id = :homeowners_id AND archive = :INACTIVE";
    $data2 = ["homeowners_id" => $homeowners_id, "INACTIVE" => $INACTIVE];
    $connection2 = $server->openConn();
    $stmt2 = $connection2->prepare($query2);
    $stmt2->execute($data2);
    if($stmt2->rowCount() > 0){
      while($result2 = $stmt2->fetch() ){
        $query3 = "DELETE FROM payments_list WHERE homeowners_id = :homeowners_id AND archive = :INACTIVE";
        $data3 = ["homeowners_id" => $homeowners_id, "INACTIVE" => $INACTIVE];
        $connection3 = $server->openConn();
        $stmt3 = $connection3->prepare($query3);
        $stmt3->execute($data3);
      }
    }

    // Delete all collection list records
    $query4 = "SELECT owners_id FROM collection_list WHERE owners_id = :homeowners_id AND archive = :INACTIVE";
    $data4 = ["homeowners_id" => $homeowners_id, "INACTIVE" => $INACTIVE];
    $connection4 = $server->openConn();
    $stmt4 = $connection4->prepare($query4);
    $stmt4->execute($data4);
    if($stmt4->rowCount() > 0){
      while($result4 = $stmt4->fetch() ){
        $query5 = "DELETE FROM collection_list WHERE owners_id = :homeowners_id AND archive = :INACTIVE";
        $data5 = ["homeowners_id" => $homeowners_id, "INACTIVE" => $INACTIVE];
        $connection5 = $server->openConn();
        $stmt5 = $connection5->prepare($query5);
        $stmt5->execute($data5);
      }
    }

     // Delete all property list records
     $query6 = "SELECT homeowners_id FROM property_list WHERE homeowners_id = :homeowners_id AND archive = :INACTIVE";
     $data6 = ["homeowners_id" => $homeowners_id, "INACTIVE" => $INACTIVE];
     $connection6 = $server->openConn();
     $stmt6 = $connection6->prepare($query6);
     $stmt6->execute($data6);
     if($stmt6->rowCount() > 0){
       while($result6 = $stmt6->fetch() ){
         $query7 = "DELETE FROM property_list WHERE homeowners_id = :homeowners_id AND archive = :INACTIVE";
         $data7 = ["homeowners_id" => $homeowners_id, "INACTIVE" => $INACTIVE];
         $connection7 = $server->openConn();
         $stmt7 = $connection7->prepare($query7);
         $stmt7->execute($data7);
       }
     }

     // Delete all property list records
     $query8 = "SELECT id FROM homeowners_users WHERE id = :homeowners_id AND archive = :INACTIVE";
     $data8 = ["homeowners_id" => $homeowners_id, "INACTIVE" => $INACTIVE];
     $connection8 = $server->openConn();
     $stmt8 = $connection8->prepare($query8);
     $stmt8->execute($data8);
     if($stmt8->rowCount() > 0){
       while($result8 = $stmt8->fetch() ){
         $query9 = "DELETE FROM homeowners_users WHERE id = :homeowners_id AND archive = :INACTIVE";
         $data9 = ["homeowners_id" => $homeowners_id, "INACTIVE" => $INACTIVE];
         $connection9 = $server->openConn();
         $stmt9 = $connection9->prepare($query9);
         $stmt9->execute($data9);
       }
     }

  }
}
?>