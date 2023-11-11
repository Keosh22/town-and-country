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
													<th width="20%">Username</th>
													<th width="30%">Fullname</th>
													<th width="30%">Address</th>
													<th width="50%">Email</th>
													<th width="30%">Phone</th>
													<th scope="col" width="5%">Action</th>
												</tr>
											</thead>
											<tbody>


											</tbody>
											<tfoot>
												<tr>
													<th width="10%">Acc.#</th>
													<th width="20%">Photo</th>
													<th width="20%">Username</th>
													<th width="30%">Fullname</th>
													<th width="30%">Address</th>
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