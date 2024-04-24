<?php
require_once("../libs/server.php");
?>
<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
session_start();
$server = new Server;
if(isset($_POST['create_announcement'])){
  $about = filter_input(INPUT_POST, 'about', FILTER_SANITIZE_SPECIAL_CHARS);
  // $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
  $content = $_POST['content'];
  $current_date = date("Y-m-d H:i:sA", strtotime("now"));
  $expiration_date = filter_input(INPUT_POST, 'announcement_date', FILTER_SANITIZE_SPECIAL_CHARS);
  
  if(empty($about) || empty($content) || empty($current_date) || empty($expiration_date)){
    $_SESSION['status'] = "Please fill all the required fields";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "warning";
  } else {
    $query = "INSERT INTO announcement (about,content,date,date_created) VALUES (:about,:content,:date,:date_created) ";
    $data = [
      "about" => $about,
      "content" => $content,
      "date" => $expiration_date,
      "date_created" => $current_date,
    ];
    $connection = $server->openConn();
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    $count = $stmt->rowCount();
    if($count > 0){
      $_SESSION['status'] = "Announcement Created Successfully";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "success";
      $action = "Announcement: for ". $about . " posted";
      $server->insertActivityLog($action);
    } else {
      $_SESSION['status'] = "Creating Announcement Failed!";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "danger";
    }
  }
  header("location: ../admin-panel/announcement.php");
}
?>
