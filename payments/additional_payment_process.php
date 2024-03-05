<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;
$server->adminAuthentication();
$current_year = date("Y", strtotime("now"));
$previous_year = date("Y", strtotime("-1 year"));
$ACTIVE = "ACTIVE";
$monthly_dues = "Monthly Dues";
$membership_fee = "Membership Fee";
$construction_bond = "Construction Bond";
$construction_clearance = "Construction Clearance";
$material_delivery = "Material Delivery";
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
            <li class="breadcrumb-item"><a href="#">Payments</a></li>
            <li class="breadcrumb-item"><a href="../payments/additional_payment.php">Additional Payments List</a></li>
            <li class="breadcrumb-item">Additional Payments</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Additional Payments</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">

              <section class="main-content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <!-- 	HEADER TABLE -->

                      <div class="header-box container-fluid d-flex align-items-center ">
                        <div class="col">
                          <button id="add_payment_btn" name="add_payment_btn" class="btn btn-primary btn-sm btn-flat mx-2"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Add Payment</button>

                        </div>

                      </div>

                      <div class="body-box ">
                        <div class="row gx-3">
                          <div class="col-4">
                            <div class="card shadow-sm">
                              <div class="card-header">
                                <h5>Homeowners Details</h5>
                              </div>
                              <div class="card-body">

                                <div class="row gy-2">
                                  <input type="hidden" id="property_id" name="property_id" value="<?php  ?>">
                                  <!-- <div class="col-12">
                                      <label for="owners_name" class="form-label text-success">Owner's name:</label>
                                      <input type="text" class="form-control" id="owners_name" name="owners_name" value="<?php  ?>" readonly>
                                    </div>
                                    <div class="col-12">
                                      <label for="address" class="form-label text-success">Property:</label>
                                      <input type="text" class="form-control" id="address" name="address" value="<?php  ?>" readonly>
                                    </div> -->
                                  <div class="col-4">
                                    <label for="total_amount" class="form-label text-success">Total:</label>
                                    <input type="text" class="form-control" id="total_amount" name="total_amount" value="" readonly>
                                  </div>
                                  <div class="col-8">
                                    <label for="paid_by" class="form-label text-success">Paid by:</label>
                                    <input type="text" class="form-control" id="paid_by" name="paid_by" maxlength="25" required>
                                  </div>

                                  <div class="col-12">
                                    <label for="remarks" class="form-label text-success">Remarks:</label>
                                    <textarea name="remarks" id="remarks" wrap="hard" rows="5" class="form-control" maxlength="25"></textarea>

                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>



                          <!------------------------- COLLECTION DATE ---------------------------->
                          <div class="col-8">
                            <div class="card shadow-sm overflow-y-auto" style="height: 512px;">
                              <div class="card-header">
                                <h5>Collections List</h5>
                              </div>
                              <div class="card-body mx-2">
                                <div id="collection_list_container" class="row gy-2">
                                  <div class="row d-flex align-items-center">
                                    <div class="col-4">
                                      <div class="form-floating">
                                        <select name="payment" id="payment" class="form-select form-select-sm">
                                          <option class="default-select" data-fee="0" value=""></option>
                                          <?php

                                          $query1 = "SELECT id,category,fee FROM collection_fee WHERE NOT category IN (
                                                  :monthly_dues, 
                                                  :memberhsip_fee,
                                                  :construction_bond,
                                                  :construction_clearance,
                                                  :material_delivery
                                                  ) AND status = :ACTIVE";
                                          $data1 = [
                                            "monthly_dues" => $monthly_dues,
                                            "memberhsip_fee" => $membership_fee,
                                            "construction_bond" => $construction_bond,
                                            "construction_clearance" => $construction_clearance,
                                            "material_delivery" => $material_delivery,
                                            "ACTIVE" => $ACTIVE
                                          ];
                                          $connection1 = $server->openConn();
                                          $stmt1 = $connection1->prepare($query1);
                                          $stmt1->execute($data1);
                                          if ($stmt1->rowCount() > 0) {
                                            while ($result1 = $stmt1->fetch()) {
                                              $payment_category = $result1['category'];
                                              $payment_id = $result1['id'];
                                              $payment_fee = $result1['fee'];
                                          ?>
                                              <option data-fee="<?php echo $payment_fee ?>" data-id="<?php echo $payment_id ?>" value="<?php echo $payment_category ?>"><?php echo $payment_category ?></option>
                                          <?php
                                            }
                                          }

                                          ?>
                                        </select>
                                        <label for="payment">Payment:</label>
                                      </div>
                                    </div>
                                    <div class="col-2">
                                      <div class="form-floating">
                                        <input type="number" id="quantity" class="form-control">
                                        <label for="quantity">Quantity:</label>
                                      </div>
                                    </div>
                                    <div class="col-2">
                                      <a href="#" type="button" class="text-info" id="add"><i class='bx bxs-plus-circle bx-tada-hover fs-2'></i></a>
                                    </div>

                                  </div>

                                  <div class="row my-3 mx-2">
                                    <table id="additionalPaymentTable" class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th width="1%">Quantity</th>
                                          <th width="10%">Payment</th>
                                          <th width="10%">Amount</th>
                                          <th width="1%"></th>
                                        </tr>
                                      </thead>
                                      <tbody id="table-body">


                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>

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

  ?>


  <script>
    $(document).ready(function() {
      var total_amount = 0;
      var payment_arr = {
        "payment": []
      };
      var id = 0;

      $("#add").on('click', function() {
        var quantity = $("#quantity").val();
        var payment = $("#payment").val();

        // Add the payment in array
        if (quantity > 0 && payment.length > 0) {
          var payment_fee = $("#payment option:selected").data('fee');
          var payment_id = $("#payment option:selected").data('id');
          var amount = payment_fee * parseInt(quantity);
          total_amount += amount;
          var payment = $("#payment").val();
          new_payment = {
            "id": id,
            "quantity": quantity,
            "payment": payment_id,
            "amount": amount
          }
          payment_arr.payment.push(new_payment);
          console.log(payment_arr.payment.length)


          $("#table-body").append('<tr class="table-row"><td>' + quantity + '</td><td>' + payment + '</td><td>' + amount + '</td><td><a data-id="' + id + '" class="btn btn-sm btn-danger remove_btn">remove</a></td></tr>')
          $("#total_amount").val(total_amount);
          $(".default-select").prop('selected', true);
          $("#quantity").val("");
          id += 1;
        }
      })



      $("#additionalPaymentTable").on('click', '.remove_btn', function() {

        var id = $(this).attr('data-id')
        var i = payment_arr.payment.length - 1;
        // Remove Payment in the table and array
        while (i >= 0) {
          var payment = payment_arr.payment[i];
          if (payment.id == id) {
            total_amount -= payment.amount;
            $("#total_amount").val(total_amount);
            payment_arr.payment.splice(i, 1)
            console.log(payment_arr)
            $(this).closest('.table-row').remove();
          }
          i--;
        }
      })


      // ADd payment button
      $("#add_payment_btn").on('click', function() {
        var amount = $("#total_amount").val();
        var paid_by = $("#paid_by").val();
        var remarks = $("#remarks").val();

        swal({
            title: 'Refund Confirmation',
            text: 'Are you sure you want to refund this payment?',
            icon: 'warning',
            buttons: true,
            dangerMode: true
          })
          .then((proceed) => {
            if (proceed) {
              if (payment_arr.payment.length > 0 && amount > 0 && paid_by.length > 0) {
                $.ajax({
                  url: '../payments/additional_payment_add.php',
                  type: 'POST',
                  dataType: 'JSON',
                  data: {
                    amount: amount,
                    paid_by: paid_by,
                    remarks: remarks,
                    payment_arr: payment_arr
                  },
                  success: function(response) {
                
                    var transactionNumber = response.transaction_number;
                    var collectionFeeId = response.collection_fee_id;
                    var receipt = window.open('../payments/additional_payment_receipt.php?transactionNumber='+ transactionNumber +'&paymentId='+ collectionFeeId,'_blank', 'width=900, height=600');
                    setTimeout(function(){
                      receipt.print();
                      setTimeout(function(){
                        receipt.close;
                        location.reload();
                      }, 500)
                    }, 500)
                  }
                });
              }
            } else {
              swal("Canceled");
            }
          })
      })

    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>