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
        <section class="content-header d-flex justify-content-between align-items-center mb-3">
        <a href="../payments/monthly_dues.php"><i class='bx bx-arrow-back text-secondary bx-tada-hover fs-2 fw-bold'></i></a>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="../admin-panel/dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Payments</a></li>
            <li class="breadcrumb-item"><a href="../payments/monthly_dues.php">Monthly Dues</a></li>
            <li class="breadcrumb-item">Archive</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Archive List (Monthly Dues)</h2>
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
                          <table id="archiveMonthlyDuesTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="10%">Date</th>
                                <th width="10%">Transaction No.</th>
                                <th width="10%">Name</th>
                                <th width="20%">Details</th>
                                <th width="5%">Paid Amount</th>
                                <th scope="col" width="5%">Action</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $monthly_dues = "Monthly Dues";
                              $monthly_dues_num = "C007";
                              $INACTIVE = "INACTIVE";
                              $query = "SELECT 
                           payments_list.transaction_number,
                           payments_list.id as payment_id,
                           payments_list.date_created as date_paid,
                           payments_list.collection_fee_id,
                           payments_list.paid,
                           homeowners_users.firstname,
                           homeowners_users.middle_initial,
                           homeowners_users.lastname,
                           property_list.blk as property_blk,
                           property_list.lot as property_lot,
                           property_list.street as property_street,
                           property_list.phase as property_phase,
                           collection_list.month as collection_month,
                           collection_list.year as collection_year,
                           collection_list.id as collection_id
                           FROM payments_list 
                           INNER JOIN homeowners_users ON payments_list.homeowners_id = homeowners_users.id
                           INNER JOIN property_list ON payments_list.property_id = property_list.id
                           INNER JOIN collection_list ON payments_list.collection_id = collection_list.id
                           INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id
                           WHERE collection_fee.collection_fee_number = :monthly_dues_num AND payments_list.archive = :INACTIVE
                           ";
                              $data = ["monthly_dues_num" => $monthly_dues_num, "INACTIVE" => $INACTIVE];
                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute($data);
                              if ($stmt->rowCount() > 0) {
                                while ($result = $stmt->fetch()) {
                                  $payment_id = $result['payment_id'];
                                  $date_paid = $result['date_paid'];
                                  $transaction_number = $result['transaction_number'];

                                  $firstname = $result['firstname'];
                                  $middle_initial = $result['middle_initial'];
                                  $lastname = $result['lastname'];

                                  $blk = $result['property_blk'];
                                  $lot = $result['property_lot'];
                                  $street = $result['property_street'];
                                  $phase = $result['property_phase'];

                                  $collection_month = $result['collection_month'];
                                  $collection_year = $result['collection_year'];
                                  $collection_id = $result['collection_id'];

                                  $paid_amount = $result['paid'];
                              ?>
                                  <tr>
                                    <td><?php echo date("F j, Y", strtotime($date_paid)); ?></td>
                                    <td><?php echo $transaction_number; ?></td>
                                    <td><?php echo $firstname . " " . $middle_initial . " " . $lastname; ?></td>
                                    <td><?php echo "BLK-" . $blk . " LOT-" . $lot . " " . $street . " " . $phase . "-" . $collection_month . " " . $collection_year; ?></td>
                                    <td><?php echo $paid_amount; ?></td>
                                    <td>
                                      <div class="dropdown">
                                        <a href="#" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Action</a>
                                        <ul class="dropdown-menu">
                                          <li><a id="view_payment" data-tnumber='<?php echo $transaction_number; ?>' data-id="<?php echo $payment_id; ?>" href="#monthly_dues_view" data-bs-toggle="modal" class="dropdown-item">View</a></li>
                                          <!-- <li><a id="delete_archive_md" data-tnumber='<?php echo $transaction_number; ?>' data-id="<?php echo $payment_id; ?>" data-collection="<?php echo $collection_id; ?>" href="#" class="dropdown-item">Delete</a></li> -->
                                          <li><a id="restore_archive_btn" data-tnumber='<?php echo $transaction_number; ?>' data-id="<?php echo $payment_id; ?>" data-collection="<?php echo $collection_id; ?>" href="#" class="dropdown-item">Restore</a></li>
                                        </ul>
                                      </div>
                                    </td>
                                    <td><?php echo date("n-j-Y H:i",strtotime($date_paid)); ?></td>
                                  </tr>
                              <?php
                                }
                              }
                              ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th width="10%">Date</th>
                                <th width="10%">Transaction No.</th>
                                <th width="10%">Name</th>
                                <th width="20%">Details</th>
                                <th width="5%">Paid Amount</th>
                                <th scope="col" width="5%">Action</th>
                                <th></th>
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
  // View payment
  include("../archive/archive_view_modal.php");

  ?>


  <script>
    $(document).ready(function() {

      $("#archiveMonthlyDuesTable").DataTable({
        order: [
          [6, 'desc'],
          [1, 'desc']
        ]
      });

      const TABLE = $("#archiveMonthlyDuesTable").DataTable();
      TABLE.columns(6).visible(false);
      // View payment
      $("#archiveMonthlyDuesTable").on('click', '#view_payment', function() {
        const archive_status = "INACTIVE";
        var payment_id = $(this).attr('data-id');
        var transaction_number = $(this).attr('data-tnumber');
        $("#payment_id_modal").val(payment_id);
        $("#transactionNum_id_modal").val(transaction_number);
        getPayment(payment_id);

        function getPayment(payment_id) {
          $.ajax({
            url: '../ajax/payment_receipt_get_data.php',
            type: 'POST',
            data: {
              payment_id: payment_id,
              transaction_number: transaction_number,
              archive_status: archive_status
            },
            dataType: 'JSON',
            success: function(response) {
              $("#account_number").html(response.account_number);
              $("#name").html(response.name);
              $("#current_address").html(response.address);
              $("#transaction_number").html(response.transaction_number);
              $("#date_paid").html(response.date_paid);
              $(".table_result").html(response.table_result);
              $("#total_amount").val(response.total_amount);
              $("#remarks").html(response.remarks);
              $("#admin_name").html(response.admin_name);
              $("#paid_by").html(response.paid_by);
            }
          });
        }
      });


      // Delete Archive
      $("#archiveMonthlyDuesTable").on('click', "#delete_archive_md", function() {
        var payment_id = $(this).attr('data-id');
        var collection_id = $(this).attr('data-collection');

        swal({
            title: "Delete Confirmation",
            text: "Once deleted, you will not able to recover this record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

              $.ajax({
                url: '../archive/delete_archive_monthly_dues.php',
                type: 'POST',
                data: {
                  payment_id: payment_id,
                  collection_id: collection_id
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


      $("#archiveMonthlyDuesTable").on('click', '#restore_archive_btn', function (){
        var payment_id = $(this).attr('data-id');
        var transaction_number = $(this).attr('data-tnumber');
        swal({
          title: "Restore Confirmation",
          text: "Are you sure you want to restore this record? Click OK to proceed",
          icon: "warning",
          buttons: true,
          dangerMode: true
        })
        .then((proceed) => {
          if(proceed){
            $.ajax({
              url: '../archive/restore_archive_payment.php',
              type: 'POST',
              data: {payment_id: payment_id, transaction_number: transaction_number},
              success: function (){
                location.reload();
              }
            })
          } else {
            swal("Canceled!");
          }
        });
      });


    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>