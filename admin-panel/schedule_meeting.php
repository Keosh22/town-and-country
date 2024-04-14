<?php
require_once("../libs/server.php");
?>
<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
session_start();
$server = new Server;

if (isset($_POST['create_meeting'])) {

  $about = filter_input(INPUT_POST, 'about_meeting', FILTER_SANITIZE_SPECIAL_CHARS);
  $meeting_date = date("Y-m-d H:i:sA", strtotime($_POST['meeting_date']));
  $meeting_content = $_POST['meeting_content'];
  $date_created = date("Y-m-d H:i:sA", strtotime("now"));
  $ACTIVE = "ACTIVE";
  $PRESIDENT = "President";
  $VICE_PRESIDENT = "Vice-President";
  $number = "";

  if (empty($about) && empty($meeting_content)) {
    $_SESSION['status'] = "Warning";
    $_SESSION['text'] = "Please fill al lthe required fields";
    $_SESSION['status_code'] = "warning";
  } else {

    $query = "INSERT INTO announcement (about, content, date, date_created) VALUES (:about, :content, :date, :date_created)";
    $data = [
      "about" => $about,
      "content" => $meeting_content,
      "date" => $meeting_date,
      "date_created" => $date_created
    ];
    $connection = $server->openConn();
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    if ($stmt->rowCount() > 0) {

      $action = "Meeting: for " . $about . " posted";
      $server->insertActivityLog($action);
      // Send SMS announcement to the officers
      $query1 = "SELECT phone_number FROM homeowners_users WHERE position IN (:PRESIDENT, :VICE_PRESIDENT) AND archive = :ACTIVE";
      $data1 = [
        "PRESIDENT" => $PRESIDENT,
        "VICE_PRESIDENT" => $VICE_PRESIDENT,
        "ACTIVE" => $ACTIVE
      ];
      $connection1 = $server->openConn();
      $stmt1 = $connection1->prepare($query1);
      $stmt1->execute($data1);
      if ($stmt1->rowCount() > 0) {
        while ($result1 = $stmt1->fetch()) {
          $phone_number = $result1['phone_number'];
          $number .= "," . $phone_number;
        }
       

        $number_str = ltrim($number, ",");
        $new_date = date("M j, Y g:iA", strtotime($_POST['meeting_date']));
        $message = "" . $about . "
        HOA officers, don't miss our " . $new_date . " meet at the TCH clubhouse  to plan community improvements and streamline operations.";
        $server->sendSMS($number_str, $message);
        $_SESSION['status'] = "Success";
        $_SESSION['text'] = "Meeting succesfully created!";
        $_SESSION['status_code'] = "success";

      }
    }
  }
  header("location: ../admin-panel/announcement.php");
}
?>