<?php
require_once("../libs/server.php");
?>

<?php
date_default_timezone_set('Asia/Manila');
session_start();
$server = new Server;

if (isset($_POST["request_promotion"])) {
  $business_name = filter_input(INPUT_POST, 'business_name', FILTER_SANITIZE_SPECIAL_CHARS);
  $promotion_due = date("Y-m-d", strtotime($_POST['promotion_due']));
  $promotion_photo = $_POST['promotion_photo'];
  $current_date = date("Y-m-d", strtotime("now"));
  $promotion_content = $_POST['promotion_content'];
  $PENDING = "PENDING";
  // Photo
  $name = $_FILES['promotion_photo']['name'];
  $temp = $_FILES['promotion_photo']['tmp_name'];
  $folder = "../promotion_photos/" . $name;
  $max_size = 25 * 1024 * 1024;
  $size = $_FILES['promotion_photo'];
  $file_extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

  if ($size['size'] <= $max_size) {
    if ($file_extension == "png" || $file_extension == "jpeg" || $file_extension == "jpg") {
      if (empty($business_name) && empty($promotion_content) && empty($current_date) && empty($promotion_due)) {
        $_SESSION['status'] = "Please fill all the required fields";
        $_SESSION['text'] = "";
        $_SESSION['status_code'] = "warning";
      } else {
        $query = "INSERT INTO promotion (photo, business_name, content, date_created, date_expired, status) VALUES (:photo, :business_name, :content, :date_created, :date_expired, :status)";
        $data = [
          "photo" => $name,
          "business_name" => $business_name,
          "content" => $promotion_content,
          "date_created" => $current_date,
          "date_expired" => $promotion_due,
          "status" => $PENDING
        ];
        $connection = $server->openConn();
        $stmt = $connection->prepare($query);
        $stmt->execute($data);
        $count = $stmt->rowCount();
        move_uploaded_file($temp, $folder);
        if ($count > 0) {
          $_SESSION['status'] = "Promotion created successfully";
          $_SESSION['text'] = "";
          $_SESSION['status_code'] = "success";
        } else {
          $_SESSION['status'] = "Creating promotion failed!";
          $_SESSION['text'] = "";
          $_SESSION['status_code'] = "danger";
        }
      }
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


  header("location: ../user/promotion.php");
}



?>