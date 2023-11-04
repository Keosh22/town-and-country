<!-- SERVER -->
<?php require_once("../libs/server.php"); ?>

<?php
$server = new Server;

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $username = $_POST['username'];
  $query = "SELECT * FROM admin_users WHERE username = :username";
  $data = ["username" => $username];


  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $rowCount = $stmt->rowCount();
  $respone = '<div class="form-text text-success">Username available</div>';

  if($rowCount > 0){
    $respone = '<div class="form-text text-danger">Username already exist!</div>';
  }
  echo $respone;
  die;
}

?>