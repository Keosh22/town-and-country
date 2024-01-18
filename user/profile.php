<?php
session_start();
require "../includes/user-header.php";
require "../libs/server.php";
require "../includes/user-header.php";
require "../user-panel/user-nav.php";
date_default_timezone_set('Asia/Manila');
?>

<?php


$server = new Server;
$server->userAuthentication();
?>

<?php





$id = $_SESSION['user_id'];
$query = "SELECT * FROM homeowners_users WHERE id = :id";
$data = ["id" => $id];
$connection = $server->openConn();
$stmt = $connection->prepare($query);
$stmt->execute($data);

$rowCount = $stmt->rowCount();

if ($rowCount > 0) {
  while ($result = $stmt->fetch()) {
    $id = $result['id'];
    $account_number = $result['account_number'];
    $username = $result['username'];
    $firstname = $result['firstname'];
    $middle_initial = $result['middle_initial'];
    $lastname = $result['lastname'];
    $email = $result['email'];
    $phone = $result['phone_number'];
    $blk = $result['blk'];
    $lot = $result['lot'];
    $street = $result['street'];
    $phase = $result['phase'];
    $status = $result['status'];
    $tenant = $result['tenant_name'];
  }
}



require "profile.views.php";




?>