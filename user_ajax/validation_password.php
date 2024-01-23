<?php
require_once "../libs/server.php";
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $current_password = $_POST["current_password"];
    $id = $_SESSION["user_id"];
    $query = "SELECT * FROM homeowners_users WHERE id = :id";
    $data = [
        "id" => $id
    ];

    $response =  '<div class="form-text text-danger">Current password not matched</div>';
    $button = '<script>
    $("#current_password").removeClass("input-success");
    $("#current_password").addClass("input-danger");
    $("#change_password").prop("disabled", true);
    $("#confirm_password").addClass("input-danger");
    $("#confirm_password").removeClass("input-success");
  
    $("#confirm_password").val("");
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
          $("#change_password").prop("disabled", true);
          $("#current_password").removeClass("input-danger");
          $("#current_password").addClass("input-success");
          </script>';
        }
      } elseif(empty($current_password)) { 
        $response = '<div class="form-text text-success"></div>';
      } 
      echo $response;
      echo $button;
      die;
    
    
}


?>