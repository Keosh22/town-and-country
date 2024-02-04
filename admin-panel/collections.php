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
            <li class="breadcrumb-item">Collections Fee</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Collections Fee</h2>
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
                          <a href="#collectionCreate" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>New Fee</a>
                        </div>

                      </div>

                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="collectionsTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="5%">ID</th>
                                <th width="10%">Collection #</th>
                                <th width="30%">Category</th>
                                <th width="30%">Description</th>
                                <th width="10%">Fee</th>
                                <th width="10%">Date Created</th>
                                <th width="5%">Status</th>
                                <th scope="col" width="5%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $query = "SELECT * FROM collection_fee";
                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute();
                              $count = $stmt->rowCount();
                              if ($count > 0) {
                                while ($result = $stmt->fetch()) {
                                  $collection_id = $result['id'];
                                  $collection_number = $result['collection_fee_number'];
                                  $category = $result['category'];
                                  $description = $result['description'];
                                  $fee = $result['fee'];
                                  $date_created = $result['date_created'];
                                  $status = $result['status'];
                              ?>
                                  <tr>
                                    <td><?php echo $collection_id ?></td>
                                    <td><?php echo $collection_number ?></td>
                                    <td><?php echo $category ?></td>
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
                                          <li><a data-id="<?php echo $collection_id ?>" href="#collectionUpdate" data-bs-toggle="modal" class="dropdown-item" id="update_collection">Edit</a></li>
                                          <li><a data-id="<?php echo $collection_id ?>" href="#" class="dropdown-item" id="delete_collection">Delete</a></li>
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
                                <th width="10%">Collection #</th>
                                <th width="30%">Category</th>
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
  // Delete Collection Modal
  include("../admin-panel/collection_update_modal.php");
  ?>


  <script>
    $(document).ready(function() {


      // DataTable
      $("#collectionsTable").DataTable({
        order: [
          [1, 'desc']
        ]
      });
    });


    // Update Collection 
    $("#collectionsTable").on('click', "#update_collection", function() {
      var collection_id = $(this).attr('data-id');
      $("#update_collection_id").val(collection_id);
      getCollection(collection_id);

      function getCollection(collection_id) {
        $.ajax({
          url: "../ajax/collection_get_data.php",
          type: 'POST',
          data: {
            collection_id: collection_id
          },
          dataType: 'JSON',
          success: function(response) {
            $("#update_category").val(response.category);
            $("#update_description").val(response.description);
            $("#update_fee").val(response.fee);
          }
        });
      }
    });

    // Delete Collection
    $("#collectionsTable").on('click', "#delete_collection", function() {
      var collection_id = $(this).attr('data-id');
      swal({
          title: "Delete Confirmation",
          text: "Once deleted, you will not able to recover this record",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              url: "../ajax/collection_delete.php",
              type: "POST",
              data: {
                collection_id: collection_id
              },
              success: function(response) {}
            });
            location.reload(true);
          } else {
            swal("Delete canceled!")
          }
        })
    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>