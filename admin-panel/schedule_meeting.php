<?php
require_once("../libs/server.php");
?>
<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
session_start();
$server = new Server;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $about = filter_input(INPUT_POST, 'about', FILTER_SANITIZE_SPECIAL_CHARS);
  $meeting_date = date("Y-m-d H:i:sA", strtotime($_POST['meeting_date']));
  $meeting_content = $_POST['meeting_content'];
  $date_created = date("Y-m-d H:i:sA", strtotime("now"));

  if (strlen($about) > 0 && strlen($meeting_content) > 0) {
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
    if($stmt->rowCount() > 0){
      $_SESSION['status'] = "Success";
      $_SESSION['text'] = "Meeting succesfully created!";
      $_SESSION['status_code'] = "success";
    }



  } else {
    $_SESSION['status'] = "Warning";
    $_SESSION['text'] = "Please fill al lthe required fields";
    $_SESSION['status_code'] = "warning";
  }
}

?>