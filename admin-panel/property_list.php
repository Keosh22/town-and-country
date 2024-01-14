<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
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
            <li class="breadcrumb-item"><a href="#">Homeowners</a></li>
            <li class="breadcrumb-item">Property List</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Property List</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">

              <section class="main-content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <!-- 	HEADER TABLE -->
                      <div class="header-box container-fluid d-flex align-items-center">
                        <!-- <div class="col">
													<a href="#addHomeowners" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i></a>
												</div> -->

                      </div>

                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="propertyListTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="10%">#</th>
                                <th width="20%">Owner's Name</th>
                                <th width="20%">Address</th>
                                <th width="10%">Phase</th>
                                <th scope="col" width="5%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $query = "SELECT 
                              property_list.id, 
                              property_list.homeowners_id,
                              property_list.blk as property_blk, 
                              property_list.lot as property_lot, 
                              property_list.phase as property_phase, 
                              property_list.street as property_street, 
                              homeowners_users.firstname, 
                              homeowners_users.lastname, 
                              homeowners_users.middle_initial FROM property_list INNER JOIN homeowners_users WHERE property_list.homeowners_id = homeowners_users.id";

                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute();
                              $count = $stmt->rowCount();


                              if ($count > 0) {

                                while ($result = $stmt->fetch()) {
                                  $property_id = $result['id'];
                                  $firstname = $result['firstname'];
                                  $lastname = $result['lastname'];
                                  $middle_initial = $result['middle_initial'];
                                  $property_blk = $result['property_blk'];
                                  $property_lot = $result['property_lot'];
                                  $property_street = $result['property_street'];
                                  $property_phase = $result['property_phase'];
                              ?>
                                  <tr>
                                    <td><?php echo $property_id; ?></td>
                                    <td><?php echo $firstname . " " . $middle_initial . " " . $lastname;  ?></td>
                                    <td><?php echo "BLK-" . $property_blk . " LOT-" . $property_lot . " " . $property_street ?></td>
                                    <td><?php echo $property_phase;  ?></td>
                                    <td>
                                      <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">Action</a>
                                        <ul class="dropdown-menu">
                                          <!-- <li><a data-id="<?php echo $property_id;?>" data-name="<?php echo $firstname . " " . $middle_initial . " " . $lastname; ?>" data-address="<?php echo "BLK-" . $property_blk . " LOT-" . $property_lot . " " . $property_street ?>" data-id="<?php echo $property_id; ?>" href="#addMonthlyDues" data-bs-toggle="modal" class="dropdown-item" id="manage_payments_btn">Manage Payment</a></li> -->
                                          <li><a href="../admin-panel/property_manage_payment.php?property_id=<?php echo $property_id;?>" class="dropdown-item">Manage Payment</a></li>
                                          <li>
                                            <a href="../admin-panel/collection_list.php?property_id=<?php echo $property_id; ?>" class="dropdown-item">View Collection</a>
                                          </li>
                                          <li><a data-name="<?php echo $firstname . " " . $middle_initial . " " . $lastname; ?>" data-address="<?php echo "BLK-" . $property_blk . " LOT-" . $property_lot . " " . $property_street ?>" data-id="<?php echo $property_id; ?>" href="#propertyTransfer" class="dropdown-item" data-bs-toggle="modal" id="transfer_btn">Transfer</a></li>
                                          <li>
                                            <form action="" method="POST">
                                              <a data-id="<?php echo $property_id; ?>" href="#deleteProperty" data-bs-toggle="modal" type="button" id="delete_property" class="dropdown-item">Delete</a>
                                            </form>
                                          </li>
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
                                <th width="10%">#</th>
                                <th width="20%">Owner's Name</th>
                                <th width="20%">Address</th>
                                <th width="10%">Phase</th>
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
  // Transfer property modal
  include("../admin-panel/property_list_transfer_modal.php");
  // Delete property modal
  include("../admin-panel/property_delete_modal.php");
  // Add monthly dues modal
  include("../admin-panel/property_manage_payment_modal.php");


  ?>


  <script>
    $(document).ready(function() {

      // Manage Payment
      $("#propertyListTable").on('click', '#manage_payments_btn', function (){
        var property_id = $(this).attr('data-id');
        var homeowners_name = $(this).attr('data-name');
        var property_address = $(this).attr('data-address');
        $("#property_id").val(property_id);
        $("#homeowners_name").val(homeowners_name);
        $("#address").val(property_address);
        getCollectionList(property_id);

        function getCollectionList(property_id){
          $.ajax({
            url: '../ajax/collection_list_get_data.php',
            type: 'POST',
            data: {property_id: property_id},
            success: function (response){
              $("#collection_container").html(response);
            }
          });
        }
        
      });

      // Delete Button
      $("#propertyListTable").on('click', '#delete_property', function() {
        var property_id = $(this).attr('data-id');
        $("#delete_property_id").val(property_id);
      });


      // Transfer button
      $("#propertyListTable").on('click', '#transfer_btn', function() {
        swal({
            title: "Transfer Confirmation",
            text: "Are you sure you want to transfer the ownership of this property?",
            icon: "warning",
            buttons: true,
            dangerMode: true
          })
          .then((willDelete) => {

          });
        var property_id = $(this).attr("data-id");
        var firstname = $(this).attr("data-name");
        var address = $(this).attr("data-address");
        $("#property_transfer_id").val(property_id);
        $("#property_currentOwner").val(firstname);
        $("#property_address").val(address);
      });


      // DataTable
      $("#propertyListTable").DataTable({
        order: [
          [1, 'desc'],
          [0, 'desc']
        ]
      });



    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");

  ?>