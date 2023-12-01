<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
?>
<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');

?>
<?php
session_start();

$server = new Server;
$server->adminAuthentication();

// $validity = '3 days';
// $today = new DateTime('first day of this month + 1 day'. $validity);
// $result = $today->format('Y-m-d');
// $expiration = date("Y-m-d ",strtotime("+1 day"));
// $currentDate = date("Y-m-d ",strtotime("now +1day"));
// if($expiration == $currentDate){
// 	echo "Same date";
// } else {
// 	echo "Not same date";
// }
?>

<body>
	<div class="wrapper">
		<!-- SIDEBAR -->
		<?php
		
		require_once("../includes/sidebar.php");
		?>


		<!-------------- Main body content ---------->
		<div class="main">

			<!-- NAVBAR -->
			<?php
			
			require_once("../includes/navbar.php");
			?>



			

			<!-- wrapper -->
		</div>
	</div>

	<!-- FOOTER -->
	<?php
	include("../includes/footer.php");
	?>