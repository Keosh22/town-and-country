<?php
require_once("../libs/server.php");
?>
<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
session_start();
$server = new Server;

if (isset($_POST['update_announcement'])) {
  $announcement_id = filter_input(INPUT_POST, 'announcement_id', FILTER_SANITIZE_SPECIAL_CHARS);
  $about_update = filter_input(INPUT_POST, 'about_update', FILTER_SANITIZE_SPECIAL_CHARS);
  $announcement_date_update = filter_input(INPUT_POST, 'announcement_date_update', FILTER_SANITIZE_SPECIAL_CHARS);
  $content_update = $_POST['content_update'];
  $status_update = filter_input(INPUT_POST, 'status_update', FILTER_SANITIZE_SPECIAL_CHARS);

  if (empty($announcement_id) || empty($about_update) || empty($announcement_date_update) || empty($content_update) || empty($status_update)) {
    $_SESSION['status'] = "Warning";
    $_SESSION['text'] = "Please fill all the required fields";
    $_SESSION['status_code'] = "warning";
  } else {
    $query = "UPDATE announcement SET about = :about_update, content = :content_update, date = :announcement_date_update, status = :status_update WHERE id = :announcement_id";
    $data = [
      "about_update" => $about_update,
      "content_update" => $content_update,
      "announcement_date_update" => $announcement_date_update,
      "status_update" => $status_update,
      "announcement_id" => $announcement_id
    ];
    $connection = $server->openConn();
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    $count = $stmt->rowCount();
    if ($count > 0) {
      $_SESSION['status'] = "Announcement updated successfully!";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "success";
    } else {
      $_SESSION['status'] = "Updating failed";
      $_SESSION['text'] = "Something went wrong.";
      $_SESSION['status_code'] = "danger";
    }
  }
  
}
header("location: ../admin-panel/announcement.php");
?>