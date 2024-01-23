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
$server->insertCollection();
$server->updatePromotion();
$server->updateAnnouncement();



?>

<body>
	<div class="spinner_wrapper">
		<div class="spinner-border" role="status">
			<span class="visually-hidden">Loading...</span>
		</div>
	</div>

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


			<main class="content">
				<div class="row py-2 px-2 gy-3">
					<div class="col-3">
						<div class="card card-deck border-0 shadow-sm" style="background-color: #F5EBE0;">
							<div class="card-body">

								<h4 class="card-title">Homeowners</h4>
								<h6 class="card-subttitle text-success">Members</h6>
								<p class="card-text fs-3"><?php $server->countMembers(); ?></p>
								<h6 class="card-subtitle text-danger">Non-Members</h6>
								<p class="card-text fs-3"><?php $server->countNonMembers(); ?></p>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="card card-deck border-0 shadow-sm" style="background-color: #F5EBE0;">
							<div class="card-body">
								<h4 class="card-title">Announcement</h4>
								<h6 class="card-subttitle text-success">Active</h6>
								<p class="card-text fs-3">3</p>
								<h6 class="card-subtitle text-danger">Inactive</h6>
								<p class="card-text fs-3">2</p>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="card card-deck border-0 shadow-sm" style="background-color: #F5EBE0;">
							<div class="card-body">
								<h4 class="card-title">Maintenance</h4>
								<h6 class="card-subttitle text-success">Request</h6>
								<p class="card-text fs-3">15</p>
								<h6 class="card-subtitle text-danger">Pending</h6>
								<p class="card-text fs-3">5</p>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="card card-deck border-0 shadow-sm" style="background-color: #F5EBE0;">
							<div class="card-body">
								<h4 class="card-title">Due Payments</h4>
								<h6 class="card-subttitle text-success">Members</h6>
								<p class="card-text fs-3">0</p>
								<h6 class="card-subtitle text-danger">Non-Members</h6>
								<p class="card-text fs-3">0</p>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="card card-deck border-0 shadow-sm" style="background-color: #F5EBE0;">
							<div class="card-body">
								<h4 class="card-title"></h4>
								<h6 class="card-subttitle text-success">Members</h6>
								<p class="card-text fs-3">0</p>
								<h6 class="card-subtitle text-danger">Non-Members</h6>
								<p class="card-text fs-3">0</p>
							</div>
						</div>
					</div>
				</div>
			</main>




			<!-- wrapper -->
		</div>
	</div>

	<script>
		$(window).on('load', function() {
			$(".spinner_wrapper").fadeOut("slow");
		});
	</script>

	<!-- FOOTER -->
	<?php
	include("../includes/footer.php");
	?>