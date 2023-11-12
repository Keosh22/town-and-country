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
				<section class="content-header d-flex justify-content-between align-items-center mb-3">
					<h2 class="">Homeowners</h2>
					<ol class="breadcrumb mb-0">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Homeowners</a></li>
						<li class="breadcrumb-item">List</li>
					</ol>
				</section>


				<section class="main-content">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<!-- 	HEADER TABLE -->
								<div class="header-box container-fluid d-flex align-items-center">
									<!-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addnew">Add user</button> -->
									<a href="#addHomeowners" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Add User</a>
								</div>

								<div class="body-box shadow-sm">

									<div class="table-responsive mx-2">
										<table id="homeownersTable" class="table table-striped" style="width:100%">
											<thead>
												<tr>
													<th width="10%">Acc.#</th>
													<th width="20%">Photo</th>
													<th width="40%">Fullname</th>
													<th width="40%">Address</th>
													<th width="20%">Email</th>
													<th width="20%">Phone</th>
													<th width="20%">Status</th>
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
													$tenant_name = $result['tenant_name'];

												?>
													<tr>
														<td><?php echo $account_number; ?></td>
														<td>
															<div class="profile-container"><img class="profile-image" src="../uploads/default-profile.png"></div>
														</td>
														<td>
															<?php 
															if($tenant_name == ""){
																$tenant_name = "";
															} else {
																$tenant_name = "Tenant: ". $tenant_name;
															}
															echo $firstname . " " . $middle_initial . " " . $lastname. "<br><p class='text-info'>".$tenant_name."</p>"; 
															?>
														</td>
														<td><?php echo "Blk-" . $blk . " Lot-" . $lot . " " . $street . " St. " . $phase; ?></td>
														<td><?php echo $email; ?></td>
														<td><?php echo $phone_number; ?></td>
														<td>
															<?php
															if($status == 'Member'){
																?>
																<span class="badge rounded-pill text-bg-success"><?php echo $status; ?></span>
																<?php
															} elseif ($status == 'Non-member') {
																?>
																<span class="badge rounded-pill text-bg-danger"><?php echo $status; ?></span>
																<?php
															} elseif($status == 'Tenant - Member') {
																?>
																<span class="badge rounded-pill text-bg-warning">Tenant</span>
																<span class="badge rounded-pill text-bg-success">Member</span>
																<?php
															} elseif($status == 'Tenant - Non-member'){
																?>
																<span class="badge rounded-pill text-bg-warning">Tenant</span>
																<span class="badge rounded-pill text-bg-danger">Non-Member</span>
																<?php
															}
														
														  ?>
													</td>
														<td>
															<div class="dropdown">
																<a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">Action</a>
																<ul class="dropdown-menu">
																	<li><a href="#" class="dropdown-item">View</a></li>
																	<li><a href="" class="dropdown-item">Edit</a></li>
																	<li><a href="" class="dropdown-item">Delete</a></li>
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
													<th width="10%">Acc.#</th>
													<th width="20%">Photo</th>
													<th width="40%">Fullname</th>
													<th width="40%">Address</th>
													<th width="20%">Email</th>
													<th width="30%">Phone</th>
													<th width="30%">Status</th>
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




			</main>





			<!-- wrapper end here -->
		</div>
	</div>
	<?php
	// Register Homeowners Modal
	include("../admin-panel/homeowners_register_modal.php");
	?>


	<script>
		$(document).ready(function() {
			$("#homeownersTable").DataTable();
		});
	</script>
	<!-- FOOTER -->
	<?php
	include("../includes/footer.php");

	?>