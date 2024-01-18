<?php
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;

if(isset($_POST['change_photo_promotion_btn'])){
  $photo = $_POST['photo_name'];
  $id = filter_input(INPUT_POST, 'change_photo_id', FILTER_SANITIZE_SPECIAL_CHARS);

  $name = $_FILES['change_photo']['name'];
  $temp = $_FILES['change_photo']['tmp_name'];
  $folder = "../promotion_photos/" . $name;

  $query = "UPDATE promotion SET photo = :photo WHERE id = :id";
  $data = [
    "photo" => $name,
    "id" => $id
  ];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $count = $stmt->rowCount();
  if($count > 0){
    $_SESSION['status'] = "Photo updated successfuly!";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "success";
  } else {
    $_SESSION['status'] = "Updating failed";
      $_SESSION['text'] = "Something went wrong.";
      $_SESSION['status_code'] = "danger";
  }
  unlink("../promotion_photos/" . $photo);
  move_uploaded_file($temp, $folder);

  header("location: ../admin-panel/promotion.php");
}
?>