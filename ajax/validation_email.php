<!-- SERVER -->
<?php require_once("../libs/server.php"); ?>

<?php
$server = new Server;
if (isset($_POST['email'])) {


  $email = $_POST['email'];
  $ACTIVE = "ACTIVE";
  $query4 = "SELECT email FROM homeowners_users WHERE email = :email AND archive = :ACTIVE LIMIT 1";
  $data4 = [
    "email" => $email,
    "ACTIVE" => $ACTIVE
  ];
  $connection4 = $server->openConn();
  $stmt4 = $connection4->prepare($query4);
  $stmt4->execute($data4);
  if ($stmt4->rowCount() > 0) {

  } else {
 
  }


}

?>