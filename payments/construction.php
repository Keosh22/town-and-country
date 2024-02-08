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
                          <a href="#materialDeliveryModal" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Material Delivery</a>
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
                                <th width="5%">Date Paid</th>
                                <th width="15%">Property</th>
                                <th width="10%">Paid By</th>
                                <th width="15%">Payment</th>
                                <th width="5%">Ammount</th>
                                <th scope="col" width="5%">Action</th>
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
                              collection_fee.category,
                              collection_fee.description,
                              collection_fee.description,
                              construction_payment.paid as amount,
                              construction_payment.date_created as payment_date,
                              construction_payment.delivery_date,
                              construction_payment.paid_by
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
                                  $payment_date = date("M j, Y g:iA", strtotime("now"));
                                  $address = "BLK-" . $result1['property_blk'] . " LOT-" . $result1['property_lot'] . " " . $result1['property_street'] . " " . $result1['property_phase'];
                                  $paid_by = $result1['paid_by'];
                                  $payment = $result1['category'] . "-" . $result1['description'];
                                  $amount = $result1['amount'];
                              ?>
                                  <td><?php echo $payment_date; ?></td>
                                  <td><?php echo $address; ?></td>
                                  <td><?php echo $paid_by; ?></td>
                                  <td><?php echo $payment; ?></td>
                                  <td><?php echo $amount; ?></td>
                                  <td>
                                    <div class="dropdown">
                                      <a href="#" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Action</a>
                                      <ul class="dropdown-menu">

                                      </ul>
                                    </div>
                                  </td>
                              <?php
                                }
                              }
                              ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th width="5%">Date Paid</th>
                                <th width="15%">Property</th>
                                <th width="10%">Paid By</th>
                                <th width="15%">Payment</th>
                                <th width="5%">Ammount</th>
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
  // Material Delivery Modal
  include('../payments/material_delivery_modal.php');

  ?>


  <script>
    $(document).ready(function() {




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