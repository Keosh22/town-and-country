<!-- SERVER -->
<?php 
require_once("../libs/server.php"); 
session_start();
?>

<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $current_password = $_POST['current_password'];
  $id = $_SESSION['user_id'];
  $query = "SELECT * FROM admin_users WHERE id = :id";
  $data = [
    "id" => $id
  ];
  $response = '
  <div class="form-text text-danger">Current password not matched</div>
  ';
  $button = '<script>
  $("#change_password").prop("disabled", true);
  $("#current_password").removeClass("input-success");
  $("#current_password").addClass("input-danger");
  </script>';


  $server = new Server;

  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  
  while($result = $stmt->fetch()){
    $password = $result['password'];
  }





  if(!empty($current_password)){
    if(password_verify($current_password, $password)){
      $response = '<div class="form-text text-success">Current password matched</div>';
      $button = '<script>
      $("#change_password").prop("disabled", false);
      $("#current_password").removeClass("input-danger");
      $("#current_password").addClass("input-success");
      </script>';
    }
  } else { 
    
  } 
  echo $response;
  echo $button;
  die;

}

?>