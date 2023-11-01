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


<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">User Management</h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Add New</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="15%">
					<col width="20%">
					<col width="10%">
					<col width="15%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr class="bg-gradient-secondary">
						<th>#</th>
						<th>Date Created</th>
						<th>Name</th>
						<th>Phase Block/Lot</th>
						<th>Contact #</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<tr>
							<td class="text-center"></td>
							<td></td>
							<td></td>
							<td></td>
							<td class="text-right"></td>
							<td class="text-center">
                                
                                    <span class="badge badge-success bg-gradient-success rounded-pill px-3">Active</span>
                            
                                    <span class="badge badge-danger bg-gradient-danger rounded-pill px-3">Inactive</span>
                           
                            </td>
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
								  	<a class="dropdown-item" href="#"><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit_data" href="javascript:void(0)" data-id=""><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id=""><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
						</tr>
					
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>





<!-- wrapper end here -->
</div>
</div>

