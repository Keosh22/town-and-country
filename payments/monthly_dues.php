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
          <a href="../admin-panel/dashboard.php"><i class='bx bx-arrow-back text-secondary bx-tada-hover fs-2 fw-bold'></i></a>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="../admin-panel/dashboard.php">Home</a></li>
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
                          <a class="btn btn-success btn-sm btn-flat mx-2" id="archive">Archive</a>
                          <button class="btn btn-secondary btn-sm btn-flat mx-2" id="toggle_archive">Select Archive</button>



                          <a href="../archive/archive_list_monthly_dues.php" class="btn btn-warning btn-sm btn-flat mx-2"><i class='bx bx-archive bx-xs bx-tada-hover'></i>Archive List</a>

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
                                <th width="5%">Paid Amount</th>
                                <th scope="col" width="5%">Action</th>
                                <th></th>
                                <th width="5%"></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $monthly_dues = "Monthly Dues";
                              $monthy_dues_id = "C007";
                              $ACTIVE = "ACTIVE";
                              $query = "SELECT 
                                payments_list.transaction_number,
                                payments_list.id as payment_id,
                                payments_list.date_created as date_paid,
                                payments_list.collection_fee_id,
                                payments_list.paid,
                                payments_list.collection_id as collection_id,
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
                                WHERE collection_fee.collection_fee_number = :monthy_dues_id AND payments_list.archive = :ACTIVE
                                ";
                              $data = ["monthy_dues_id" => $monthy_dues_id, "ACTIVE" => $ACTIVE];
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
                                    <td><?php echo date("F j, Y g:iA", strtotime($date_paid)); ?></td>
                                    <td><?php echo $transaction_number; ?></td>
                                    <td><?php echo $firstname . " " . $middle_initial . " " . $lastname; ?></td>
                                    <td><?php echo "BLK-" . $blk . " LOT-" . $lot . " " . $street . " " . $phase . "-" . $collection_month . " " . $collection_year; ?></td>
                                    <td><?php echo $paid_amount; ?></td>
                                    <td>
                                      <div class="dropdown">
                                        <a href="#" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Action</a>
                                        <ul class="dropdown-menu">
                                          <li><a id="view_payment" data-tnumber='<?php echo $transaction_number; ?>' data-id="<?php echo $payment_id; ?>" href="#monthly_dues_view" data-bs-toggle="modal" class="dropdown-item">View</a></li>
                                          <!-- <li><a id="archive_btn" data-tnumber='<?php echo $transaction_number; ?>' data-id="<?php echo $payment_id; ?>" data-collection-id='<?php echo $collection_id; ?>' href="#arhive_monthlyDues" data-bs-toggle="modal" class="dropdown-item">Archive</a></li> -->
                                        </ul>
                                      </div>
                                    </td>
                                    <td><?php echo date("n-j-Y H:i", strtotime($date_paid)); ?></td>
                                    <td><input type="checkbox" class="form-check-input archive_checkbox" data-tnumber="<?php echo $transaction_number; ?>" data-id="<?php echo $payment_id; ?>"></td>
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
                                <th width="5%"></th>
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
  include("../payments/receipt_view_modal.php");
  // Archive Payment
  include("../archive/archive_modal.php");

  ?>


  <script>
    $(document).ready(function() {
      // DataTable
      $("#monthlyDuesTable").DataTable({
        order: [
          [6, 'desc'],
          [1, 'desc']
        ]
      });
      const TABLE = $("#monthlyDuesTable").DataTable();
      TABLE.columns(6).visible(false);
      TABLE.columns(7).visible(false);





      $("#archive").prop('hidden', true);
      var payment_id_arr = [];
      // // SElect archive toggle
      $("#toggle_archive").on('click', function() {
        $("#cancel_archive, #archive").prop('hidden', function(i, val) {
          if (val) {
            TABLE.columns(7).visible(true);
            $("#toggle_archive").html("Cancel Archive");
          } else {
            TABLE.columns(7).visible(false);
            $("#toggle_archive").html("Select Archive");

            location.reload();
          }
          $("#toggle_archive").toggleClass("btn-danger");
          return !val;
        });
      });

      // Archive Checkbox
      $("#monthlyDuesTable").on('change', '.archive_checkbox', function() {
        var payment_id = $(this).attr("data-id");
        if (this.checked) {
          payment_id_arr.push(payment_id);
        } else {
          for (var i = 0; i <= payment_id_arr.length - 1; i++) {
            if (payment_id === payment_id_arr[i]) {
              payment_id_arr.splice(i, 1);
            }
          }
        }
      });

      // ARchive
      // $("#archive").on('click', function() {

      //   if (payment_id_arr.length != 0) {

      //   } else {
      //     swal("No item has been selected", "", "error");
      //   }

      // });









      // View payment
      $("#monthlyDuesTable").on('click', '#view_payment', function() {
        const archive_status = "ACTIVE";
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



      //  Archive Payment
      // $("#monthlyDuesTable").on('click', "#archive_btn", function() {
      //   var payment_id = $(this).attr('data-id');
      //   var transaction_number = $(this).attr('data-tnumber');
      //   var collection_id = $(this).attr('data-collection-id');

      //   $("#payment_id").val(payment_id);
      //   $("#transaction_number").val(transaction_number);
      //   $("#collection_id").val(collection_id);

      //   swal({
      //       title: "Archive Confirmation",
      //       text: "Do you want to archive this payment?",
      //       icon: "warning",
      //       buttons: true,
      //       dangerMode: true,
      //     })
      //     .then((willDelete) => {
      //       if (willDelete) {

      //       } else {
      //         swal("Archiving Canceled!");
      //         $("#arhive_monthlyDues").modal('hide');
      //       }
      //     })
      // });
      $("#archive").on('click', function() {
        var transaction_number = $(this).attr('data-tnumber');
        var collection_id = $(this).attr('data-collection-id');

        $("#payment_id").val(payment_id_arr.join(' '));
        $("#transaction_number").val(transaction_number);
        $("#collection_id").val(collection_id);

        if (payment_id_arr.length != 0) {
          $("#arhive_monthlyDues").modal("show");
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
            });
        } else {

          swal("No item has been selected", "", "error");
        }


      });








      // var table = $("#monthlyDuesTable").DataTable();
      // var value = 300;
      // table.column( 4 ).search( value ).draw();


    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>