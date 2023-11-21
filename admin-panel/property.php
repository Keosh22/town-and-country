<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
?>

<?php
session_start();
$server = new Server;
$server->adminAuthentication();


$id = $_GET['id'];


$query = "SELECT * FROM homeowners_users WHERE id = :id";
$data = ["id" => $id];
$connection = $server->openConn();
$stmt = $connection->prepare($query);
$stmt->execute($data);
$count = $stmt->rowCount();

if ($count) {
  while ($result = $stmt->fetch()) {
    $homeowners_id = $result['id'];
    $firstname = $result['firstname'];
    $lastname = $result['lastname'];
    $middle_initial = $result['middle_initial'];
    $status = $result['status'];
  }
}




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


        <div class="card">
          <div class="card-header">
            <h2>Homeowners property list</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">
              <p class="card-title fs-5 text-secondary divider personal-info">Homeowners Information</p>

              <div class="row">
                <div class="col-md-6">
                  <label for="name" class="form-label text-secondary">Name:</label>
                  <input type="text" class="form-control" id="name" value="<?php echo $firstname . " " . $middle_initial . " " . $lastname ?>" readonly>
                </div>
                <div class="col-md-6">
                  <label for="status" class="form-label text-secondary">Status:</label>
                  <input type="text" class="form-control" id="status" value="<?php echo $status; ?>" readonly>
                </div>
              </div>


              <!-- Table starts here -->
              <section class="main-content mt-4">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <!-- 	HEADER TABLE -->
                      <div class="header-box container-fluid d-flex align-items-center">
                        <!-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addnew">Add user</button> -->
                        <a data-id="<?php echo $id; ?>" class="btn btn-success btn-sm btn-flat add-property"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Add Property</a>
                      </div>


                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="propertyTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="10%">#</th>
                                <th width="20%">Address</th>
                                <th width="20%">Phase</th>
                                <th scope="col" width="5%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                       
                              $query = "SELECT * FROM property_list WHERE homeowners_id = :id";
                              $data = ["id" => $id];
                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute($data);
                              $count = $stmt->rowCount();
                              if ($count) {

                                while ($result = $stmt->fetch()) {
                                  $property_id = $result['id'];
                                  $blk = $result['blk'];
                                  $lot = $result['lot'];
                                  $phase = $result['phase'];
                                  $street = $result['street'];

                              ?>
                                  <tr>
                                    <td><?php echo $property_id ?></td>
                                    <td><?php echo "Blk-" . $blk . " Lot-" . $lot . " " . $street ?></td>
                                    <td><?php echo $phase ?></td>
                                    <td>
                                      <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">Action</a>
                                        <ul class="dropdown-menu">
                                          <li><a href="" class="dropdown-item">Edit</a></li>
                                          <li><a href="" class="dropdown-item">Delete</a></li>
                                        </ul>
                                      </div>
                                    </td>
                                  </tr>
                              <?php
                                }
                              } else {
                                $_SESSION['status'] = "Warning";
                                $_SESSION['text'] = "Something went wrong.";
                                $_SESSION['status_code'] = "warning";
                              }


                              ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th width="10%">#</th>
                                <th width="20%">Address</th>
                                <th width="20%">Phase</th>
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





      <!-- wrapper end here -->
    </div>
  </div>
  <?php

  // Add Property modal
  include("../admin-panel/property_register_modal.php");
  ?>

  <!-- Delete Modal -->
  <script>
    $(document).ready(function() {

      $("#propertyTable").DataTable();



      $(".add-property").on('click', function() {
        $("#addProperty").modal("show");
        var id = $(this).attr("data-id");
        $("#homeowners_id").val(id);
      });


    });
  </script>


  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>