<?php 
require_once("../libs/server.php"); 
?>

<?php 
$server = new Server;
if(isset($_POST['update_property'])){
  $porperty_id = filter_input(INPUT_POST, 'property_id');
}


  
