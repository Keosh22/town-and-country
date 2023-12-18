<?php
require_once("../libs/server.php");

?>

<?php
$server = new Server;

if (isset($_POST['announcement_id'])) {
  $announcement_id = filter_input(INPUT_POST, 'announcement_id', FILTER_SANITIZE_SPECIAL_CHARS);

  $query = "SELECT * FROM announcement WHERE id = :announcement_id";
  $data = ["announcement_id" => $announcement_id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  if ($count > 0) {
    // $row = $stmt->fetch();
    // echo json_encode($row);
    while($row = $stmt->fetch()){
      $id = $row['id'];
      $about = $row['about'];
      $content = $row['content'];
      $date = date("Y/m/d g:i A", strtotime($row['date']));
      $date_created = date("Y/m/d g:i A", strtotime($row['date_created']));
      $status = $row['status'];
    }

    $response = array(
      "id" => $id,
      "about" => $about,
      "content" => $content,
      "date" => $date,
      "date_created" => $date_created,
      "status" => $status
    );

    echo json_encode($response);
    
    
    
    
    
  } else {
    $_SESSION['status'] = "Warning";
    $_SESSION['text'] = "Something went wrong.";
    $_SESSION['status_code'] = "warning";
  }
}


?>