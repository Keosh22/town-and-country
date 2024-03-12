<!-- SERVER -->
<?php
require_once("../libs/server.php");

?>

<?php
session_start();
$server = new Server;
$number = '09771778411';
$messages = 'Hello world';
$sender_name = 'Tanga';
$server->sendSMS($number, $messages);
$_SESSION['status'] = "Error";
$_SESSION['text'] = "";
$_SESSION['status_code'] = "error";
?>