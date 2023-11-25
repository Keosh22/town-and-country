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
				<section class="content-header d-flex justify-content-end align-items-center mb-3">

					<ol class="breadcrumb mb-0">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Settings</a></li>
						<li class="breadcrumb-item">Street List</li>
					</ol>
				</section>

				<div class="card">
					<div class="card-header">
						<h2>Street List</h2>
					</div>
					<div class="card-body">
						<div class="container-fluid">



							<section class="main-content">
								<div class="row">
									<div class="col-xs-12">
										<div class="box">
											<!-- 	HEADER TABLE -->
											<div class="header-box container-fluid d-flex align-items-center">

												<a href="#addStreet" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Add Street</a>


											</div>

											<div class="body-box shadow-sm">

												<div class="table-responsive mx-2">
													<table id="streetTable" class="table table-striped" style="width:100%">
														<thead>
															<tr>
																<th width="30%">Phase</th>
																<th width="30%">Street</th>
																<th width="30%">Action</th>
															</tr>
														</thead>
														<tbody>
															<?php

															$query = "SELECT * FROM street_list";
															$connection = $server->openConn();
															$stmt = $connection->prepare($query);
															$stmt->execute();
															$count = $stmt->rowCount();
															if ($count) {
																while ($result = $stmt->fetch()) {
																	$id = $result['id'];
																	$phase = $result['phase'];
																	$street = $result['street'];
															?>

																	<tr>
																		<td><?php echo $phase ?></td>
																		<td><?php echo $street ?></td>
																		<td>
																			<div class="dropdown">
																				<a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">Action</a>
																				<ul class="dropdown-menu">
																					<li><a data-id="<?php echo $id; ?>" href="#updateStreet" data-bs-toggle="modal" class="dropdown-item edit">Edit</a></li>
																				</ul>
																			</div>
																		</td>
																	</tr>

															<?php
																}
															}
															?>

														</tbody>
														<tfoot>
															<tr>
																<th width="30%">Phase</th>
																<th width="30%">Street</th>
																<th width="30%">Action</th>
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
	// Insert phase modal
	include("../admin-panel/street_add_modal.php");
	// Update phase modal
	include("../admin-panel/street_update_modal.php");
	?>


	<script>
		$(document).ready(function() {

		

		
					

			$("#streetTable").DataTable();

			// $(".delete").on('click', function() {
			// 	swal({
			// 			title: "Are you sure?",
			// 			text: "Once deleted, you will not able to recover this account!",
			// 			icon: "warning",
			// 			buttons: true,
			// 			dangerMode: true
			// 		})
			// 		.then((willDelete) => {

			// 		});
			// });


			// $(".delete").on('click', function() {
			// 	$("#deleteUser").modal("show");
			// 	var id = $(this).attr("data-id");
			// 	$("#delete_id").val(id);
			// });

			$(".edit").on('click', function() {
				$("#updateStreet").modal("show");
				var id = $(this).attr("data-id");
				
				getRow(id);
				// Get the current row
				function getRow(id){
						$.ajax({
							type: 'POST',
							url: '../ajax/street_get_row.php',
							data: {id: id},
							dataType: 'JSON',
							success: function (response){
								$("#street_id").val(response.id);
								$('#default_select').html(response.phase);
								$('#street_update').val(response.street);
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