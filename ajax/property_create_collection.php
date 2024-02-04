<?php
// Server
require_once("../libs/server.php");
date_default_timezone_set("Asia/Manila");
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['property_id'])) {

  $property_id = filter_input(INPUT_POST, 'property_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $year_picked = filter_input(INPUT_POST, 'choose_year', FILTER_SANITIZE_SPECIAL_CHARS);


  $current_date = date("Y-m-d H:i:s", strtotime("now"));
  $current_month = date("F", strtotime("now"));
  $current_year = date("Y", strtotime("now"));
  $current_day = date("j", strtotime("now"));
  $first_day_month = date("j", strtotime("first day of this month"));
  $month = date("m", strtotime("now"));
  $year = date("Y", strtotime("now"));
  $ACTIVE = "ACTIVE";

  // Get  the proeprty list
  $query1 = "SELECT * FROM property_list WHERE id = :property_id AND archive = :ACTIVE";
  $data1 = ["property_id" => $property_id, "ACTIVE" => $ACTIVE];
  $connection1 = $server->openConn();
  $stmt1 = $connection1->prepare($query1);
  $stmt1->execute($data1);
  if ($stmt1->rowCount() > 0) {
    $query2 = "SELECT * FROM collection_list WHERE property_id = :property_id AND month = :current_month AND year = :year_picked AND archive = :ACTIVE";
    $data2 = [
      'property_id' => $property_id,
      'current_month' => $current_month,
      'year_picked' => $year_picked,
      'ACTIVE' => $ACTIVE
    ];
    $connection2 = $server->openConn();
    $stmt2 = $connection2->prepare($query2);
    $stmt2->execute($data2);
    if ($stmt2->rowCount() > 0) {
      $_SESSION['status'] = "Collection for this year is Available";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "warning";
    } else {
       // get the current monthly dues fee
       $monthly_dues = "Monthly Dues";
       $monthy_dues_id = "C007";
       $query3 = "SELECT * FROM collection_fee WHERE collection_fee_number = :monthy_dues_id";
       $data3 = ["monthy_dues_id" => $monthy_dues_id];
       $connection3 = $server->openConn();
       $stmt3 = $connection3->prepare($query3);
       $stmt3->execute($data3);
       if ($stmt3->rowCount() > 0) {
         while ($result = $stmt3->fetch()) {
           $collection_fee_id = $result['id'];
           $collection_fee = $result['fee'];
         }
         

         // Check the date
         $array_month = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October",  "November", "December");
         foreach($array_month as $x){
           $status = "AVAILABLE";
           $month_int = date("m", strtotime($x));
             $query4 = "INSERT INTO collection_list (property_id, collection_fee_id, date_created, balance, status, month, month_int, year) VALUES (:property_id, :collection_fee_id, :date_created, :balance, :status, :month, :month_int, :year)";
             $data4 = [
               "property_id" => $property_id,
               "collection_fee_id" => $collection_fee_id,
               "date_created" => $current_date,
               "balance" => $collection_fee,
               "status" => $status,
               "month" => $x,
               "month_int" => $month_int,
               "year" => $year_picked
             ];
             $connection4 = $server->openConn();
             $stmt4 = $connection4->prepare($query4);
             $stmt4->execute($data4);

             $_SESSION['status'] = "Collection for year ".$year_picked." is added";
             $_SESSION['text'] = "";
             $_SESSION['status_code'] = "successs";
         }

      
       } else {
         $_SESSION['status'] = "There is no current fee for monthly duess";
         $_SESSION['text'] = "";
         $_SESSION['status_code'] = "warning";
       }
    }
  }
  
}

?>