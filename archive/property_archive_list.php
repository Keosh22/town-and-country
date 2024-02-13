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
            <li class="breadcrumb-item"><a href="#">Homeowners</a></li>
            <li class="breadcrumb-item"><a href="#">Property List</a></li>
            <li class="breadcrumb-item">Archive</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Archive Property List</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">

              <section class="main-content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <!-- 	HEADER TABLE -->
                      <div class="row header-box container-fluid d-flex align-items-center ">
                        <div class="col d-flex justify-content-start">
                          <!-- <a href="#" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>New</a> -->
                        </div>
                        <div class="col d-flex justify-content-end">
                          <!-- <a href="#" data-bs-toggle="modal" class="btn btn-warning btn-sm btn-flat"><i class='bx bx-archive bx-xs bx-tada-hover'></i>Archive</a> -->
                        </div>
                      </div>

                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="archivePropertyList" class="table table-striped" style="width:100%">
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
                              $INACTIVE = "INACTIVE";
                              $query = "SELECT 
                              property_list.id, 
                              property_list.homeowners_id,
                              property_list.blk as property_blk, 
                              property_list.lot as property_lot, 
                              property_list.phase as property_phase, 
                              property_list.street as property_street, 
                              homeowners_users.firstname, 
                              homeowners_users.lastname, 
                              homeowners_users.middle_initial FROM property_list INNER JOIN homeowners_users WHERE property_list.homeowners_id = homeowners_users.id AND property_list.archive = :INACTIVE";
                              $data = ["INACTIVE" => $INACTIVE];

                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute($data);
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
                                        <li><a id="delete_archive" data-property="<?php echo $property_id; ?>" href="#" class="dropdown-item">Delete</a></li>
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


  ?>


  <script>
    $(document).ready(function() {

      $("#archivePropertyList").DataTable({

      });




      // Delete Archive
      $("#archivePropertyList").on('click', "#delete_archive", function() {
          var property_id = $(this).attr('data-property');

        swal({
            title: "Delete Confirmation",
            text: "All the records of this property will be permanently deleted. Do you want to continue?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

              $.ajax({
                url: '../archive/property_delete.php',
                type: 'POST',
                data: {
                  property_id: property_id
                },
                success: function(response) {
                  // swal("This record has been permanently deleted!", {
                  //   icon: "success"
                  // });
                  location.reload(true);
                }
              });
            } else {
              swal("Delete Canceled");
            }
          });
      });


    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>