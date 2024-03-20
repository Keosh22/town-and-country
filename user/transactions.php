<?php
session_start();

require_once "../includes/user_header_transactions.php";
require_once "../libs/server.php";
require_once "../user-panel/user-nav.php";



$server = new Server();
?>

<main>

  <div class="backbtn-title d-flex flex-column">

    <!-- First Column -->
    <div class="col-12 back-button">
      <a href="home.php" class="d-flex justify-content-start">
        <i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i>
      </a>
    </div>

    <!-- Second Column -->
    <div class="row d-flex mt-2 mb-5 justify-content-center">
      <div class="col col-xl-12 option-title">
        <h1>Transactions</h1>
      </div>
    </div>

  </div>



  <div class="card">
    <div class="card-header">
      <h2>Transactions List</h2>
    </div>
    <div class="my-2">
      <div class="container-fluid">
        <section class="main-content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <!-- 	HEADER TABLE -->
                <div class="header-box container-fluid d-flex align-items-center mb-2">
                  <!-- PLACE BUTTON HERE -->

                  <div class="request-transaction mb-3">
                    <?php include "../user-panel/profile_request_transaction.php" ?>
                    <button type="button" class="btn d-flex justify-content-end" data-toggle="modal" data-target="#print_transaction">
                      Request Transaction
                    </button>
                  </div>

                </div>
                <div class="col-sm-12 d-flex justify-content-center mb-2">
                  <div class="col-lg-3 col-sm-4 mx-2">
                    <select name="filter_payment" id="filter_payment" class="form-select form-select-sm text-secondary mx-2">
                      <option value="">Payment:</option>
                      <?php
                      // $C002 = "C002";
                      // $C003 = "C003";
                      // $C004 = "C004";
                      // $C005 = "C005";
                      // $C006 = "C006";
                      $isCategory = "";
                      $query2 = "SELECT category FROM collection_fee ";
                      // $data2 = ["C002" => $C002, "C003" => $C003, "C004" => $C004, "C005" => $C005, "C006" => $C006];
                      $connection2 = $server->openConn();
                      $stmt2 = $connection2->prepare($query2);
                      $stmt2->execute();
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
                    </select>
                  </div>
                  <div class="col-lg-3 col-sm-4 mx-2">
                    <input name="filter_date" id="filter_date" class="form-control form-control-sm text-secondary mx-2" readonly>
                  </div>
                </div>
                <div class="body-box shadow-sm">
                  <div class="col-lg-12">
                    <div class="table-responsive-xl mx-2">
                      <table id="transactionTable" class="table table-striped table-sm" style="width:100%;">
                        <thead>
                          <tr>
                            <th scope="col" width="5%"></th>
                            <th scope="col" width="10%">#</th>
                            <th scope="col" width="20%">Payment</th>
                            <th scope="col" width="10%">Amount</th>
                            <th scope="col" width="15%">DATE</th>
                            <th scope="col" width="15%">Paid by</th>



                          </tr>
                        </thead>
                        <tbody class="">
                          <!----------------------------- MonthlyDues & MEMberhsip Fee PAYMENT  --------------------------------->
                          <?php
                          $ACTIVE = "ACTIVE";
                          $user_id = $_SESSION["user_id"];
                          $query =  "SELECT
                payments_list.id as payment_id,
                payments_list.transaction_number as payment_transaction_number,
                payments_list.homeowners_id,
                payments_list.property_id,
                payments_list.collection_id,
                payments_list.collection_fee_id,
                payments_list.date_created as date_created,
                payments_list.paid,
                payments_list.paid_by as paid_by_pl,
                homeowners_users.id,
                homeowners_users.account_number,
                property_list.id,
                collection_list.id,
                collection_list.property_id,
                collection_list.collection_fee_id,
                collection_list.month,
                collection_list.year,
                collection_list.balance,
                collection_list.status,
                collection_fee.id,
                collection_fee.category,
                collection_fee.fee,
                collection_fee.collection_fee_number
                FROM payments_list
                INNER JOIN homeowners_users ON payments_list.homeowners_id = homeowners_users.id
                LEFT JOIN property_list ON payments_list.property_id = property_list.id
                LEFT JOIN collection_list ON payments_list.collection_id = collection_list.id
                INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id
                WHERE payments_list.homeowners_id = :user_id AND payments_list.archive = :ACTIVE
                ORDER BY date_created DESC;";


                          $data = ["user_id" => $user_id, "ACTIVE" => $ACTIVE];
                          $connection = $server->openConn();
                          $stmt = $connection->prepare($query);
                          $stmt->execute($data);

                          if ($stmt->rowCount() > 0) {

                            while ($result = $stmt->fetch()) {
                              $payment_transaction_number = $result["payment_transaction_number"];
                              $payment_id = $result['payment_id'];
                              // User information
                              $id = $result['id'];
                              $account_number = $result['account_number'];

                              // collection fee id
                              $collection_fee_id = $result["category"];
                              $date_created = date("M j, Y H:iA", strtotime($result["date_created"]));
                              $collection_fee_number = $result['collection_fee_number'];

                              $status = $result["status"];
                              $month = $result["month"];
                              $year = $result["year"];
                              $monthyear = "{$month} {$year}";
                              $paid = $result['paid'];
                              $paid_by_pl = $result['paid_by_pl'];
                          ?>
                              <tr>
                                <td>

                                  <?php
                                  if ($collection_fee_number == "C007") {
                                  ?>
                                    <a id="view_monthly_dues" data-tnumber='<?php echo $payment_transaction_number; ?>' data-id="<?php echo $payment_id; ?>" href="#monthly_dues_view" data-bs-toggle="modal" class="btn btn-sm ">View</a>
                                  <?php
                                  } elseif ($collection_fee_number == "C001") {
                                  ?>
                                    <a id="view_membership_fee" data-tnumber='<?php echo $payment_transaction_number; ?>' data-id="<?php echo $payment_id; ?>" href="#membership_fee_view" data-bs-toggle="modal" class="btn btn-sm">View</a>
                                  <?php
                                  }
                                  ?>


                                </td>
                                <td><?= $payment_transaction_number ?></td>
                                <td><?= $collection_fee_id;
                                    if (isset($monthyear)) {
                                      echo " " . $monthyear;
                                    }
                                    ?></td>
                                <td><span class="badge rounded-pill text-bg-success"><?= $paid ?></span></td>
                                <td><?= $date_created ?></td>
                                <td><?= $paid_by_pl ?></td>
                              </tr>
                          <?php
                            }
                          }
                          ?>




                          <!----------------------------- CONSTRUCTION PAYMENT  --------------------------------->
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
                              construction_payment.paid_by as paid_by_cp,
                              construction_payment.transaction_number as construction_tn_number,
                              construction_payment.refund
                              FROM construction_payment 
                              INNER JOIN property_list ON construction_payment.property_id = property_list.id
                              INNER JOIN collection_fee ON construction_payment.collection_fee_id = collection_fee.id 
                              WHERE construction_payment.archive = :ACTIVE AND property_list.homeowners_id = :user_id
                              ";
                          $data1 = ["ACTIVE" => $ACTIVE, "user_id" => $user_id];
                          $connection1 = $server->openConn();
                          $stmt1 = $connection1->prepare($query1);
                          $stmt1->execute($data1);
                          if ($stmt1->rowCount() > 0) {
                            while ($result1 = $stmt1->fetch()) {
                              $payment_date = date("M j, Y H:iA", strtotime($result1['payment_date']));
                              $property_id = $result1['property_id'];
                              $blk = $result1['property_blk'];
                              $lot = $result1['property_lot'];
                              $phase =  $result1['property_street'];
                              $street = $result1['property_phase'];



                              $address = "BLK-" . $blk . " LOT-" . $lot . " " . $street . " " . $phase;
                              $paid_by_cp = $result1['paid_by_cp'];
                              if ($result1['description']) {
                                $payment = $result1['category'] . "-" . $result1['description'];
                              } else {
                                $payment = $result1['category'];
                              }
                              $amount = $result1['amount'];
                              $transaction_number_cp = $result1['construction_tn_number'];
                              $construction_payment_id = $result1['construction_payment_id'];
                              $collection_fee_number_cons = $result1['collection_fee_number'];
                              $refund = $result1['refund'];
                          ?>
                              <tr>
                                <td>
                                  <?php
                                  if ($collection_fee_number_cons == "C004" || $collection_fee_number_cons == "C005" || $collection_fee_number_cons == "C006") {
                                  ?>
                                    <a id="view_payment_md" data-property="<?php echo $property_id; ?>" data-tnumber='<?php echo $transaction_number_cp; ?>' data-id="<?php echo $construction_payment_id; ?>" data-collection-fee="<?php echo $collection_fee_number_cons; ?>" href="#construction_view" data-bs-toggle="modal" class="btn btn-sm">View</a>
                                  <?php
                                  } elseif ($collection_fee_number_cons == "C003") {
                                  ?>
                                    <a id="view_payment_cc" data-property="<?php echo $property_id; ?>" data-tnumber='<?php echo $transaction_number_cp; ?>' data-id="<?php echo $construction_payment_id; ?>" data-collection-fee="<?php echo $collection_fee_number_cons; ?>" href="#construction_view" data-bs-toggle="modal" class="btn btn-sm">View</a>
                                  <?php
                                  } elseif ($collection_fee_number_cons == "C002") {
                                  ?>
                                    <a id="view_payment_cb" data-property="<?php echo $property_id; ?>" data-tnumber='<?php echo $transaction_number_cp; ?>' data-id="<?php echo $construction_payment_id; ?>" data-collection-fee="<?php echo $collection_fee_number_cons; ?>" href="#construction_view" data-bs-toggle="modal" class="btn btn-sm">View</a>
                                  <?php
                                  }


                                  ?>


                                </td>
                                <td><?= $transaction_number_cp ?></td>
                                <td><?= $payment ?></td>
                                <td><span class="badge rounded-pill text-bg-success"><?= $amount ?></span></td>
                                <td><?= $payment_date ?></td>
                                <td><?= $paid_by_cp ?></td>
                              </tr>
                          <?php
                            }
                          }
                          ?>


                        </tbody>
                        <!-- <tfoot>
                        <tr>
                          <th scope="col" width="20%">TRANSACTION NUMBER</th>
                          <th scope="col" width="10%">USER ID</th>
                          <th scope="col" width="20%">CATEGORY</th>
                          <th scope="col" width="20%">MONTH AND YEAR</th>
                          <th scope="col" width="10">STATUS</th>
                          <th scope="col" width="20%">DATE</th>
                        </tr>
                      </tfoot> -->
                      </table>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>


