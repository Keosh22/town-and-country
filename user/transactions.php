<?php
session_start();

require_once "../libs/server.php";
require_once "../user-panel/user-nav.php";
require_once "../includes/user_header_transactions.php";


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
    <div class="card-body">
      <div class="container-fluid">

        <section class="main-content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <!-- 	HEADER TABLE -->
                <div class="header-box container-fluid d-flex align-items-center">
                  <!-- PLACE BUTTON HERE -->
                  <div class="col d-flex justify-content-start">
                    <div class="request-transaction mb-3">
                      <?php include "../user-panel/profile_request_transaction.php" ?>
                      <button type="button" class="btn d-flex justify-content-end" data-toggle="modal" data-target="#request_transaction">
                        Request Transaction
                      </button>
                    </div>
                  </div>
                  <div class="col d-flex justify-content-end">
                    <div class="col-3">
                      <select name="filter_payment" id="filter_payment" class="form-select form-select-sm text-secondary">
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
                  </div>

                </div>

                <div class="body-box shadow-sm">

                  <div class="table-responsive mx-2">
                    <table id="transactionTable" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th scope="col" width="5%">TRANSACTION NUMBER</th>
                          <th scope="col" width="15%">DATE</th>
                          <th scope="col" width="30%">Payment</th>
                          <th scope="col" width="10%">Amount</th>
                          <th scope="col" width="15%">Paid by</th>
                          <th scope="col" width="5%">Action</th>


                        </tr>
                      </thead>
                      <tbody class="">
                        <!----------------------------- MonthlyDues & MEMberhsip Fee PAYMENT  --------------------------------->
                        <?php

                        $id = $_SESSION["user_id"];
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
                collection_fee.fee
                FROM payments_list
                INNER JOIN homeowners_users ON payments_list.homeowners_id = homeowners_users.id
                LEFT JOIN property_list ON payments_list.property_id = property_list.id
                LEFT JOIN collection_list ON payments_list.collection_id = collection_list.id
                INNER JOIN collection_fee ON payments_list.collection_fee_id = collection_fee.id
                WHERE payments_list.homeowners_id = :user_id
                ORDER BY date_created DESC;";


                        $data = ["user_id" => $id];
                        $connection = $server->openConn();
                        $stmt = $connection->prepare($query);
                        $stmt->execute($data);

                        if ($stmt->rowCount() > 0) {

                          while ($result = $stmt->fetch()) {
                            $transaction_number = $result["payment_transaction_number"];
                            $payment_id = $result['payment_id'];
                            // User information
                            $id = $result['id'];
                            $account_number = $result['account_number'];

                            // collection fee id
                            $collection_fee_id = $result["category"];
                            $date_created = date("M j, Y H:iA", strtotime($result["date_created"]));

                            $status = $result["status"];
                            $month = $result["month"];
                            $year = $result["year"];
                            $monthyear = "{$month} {$year}";
                            $paid = $result['paid'];
                            $paid_by_pl = $result['paid_by_pl'];
                        ?>
                            <tr>
                              <td><?= $transaction_number ?></td>
                              <td><?= $date_created ?></td>
                              <td><?= $collection_fee_id;
                                  if (isset($monthyear)) {
                                    echo " " . $monthyear;
                                  }
                                  ?></td>
                              <td><?= $paid ?></td>
                              <td><?= $paid_by_pl ?></td>
                              <td>
                                <div class="dropdown">
                                  <a href="#" class="dropdown-toggle btn" data-bs-toggle="dropdown">Action</a>
                                  <ul class="dropdown-menu">
                                    <li><a id="view_payment" data-tnumber='<?php echo $transaction_number; ?>' data-id="<?php echo $payment_id; ?>" href="#monthly_dues_view" data-bs-toggle="modal" class="dropdown-item">View</a></li>
                                  </ul>
                                </div>
                              </td>
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
                              WHERE construction_payment.archive = :ACTIVE
                              ";
                        $data1 = ["ACTIVE" => $ACTIVE];
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
                            $collection_fee_number = $result1['collection_fee_number'];
                            $refund = $result1['refund'];
                        ?>
                            <tr>
                              <td><?= $transaction_number_cp ?></td>
                              <td><?= $payment_date ?></td>
                              <td><?= $payment ?></td>
                              <td><?= $amount ?></td>
                              <td><?= $paid_by_cp ?></td>
                              <td>
                                <div class="dropdown">
                                  <a href="#" class="dropdown-toggle btn" data-bs-toggle="dropdown">Action</a>
                                  <ul class="dropdown-menu">
                                    <li><a href="#" class="dropdown-item">Print</a></li>
                                  </ul>
                                </div>
                              </td>
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
        </section>
      </div>
    </div>
  </div>


</main>
</body>

<?php
include("../user/monthly_dues_view.php");
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
        [1, 'desc']
      ]
    });
    const TABLE = $("#transactionTable").DataTable();

    $("#filter_payment").on('change', function() {
      TABLE.columns(2).search(this.value).draw();
    })



    // View payment
    $("#transactionTable").on('click', '#view_payment', function() {
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



  });
</script>

<?php
require "../includes/footer.php";
?>