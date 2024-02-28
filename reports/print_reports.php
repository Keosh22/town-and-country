<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
?>

<?php
session_start();
$server = new Server;
$server->adminAuthentication();
$ACTIVE = "ACTIVE";
$INACTIVE = "INACTIVE";
?>

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
        <!-- content header -->
        <section class="content-header d-flex justify-content-between align-items-center mb-3">
          <a href="../admin-panel/dashboard.php"><i class='bx bx-arrow-back text-secondary bx-tada-hover fs-2 fw-bold'></i></a>

          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="../admin-panel/dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Settings</a></li>
            <li class="breadcrumb-item">Print Reports</li>
          </ol>
        </section>

        <div class="card">
          <div class="card-header">
            <h2>Print Reports</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">
              <form method="POST">
                <div class="row gy-2">
                  <div class="col-3">
                    <div class="form-floating">
                      <select name="payment" id="payment" class="form-control form-control-sm" required readonly>
                        <option value=""></option>
                        <?php
                        $checkCategory = "";
                        $query1 = "SELECT id, collection_fee_number, category FROM collection_fee WHERE status = :ACTIVE";
                        $data1 = ["ACTIVE" => $ACTIVE];
                        $connection1 = $server->openConn();
                        $stmt1 = $connection1->prepare($query1);
                        $stmt1->execute($data1);
                        if ($stmt1->rowCount() > 0) {
                          while ($result1 = $stmt1->fetch()) {
                            $payment_category = $result1['category'];
                            if ($checkCategory == $payment_category) {
                            } else {
                              $payment_id = $result1['id'];
                              $payment_number = $result1['collection_fee_number'];
                        ?>
                              <option class="payment_number" value="<?php echo $payment_id; ?>" data-number="<?php echo $payment_number; ?>"><?php echo $payment_category; ?></option>
                        <?php
                            }
                            $checkCategory = $payment_category;
                          }
                        }
                        ?>
                      </select>
                      <label for="payment">Payment:</label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-floating">
                      <select name="month" id="month" class="form-select form-select-sm">
                        <option value=""></option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                      <label for="month">Month:</label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-floating">
                      <input type="number" id="year" name="year" class="form-control form-control-sm" required readonly>
                      <label for="year">Year:</label>
                    </div>
                  </div>
                  <div class="col-3"></div>
                  <div class="col-12 d-flex mt-2">
                    <div class="col-6">
                      <button id="filter" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-filter-alt bx-xs bx-tada-hover'></i>Filter</button>
                      <button id="refresh" class="btn btn-sm btn-secondary"><i class="bx bx-xs bx-refresh bx-tada-hover"></i>Refresh</button>
                    </div>
                    <div class="col-6">
                      <button id="download" class="btn btn-success btn-sm btn-flat"><i class='bx bxs-download bx-xs bx-tada-hover'></i>Download</button>
                      <button id="print" class="btn btn-sm btn-warning"><i class="bx bx-xs bx-printer bx-tada-hover"></i>Print</button>
                    </div>
                  </div>
                </div>
              </form>

              <section class="main-content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <!-- 	HEADER TABLE -->
                      <div class="header-box container-fluid d-flex align-items-center">

                      </div>

                      <div class="body-box shadow-sm">
                        <!-- START -->
                        <div class="receipt-wrapper py-2" id="payment_report">
                          <h2 class="text-center title-receipt"><b>Payment Report</b></h2>
                          <h5 class="text-center title-receipt m-0">Town And Country Heights Homeowners' ASSN. INC.</h5>
                          <p class="text-center title-receipt text-secondary mb-1">Clubhouse 1 La Salle Avenue, Town & Country Heights San Luis, Antipolo City</p>
                          <div class="divider-receipt"></div>
                          <div class="flex">
                            <div class="w-50">
                              <h5 class="details-title text-secondary">Payment Report Details:</h5>
                              <p class="m-0">Payment: <b id="payment_rp"></b></p>
                              <p class="m-0">Report Date: <b id="report_date_rp"></b></p>
                              <p class="m-0">Date Created: <b id="date_created_rp"></b></p>
                            </div>
                            <div class="w-50">
                              <br>
                              <p class="m-0">Printed By: <b id="created_by"></b></p>
                            </div>
                          </div>
                          <div class="divider-receipt"></div>
                          <h5 class="text-secondary">Report Summary:</h5>
                          <table class="table" id="print_reports_table">
                            <thead id="print_reports_thead">

                            </thead>
                            <tbody id="print_reports_tbody">

                            </tbody>
                          </table>

                          <!-- <div class="flex">
                            <div class="w-50">
                              <div class="row align-items-center">
                                <div class="col-12 d-flex">
                                  <span class="border-bottom"><b id="admin_name"></b></span>
                                </div>
                                <div class="col-12 d-flex">
                                  <span class="text-secondary">Process by</span>
                                </div>
                              </div>
                            </div>
                            <div class="w-50">
                              <div class="row align-items-center">
                                <div class="col-auto">
                                  <label for="total_amount" class="form-label">Total Amount:</label>
                                </div>
                                <div class="col-4">
                                  <input type="text" class="form-control" id="total_amount">
                                </div>
                              </div>
                            </div>
                          </div> -->
                        </div>
                        <!-- END -->
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </main>





      <!-- wrapper end here -->
    </div>
  </div>
  <?php

  ?>


  <script>
    $(document).ready(function() {

      var payment_number = ""
      $(".payment_number").on('click', function(){
        payment_number = $(this).attr('data-number')
        console.log("payment_number")
      })

      $("#download, #print").prop('disabled', true);
      // Year Picker
      $("#year").yearpicker({

      });

      // Refresh
      $("#refresh").on('click', function() {
        location.reload();
      })


      $("#filter").on('click', function(e) {
        e.preventDefault()
        var payment = $("#payment").val();
        var month = $("#month").val();
        var year = $("#year").val();
        console.log(payment)
        $.ajax({
          url: '../reports/generate_report.php',
          type: 'POST',
          data: {
            payment: payment,
            month: month,
            year: year,
          },
          dataType: 'JSON',
          success: function(response) {
            $("#print_reports_thead").html(response.table_head)
            $("#print_reports_tbody").html(response.table_body)
            $("#payment_rp").html(response.payment)
            $("#report_date_rp").html(response.report_date)
            $("#date_created_rp").html(response.date_created)
            $("#created_by").html(response.admin)
            $("#download, #print").prop('disabled', false);
            
          }
        });
      })





    });
  </script>
  <script src="../scripts/yearpicker.js"></script>

  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>