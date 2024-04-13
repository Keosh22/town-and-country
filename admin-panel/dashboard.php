<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
?>
<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
$current_month = date("F", strtotime("now"));
$current_month_num = date("n", strtotime("now"));
$current_year = date("Y", strtotime("now"));
$current_day = date("j", strtotime("now"));
?>
<?php
session_start();

$server = new Server;
$server->adminAuthentication();
$server->insertCollection();
$server->updatePromotion();
$server->updateAnnouncement();
$server->updateMembershipStatus();





// UPDATE EMAIL
if ($current_day >= date("j", mktime(0, 0, 0, $current_month_num, 3, $current_year)) && $current_day <= date("j", mktime(0, 0, 0, $current_month_num, 4, $current_year))) {
	$server->updateEmailNotSent();
} elseif ($current_day >= date("j", mktime(0, 0, 0, $current_month_num, 10, $current_year)) && $current_day <= date("j", mktime(0, 0, 0, $current_month_num, 11, $current_year))) {
	$server->updateEmailNotSent();
} elseif ($current_day >= date("j", mktime(0, 0, 0, $current_month_num, 17, $current_year)) && $current_day <= date("j", mktime(0, 0, 0, $current_month_num, 18, $current_year))) {
	$server->updateEmailNotSent();
}
// $server->updateAllNotSent();

?>

