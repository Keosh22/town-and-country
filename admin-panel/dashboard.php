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
					<div class="card-group gap-2">

						<div class="card  border-0 shadow-sm" style="background-color: #F5EBE0;">
							<div class="card-body">
								<div class="row">
									<h4 class="card-title">Homeowners</h4>
									<div class="col-6">
										<h6 class="card-subttitle text-success">Members</h6>
										<p class="card-text fs-3"><?php $server->countMembers(); ?></p>
									</div>
									<div class="col-6">
										<h6 class="card-subttitle text-danger">Non-Members</h6>
										<p class="card-text fs-3"><?php $server->countNonMembers(); ?></p>
									</div>
									<div class="col-6">
										<h6 class="card-subttitle text-warning">Expired</h6>
										<p class="card-text fs-3"><?php $server->countExpired(); ?></p>
									</div>
									<div class="col-6">
										<h6 class="card-subttitle text-info">Tenants</h6>
										<p class="card-text fs-3"><?php $server->countTenant(); ?></p>
									</div>
								</div>
							</div>
						</div>


						<div class="card border-0 shadow-sm" style="background-color: #F5EBE0;">
							<div class="card-body">
								<h4 class="card-title">Announcement</h4>
								<h6 class="card-subttitle text-success">Active</h6>
								<p class="card-text fs-3">3</p>
								<h6 class="card-subtitle text-danger">Inactive</h6>
								<p class="card-text fs-3">2</p>
							</div>
						</div>


						<div class="card  border-0 shadow-sm" style="background-color: #F5EBE0;">
							<div class="card-body">
								<h4 class="card-title">Maintenance</h4>
								<h6 class="card-subttitle text-success">Request</h6>
								<p class="card-text fs-3">15</p>
								<h6 class="card-subtitle text-danger">Pending</h6>
								<p class="card-text fs-3">5</p>
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

						<div class="card  border-0 shadow-sm" style="background-color: #F5EBE0;">
							<div class="card-body">
								<div class="row">
									<h4 class="card-title">Send Email</h4>
									<h6 class="card-subttitle text-success">Payment Reminders</h6>
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
									<h6 class="card-subttitle text-danger">Payment Dues</h6>
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


		});
	</script>

	<!-- FOOTER -->
	<?php
	include("../includes/footer.php");
	?>