</main>
</body>

<?php
// Monthly Dues View
include("../user/monthly_dues_view.php");
// Membership fee view
include("../user/membership_fee_view.php");
// construction_view
include("../user/construction_view.php");
?>
<script>
  $(document).ready(function() {
    $(".table-header").css("background-color", "pink");

    $(".btn-primary").on("click", function() {
      $("#request_transaction").modal("show");
      $(".message_result").empty();
    })

    // DataTable
    $("#transactionTable").DataTable({
      order: [
        [4, 'desc']
      ]
    });
    const TABLE = $("#transactionTable").DataTable();

    $("#filter_payment").on('change', function() {
      TABLE.columns(1).search(this.value).draw();
    })



    // View payment MONTHLY DUES
    $("#transactionTable").on('click', '#view_monthly_dues', function() {
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



    // View payment MEMBERSHIP FEE
    $("#transactionTable").on('click', '#view_membership_fee', function() {
      var payment_id = $(this).attr('data-id');
      var transaction_number = $(this).attr('data-tnumber');
      var archive_status = "ACTIVE";

      $("#payment_id_modal_mf").val(payment_id);
      $("#transactionNum_id_mf").val(transaction_number);
      getPayment(payment_id);

      function getPayment(payment_id) {
        $.ajax({
          url: '../ajax/membership_fee_receipt_get.php',
          type: 'POST',
          data: {
            payment_id: payment_id,
            transaction_number: transaction_number,
            archive_status: archive_status
          },
          dataType: 'JSON',
          success: function(response) {
            $("#account_number_mf").html(response.account_number);
            $("#name_mf").html(response.name);
            $("#current_address_mf").html(response.address);
            $("#transaction_number_mf").html(response.transaction_number);
            $("#date_paid_mf").html(response.date_paid);
            $(".table_result_mf").html(response.table_result);
            $("#total_amount_mf").val(response.total_amount);
            $("#remarks_mf").html(response.remarks);
            $("#admin_name_mf").html(response.admin_name);
          }
        });
      }
    });


    // Material Delivery View Payment
    $("#transactionTable").on('click', '#view_payment_md', function() {
      var property_id = $(this).attr('data-property');
      var construction_payment_id = $(this).attr('data-id');
      var collection_fee_number = $(this).attr('data-collection-fee');
      $("#collection_fee_number_cc").val(collection_fee_number);

      $.ajax({
        url: '../ajax/material_delivery_receipt_view.php',
        type: 'POST',
        data: {
          property_id: property_id,
          construction_payment_id: construction_payment_id
        },
        dataType: 'JSON',
        success: function(response) {
          $("#name_cc").html(response.name);
          $("#account_number_cc").html(response.account_number);
          $("#transaction_number_cc").html(response.transaction_number);
          $("#date_paid_cc").html(response.date_created);
          $("#paid_by_cc").html(response.paid_by);
          $(".table_result_cc").html(response.table);
          $("#table_header_cc").html(response.table_header);
          $("#total_amount_cc").val(response.total_amount);
          $("#property_id_receipt_cc").val(response.property_id);
          $("#transaction_number_cc").val(response.transaction_number);
          $("#admin_name_cc").html(response.admin_name);

        }
      })
    });


    // Construction Bond View Payment
    $("#transactionTable").on('click', '#view_payment_cc', function() {
      var property_id = $(this).attr('data-property');
      var construction_payment_id = $(this).attr('data-id');
      var collection_fee_number = $(this).attr('data-collection-fee');
      $("#collection_fee_number_cc").val(collection_fee_number);
      $.ajax({
        url: '../ajax/construction_bond_receipt_view.php',
        type: 'POST',
        data: {
          property_id: property_id,
          construction_payment_id: construction_payment_id
        },
        dataType: 'JSON',
        success: function(response) {
          $("#name_cc").html(response.name);
          $("#account_number_cc").html(response.account_number);
          $("#transaction_number_cc").html(response.transaction_number);
          $("#date_paid_cc").html(response.date_created);
          $("#paid_by_cc").html(response.paid_by);
          $(".table_result_cc").html(response.table);
          $("#table_header_cc").html(response.table_header);
          $("#total_amount_cc").val(response.total_amount);
          $("#property_id_receipt_cc").val(response.property_id);
          $("#transaction_number_cc").val(response.transaction_number);
          $("#admin_name_cc").empty().append(response.admin_name);
        }
      })
    });

    // Construction Clearance View Payment
    $("#transactionTable").on('click', '#view_payment_cb', function() {
      var property_id = $(this).attr('data-property');
      var construction_payment_id = $(this).attr('data-id');
      var collection_fee_number = $(this).attr('data-collection-fee');
      $("#collection_fee_number_cc").val(collection_fee_number);
      $.ajax({
        url: '../ajax/construction_bond_receipt_view.php',
        type: 'POST',
        data: {
          property_id: property_id,
          construction_payment_id: construction_payment_id
        },
        dataType: 'JSON',
        success: function(response) {
          $("#name_cc").html(response.name);
          $("#account_number_cc").html(response.account_number);
          $("#transaction_number_cc").html(response.transaction_number);
          $("#date_paid_cc").html(response.date_created);
          $("#paid_by_cc").html(response.paid_by);
          $(".table_result_cc").html(response.table);
          $("#table_header_cc").html(response.table_header);
          $("#total_amount_cc").val(response.total_amount);
          $("#property_id_receipt_cc").val(response.property_id);
          $("#transaction_number_cc").val(response.transaction_number);
          $("#admin_name_cc").empty().append(response.admin_name);
        }
      })
    });





    // filter date
    $("#filter_date").daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      autpApply: true,
      locale: {
        format: 'MMM DD, YYYY'
      }
    });

    $("#filter_date").on('change', function() {
      TABLE.columns(4).search(this.value).draw()
    })






  });
</script>
<!-- jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" integrity="sha512-qZvrmS2ekKPF2mSznTQsxqPgnpkI4DNTlrdUmTzrDgektczlKNRRhy5X5AAOnx5S09ydFYWWNSfcEqDTTHgtNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- HTML Canvas -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
require "../includes/footer.php";
?>