<body>
	<!-- <div class="spinner_wrapper">
		<div class="spinner-border" role="status">
			<span class="visually-hidden">Loading...</span>
		</div>
	</div> -->

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
					<div class="col d-flex justify-content-center">
						<h1 class="my-2"><b>Welcome to TCH Homeowners Payment Collection System</b></h1>
					</div>

					<div class="card-group gap-2">

						<div class="card  border-0 shadow-sm" style="background-color: #a9b2ac;">
							<div class="card-body">
								<div class="row">
									<h4 class="card-title"><a href="../admin-panel/homeowners.php" class="text-decoration-none text-dark">Homeowners</a></h4>
									<div class="col-6">
										<h6 class="card-subttitle text-success"><b>Members</b></h6>
										<div class="col d-flex justify-content-between">
											<p class="card-text fs-3"><?php $server->countMembers(); ?></p>
											<i class="bx bx-user-check bx-tada-hover fs-1 text-success"></i>
										</div>
									</div>
									<div class="col-6">
										<h6 class="card-subttitle text-danger"><b>Non-Members</b></h6>
										<div class="col d-flex justify-content-between">
											<p class="card-text fs-3"><?php $server->countNonMembers(); ?></p>
											<i class="bx bx-user-x bx-tada-hover fs-1 text-danger"></i>
										</div>
									</div>
									<div class="col-6">
										<h6 class="card-subttitle text-warning"><b>Expired</b></h6>
										<div class="col d-flex justify-content-between">
											<p class="card-text fs-3"><?php $server->countExpired(); ?></p>
											<i class="bx bx-alarm-exclamation bx-tada-hover fs-1 text-warning"></i>
										</div>
									</div>
									<div class="col-6">
										<h6 class="card-subttitle text-info"><b>Tenants</b></h6>
										<div class="col d-flex justify-content-between">
											<p class="card-text fs-3"><?php $server->countTenant(); ?></p>
											<i class="bx bx-group bx-tada-hover fs-1 text-info"></i>
										</div>

									</div>
								</div>
							</div>
						</div>


						<div class="card border-0 shadow-sm" style="background-color: #bcd0c7;">
							<div class="card-body">
								<h4 class="card-title"><a href="../admin-panel/announcement.php" class="text-decoration-none text-dark">Announcement</a></h4>
								<h6 class="card-subttitle text-success"><b>Active</b></h6>
								<div class="col d-flex justify-content-between">
									<p class="card-text fs-3"><?php $server->countAnnouncementActive(); ?></p>
									<i class="bx bxs-check-square bx-tada-hover fs-1 text-success"></i>
								</div>
								<h6 class="card-subtitle text-danger"><b>Inactive</b></h6>
								<div class="col d-flex justify-content-between">
									<p class="card-text fs-3"><?php $server->countAnnouncementInactive(); ?></p>
									<i class="bx bxs-x-square bx-tada-hover fs-1 text-danger"></i>
								</div>

							</div>
						</div>


						<div class="card  border-0 shadow-sm" style="background-color: #c5dac1;">
							<div class="card-body">
								<h4 class="card-title"><a href="../admin-panel/maintenance_request.php" class="text-decoration-none text-dark">Maintenance</a></h4>
								<h6 class="card-subttitle text-danger"><b>Pending</b></h6>
								<div class="col d-flex justify-content-between">
									<p class="card-text fs-3"><?php $server->countPending(); ?></p>
									<i class="bx bx-loader-circle bx-tada-hover fs-1 text-danger"></i>
								</div>

								<h6 class="card-subtitle text-info"><b>Ongoing</b></h6>
								<div class="col d-flex justify-content-between">
									<p class="card-text fs-3"><?php $server->countPending(); ?></p>
									<i class="bx bx-cog bx-tada-hover fs-1 text-info"></i>
								</div>

							</div>
						</div>

						<!-- <div class="col-3">
						<div class="card card-deck border-0 shadow-sm" style="background-color: #F5EBE0;">
							<div class="card-body">
								<h4 class="card-title">Due Payments</h4>
								<h6 class="card-subttitle text-success">Members</h6>
								<p class="card-text fs-3"></p>
								<h6 class="card-subtitle text-danger">Non-Members</h6>
								<p class="card-text fs-3">0</p>
							</div>
						</div>
					</div> -->

						<div class="card  border-0 shadow-sm" style="background-color: #def2c8;">
							<div class="card-body">
								<div class="row">
									<h4 class="card-title">Send Email</h4>
									<h6 class="card-subttitle text-success"><b>Payment Reminders</b></h6>
									<div class="col-6">
										<p class="card-text fs-3"><?php echo $email_reminder =  $server->countEmailReminder(); ?></p>
									</div>
									<div class="col-6 mb-3">
										<button class="btn btn-success " type="submit" id="send_email" name="send_email" <?php
																																																			if ($email_reminder <= 0) {
																																																				echo "disabled";
																																																			}
																																																			?>><i class='bx bx-mail-send fs-4 <?php
																																																																				if ($email_reminder > 0) {
																																																																					echo "bx-tada";
																																																																				} else {
																																																																				}
																																																																				?>
										'></i>Send</button>
									</div>
									<h6 class="card-subttitle text-danger"><b>Payment Dues</b></h6>
									<div class="col-6">
										<p class="card-text fs-3"><?php echo $email_due = $server->countEmailDue(); ?></p>
									</div>
									<div class="col-6">
										<button class="btn btn-danger " type="submit" id="send_email_due" name="send_email_due" <?php
																																																						if ($email_due <= 0) {
																																																							echo "disabled";
																																																						}
																																																						?>><i class='bx bx-mail-send fs-4 <?php
																																																																							if ($email_due > 0) {
																																																																								echo "bx-tada";
																																																																							}
																																																																							?>
										'></i>Send</button>
									</div>

								</div>
							</div>
						</div>

					</div>
				</div>

				<!-- <div class="card">
					<img src="../img/town_and_country_heights.jpg" class="card-img-top">
				</div> -->
			</main>




			<!-- wrapper -->
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$(window).on('load', function() {
				$(".spinner_wrapper").fadeOut("slow");
			});



			// SEnd EMAIL BTN
			$("#send_email").on('click', function() {
				swal("Are you sure you want to send email?", "Please wait 1 hour before trying again", {
						dangerMode: true,
						buttons: true,
						icon: "info"
					})
					.then(function(proceed) {
						if (proceed) {

							swal("Sending...", "This may take some time. Please wait.", "success", {
								button: false,
								closeOnClickOutside: false,
								closeOnEsc: false
							});
							setTimeout(function() {
								$.ajax({
									url: '../ajax/send_email_reminder.php',
									type: 'POST',
									success: function(response) {
										location.reload(true);
									}
								});
							}, 500);

						} else {
							swal("Sending Email Cancele!")
						}
					});
			});


			// Send email Due
			$("#send_email_due").on('click', function() {
				swal("Are you sure you want to send email?", "Please wait 1 hour before trying again", {
						dangerMode: true,
						buttons: true,
						icon: "info"
					})
					.then(function(proceed) {
						if (proceed) {

							swal("Sending...", "This may take some time. Please wait.", "success", {
								button: false,
								closeOnClickOutside: false,
								closeOnEsc: false
							});
							setTimeout(function() {
								$.ajax({
									url: '../ajax/send_email_due.php',
									type: 'POST',
									success: function(response) {
										location.reload(true);
									}
								});
							}, 500);

						} else {
							swal("Sending Email Cancele!")
						}
					});
			});

			// $("#send_sms").on('click', function(){
			// 	$.ajax({
			// 						url: '../ajax/sample_send_sms.php',
			// 						type: 'POST',
			// 						success: function() {
			// 						location.reload();
			// 						}
			// 					});
			// })

		});
	</script>

	<!-- FOOTER -->
	<?php
	include("../includes/footer.php");
	?>