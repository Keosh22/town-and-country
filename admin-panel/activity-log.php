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
        <section class="content-header d-flex justify-content-between align-items-center mb-3">
          <a href="../admin-panel/dashboard.php"><i class='bx bx-arrow-back text-secondary bx-tada-hover fs-2 fw-bold'></i></a>

          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="../admin-panel/dashboard.php">Home</a></li>
            <li class="breadcrumb-item">Activity Log</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
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
                        <div class="col d-flex-justify-content-start">
                          <a href="#" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="refresh"><i class='bx bx-refresh bx-xs bx-tada-hover'></i>Refresh</a>
                        </div>
                        <div class="col d-flex justify-content-end">
                          <div class="col-3 mx-3">
                            <select name="filter_action" id="filter_action" class="form-select form-select-sm text-secondary">
                              <option value="">Action:</option>
                              <option value="Logged in">Logged in</option>
                              <option value="Logged out">Logged out</option>
                              <option value="Delete">Delete</option>
                              <option value="Registered">Registered</option>
                              <option value="Updated">Updated</option>
                              <option value="Payment">Payment</option>
                              <option value="Archive">Archive</option>
                              <option value="Maintenance">Maintenance</option>
                              <option value="Promotion">Promotion</option>
                              <option value="Meeting">Meeting</option>
                              <option value="Announcement">Announcement</option>



                            </select>
                          </div>
                          <div class="col-4">
                            <input id="filter_date" class="form-control form-control-sm text-secondary">
                          </div>
                        </div>

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
                                  <td><?php echo date("M j, Y  H:i:sA", strtotime($date)); ?></td>
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
                                    } elseif (str_contains($action, "Archive")) {
                                    ?>
                                      <span class="badge rounded-pill text-bg-danger">Archive</span>
                                    <?php
                                    } elseif (str_contains($action, "Payment")) {
                                    ?>
                                      <span class="badge rounded-pill text-bg-success">Payment</span>
                                    <?php
                                    } elseif (str_contains($action, "Restore")) {
                                    ?>
                                      <span class="badge rounded-pill text-bg-warning">Restore</span>
                                    <?php
                                    } elseif (str_contains($action, "Maintenance")) {
                                    ?>
                                      <span class="badge rounded-pill text-bg-secondary">Maintenance</span>
                                    <?php
                                    } elseif (str_contains($action, "Promotion")) {
                                    ?>
                                      <span class="badge rounded-pill text-bg-secondary">Promotion</span>
                                    <?php
                                    } elseif (str_contains($action, "Announcement")) {
                                    ?>
                                      <span class="badge rounded-pill text-bg-secondary">Announcement</span>
                                    <?php
                                    } elseif (str_contains($action, "Meeting")) {
                                    ?>
                                      <span class="badge rounded-pill text-bg-secondary">Meeting</span>
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
      const TABLE = $("#activityLogTable").DataTable();

      // filter table Action
      $("#filter_action").on('change', function() {
        TABLE.column(3).search(this.value).draw();
      })


      $("#refresh").on('click', function() {
        location.reload(true);
      });

      // filter date
      $("#filter_date").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        autpApply: true,
        locale: {
          format: 'MMM DD, YYYY'
        }
      });

      $("#filter_date").on('change', function() {
        TABLE.column(1).search(this.value).draw();
      })


    });
  </script>


  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>