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


        <div class="card card-border">
          <div class="card-header">

            <h2> <a href="../admin-panel/homeowners.php"><i class='bx bx-arrow-back text-secondary bx-tada-hover fs-2 fw-bold me-5'></i></a>Homeowners property list</h2>
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

                                <th width="20%">Address</th>
                                <th width="20%">Phase</th>
                                <th width="20%">Tenant</th>
                                <th scope="col" width="5%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $ACTIVE = "ACTIVE";
                              $query = "SELECT * FROM property_list WHERE homeowners_id = :id AND archive = :ACTIVE";
                              $data = ["id" => $id, "ACTIVE" => $ACTIVE];
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
                                  $tenant_id = $result['tenant'];

                              ?>
                                  <tr>
                                    <td><?php echo "Blk-" . $blk . " Lot-" . $lot . " " . $street ?></td>
                                    <td><?php echo $phase ?></td>
                                    <td><?php
                                        $query2 = "SELECT * FROM homeowners_users WHERE id = :id";
                                        $data2 = ["id" => $tenant_id];
                                        $stmt2 = $connection->prepare($query2);
                                        $stmt2->execute($data2);
                                        $count2 = $stmt2->rowCount();
                                        $result2 = $stmt2->fetch();
                                        if ($tenant_id != null) {
                                          echo $result2['firstname'] . " " . $result2['middle_initial'] . " " . $result2['lastname'];
                                        } else {
                                          echo "N/A";
                                        }
                                        ?></td>
                                    <td>
                                      <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">Action</a>
                                        <ul class="dropdown-menu">
                                          <li><a data-id="<?php echo $property_id ?>" data-name="" href="#updateProperty" data-bs-toggle="modal" class="dropdown-item" id="update_property">Update</a></li>
                                          <li><a data-id="<?php echo $property_id ?>" data-bs-toggle="modal" href="#addTenant" class="dropdown-item" id="add_tenant">Add Tenant</a></li>
                                          <li><a data-id="<?php echo $property_id ?>" data-tenant="<?php echo $tenant_id; ?>" class="dropdown-item" id="remove_TenantBtn" data-bs-toggle="modal" href="#removeTenant">Remove Tenant</a></li>
                                          <li><a href="../admin-panel/collection_list.php?property_id=<?php echo $property_id; ?>" class="dropdown-item">View Collection</a></li>
                                        </ul>
                                      </div>
                                    </td>
                                  </tr>
                              <?php
                                }
                              } else {
                              }
                              ?>
                            </tbody>
                            <tfoot>
                              <tr>

                                <th width="20%">Address</th>
                                <th width="20%">Phase</th>
                                <th width="20%">Tenant</th>
                                <th scope="col" width="5%">Action</th>
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

  // Add Property modal
  include("../admin-panel/property_register_modal.php");
  // Update Property Modal
  include("../admin-panel/property_update_modal.php");
  // Add tenant Modal
  include("../admin-panel/property_addtenant_modal.php");
  // REmove tenant
  include("../admin-panel/property_remove_tenant_modal.php");
  ?>

  <!-- Delete Modal -->
  <script>
    $(document).ready(function() {

      $("#propertyTable").DataTable();







      // $("#propertyTable").on('click', ".add-property", function() {
      //   $("#addProperty").modal("show");
      //   var id = $(this).attr("data-id");
      //   $("#homeowners_id").val(id);
      // });


      // Register Property
      $(".add-property").on('click', function() {
        $("#addProperty").modal("show");
        var id = $(this).attr("data-id");
        $("#homeowners_id").val(id);
      });


      // Update Property
      $("#propertyTable").on('click', '#update_property', function() {
        $("#updateProperty").modal("show");
        var property_id = $(this).attr("data-id");
        $("#property_id").val(property_id);
        getProperty(property_id);

        function getProperty(property_id) {
          $.ajax({
            url: '../ajax/property_get_data.php',
            method: 'POST',
            data: {
              property_id: property_id
            },
            dataType: 'JSON',
            success: function(response) {
              $("#blk_property").val(response.blk);
              $("#lot_property").val(response.lot);
              $("#default_phase_property").html(response.phase);
              $("#default_street_property").html(response.street);
            }
          });
        }
      });

      //Add tenant
      $("#propertyTable").on('click', '#add_tenant', function() {
        swal({
            title: "Confirmation",
            text: "Are you sure you want to add tenant on this property?",
            icon: "warning",
            buttons: true,
            dangerMode: true
          })
          .then((willDelete) => {

          });


        var property_id = $(this).attr("data-id");
        // var firstname = $(this).attr("data-name");
        // var address = $(this).attr("data-address");
        $("#property_id_tenant").val(property_id);
        // $("#property_currentOwner _tenant").val(firstname);
        // $("#property_address _tenant").val(address);
      });


      // Remove TEnant
      $("#remove_TenantBtn").on('click', function() {
        var tenant_id = $(this).attr('data-tenant');
        $("#tenant_id").val(tenant_id);
        swal({
            title: "Confirmation",
            text: "Are you sure you want to remove tenant on this property?",
            icon: "warning",
            buttons: true,
            dangerMode: true
          })
          .then((proceed) => {
            if(proceed){

            } else {
              swal("Remove Tenant Canceled!");
              $("#removeTenant").modal('hide');
            }
          });
      });





      // $("#addTenant").on('click', '#add_tenant', function (){
      //   var property_id = $(this).attr("data-id");
      //   $("#property_id_tenant").val(property_id);

      //   function getProperty(property_id) {
      //     $.ajax({
      //       url: '../ajax/property_get_data.php',
      //       method: 'POST',
      //       data: {
      //         property_id: property_id
      //       },
      //       dataType: 'JSON',
      //       success: function(response) {
      //         $("#blk_tenant").val(response.blk);
      //         $("#lot_tenant").val(response.lot);
      //         $("#default_phase_property").html(response.phase);
      //         $("#default_street_property").html(response.street);
      //       }
      //     });
      //   }
      // });





    });
  </script>


  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>