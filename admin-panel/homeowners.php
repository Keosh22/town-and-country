<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
?>

<?php
session_start();
$server = new Server;
$server->adminAuthentication();
?>

<!-- Body starts here -->

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


			<main class="content px-3 py-2">
				<!-- conten header -->
				<section class="content-header d-flex justify-content-end align-items-center mb-3">

					<ol class="breadcrumb mb-0">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Homeowners</a></li>
						<li class="breadcrumb-item">Homeowners List</li>
					</ol>
				</section>


				<!-- Card Start here -->
				<div class="card card-border">
					<div class="card-header">
						<h2>Homeowners List</h2>
					</div>
					<div class="card-body">
						<div class="container-fluid">
							<section class="main-content">
								<div class="row">
									<div class="col-xs-12">
										<div class="box">
											<!-- 	HEADER TABLE -->
											<div class="header-box container-fluid d-flex align-items-center">
												<div class="col">
													<a href="#addHomeowners" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Add User</a>
												</div>
											</div>
											<div class="body-box shadow-sm">
												<div class="table-responsive mx-2">
													<table id="homeownersTable" class="table table-striped" style="width:100%">
														<thead>
															<tr>
																<th width="5%">Acc.#</th>
																<th width="10%">Photo</th>
																<th width="20%">Fullname</th>
																<th width="30%">Address</th>
																<th width="10%">Email</th>
																<th width="10%">Phone</th>
																<th width="10%">Status</th>
																<th scope="col" width="5%">Action</th>
															</tr>
														</thead>
														<tbody>
															<?php
															$query = "SELECT * FROM homeowners_users";
															$connection = $server->openConn();
															$stmt = $connection->prepare($query);
															$stmt->execute();
															while ($result = $stmt->fetch()) {
																$homeowners_id = $result['id'];
																$account_number = $result['account_number'];
																$firstname = $result['firstname'];
																$lastname = $result['lastname'];
																$middle_initial = $result['middle_initial'];
																$blk = $result['blk'];
																$lot = $result['lot'];
																$street = $result['street'];
																$phase = $result['phase'];
																$status = $result['status'];
																$email = $result['email'];
																$phone_number = $result['phone_number'];
																// $tenant_name = $result['tenant_name'];
															?>
																<tr>
																	<td><?php echo $account_number; ?></td>
																	<td>
																		<div class="profile-container"><img class="profile-image" src="../uploads/default-profile.png"></div>
																	</td>
																	<td>
																		<?php
																		echo $firstname . " " . $middle_initial . " " . $lastname . "</p>";
																		?>
																	</td>
																	<td><?php echo "Blk-" . $blk . " Lot-" . $lot . " " . $street . " St. " . $phase; ?></td>
																	<td><?php echo $email; ?></td>
																	<td><?php echo $phone_number; ?></td>
																	<td>
																		<?php
																		if ($status == 'Member') {
																		?>
																			<span class="badge rounded-pill text-bg-success"><?php echo $status; ?></span>
																		<?php
																		} elseif ($status == 'Non-member') {
																		?>
																			<span class="badge rounded-pill text-bg-danger"><?php echo $status; ?></span>
																		<?php
																		} elseif ($status == 'Tenant') {
																		?>
																			<span class="badge rounded-pill text-bg-info">Tenant</span>
																		<?php
																		} elseif ($status == 'EXPIRED') {
																			?>
																				<span class="badge rounded-pill text-bg-warning">Expired</span>
																			<?php
																			}

																		?>
																	</td>
																	<td>
																		<div class="dropdown">
																			<a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">Action</a>
																			<ul class="dropdown-menu">
																				<?php
																				if ($status == 'Tenant') {
																				?>
																					<li><a href="#" class="dropdown-item" id="view">View</a></li>
																					<li><a data-id="<?php echo $homeowners_id; ?>" href="#updateHomeowners" data-bs-toggle="modal" class="dropdown-item" id="update_homeowners_button">Update</a></li>
																				<?php
																				} else {
																				?>
																					<li><a href="#" class="dropdown-item" id="view">View</a></li>
																					<li><a href="./property.php?id=<?php echo $homeowners_id; ?>" class="dropdown-item add-property" id="">Property</a></li>
																					<li><a data-id="<?php echo $homeowners_id; ?>" href="#updateHomeowners" data-bs-toggle="modal" class="dropdown-item" id="update_homeowners_button">Update</a></li>
																				<?php
																				}
																				?>

																			</ul>
																		</div>
																	</td>

																</tr>
															<?php
															}
															?>
														</tbody>
														<tfoot>
															<tr>
																<th width="5%">Acc.#</th>
																<th width="10%">Photo</th>
																<th width="20%">Fullname</th>
																<th width="30%">Address</th>
																<th width="10%">Email</th>
																<th width="10%">Phone</th>
																<th width="10%">Status</th>
																<th scope="col" width="5%">Action</th>
															</tr>
														</tfoot>
													</table>
												</div>
												<!-- Table -->
											</div>
											<!-- box end here -->
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</main>





			<!-- wrapper end here -->
		</div>
	</div>
	<?php

	// Register Homeowners Modal
	include("../admin-panel/homeowners_register_modal.php");
	//Update Homeowners modal
	include("../admin-panel/homeowners_update_modal.php");

	?>


	<script>
		$(document).ready(function() {

			// $(".add-property").on('click', function (){
			// 	var id = $(this).attr("data-id");
			// 		console.log(id);
			// 	$.ajax({
			//   url: './admin-panel/property.php',
			//   method: 'POST',
			//   data: {
			//     id: id
			//   },

			// });

			// });


			// DataTable
			$("#homeownersTable").DataTable({
				order: [
					[2, 'asc']
				]
			});


			// Update Homeowners button
			$("#homeownersTable").on('click', '#update_homeowners_button', function() {
				$("#updateHomeowners").modal("show");
				var homeowners_id = $(this).attr("data-id");
				$("#homeowners_id").val(homeowners_id);
				console.log(homeowners_id);
				getHomeowners(homeowners_id);

				function getHomeowners(homeowners_id) {
					$.ajax({
						url: '../ajax/homeowners_get_data.php',
						method: 'POST',
						data: {
							homeowners_id: homeowners_id
						},
						dataType: 'JSON',
						success: function(response) {
							$("#firstname_update").val(response.firstname);
							$("#lastname_update").val(response.lastname);
							$("#middle_initial_update").val(response.middle_initial);
							$("#email_update").val(response.email);
							$("#phone_number_update").val(response.phone_number);
							$("#status_option_update").html(response.status);
							$("#blk_update").val(response.blk);
							$("#lot_update").val(response.lot);
							$("#phase_option_update").html(response.phase);
							$("#street_option_update").html(response.street);
						}
					});
				}
			});

		});
	</script>
	<!-- FOOTER -->
	<?php
	include("../includes/footer.php");

	?>