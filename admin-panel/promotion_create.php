<?php
require_once("../libs/server.php");
?>

<?php
date_default_timezone_set('Asia/Manila');
session_start();
$server = new Server;

if(isset($_POST["create_promotion"])){
  $business_name = filter_input(INPUT_POST, 'business_name', FILTER_SANITIZE_SPECIAL_CHARS);
  $promotion_content = filter_input(INPUT_POST, 'promotion_content', FILTER_SANITIZE_SPECIAL_CHARS);
  $current_date = date("Y-m-d H:i:sA", strtotime("now"));
  $promotion_due = filter_input(INPUT_POST, "promotion_due", FILTER_SANITIZE_SPECIAL_CHARS);

  // Photo upload
  $name = $_FILES['promotion_photo']['name'];
  $temp = $_FILES['promotion_photo']['tmp_name'];
  $folder = "../promotion_photos/". $name;

  if(empty($business_name) && empty($promotion_content) && empty($current_date) && empty($promotion_due)){
    $_SESSION['status'] = "Please fill all the required fields";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "warning";
  } else {
   
    $query = "INSERT INTO promotion (photo, business_name, content, date_created, date_expired) VALUES (:photo, :business_name, :content, :date_created, :date_expired)";
    $data = [
      "photo" => $name,
      "business_name" => $business_name,
      "content" => $promotion_content,
      "date_created" => $current_date,
      "date_expired" => $promotion_due
    ];
    $connection = $server->openConn();
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    $count = $stmt->rowCount();
    move_uploaded_file($temp, $folder);
    if($count > 0){
      $_SESSION['status'] = "Promotion created successfully";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "success";
    } else {
      $_SESSION['status'] = "Creating promotion failed!";
      $_SESSION['text'] = "";
      $_SESSION['status_code'] = "danger";
    }
  }
  header("location: ../admin-panel/promotion.php");
}
?>



