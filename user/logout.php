<?php
require_once("../libs/server.php");
?>

<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
session_unset();
session_destroy();
header("location: ../index.php");

?>

