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
            <li class="breadcrumb-item"><a href="#">Services</a></li>
            <li class="breadcrumb-item">Maintenance</li>
          </ol>
        </section>

        <div class="card">
          <div class="card-header">
            <h2>Maintenance Request</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">



              <section class="main-content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <!-- 	HEADER TABLE -->
                      <div class="header-box container-fluid d-flex align-items-center">

                     


                      </div>

                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="maintenanceRequestTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="10%">Date created</th>
                                <th width="10%">Maintenance</th>
                                <th width="20%">Address</th>
                                <th width="5%">Status</th>
                                <th width="10%">Action</th>
                              </tr>
                            </thead>
                            <tbody class="">

                              <?php
                              $ACTIVE = "ACTIVE";
                              $query = "SELECT 
                              maintenance_request.id as maintenance_request_id,
                              maintenance_request.maintenance,
                              maintenance_request.date_created as date_requested,
                              maintenance_request.status as maintenance_status,
                              property_list.blk as property_blk,
                              property_list.lot as property_lot,
                              property_list.phase as property_phase,
                              property_list.street as property_street,
                              homeowners_users.firstname,
                              homeowners_users.middle_initial,
                              homeowners_users.lastname
                               FROM maintenance_request
                               INNER JOIN property_list ON maintenance_request.property_id = property_list.id
                               INNER JOIN homeowners_users ON property_list.homeowners_id = homeowners_users.id
                               ";
                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute();
                              if ($stmt->rowCount() > 0) {
                                while ($result = $stmt->fetch()) {
                                  $maintenance_request_id = $result['maintenance_request_id'];
                                  $maintenance = $result['maintenance'];
                                  $date_requested = $result['date_requested'];

                                  $address = "BLK-" . $result['property_blk'] . " LOT-" . $result['property_lot'] . " " . $result['property_street'] . " St. " . $result['property_phase'] . "";
                                  $name =  $result['firstname'] . " " . $result['middle_initial'] . " " . $result['lastname'];

                                  $status = $result['maintenance_status'];


                              ?>
                                  <tr>
                                    <td><?php echo date("M j, Y, g:sA", strtotime($date_requested)); ?></td>
                                    <td><?php echo $maintenance; ?></td>
                                    <td><?php echo $address; ?></td>
                                    <td>
                                      <?php
                                      if ($status == "PENDING") {
                                      ?>
                                        <span class="badge rounded-pill text-bg-danger">Pending</span>
                                      <?php
                                      } elseif ($status == "ONGOING"){
                                        ?>
                                        <span class="badge rounded-pill text-bg-info">Ongoing</span>
                                      <?php
                                      } elseif ($status == "DONE"){
                                        ?>
                                        <span class="badge rounded-pill text-bg-success">Done</span>
                                      <?php
                                      } else {
                                        ?>
                                        <span class="badge rounded-pill text-bg-secondary">status</span>
                                      <?php
                                      }
                                      ?>
                                    </td>
                                    <td>
                                      <div class="dropdown">
                                        <a type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Action</a>
                                        <ul class="dropdown-menu">
                                          <li><a href="#" data-bs-toggle="modal" class="dropdown-item" id="">Approve</a></li>
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
                                <th width="10%">Date created</th>
                                <th width="10%">Maintenance</th>
                                <th width="20%">Address</th>
                                <th width="5%">Status</th>
                                <th width="10%">Action</th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
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

  ?>


  <script>
    $(document).ready(function() {







      // DataTable
      $("#maintenanceRequestTable").DataTable({

      });



    });
  </script>


  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>