<?php
require_once("../libs/server.php");
require_once("../includes/header.php");



?>

<?php
session_start();
$server = new Server;
$server->userAuthentication();
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
				<!-- conten header -->
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

								<div class="header-box container-fluid d-flex align-items-center">
									<a href="#" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Add User</a>
								</div>

								<div class="body-box">
								
								<!-- Table -->
								<table id="myTable" class="table table-striped">
									<thead>
										<tr class="table-primary">
											<th width="30%">ID</th>
											<th width="50%">Username</th>
											<th width="30%">Email</th>
											<th width="30%">Phone</th>
											<th scope="col" width="5%">Edit</th>
											<th scope="col" width="5%" >Delete</th>
										</tr>
									</thead>
								</table>
									



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

	<!-- FOOTER -->
	<?php
	include("../includes/footer.php");
	?>