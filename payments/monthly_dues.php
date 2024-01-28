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
            <li class="breadcrumb-item"><a href="#">Payments</a></li>
            <li class="breadcrumb-item">Monthly Dues</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Monthly Dues Fee List</h2>
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
                          <a href="../archive/archive_list_monthly_dues.php" class="btn btn-warning btn-sm btn-flat"><i class='bx bx-archive bx-xs bx-tada-hover'></i>Archive</a>
                        </div>
                      </div>

                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="monthlyDuesTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="10%">Date</th>
                                <th width="10%">Transaction No.</th>
                                <th width="10%">Name</th>
                                <th width="20%">Details</th>
                                <th width="5%">Paid Ammount</th>
                                <th scope="col" width="5%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php

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
                                collection_list.year as collection_year
                                FROM payments_list 
                                INNER JOIN homeowners_users ON payments_list.homeowners_id = homeowners_users.id
                                INNER JOIN property_list ON payments_list.property_id = property_list.id
                                INNER JOIN collection_list ON payments_list.collection_id = collection_list.id
                                INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id
                                ";
                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute();
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



                                  $paid_amount = $result['paid'];
                              ?>
                                  <tr>
                                    <td><?php echo date("F j, Y g:iA", strtotime($date_paid)); ?></td>
                                    <td><?php echo $transaction_number; ?></td>
                                    <td><?php echo $firstname . " " . $middle_initial . " " . $lastname; ?></td>
                                    <td><?php echo "BLK-" . $blk . " LOT-" . $lot . " " . $street . " " . $phase."-".$collection_month." ".$collection_year; ?></td>
                                    <td><?php echo $paid_amount; ?></td>
                                    <td>
                                      <div class="dropdown">
                                        <a href="#" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Action</a>
                                        <ul class="dropdown-menu">
                                          <li><a id="view_payment" data-tnumber='<?php echo $transaction_number; ?>' data-id="<?php echo $payment_id; ?>" href="#monthly_dues_view" data-bs-toggle="modal" class="dropdown-item">View</a></li>
                                          <li><a id="archive_btn" data-tnumber='<?php echo $transaction_number; ?>' data-id="<?php echo $payment_id; ?>" href="#arhive_monthlyDues" data-bs-toggle="modal" class="dropdown-item">Archive</a></li>
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
                                <th width="10%">Date</th>
                                <th width="10%">Transaction No.</th>
                                <th width="10%">Name</th>
                                <th width="20%">Details</th>
                                <th width="5%">Paid Ammount</th>
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
  // View payment
  include("../payments/monthly_dues_view_modal.php");
  // Archive Payment
  include("../payments/monthly_dues_archive_modal.php");

  ?>


  <script>
    $(document).ready(function() {
     

      // View payment
      $("#monthlyDuesTable").on('click', '#view_payment', function() {
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
              transaction_number: transaction_number
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
            }
          });
        }
      });



      //  Archive Payment
      $("#monthlyDuesTable").on('click', "#archive_btn", function() {
        var payment_id = $(this).attr('data-id');
        var transaction_number = $(this).attr('data-tnumber');
        $("#payment_id").val(payment_id);
        $("#transaction_number").val(transaction_number);

        swal({
            title: "Archive Confirmation",
            text: "Do you want to archive this payment?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

            } else {
              swal("Archiving Canceled!");
              $("#arhive_monthlyDues").modal('hide');
            }
          })
      });


      // Print payment
      $("#monthlyDuesTable").on('click', '#print_payment', function() {

      });


      // DataTable
      $("#monthlyDuesTable").DataTable({
        order: [
          [1, 'desc']
        ]
      });


    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>