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
        <section class="content-header d-flex justify-content-between align-items-center mb-3">
        <a href="../admin-panel/dashboard.php"><i class='bx bx-arrow-back text-secondary bx-tada-hover fs-2 fw-bold'></i></a>

          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="../admin-panel/dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Settings</a></li>
            <li class="breadcrumb-item">Maintenance List</li>
          </ol>
        </section>

        <div class="card card-border">
          <div class="card-header">
            <h2>Maintenance List</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">



              <section class="main-content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <!-- 	HEADER TABLE -->
                      <div class="header-box container-fluid d-flex align-items-center">

                        <a href="#addMaintenanceModal" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Add</a>


                      </div>

                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="maintenanceTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="10%">Date created</th>
                                <th width="30%">Maintenance</th>
                                <th width="10%">Action</th>
                              </tr>
                            </thead>
                            <tbody class="">

                              <?php
                              $query = "SELECT * FROM maintenance";
                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute();
                              if ($stmt->rowCount() > 0) {
                                while ($result = $stmt->fetch()) {
                                  $id = $result['id'];
                                  $category = $result['category'];
                                  $date_created = $result['date_created'];
                              ?>
                                  <tr>
                                    <td><?php echo date("M j, Y, g:sA", strtotime($date_created)); ?></td>
                                    <td><?php echo $category; ?></td>
                                    <td>
                                      <div class="dropdown">
                                        <a type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Action</a>
                                        <ul class="dropdown-menu">
                                          <li><a href="#updateMaintenanceModal" data-bs-toggle="modal" class="dropdown-item" id="update_btn" 
                                          data-id="<?php echo $id; ?>"
                                          data-category="<?php echo $category; ?>"
                                          >Update</a></li>
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
                                <th width="30%">Maintenance</th>
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
  // Add maintenance
  include("../admin-panel/maintenance_list_add_modal.php");
  //  Update maintenance
  include("../admin-panel/maintenance_list_update_modal.php");
  ?>


  <script>
    $(document).ready(function() {

      $("#maintenanceTable").on('click', '#update_btn', function (){
        var category_id = $(this).attr('data-id');
        var category = $(this).attr('data-category');
        $("#category_id").val(category_id);
        $("#category_update").val(category);
      })

    



      // DataTable
      $("#maintenanceTable").DataTable({

      });



    });
  </script>


  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>