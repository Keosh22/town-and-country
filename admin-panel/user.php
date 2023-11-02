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
		<section class="content-header d-flex justify-content-between align-items-center">
			<h2 class="">User Management</h2>
			<ol class="breadcrumb mb-0">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item">User Management</li>
		</ol>
		</section>
		


		<section class="content">
   
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Borrow</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>ISBN</th>
                  <th>Title</th>
                  <th>Status</th>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
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

