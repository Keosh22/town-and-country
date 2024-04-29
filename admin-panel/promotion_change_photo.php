<?php
require_once("../libs/server.php");
?>

<?php
session_start();
$server = new Server;

if (isset($_POST['change_photo_promotion_btn'])) {
  $photo = $_POST['photo_name'];
  $id = filter_input(INPUT_POST, 'change_photo_id', FILTER_SANITIZE_SPECIAL_CHARS);

  $name = $_FILES['change_photo']['name'];
  $temp = $_FILES['change_photo']['tmp_name'];
  $folder = "../promotion_photos/" . $name;
  $size = $_FILES['change_photo'];
  $max_size = 25 * 1024 * 1024;
  $file_extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

  if ($size['size'] <= $max_size) {
    if ($file_extension == "png" || $file_extension == "jpeg" || $file_extension == "jpg") {
      $query = "UPDATE promotion SET photo = :photo WHERE id = :id";
      $data = [
        "photo" => $name,
        "id" => $id
      ];
      $connection = $server->openConn();
      $stmt = $connection->prepare($query);
      $stmt->execute($data);
      $count = $stmt->rowCount();
      if ($count > 0) {
        $_SESSION['status'] = "Photo updated successfully!";
        $_SESSION['text'] = "";
        $_SESSION['status_code'] = "success";
      } else {
        $_SESSION['status'] = "Updating failed";
        $_SESSION['text'] = "Something went wrong.";
        $_SESSION['status_code'] = "danger";
      }
      unlink("../promotion_photos/" . $photo);
      move_uploaded_file($temp, $folder);
    } else {
      $_SESSION['status'] = "Creating promotion failed!";
      $_SESSION['text'] = "You upload a wrong file.";
      $_SESSION['status_code'] = "error";
    }
  } else {
    $_SESSION['status'] = "Creating promotion failed!";
    $_SESSION['text'] = "File exceed the max size. (Minimum 5mb)";
    $_SESSION['status_code'] = "error";
  }





  header("location: ../admin-panel/promotion.php");
}
?>