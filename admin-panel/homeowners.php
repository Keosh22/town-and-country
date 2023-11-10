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
									<a href="#addHomeowners" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="bx bx-plus bx-xs bx-tada-hover"></i>Add user</a>
								</div>

								<div class="body-box shadow-sm">
									<div class="table-responsive">
										<table class="table table-striped table border">
											<thead>
												<tr>
													<th>Acc.#</th>
													<th>Name</th>
													<th>Email</th>
													<th>Phone #</th>
													<th>House #</th>
													<th>Street</th>
													<th>Phase</th>
													<th>Status</th>
													<th scope="col" width="5%">Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													
												</tr>
											</tbody>
										</table>
									</div>
								</div>


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
	<!-- FOOTER -->
	<?php
	include("../includes/footer.php");
	?>