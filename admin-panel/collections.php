<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
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
        <section class="content-header d-flex justify-content-end align-items-center mb-3">

          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Collections</a></li>
            <li class="breadcrumb-item">Collections List</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Collections List</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">

              <section class="main-content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <!-- 	HEADER TABLE -->
                      <div class="header-box container-fluid d-flex align-items-center">
                        <div class="col">
                          <a href="#collectionCreate" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Collections</a>
                        </div>

                      </div>

                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="announcementTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="5%">ID</th>
                                <th width="30%">Description</th>
                                <th width="10%">Fee</th>
                                <th width="10%">Date Created</th>
                                <th width="5%">Status</th>
                                <th scope="col" width="5%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $query = "SELECT * FROM collection_list";
                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute();
                              $count = $stmt->rowCount();
                              if ($count > 0) {
                                while ($result = $stmt->fetch()) {
                                  $collection_id = $result['id'];
                                  $description = $result['description'];
                                  $fee = $result['fee'];
                                  $date_created = $result['date_created'];
                                  $status = $result['status'];
                              ?>
                                  <tr>
                                    <td><?php echo $collection_id ?></td>
                                    <td><?php echo $description ?></td>
                                    <td><?php echo $fee ?></td>
                                    <td><?php echo $date_created ?></td>
                                    <td>
                                      <?php
                                      if ($status == "ACTIVE") {
                                      ?>
                                        <span class="badge rounded-pill text-bg-success">Active</span>
                                      <?php
                                      } else {
                                      ?>
                                        <span class="badge rounded-pill text-bg-danger">Inactive</span>
                                      <?php
                                      }
                                      ?>
                                    </td>
                                    <td>
                                      <div class="dropdown">
                                        <a type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Action</a>
                                        <ul class="dropdown-menu">
                                          <li><a href="#" class="dropdown-item">Edit</a></li>
                                          <li><a href="#" class="dropdown-item">Delete</a></li>
                                        </ul>
                                      </div>
                                    </td>
                                  </tr>
                              <?php
                                }
                              } else {
                                $_SESSION['status'] = "No Records";
                                $_SESSION['text'] = "";
                                $_SESSION['status_code'] = "warning";
                              }

                              ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th width="5%">ID</th>
                                <th width="30%">Description</th>
                                <th width="10%">Fee</th>
                                <th width="10%">Date Created</th>
                                <th width="5%">Status</th>
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
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <?php
  // Add Collection Modal
  include("../admin-panel/collection_create_modal.php");
  ?>


  <script>
    $(document).ready(function() {

      // DataTable
      $("#collectionsTable").DataTable({
        order: [


        ]
      });
    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>