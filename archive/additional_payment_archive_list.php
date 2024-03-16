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
          <a href="../payments/additional_payment.php"><i class='bx bx-arrow-back text-secondary bx-tada-hover fs-2 fw-bold'></i></a>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="../admin-panel/dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../admin-panel/dashboard.php">Payments</a></li>
            <li class="breadcrumb-item"><a href="../payments/additional_payment.php">Additional Payments</a></li>
            <li class="breadcrumb-item">Archive</li>
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
                          <a href="" class="btn btn-warning btn-sm btn-flat"><i class='bx bx-archive bx-xs bx-tada-hover'></i>Archive</a>
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
                                <th width="5%">Paid Ammount</th>
                                <th scope="col" width="5%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $INACTIVE = "INACTIVE";
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
                                    WHERE NOT collection_fee.category IN (:monthly_dues, :membership_fee, :construction_bond,:construction_clearance, :material_delivery) AND payments_list.archive = :INACTIVE
                                    ";
                              $data = [
                                "monthly_dues" => $month_dues,
                                "membership_fee" => $membership_fee,
                                "construction_bond" => $construction_bond,
                                "construction_clearance" => $construction_clearance,
                                "material_delivery" => $material_delivery,
                                "INACTIVE" => $INACTIVE
                              ];
                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute($data);
                              if ($stmt->rowCount() > 0) {
                                while ($result = $stmt->fetch()) {
                                  $transaction_number = $result['transaction_number'];
                                  $date_created = date("M j, Y g:iA", strtotime($result['date_created']));
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

                                          <li><a class="dropdown-item" id="view_btn" href="#additional_payment_view" data-bs-toggle="modal" data-id="<?php echo $payment_id; ?>" 
                                          data-tnum="<?php echo $transaction_number; ?>" 
                                          data-collection-id="<?php echo $collection_fee_id; ?>">View</a></li>
                                          
                                          <li><a class="dropdown-item" id="restore_archive_btn" href="#" data-id="<?php echo $payment_id; ?>" 
                                          data-tnum="<?php echo $transaction_number; ?>" 
                                          data-collection-id="<?php echo $collection_fee_id; ?>">Restore</a></li>
                                          
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
                                <th width="15%">Payment</th>
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
  // Additional Payment View
  include("../payments/additional_payment_view_modal.php");

  ?>


  <script>
    $(document).ready(function() {
      // DataTable
      $("#additionalPaymentTable").DataTable({
        order: [
          [1, 'desc']
        ]
      });

      $("#additionalPaymentTable").on('click', '#view_btn', function() {
        var payment_id = $(this).attr('data-id');
        var transaction_number = $(this).attr('data-tnum');
        var collection_fee_id = $(this).attr('data-collection-id')
        var status = "INACTIVE";
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
        });
      });

      
      $("#additionalPaymentTable").on('click', '#restore_archive_btn', function (){
        var payment_id = $(this).attr('data-id');
        var transaction_number = $(this).attr('data-tnum');
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