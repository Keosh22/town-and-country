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
            <li class="breadcrumb-item">Additional Payments</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Additional Payments List</h2>
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
                          <a href="../payments/additional_payment_process.php" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>New</a>
                        </div>
                        <div class="col d-flex justify-content-end">

                          <a class="btn btn-success btn-sm btn-flat mx-2" id="archive">Archive</a>
                          <button class="btn btn-secondary btn-sm btn-flat mx-2" id="toggle_archive">Select Archive</button>
                          <a href="../archive/additional_payment_archive_list.php" class="btn btn-warning btn-sm btn-flat"><i class='bx bx-archive bx-xs bx-tada-hover'></i>Archive</a>
                        </div>
                      </div>

                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="additionalPaymentTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="10%">Date</th>
                                <th width="10%">Transaction No.</th>
                                <th width="15%">Payment</th>
                                <th width="5%">Paid Amount</th>
                                <th scope="col" width="5%">Action</th>
                                <th></th>
                                <th width="5%"></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $ACTIVE = "ACTIVE";
                              $month_dues = "Monthly Dues";
                              $membership_fee = "Membership Fee";
                              $construction_bond = "Construction Bond";
                              $construction_clearance = "Construction Clearance";
                              $material_delivery = "Material Delivery";
                              $query = "SELECT 
                                    payments_list.transaction_number,
                                    payments_list.id as payment_id,
                                    payments_list.date_created as date_paid,
                                    payments_list.collection_fee_id,
                                    payments_list.paid,
                                    payments_list.remarks,
                                    payments_list.paid_by,
                                    payments_list.date_created,
                                    collection_fee.category,
                                    collection_fee.description
                                    FROM payments_list 
                                    INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id
                                    WHERE NOT collection_fee.category IN (:monthly_dues, :membership_fee, :construction_bond,:construction_clearance, :material_delivery) AND payments_list.archive = :ACTIVE
                                    ";
                              $data = [
                                "monthly_dues" => $month_dues,
                                "membership_fee" => $membership_fee,
                                "construction_bond" => $construction_bond,
                                "construction_clearance" => $construction_clearance,
                                "material_delivery" => $material_delivery,
                                "ACTIVE" => $ACTIVE
                              ];
                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute($data);
                              if ($stmt->rowCount() > 0) {
                                while ($result = $stmt->fetch()) {
                                  $transaction_number = $result['transaction_number'];
                                  $date_created = date("M j, Y", strtotime($result['date_created']));
                                  $payment = $result['category'];
                                  $amount = $result['paid'];
                                  $payment_id = $result['payment_id'];
                                  $collection_fee_id = $result['collection_fee_id'];
                              ?>
                                  <tr>
                                    <td><?php echo $date_created; ?></td>
                                    <td><?php echo $transaction_number; ?></td>
                                    <td><?php echo $payment; ?></td>
                                    <td><?php echo $amount; ?></td>
                                    <td>
                                      <div class="dropdown">
                                        <a type="button" class="dropdown-toggle btn btn-secondary" data-bs-toggle="dropdown">Action</a>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" id="view_btn" href="#additional_payment_view" data-bs-toggle="modal" data-id="<?php echo $payment_id; ?>" data-tnum="<?php echo $transaction_number; ?>" data-collection-id="<?php echo $collection_fee_id; ?>">View</a></li>
                                          <li><a class="dropdown-item" id="archive_btn" href="#arhive_additionalPayment" data-bs-toggle="modal" data-id="<?php echo $payment_id; ?>" data-tnum="<?php echo $transaction_number; ?>" data-collection-id="<?php echo $collection_fee_id; ?>">Archive</a></li>
                                        </ul>
                                      </div>
                                    </td>
                                    <td><?php echo date("n-j-Y H:i", strtotime($date_created)); ?></td>
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
                                <th width="15%">Payment</th>
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
  // Additional Payment View
  include("../payments/additional_payment_view_modal.php");
  // ARchive 
  include("../archive/additional_payment_archive_modal.php");

  ?>


  <script>
    $(document).ready(function() {
      // DataTable
      $("#additionalPaymentTable").DataTable({
        order: [
          [5, 'desc'],
          [1, 'desc']

        ]
      });
      const TABLE = $("#additionalPaymentTable").DataTable();
      TABLE.columns(5).visible(false);
      TABLE.columns(6).visible(false);


      $("#archive").prop('hidden', true);
      var payment_id_arr = [];
      // // SElect archive toggle
      $("#toggle_archive").on('click', function() {
        $("#cancel_archive, #archive").prop('hidden', function(i, val) {
          if (val) {
            TABLE.columns(6).visible(true);
            $("#toggle_archive").html("Cancel Archive");
          } else {
            TABLE.columns(6).visible(false);
            $("#toggle_archive").html("Select Archive");

            location.reload();
          }
          $("#toggle_archive").toggleClass("btn-danger");
          return !val;
        });
      });

      // Archive Checkbox
      $("#additionalPaymentTable").on('change', '.archive_checkbox', function() {
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
      $("#archive").on('click', function() {
        var payment_id = $(this).attr('data-id');
        var transaction_number = $(this).attr('data-tnum');


        $("#payment_id").val(payment_id_arr.join(' '));
        $("#transaction_number").val(transaction_number);
        $("collection_id").val(collection_fee_id);

        if (payment_id_arr.length != 0) {
          $("#arhive_additionalPayment").modal("show");
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
                $("#arhive_additionalPayment").modal('hide');
              }
            });

        } else {
          swal("No item has been selected", "", "error");
          // $("#arhive_additionalPayment").modal("hide");
        }



      });




      $("#additionalPaymentTable").on('click', '#view_btn', function() {
        var payment_id = $(this).attr('data-id');
        var transaction_number = $(this).attr('data-tnum');
        var collection_fee_id = $(this).attr('data-collection-id')
        var status = "ACTIVE";

        $.ajax({
          url: '../payments/additional_payment_view.php',
          type: 'POST',
          data: {
            transaction_number: transaction_number,
            collection_fee_id: collection_fee_id,
            status: status
          },
          dataType: 'JSON',
          success: function(response) {
            $("#payment_id").val(payment_id);
            $("#transaction_number_id").val(transaction_number);
            $("#collection_fee_id").val(collection_fee_id);
            $("#status").val(status);
            $("#transaction_number").html(response.transaction_number);
            $("#paid_by").html(response.paid_by);
            $("#date_paid").html(response.date_created);
            $("#remarks").html(response.remarks);
            $("#table_header").html(response.table_header);
            $(".table_body").html(response.table_body);
            $("#total_amount").val(response.total_amount);
            $("#admin_name").html(response.admin);
          }
        })
      })


      // // ARchive
      // $("#additionalPaymentTable").on('click', "#archive_btn", function () {
      //   var payment_id = $(this).attr('data-id');
      //   var transaction_number = $(this).attr('data-tnum');
      //   var collection_fee_id = $(this).attr('data-collection-id')

      //   $("#payment_id").val(payment_id);
      //   $("#transaction_number").val(transaction_number);
      //   $("collection_id").val(collection_fee_id);
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
      //         $("#arhive_additionalPayment").modal('hide');
      //       }
      //     });
      // });


    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>