<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
?>

<?php
session_start();
$server = new Server;
$server->adminAuthentication();
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

			<main class="content px-3 py-2">
				<!-- content header -->
				<section class="content-header d-flex justify-content-between align-items-center mb-3">
					<h2 class="">User Management</h2>
					<ol class="breadcrumb mb-0">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item">User Management</li>
					</ol>
				</section>



				<section class="main-content">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<!-- 	HEADER TABLE -->
								<div class="header-box container-fluid d-flex align-items-center">
									<!-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addnew">Add user</button> -->
									<a href="#addnew" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Add User</a>
								</div>

								<div class="body-box shadow-sm">

									<div class="table-responsive mx-2">
										<table id="usersTable" class="table table-striped" style="width:100%">
											<thead>
												<tr>
													<th width="10%">Acc.#</th>
													<th width="20%">Photo</th>
													<th width="20%">Username</th>
													<th width="30%">Firstname</th>
													<th width="30%">Lastname</th>
													<th width="50%">Email</th>
													<th width="30%">Phone</th>
													<th scope="col" width="5%">Action</th>
												</tr>
											</thead>
											<tbody>

												<?php
												$query = "SELECT * FROM admin_users";
												$connection = $server->openConn();
												$stmt = $connection->prepare($query);
												$stmt->execute();
												while ($result = $stmt->fetch()) {
													$id = $result['id'];
													$account_number = $result['account_number'];
													$username = $result['username'];
													$firstname = $result['firstname'];
													$lastname = $result['lastname'];
													$email = $result['email'];
													$phone = $result['phone_number'];
													$photo = $result['photo'];


												?>
													<tr>

														<td> <?php echo $result["account_number"] ?> </td>
														<td>
															<div class="profile-container"><img class="profile-image" src="../uploads/<?php if ($photo == "") {
																																																					echo 'default-profile.png';
																																																				} else {
																																																					echo $photo;
																																																				} ?>"></div>
														</td>
														<td> <?php echo $result["username"] ?> </td>
														<td> <?php echo $result["firstname"] ?> </td>
														<td> <?php echo $result["lastname"] ?> </td>
														<td> <?php echo $result["email"] ?> </td>
														<td> <?php echo $result["phone_number"] ?> </td>
														<td> <a data-id="<?php echo $result["id"] ?>" class="btn btn-danger btn-sm delete" id="delete">Delete</a>
													</tr>
												<?php
												}
						
												?>
											</tbody>
											<tfoot>
												<tr>
													<th width="10%">Acc.#</th>
													<th width="20%">Photo</th>
													<th width="20%">Username</th>
													<th width="30%">Firstname</th>
													<th width="30%">Lastname</th>
													<th width="50%">Email</th>
													<th width="30%">Phone</th>
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
	// Register Modal
	include("../admin-panel/user_register_modal.php");
	// Delete Modal
	include("../admin-panel/user_delete_modal.php");
	?>

	<!-- Delete Modal -->
	<script>
		$(document).ready(function() {

			$("#usersTable").DataTable();

			$(".delete").on('click', function() {
				swal({
						title: "Are you sure?",
						text: "Once deleted, you will not able to recover this account!",
						icon: "warning",
						buttons: true,
						dangerMode: true
					})
					.then((willDelete) => {

					});
			});


			$(".delete").on('click', function() {
				$("#deleteUser").modal("show");
				var id = $(this).attr("data-id");
				$("#delete_id").val(id);
			});



		});
	</script>


	<!-- FOOTER -->
	<?php
	include("../includes/footer.php");
	?>