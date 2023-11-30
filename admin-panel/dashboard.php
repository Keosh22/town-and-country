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
// $today = new DateTime('first day of this month +'. $validity);
// $result = $today->format('Y-m-d');
// echo $result;
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