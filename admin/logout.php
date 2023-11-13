<?php
require_once("../libs/server.php");
?>
<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server; // Open/Close connection
$action = "Logged out";
$server-> insertActivityLog($action);

?>
<?php

session_unset();
session_destroy();
header("location: ../admin/index.php");

?>
