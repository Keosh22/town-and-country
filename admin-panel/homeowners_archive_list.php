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
        <section class="content-header d-flex justify-content-between align-items-center mb-3">
        <a href="../admin-panel/homeowners.php"><i class='bx bx-arrow-back text-secondary bx-tada-hover fs-2 fw-bold'></i></a>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="../admin-panel/dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../admin-panel/homeowners.php">Homeowners</a></li>
            <li class="breadcrumb-item"><a href="../admin-panel/homeowners.php">Homeowners List</a></li>
            <li class="breadcrumb-item">Archive</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Archive Homeowners List</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">
              <section class="main-content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <!-- 	HEADER TABLE -->
                      <div class="header-box container-fluid  align-items-center">
                       
                      </div>
                      <div class="body-box shadow-sm">
                        <div class="table-responsive mx-2">
                          <table id="homeownersArchiveTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="5%">Acc.#</th>
                                <th width="10%">Photo</th>
                                <th width="20%">Fullname</th>
                                <th width="30%">Address</th>
                                <th width="10%">Email</th>
                                <th width="10%">Phone</th>
                                <th width="10%">Status</th>
                                <th scope="col" width="5%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $INACTIVE = "INACTIVE";
                              $query = "SELECT * FROM homeowners_users WHERE archive = :INACTIVE";
                              $data = ["INACTIVE" => $INACTIVE];
                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute($data);
                              while ($result = $stmt->fetch()) {
                                $homeowners_id = $result['id'];
                                $account_number = $result['account_number'];
                                $firstname = $result['firstname'];
                                $lastname = $result['lastname'];
                                $middle_initial = $result['middle_initial'];
                                $blk = $result['blk'];
                                $lot = $result['lot'];
                                $street = $result['street'];
                                $phase = $result['phase'];
                                $status = $result['status'];
                                $email = $result['email'];
                                $phone_number = $result['phone_number'];
                                // $tenant_name = $result['tenant_name'];
                              ?>
                                <tr>
                                  <td><?php echo $account_number; ?></td>
                                  <td>
                                    <div class="profile-container"><img class="profile-image" src="../uploads/default-profile.png"></div>
                                  </td>
                                  <td>
                                    <?php
                                    echo $firstname . " " . $middle_initial . " " . $lastname . "</p>";
                                    ?>
                                  </td>
                                  <td><?php echo "Blk-" . $blk . " Lot-" . $lot . " " . $street . " St. " . $phase; ?></td>
                                  <td><?php echo $email; ?></td>
                                  <td><?php echo $phone_number; ?></td>
                                  <td>
                                    <?php
                                    if ($status == 'Member') {
                                    ?>
                                      <span class="badge rounded-pill text-bg-success"><?php echo $status; ?></span>
                                    <?php
                                    } elseif ($status == 'Non-member') {
                                    ?>
                                      <span class="badge rounded-pill text-bg-danger"><?php echo $status; ?></span>
                                    <?php
                                    } elseif ($status == 'Tenant') {
                                    ?>
                                      <span class="badge rounded-pill text-bg-info">Tenant</span>
                                    <?php
                                    } elseif ($status == 'EXPIRED') {
                                    ?>
                                      <span class="badge rounded-pill text-bg-warning">Expired</span>
                                    <?php
                                    }

                                    ?>
                                  </td>
                                  <td>
                                    <div class="dropdown">
                                      <a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">Action</a>
                                      <ul class="dropdown-menu">
                                      <li><a href="#homeowners_view_modal" class="dropdown-item" data-bs-toggle="modal" id="homeowners_view_btn"
                                      data-homeowners-id="<?php echo $homeowners_id; ?>"
                                      data-acc-num="<?php echo $account_number; ?>"
                                      data-name="<?php echo $firstname . " " . $middle_initial . " " . $lastname; ?>"
                                      data-email="<?php echo $email ?>"
                                      data-phone-num="<?php echo $phone_number ?>"
                                      data-address="<?php echo "Blk-" . $blk . " Lot-" . $lot . " " . $street . " St. " . $phase; ?>"
                                      data-status="<?php echo $status ?>"
                                      >View</a></li>
                                      <li><a href="#" class="dropdown-item" id="delete_permanent_btn" data-homeowners-id="<?php echo $homeowners_id; ?>">Delete</a></li>
                                      </ul>
                                    </div>
                                  </td>

                                </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th width="5%">Acc.#</th>
                                <th width="10%">Photo</th>
                                <th width="20%">Fullname</th>
                                <th width="30%">Address</th>
                                <th width="10%">Email</th>
                                <th width="10%">Phone</th>
                                <th width="10%">Status</th>
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
  // View modal
  include("../admin-panel/homeowners_view.modal.php");

  ?>


  <script>
    $(document).ready(function() {



      // DataTable
      $("#homeownersArchiveTable").DataTable({
        order: [
          [2, 'asc']
        ]
      });

      // View modal
      $("#homeownersArchiveTable").on('click', '#homeowners_view_btn', function (){
        var homeowners_id = $(this).attr('data-homeowners-id');
        var account_number = $(this).attr('data-acc-num');
        var name = $(this).attr('data-name');
        var email_address = $(this).attr('data-email');
        var phone_number = $(this).attr('data-phone-num');
        var address = $(this).attr('data-address');
        var status = $(this).attr('data-status');
        

        $("#homeowners_id_view").val(homeowners_id);
        $("#account_number_view").val(account_number);
        $("#name_view").val(name);
        $("#email_address_view").val(email_address);
        $("#phone_number_view").val(phone_number);
        $("#address_view").val(address);
        $("#status_view").val(status);
      });


      // Delete homeowners
      $("#homeownersArchiveTable").on('click', '#delete_permanent_btn', function (){
        var homeowners_id = $(this).attr('data-homeowners-id');
        swal({
          title: "Delete Confirmation",
          text: "All the record of this account will also be permanently deleted. Do you want to continue?",
          icon: "warning",
          buttons: true,
          dangerMode: true
        })
        .then((willDelete) => {
          if(willDelete){
            $.ajax({
              url: '../ajax/homeowners_account_delete.php',
              type: 'POST',
              data: {
                homeowners_id: homeowners_id
              },
              success: function (response){
                location.reload(true);
             
              }
            });

           
            // swal("This account has been permanently deleted!","","success");
          } else {
            swal("Delete Canceled!","", "error");
          }
        })

      });

      
    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");

  ?>