<?php
require_once("../libs/server.php");
require_once("../libs/PhpMailer.php");
date_default_timezone_set("Asia/Manila");
?>

<?php
$server = new Server;
$mailer = new Mailer;
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $current_month = date("F", strtotime("now"));
  $current_year = date("Y", strtotime("now"));
  $current_day = date("j", strtotime("now"));

  $due = "DUE";
  $available = "AVAILABLE";
  $not_sent = "NOT SENT";
  
  $day = "";
  $total_ammount_due = 0;


  $query2 = "SELECT 
    collection_list.id as collection_id_pk,
    collection_list.email_status as email_status,
    collection_list.month as collection_month,
    collection_list.balance as collection_fee,
    collection_list.property_id as collection_property_id,
    collection_list.owners_id as collection_owners_id,
    property_list.blk as property_blk,
    property_list.lot as property_lot,
    property_list.phase as property_phase,
    property_list.street as property_street,
    homeowners_users.firstname,
    homeowners_users.middle_initial,
    homeowners_users.lastname,
    homeowners_users.account_number,
    homeowners_users.email
    FROM collection_list
    INNER JOIN property_list ON collection_list.property_id = property_list.id
    INNER JOIN homeowners_users ON collection_list.owners_id = homeowners_users.id
    WHERE collection_list.month = :current_month AND collection_list.status = :available AND email_status = :not_sent
     ";
  $data2 = ["current_month" => $current_month, "available" => $available, "not_sent" => $not_sent];
  $connection2 = $server->openConn();
  $stmt2 = $connection2->prepare($query2);
  $stmt2->execute($data2);
  if ($stmt2->rowCount() > 0) {
    while ($result2 = $stmt2->fetch()) {
      $collection_id_pk = $result2['collection_id_pk'];
      $collection_month = $result2['collection_month'];
      $collection_fee = $result2['collection_fee'];
      $collection_property_id = $result2['collection_property_id'];
      $collection_owners_id = $result2['collection_owners_id'];

      $property_blk = $result2['property_blk'];
      $property_lot = $result2['property_lot'];
      $property_street = $result2['property_street'];
      $property_phase = $result2['property_phase'];

      $fname = $result2['firstname'];
      $midname = $result2['middle_initial'];
      $lname = $result2['lastname'];
      $acc_number = $result2['account_number'];
      $email_address = $result2['email'];
      
      // Compute the remaining balance
      $query4 = "SELECT * FROM collection_list WHERE property_id = :collection_property_id AND owners_id = :collection_owners_id AND status = :available";
      $data4 = ["collection_property_id" => $collection_property_id, "collection_owners_id" => $collection_owners_id, "available" => $available];
      $connection4 = $server->openConn();
      $stmt4 = $connection4->prepare($query4);
      $stmt4->execute($data4);
      if ($stmt4->rowCount() > 0) {
        while ($result4 = $stmt4->fetch()) {
          $remaining_balance = intval($result4['balance']);

          $total_ammount_due += $remaining_balance;
        }
      }


      $address = "BLK-" . $property_blk . " LOT-" . $property_lot . " " . $property_street . " St. " . $property_phase;
      $full_name = $fname . " " . $midname . " " . $lname;

      if ($property_phase = "Phase 1") {
        $day = "8th day";
      } elseif ($property_phase = "Phase 2") {
        $day = "15th day";
      } elseif ($property_phase = "Phase 3") {
        $day = "last day";
      } else {
        $day = "";
      }

      $email = $email_address;
      $subject = "Friendly reminder for Outstanding Payment (Monthly Dues)";
      $message = '<div class="container-fluid">
        <div class="row">
          <div class="col-12 text-center mb-3">
            <a href="#"><img class="logo-img text-center" src="../img/logo.png" alt=""></a>
          </div>
          <div class="col-12 text-center">
            <h1><b>Payment Reminder</b></h1>
          </div>
          <div class="row">
            <div class="col-12">
              <h4><b>Dear ' . $fname . ',</b> </h4>
            </div>
            <div class="col-12">
              <p>I hope you are doing well! This is a friendly reminder that the monthly due collection for
              your property: <b>' . $address . '</b> will due in the <b>' . $day . '</b> of this month of <b>' . $collection_month . '</b> 
            </div>
            <br>
            <br>
            <div class="col-12">
              <p>Below is the summary of your monthly dues:</p>
              <p><b>Account Number     :     ' . $acc_number . '</b></p>
              <p><b>Homeowners Name    :     ' . $full_name . '</b></p>
              <p><b>Property Address   :     ' . $address . '</b></p>
              <p><b>Balance            :     ' . $total_ammount_due . '</b></p>
              <p><b>Current Charges    :     ' . $collection_fee . '</b></p>
              <p><b>Due Date           :     ' . $day . ' of ' . $collection_month . '</b></p>
              <p><b>Total Ammount Due  :     ' . $total_ammount_due + $collection_fee . '</b></p>
              <br>
              <br>
              Let us know if there are any issues or if we can assist you in any way,
              <br>
              <p><b>Thank you!</b></p>
              <br>
              This is a system generated message, do not reply.
            </div>
          </div>
        </div>
      </div>';


      // BUG When email sent is failed still updating 
     
      $sent = "SENT";
      $query3 = "UPDATE collection_list SET email_status = :sent WHERE id = :collection_id_pk ";
      $data3 = ["sent" => $sent, "collection_id_pk" => $collection_id_pk];
      $connection3 = $server->openConn();
      $stmt3 = $connection3->prepare($query3);
      $stmt3->execute($data3);
      $mailer->sendMail($email, $subject, $message);
      $total_ammount_due = 0;
    }
  }
}

?>

