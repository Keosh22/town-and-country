<?php 
require_once("../libs/server.php");
require_once("../includes/header.php");
?>

<?php
session_start();
$server = new Server;
$server->userAuthentication();
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
		<section class="content-header d-flex justify-content-between align-items-center">
			<h2 class="">Homeowners</h2>
			<ol class="breadcrumb mb-0">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item"><a href="#">Homeowners</a></li>
			<li class="breadcrumb-item">List</li>
		</ol>
		</section>
		<!-- breadcrumbs -->
		
		
		
	</main>





<!-- wrapper end here -->
</div>
</div>

<!-- FOOTER -->
<?php
include("../includes/footer.php");
?>

