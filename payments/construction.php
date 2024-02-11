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
            <li class="breadcrumb-item">Constructions</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Constructions Payments List</h2>
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
                          <a href="#materialDeliveryModal" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat mx-2"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Material Delivery</a>
                          <a href="#constructionBondModal" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Construction Bond</a>
                        </div>
                        <div class="col d-flex justify-content-end">
                          <a href="" class="btn btn-warning btn-sm btn-flat"><i class='bx bx-archive bx-xs bx-tada-hover'></i>Archive</a>
                        </div>
                      </div>

                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="constrcutionPaymentTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="1%">Transaction #</th>
                                <th width="5%">Date Paid</th>
                                <th width="10%">Property</th>
                                <th width="10%">Paid By</th>
                                <th width="15%">Payment</th>
                                <th width="1%">Ammount</th>
                                <th scope="col" width="3%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $ACTIVE = "ACTIVE";
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
                              construction_payment.transaction_number as construction_tn_number
                              FROM construction_payment 
                              INNER JOIN property_list ON construction_payment.property_id = property_list.id
                              INNER JOIN collection_fee ON construction_payment.collection_fee_id = collection_fee.id 
                              WHERE construction_payment.archive = :ACTIVE
                              ";
                              $data1 = ["ACTIVE" => $ACTIVE];
                              $connection1 = $server->openConn();
                              $stmt1 = $connection1->prepare($query1);
                              $stmt1->execute($data1);
                              if ($stmt1->rowCount() > 0) {
                                while ($result1 = $stmt1->fetch()) {
                                  $payment_date = date("M j, Y g:iA", strtotime($result1['payment_date']));
                                  $property_id = $result1['property_id'];
                                  $blk = $result1['property_blk'];
                                  $lot = $result1['property_lot'];
                                  $phase =  $result1['property_street'];
                                  $street = $result1['property_phase'];

                                  $address = "BLK-" . $blk . " LOT-" . $lot . " " . $street . " " . $phase;
                                  $paid_by = $result1['paid_by'];
                                  $payment = $result1['category'] . "-" . $result1['description'];
                                  $amount = $result1['amount'];
                                  $transaction_number = $result1['construction_tn_number'];
                                  $construction_payment_id = $result1['construction_payment_id'];
                                  $collection_fee_number = $result1['collection_fee_number'];
                              ?>
                                  <tr>
                                    <td><?php echo $transaction_number; ?></td>
                                    <td><?php echo $payment_date; ?></td>
                                    <td><?php echo $address; ?></td>
                                    <td><?php echo $paid_by; ?></td>
                                    <td><?php echo $payment; ?></td>
                                    <td><?php echo $amount; ?></td>
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
                                            <li><a id="view_payment_cb" href="#construction_view" data-bs-toggle="modal" class="dropdown-item" data-property="<?php echo $property_id; ?>" data-id="<?php echo $construction_payment_id; ?>" data-collection-fee="<?php echo $collection_fee_number; ?>">Refund</a></li>
                                          <?php
                                          }
                                          ?>

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
                                <th width="1%">Transaction #</th>
                                <th width="5%">Date Paid</th>
                                <th width="10%">Property</th>
                                <th width="10%">Paid By</th>
                                <th width="15%">Payment</th>
                                <th width="1%">Ammount</th>
                                <th scope="col" width="3%">Action</th>
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
  // Material Delivery Modal
  include('../payments/material_delivery_modal.php');
  // Material Delivery View
  include('../payments/construction_view_modal.php');

  // Constrution Bond Modal
  include('../payments/construction_bond_modal.php');

  ?>


  <script>
    $(document).ready(function() {


      // Material Delivery View Payment
      $("#constrcutionPaymentTable").on('click', '#view_payment_md', function() {
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
      $("#constrcutionPaymentTable").on('click', '#view_payment_cb', function() {
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



      // DataTable
      $("#constrcutionPaymentTable").DataTable({
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