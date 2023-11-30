<?php

require_once("../libs/server.php");
require_once("../includes/header.php");
?>
<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');

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
            <li class="breadcrumb-item">Activity Log</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card">
          <div class="card-header">
            <h2>Activity Log</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">



              <section class="main-content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <!-- 	HEADER TABLE -->
                      <div class="header-box container-fluid d-flex align-items-center">
                        <!-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addnew">Add user</button> -->
                        <a href="#" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="refresh"><i class='bx bx-refresh bx-xs bx-tada-hover'></i>Refresh</a>
                      </div>

                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="activityLogTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="15%">User Account#</th>
                                <th width="15%">Date & Time</th>
                                <th width="40%">Action</th>
                                <th width="20%"></th>


                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $query = "SELECT * FROM activity_log ";
                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute();
                              while ($result = $stmt->fetch()) {
                                $id = $result['id'];
                                $account_number = $result['account_number'];
                                $firstname = $result['firstname'];
                                $action = $result['action'];
                                $date = $result['date'];
                              ?>
                                <tr>


                                  <td><?php echo $account_number . ": " . $firstname; ?></td>
                                  <td><?php echo date("m/d/y - h:i:sA", strtotime($date)); ?></td>
                                  <td><?php echo $action; ?></td>
                                  <td>
                                    <?php
                                    if (str_contains($action, "Logged in")) {
                                    ?>
                                      <span class="badge rounded-pill text-bg-primary">Logged in</span>
                                    <?php
                                    } elseif (str_contains($action, "Logged out")) {
                                    ?>
                                      <span class="badge rounded-pill text-bg-warning">Logged out</span>
                                    <?php
                                    } elseif (str_contains($action, "Delete")) {
                                    ?>
                                      <span class="badge rounded-pill text-bg-danger">Deleted</span>
                                    <?php
                                    } elseif (str_contains($action, "Register")) {
                                    ?>
                                      <span class="badge rounded-pill text-bg-success">Registered</span>
                                    <?php
                                    } elseif (str_contains($action, "Update")) {
                                    ?>
                                      <span class="badge rounded-pill text-bg-info">Updated</span>
                                    <?php
                                    } elseif (str_contains($action, "Transfer")) {
                                    ?>
                                      <span class="badge rounded-pill text-bg-info">Transfer</span>
                                    <?php
                                    }

                                    ?>
                                  </td>
                                </tr>
                              <?php
                              }
                              ?>

                            </tbody>
                            <tfoot>
                              <tr>

                                <th width="15%">User Account#</th>
                                <th width="15%">Date & Time</th>
                                <th width="40%">Action</th>
                                <th width="20%"></th>
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


  <!-- Delete Modal -->
  <script>
    $(document).ready(function() {

      $("#activityLogTable").DataTable({
        order: [
          [1, 'desc']
        ]
      });


      $("#refresh").on('click', function() {
        location.reload(true);
      });
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



    });
  </script>


  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>