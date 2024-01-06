<?php
require_once("../libs/server.php");
$server = new Server;
?>

<?php
if(isset($_POST['promotion_id'])){
  $promotion_id = filter_input(INPUT_POST, 'promotion_id', FILTER_SANITIZE_SPECIAL_CHARS);

  $query = "SELECT * FROM promotion WHERE id = :promotion_id";
  $data = ["promotion_id" => $promotion_id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  if($count > 0){
    while($row = $stmt->fetch()){
      $id = $row['id'];
      $photo = $row['photo'];
      $business_name = $row['business_name'];
      $content = $row['content'];
      $status = $row['status'];
      $date_created = date("Y/m/d g:i A", strtotime($row['date_created']));
      $date_expired = date("Y/m/d g:i A", strtotime($row['date_expired']));
    }

    $response = array(
      "id" => $id,
      "photo" => $photo,
      "business_name" => $business_name,
      "content" => $content,
      "status" => $status,
      "date_created" => $date_created,
      "date_expired" => $date_expired
    );

    echo json_encode($response);
  } else {
    $_SESSION['status'] = "Warning";
    $_SESSION['text'] = "Something went wrong.";
    $_SESSION['status_code'] = "warning";
  }
}
?>
