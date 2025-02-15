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
        <a href="../payments/construction.php"><i class='bx bx-arrow-back text-secondary bx-tada-hover fs-2 fw-bold'></i></a>

          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="../admin-panel/dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Payments</a></li>
            <li class="breadcrumb-item"><a href="../payments/construction.php">Constructions</a></li>
            <li class="breadcrumb-item">Constructions Archive</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Archive List (Construction)</h2>

          </div>
          <div class="card-body">
            <div class="container-fluid">

              <section class="main-content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <!-- 	HEADER TABLE -->
                      <div class="row header-box container-fluid d-flex align-items-center">

                        <div class="col d-flex justify-content-end">
                          <div class="col-2">
                            <select name="filter_table" id="filter_table" class="form-control form-control-sm text-secondary">
                              <option value="">Filter:</option>
                              <?php
                              $C002 = "C002";
                              $C003 = "C003";
                              $C004 = "C004";
                              $C005 = "C005";
                              $C006 = "C006";
                              $isCategory = "";
                              $query2 = "SELECT category FROM collection_fee WHERE collection_fee_number IN (:C002,:C003, :C004, :C005, :C006)";
                              $data2 = ["C002" => $C002, "C003" => $C003, "C004" => $C004, "C005" => $C005, "C006" => $C006];
                              $connection2 = $server->openConn();
                              $stmt2 = $connection2->prepare($query2);
                              $stmt2->execute($data2);
                              if ($stmt2->rowCount() > 0) {
                                while ($result2 = $stmt2->fetch()) {
                                  $category = $result2['category'];
                                  if ($category == $isCategory) {
                                  } else {




                              ?>
                                    <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                              <?php
                                  }
                                  $isCategory = $category;
                                }
                              }
                              ?>

                              <!-- <option value="Construction Bond">Construction Bond</option>
                              <option value="Construction Clearance">Clearance</option> -->
                            </select>
                          </div>

                        </div>
                      </div>

                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="constructionArchiveTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="1%">Transaction #</th>
                                <th width="5%">Date Paid</th>
                                <th width="10%">Property</th>
                                <th width="10%">Paid By</th>
                                <th width="15%">Payment</th>
                                <th width="1%">Amount</th>
                                <th scope="col" width="3%">Action</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $INACTIVE = "INACTIVE";
                              $query1 = "SELECT 
                              property_list.id as property_id,
                              property_list.blk as property_blk,
                              property_list.lot as property_lot,
                              property_list.phase as property_phase,
                              property_list.street as property_street,
                              collection_fee.id as collection_id,
                              collection_fee.collection_fee_number,
                              collection_fee.category,
                              collection_fee.description,
                              construction_payment.id as construction_payment_id,
                              construction_payment.paid as amount,
                              construction_payment.date_created as payment_date,
                              construction_payment.delivery_date,
                              construction_payment.paid_by,
                              construction_payment.transaction_number as construction_tn_number,
                              construction_payment.refund
                              FROM construction_payment 
                              INNER JOIN property_list ON construction_payment.property_id = property_list.id
                              INNER JOIN collection_fee ON construction_payment.collection_fee_id = collection_fee.id 
                              WHERE construction_payment.archive = :INACTIVE
                              ";
                              $data1 = ["INACTIVE" => $INACTIVE];
                              $connection1 = $server->openConn();
                              $stmt1 = $connection1->prepare($query1);
                              $stmt1->execute($data1);
                              if ($stmt1->rowCount() > 0) {
                                while ($result1 = $stmt1->fetch()) {
                                  $payment_date = date("M j, Y", strtotime($result1['payment_date']));
                                  $property_id = $result1['property_id'];
                                  $blk = $result1['property_blk'];
                                  $lot = $result1['property_lot'];
                                  $phase =  $result1['property_street'];
                                  $street = $result1['property_phase'];

                                  $address = "BLK-" . $blk . " LOT-" . $lot . " " . $street . " " . $phase;
                                  $paid_by = $result1['paid_by'];
                                  if ($result1['description']) {
                                    $payment = $result1['category'] . "-" . $result1['description'];
                                  } else {
                                    $payment = $result1['category'];
                                  }
                                  $amount = $result1['amount'];
                                  $transaction_number = $result1['construction_tn_number'];
                                  $construction_payment_id = $result1['construction_payment_id'];
                                  $collection_fee_number = $result1['collection_fee_number'];
                                  $refund = $result1['refund'];
                              ?>
                                  <tr>
                                    <td><?php echo $transaction_number; ?></td>
                                    <td><?php echo $payment_date; ?></td>
                                    <td><?php echo $address; ?></td>
                                    <td><?php echo $paid_by; ?></td>
                                    <td><?php echo $payment; ?></td>
                                    <td><?php echo $amount
                                        ?>
                                      <span class="badge rounded-pill text-bg-success"><?php echo $refund; ?></span>
                                      <?php ?>
                                    </td>
                                    <td>
                                      <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Action</a>
                                        <ul class="dropdown-menu">
                                          <?php
                                          if ($collection_fee_number == "C004" || $collection_fee_number == "C005" || $collection_fee_number == "C006") {
                                          ?>
                                            <li><a id="view_payment_md" href="#construction_view" data-bs-toggle="modal" class="dropdown-item" data-property="<?php echo $property_id; ?>" data-id="<?php echo $construction_payment_id; ?>" data-collection-fee="<?php echo $collection_fee_number; ?>">View</a></li>
                                          <?php
                                          } elseif ($collection_fee_number == "C002") {
                                          ?>
                                            <li><a id="view_payment_cb" href="#construction_view" data-bs-toggle="modal" class="dropdown-item" data-property="<?php echo $property_id; ?>" data-id="<?php echo $construction_payment_id; ?>" data-collection-fee="<?php echo $collection_fee_number; ?>">View</a></li>

                                          <?php
                                          } elseif ($collection_fee_number == "C003") {
                                          ?>
                                            <li><a id="view_payment_cc" href="#construction_view" data-bs-toggle="modal" class="dropdown-item" data-property="<?php echo $property_id; ?>" data-id="<?php echo $construction_payment_id; ?>" data-collection-fee="<?php echo $collection_fee_number; ?>">View</a></li>
                                          <?php
                                          }
                                          ?>
                                          <!-- <li><a id="delete_payment_btn" href="#" class="dropdown-item" data-property="<?php echo $property_id; ?>" data-tnum="<?php echo $transaction_number; ?>" data-id="<?php echo $construction_payment_id; ?>" data-collection-fee="<?php echo $collection_fee_number; ?>">Delete</a></li> -->
                                          <li><a id="restore_archive_btn" href="#" class="dropdown-item" data-property="<?php echo $property_id; ?>" data-tnum="<?php echo $transaction_number; ?>" data-id="<?php echo $construction_payment_id; ?>" data-collection-fee="<?php echo $collection_fee_number; ?>">Restore</a></li>
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
                                <th width="1%">Transaction #</th>
                                <th width="5%">Date Paid</th>
                                <th width="10%">Property</th>
                                <th width="10%">Paid By</th>
                                <th width="15%">Payment</th>
                                <th width="1%">Amount</th>
                                <th scope="col" width="3%">Action</th>
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
  // Material Delivery View
  include('../payments/construction_view_modal.php');

  ?>


  <script>
    $(document).ready(function() {


      // Material Delivery View Payment
      $("#constructionArchiveTable").on('click', '#view_payment_md', function() {
        var property_id = $(this).attr('data-property');
        var construction_payment_id = $(this).attr('data-id');
        var collection_fee_number = $(this).attr('data-collection-fee');
        $("#collection_fee_number").val(collection_fee_number);

        $.ajax({
          url: '../ajax/material_delivery_receipt_view.php',
          type: 'POST',
          data: {
            property_id: property_id,
            construction_payment_id: construction_payment_id
          },
          dataType: 'JSON',
          success: function(response) {
            $("#name").html(response.name);
            $("#account_number").html(response.account_number);
            $("#transaction_number").html(response.transaction_number);
            $("#date_paid").html(response.date_created);
            $("#paid_by").html(response.paid_by);
            $(".table_result").html(response.table);
            $("#table_header").html(response.table_header);
            $("#total_amount").val(response.total_amount);
            $("#property_id_receipt").val(response.property_id);
            $("#transaction_number_md").val(response.transaction_number);
            $("#admin_name").html(response.admin_name);

          }
        })
      });


      // Construction Bond View Payment
      $("#constructionArchiveTable").on('click', '#view_payment_cb', function() {
        var property_id = $(this).attr('data-property');
        var construction_payment_id = $(this).attr('data-id');
        var collection_fee_number = $(this).attr('data-collection-fee');
        $("#collection_fee_number").val(collection_fee_number);
        $.ajax({
          url: '../ajax/construction_bond_receipt_view.php',
          type: 'POST',
          data: {
            property_id: property_id,
            construction_payment_id: construction_payment_id
          },
          dataType: 'JSON',
          success: function(response) {
            $("#name").html(response.name);
            $("#account_number").html(response.account_number);
            $("#transaction_number").html(response.transaction_number);
            $("#date_paid").html(response.date_created);
            $("#paid_by").html(response.paid_by);
            $(".table_result").html(response.table);
            $("#table_header").html(response.table_header);
            $("#total_amount").val(response.total_amount);
            $("#property_id_receipt").val(response.property_id);
            $("#transaction_number_md").val(response.transaction_number);
            $("#admin_name").empty().append(response.admin_name);
          }
        })
      });




      // Construction CLearance
      $("#construction_clearance_btn").on('click', function() {
        $.ajax({
          url: '../ajax/construction_clearance_get_fee.php',
          type: 'POST',
          dataType: 'JSON',
          success: function(response) {
            $("#amount_cc").val(response.collection_fee);
            $("#collection_fee_id_cc").val(response.collection_fee_id);
          }
        });
      });


      // Construction Clearance View
      $("#constructionArchiveTable").on('click', '#view_payment_cc', function() {
        var property_id = $(this).attr('data-property');
        var construction_payment_id = $(this).attr('data-id');
        var collection_fee_number = $(this).attr('data-collection-fee');
        $("#collection_fee_number").val(collection_fee_number);
        $.ajax({
          url: '../ajax/construction_clearance_receipt_view.php',
          type: 'POST',
          data: {
            property_id: property_id,
            construction_payment_id: construction_payment_id
          },
          dataType: 'JSON',
          success: function(response) {
            $("#name").html(response.name);
            $("#account_number").html(response.account_number);
            $("#transaction_number").html(response.transaction_number);
            $("#date_paid").html(response.date_created);
            $("#paid_by").html(response.paid_by);
            $(".table_result").html(response.table);
            $("#table_header").html(response.table_header);
            $("#total_amount").val(response.total_amount);
            $("#property_id_receipt").val(response.property_id);
            $("#transaction_number_md").val(response.transaction_number);
            $("#admin_name").empty().append(response.admin_name);
          }
        })
      });


      // Delete Payment
      $("#constructionArchiveTable").on('click', '#delete_payment_btn', function() {
        var transaction_number = $(this).attr('data-tnum');
        var construction_payment_id = $(this).attr('data-id');

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
                url: '../archive/construction_delete_archive.php',
                type: 'POST',
                data: {
                  construction_payment_id: construction_payment_id,
                  transaction_number: transaction_number
                },
                success: function(response) {

                  location.reload(true);
                }
              });
            } else {
              swal("Delete Canceled");
            }
          });
      });

      // REstore 
      $("#constructionArchiveTable").on('click', '#restore_archive_btn', function (){
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
              url: '../archive/restore_archive_construction.php',
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


      // DataTable
      $("#constructionArchiveTable").DataTable({
        order: [
          [7, 'desc'],
          [0, 'desc']
        ]
      });

      const table = $("#constructionArchiveTable").DataTable();
      $("#filter_table").on('change', function() {
        table.search(this.value).draw();
      });

      table.columns(7).visible(false);
    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>