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
            <li class="breadcrumb-item"><a href="#">Services</a></li>
            <li class="breadcrumb-item">Promotions</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Promotions List</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">

              <section class="main-content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <!-- 	HEADER TABLE -->
                      <div class="header-box container-fluid d-flex align-items-center">
                        <div class="col d-flex justify-content-start">
                          <div class="col">
                            <a href="#promotionCreate" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Promotions</a>
                          </div>
                        </div>
                        <div class="col d-flex justify-content-end">
                          <div class="col-3">
                            <select name="filter_status" id="filter_status" class="form-select form-select-sm text-secondary">
                              <option value="">Status:</option>
                              <option value="ACTIVE">ACTIVE</option>
                              <option value="INACTIVE">INACTIVE</option>
                            </select>
                          </div>
                        </div>

                      </div>

                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="promotionTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="10%">Photo</th>
                                <th width="10%">Business Name</th>
                                <th width="30%">Content</th>
                                <th width="10%">Expiration</th>
                                <th width="5%">Status</th>
                                <th scope="col" width="5%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $query = "SELECT * FROM promotion";
                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute();
                              $count = $stmt->rowCount();
                              if ($count > 0) {
                                while ($result = $stmt->fetch()) {
                                  $promotion_id = $result['id'];
                                  $photo = $result['photo'];
                                  $business_name = $result['business_name'];
                                  $content = $result['content'];
                                  $status = $result['status'];
                                  $date_created = $result['date_created'];
                                  $date_expired = $result['date_expired'];

                                  $promotion_due = date("Y/m/d", strtotime($date_expired . "+1 day"));
                                  $current_date = date("Y/m/d", strtotime("now"));
                                  if ($promotion_due <= $current_date) {
                                    $status = "INACTIVE";
                                    $query_expired = "UPDATE promotion SET status = :status WHERE id = :promotion_id";
                                    $data_expired = [
                                      "status" => $status,
                                      "promotion_id" => $promotion_id
                                    ];
                                    $stmt_expired = $connection->prepare($query_expired);
                                    $stmt_expired->execute($data_expired);
                                  }

                              ?>
                                  <tr>
                                    <td>
                                      <div class="profile-container"><img class="profile-image" src="../promotion_photos/<?php
                                                                                                                          if ($photo == "") {
                                                                                                                            echo "default_image_promotion.jpg";
                                                                                                                          } else {
                                                                                                                            echo $photo;
                                                                                                                          }
                                                                                                                          ?>"></div>
                                    </td>
                                    <td><?php echo $business_name ?></td>
                                    <td><?php echo nl2br($content) ?></td>
                                    <td><?php echo date("F j, Y g:i a", strtotime($date_expired)) ?></td>
                                    <td>
                                      <?php
                                      if ($status == "ACTIVE") {
                                      ?>
                                        <span class="badge rounded-pill text-bg-success"><?php echo $status ?></span>
                                      <?php
                                      } else {
                                      ?>
                                        <span class="badge rounded-pill text-bg-danger"><?php echo $status ?></span>
                                      <?php
                                      }
                                      ?>
                                    </td>
                                    <td>
                                      <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">Action</a>
                                        <ul class="dropdown-menu">
                                          <li><a data-id="<?php echo $promotion_id ?>" href="#promotionUpdate" data-bs-toggle="modal" class="dropdown-item" id="update_promotion_btn">Update</a></li>
                                          <li><a data-id="<?php echo $promotion_id ?>" href="#change_photo_promotion" class="dropdown-item" data-bs-toggle="modal" id="change_photo_btn">Change photo</a></li>
                                          <li><a data-id="<?php echo $promotion_id ?>" href="#" class="dropdown-item" id="delete_promotion_btn">Delete</a></li>
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
                                <th width="10%">Photo</th>
                                <th width="10%">Business Name</th>
                                <th width="30%">Content</th>
                                <th width="10%">Expiration</th>
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
  // Create Promotion Modal
  include("../admin-panel/promotion_create_modal.php");
  // Update Promotion Modal
  include("../admin-panel/promotion_update_modal.php");
  // Change Photo Modal
  include("../admin-panel/promotion_change_photo.modal.php");


  ?>


  <script>
    $(document).ready(function() {


      // Change photo 
      $("#promotionTable").on('click', '#change_photo_btn', function() {
        var promotion_id = $(this).attr('data-id');
        $("#change_photo_id").val(promotion_id);
        getPromotion(promotion_id);

        function getPromotion(promotion_id) {
          $.ajax({
            url: '../ajax/promotion_get_data.php',
            type: 'POST',
            data: {
              promotion_id: promotion_id
            },
            dataType: 'JSON',
            success: function(response) {
              $("#photo_name").val(response.photo);
            }
          });
        }


      });

      // Update Promotion 
      $("#promotionTable").on('click', "#update_promotion_btn", function() {
        var promotion_id = $(this).attr('data-id');
        $("#promotion_id").val(promotion_id);
        getPromotion(promotion_id);

        function getPromotion(promotion_id) {
          $.ajax({
            url: '../ajax/promotion_get_data.php',
            type: 'POST',
            data: {
              promotion_id: promotion_id
            },
            dataType: 'JSON',
            success: function(response) {
              $("#update_business_name").val(response.business_name);
              $("#update_promotion_due").val(response.date_expired);
              $("#promotion_status").val(response.status);
              $("#update_promotion_content").val(response.content);
              $("#photo_name").val(response.photo);
            }
          });
        }
      });

      // DataTable  
      $("#promotionTable").DataTable({
        order: [
          [3, 'desc']
        ]

      })
      const TABLE = $("#promotionTable").DataTable();

      $("#filter_status").on('change', function() {
        TABLE.columns(3).search(this.value).draw();
      })


      // Delete promotion
      $("#promotionTable").on('click', '#delete_promotion_btn', function() {
        var promotion_id = $(this).attr('data-id');

        swal({
            title: "Delete Confirmation",
            text: "Once Deleted, you will not able to recover this record",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                url: '../ajax/promotion_delete.php',
                type: 'POST',
                data: {
                  promotion_id: promotion_id
                },
                success: function(response) {
                  location.reload(true);

                }
              })
            } else {
              swal("Delete canceled!");
            }
          });
      });


    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>