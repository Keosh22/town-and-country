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

if (isset($_GET['property_id'])) {
  $property_id = $_GET['property_id'];
  $query = "SELECT 
  property_list.*,
  property_list.blk as property_blk,
  property_list.lot as property_lot,
  property_list.street as property_street,
  property_list.phase as property_phase,
  property_list.homeowners_id as owners_id,
  homeowners_users.*
  FROM property_list INNER JOIN homeowners_users ON property_list.homeowners_id = homeowners_users.id WHERE property_list.id = :property_id";
  $data = ["property_id" => $property_id];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $count = $stmt->rowCount();

  if ($count > 0) {
    while ($result = $stmt->fetch()) {
      $firstname = $result['firstname'];
      $middle_initial = $result['middle_initial'];
      $lastname = $result['lastname'];

      $blk = $result['property_blk'];
      $lot = $result['property_lot'];
      $phase = $result['property_phase'];
      $street = $result['property_street'];

      $homeowners_id = $result['owners_id'];
    }
  } else {
    $_SESSION['status'] = "No Record Found!";
    $_SESSION['text'] = "";
    $_SESSION['status_code'] = "error";
  }
}
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
        <a href="../admin-panel/property_list.php"><i class='bx bx-arrow-back text-secondary bx-tada-hover fs-2 fw-bold'></i></a>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="../admin-panel/dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Property</a></li>
            <li class="breadcrumb-item"><a href="../admin-panel/property_list.php">Property List</a></li>
            <li class="breadcrumb-item">Manage Payment</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Manage Payment (Monthly Dues)</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">

              <section class="main-content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <!-- 	HEADER TABLE -->
                      <form method="POST">
                        <div class="header-box container-fluid d-flex align-items-center ">
                          <div class="col">
                            <a id="add_payment_btn" name="add_payment_btn" class="btn btn-primary btn-sm btn-flat mx-2"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Add Payment</a>
                            <a data-property="<?php echo $property_id; ?>" href=" #create_collection" data-bs-toggle="modal" id="add_collection" name="add_collection" class="btn btn-info btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Add Collection</a>
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
                                    <input type="hidden" id="property_id" name="property_id" value="<?php echo $property_id; ?>">
                                    <div class="col-12">
                                      <label for="owners_name" class="form-label text-success">Owner's name:</label>
                                      <input type="text" class="form-control" id="owners_name" name="owners_name" value="<?php echo $firstname . " " . $middle_initial . " " . $lastname;  ?>" readonly>
                                    </div>
                                    <div class="col-12">
                                      <label for="address" class="form-label text-success">Property:</label>
                                      <input type="text" class="form-control" id="address" name="address" value="<?php echo "BLK-" . $blk . " LOT-" . $lot . " " . $street . " " . $phase; ?>" readonly>
                                    </div>
                                    <div class="col-4">
                                      <label for="fee" class="form-label text-success">Fee:</label>
                                      <input type="text" class="form-control" id="fee" name="fee" value="" readonly>
                                    </div>
                                    <div class="col-8">
                                      <label for="paid_by" class="form-label text-success">Paid by:</label>
                                      <input type="text" class="form-control" id="paid_by" name="paid_by" maxlength="20">
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
                                <div class="card-body">
                                  <div id="collection_list_container" class="row gy-2">


                                    <?php

                                    $property_id = $_GET['property_id'];
                                    $due = "DUE";
                                    $available = 'AVAILABLE';

                                    // // Retrieve
                                    // $query3 = "SELECT * FROM collection_list WHERE status = :DUE OR status = :AVAILABLE";
                                    // $data3 = ["DUE" => $due, "AVAILABLE" => $available];
                                    // $connection3 = $server->openConn();
                                    // $stmt3 = $connection3->prepare($query3);
                                    // $stmt3->execute($data3);
                                    // if ($stmt3->rowCount() > 0) {




                                    $query2 = "SELECT 
                                  collection_list.*, 
                                  collection_fee.*,
                                  collection_list.balance as collection_balance,
                                  collection_list.status as status_cl,
                                  collection_fee.status as status_cf,
                                  collection_list.id as collection_list_id,
                                  collection_fee.id as collection_fee_id
                                  FROM collection_list INNER JOIN collection_fee ON collection_list.collection_fee_id = collection_fee.id WHERE property_id = :property_id";
                                    $data2 = ["property_id" => $property_id];
                                    $connection2 = $server->openConn();
                                    $stmt2 = $connection2->prepare($query2);
                                    $stmt2->execute($data2);
                                    $array_month = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October",  "November", "December");
                                    if ($stmt->rowCount() > 0) {
                                      while ($result2 = $stmt2->fetch()) {
                                        $colleciton_id = $result2['collection_list_id'];
                                        $status = $result2['status_cl'];
                                        $month = $result2['month'];
                                        $year = $result2['year'];
                                        $fee = $result2['fee'];
                                        $collection_fee_id = $result2['collection_fee_id'];
                                        $collection_balance = $result2['collection_balance'];


                                        if ($month == "January") {
                                          $month_abr = "JAN";
                                        } elseif ($month == "February") {
                                          $month_abr = "FEB";
                                        } elseif ($month == "March") {
                                          $month_abr = "MAR";
                                        } elseif ($month == "April") {
                                          $month_abr = "APR";
                                        } elseif ($month == "May") {
                                          $month_abr = "MAY";
                                        } elseif ($month == "June") {
                                          $month_abr = "JUN";
                                        } elseif ($month == "July") {
                                          $month_abr = "JUL";
                                        } elseif ($month == "August") {
                                          $month_abr = "AUG";
                                        } elseif ($month == "September") {
                                          $month_abr = "SEP";
                                        } elseif ($month == "October") {
                                          $month_abr = "OCT";
                                        } elseif ($month == "November") {
                                          $month_abr = "NOV";
                                        } elseif ($month == "December") {
                                          $month_abr = "DEC";
                                        } else {
                                          $month_abr == "N/A";
                                        }

                                        $checkbox_status = "";
                                        if ($status == "DUE") {
                                          $color = "danger";
                                          $status_abr = "DUE";
                                        } elseif ($status == "AVAILABLE") {
                                          $color = "secondary";
                                          $status_abr = "AVAIL";
                                        } elseif ($status == "PAID") {
                                          $color = "success";
                                          $status_abr = "PAID";
                                          $checkbox_status = "disabled";
                                        } else {
                                          $color = "secondary";
                                        }


                                        if ($status == "PAID") {
                                        } else {

                                          if ($previous_year != $year) {
                                    ?>
                                            <div class="col-12">
                                              <h5>Year: <b><?php echo $year; ?></b></h5>
                                            </div>
                                          <?php
                                            $previous_year = $year;
                                          }

                                          ?>

                                          <div class="col-2">
                                            <div class="card text-bg-<?php echo $color; ?> text-center">
                                              <input type="checkbox" class="checkbox form-check-input mx-1 mt-1" <?php echo $checkbox_status; ?> value="<?php echo $colleciton_id; ?>" data-fee-id="<?php echo $collection_fee_id; ?>" data-fee="<?php echo $fee; ?>" data-month="<?php echo $month; ?>" data-status="<?php echo $status; ?>" data-owner="<?php echo $homeowners_id; ?>" data-property="<?php echo $property_id; ?>" data-balance="<?php echo $collection_balance; ?>">
                                              <h5 class="card-title month"><b><?php echo $month_abr; ?></b></h5>
                                              <p class="card-text mb-1 status"><?php echo $status_abr; ?></p>
                                            </div>
                                          </div>
                                    <?php
                                        }
                                      }
                                    } else {
                                      $_SESSION['status'] = "No Record Found!";
                                      $_SESSION['text'] = "";
                                      $_SESSION['status_code'] = "error";
                                    }


                                    ?>


                                  </div>
                                </div>
                              </div>
                            </div>
                      </form>
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
  // Create Collection
  include("../admin-panel/property_create_collection_modal.php");
  ?>


  <script>
    $(document).ready(function() {


      // Add fee
      var id_array = [];
      var balance = [];
      var total = 0;
      var homeowners_id;
      var property_id;
      var collection_fee_id;
      var amount;

      $(".checkbox").on('change', function() {
        var collection_fee = $(this).attr('data-fee');
        var collection_FeeId = $(this).attr('data-fee-id');
        var collection_balance = $(this).attr('data-balance');
        var new_val = parseInt(collection_fee);
        var new_collection_balance = parseInt(collection_balance);
        var collection_id = $(this).val();
        var owner = $(this).attr('data-owner');
        var month = $(this).attr('data-month');
        var status = $(this).attr('data-status');
        var property = $(this).attr('data-property');
        // console.log(parseInt(collection_balance));




        if (this.checked) {
          // total = total + new_val;
          total = total + new_collection_balance;
          homeowners_id = owner;
          collection_fee_id = collection_FeeId;
          property_id = property;
          //amount = collection_fee;
          amount = collection_balance;
          id_array.push(collection_id);
          balance.push(new_collection_balance);

        } else {
          // total = total - new_val;
          total = total - new_collection_balance;
          homeowners_id = owner;
          collection_fee_id = collection_FeeId;
          property_id = property;
          //amount = collection_fee;
          amount = collection_balance;

          // id array
          for (var i = 0; i <= id_array.length - 1; i++) {
            if (collection_id === id_array[i]) {
              id_array.splice(i, 1);
            }
          }

          for (var i = 0; i <= balance.length - 1; i++) {
            if (new_collection_balance === balance[i]) {
              balance.splice(i, 1);

            }
          }
        }
        console.log(balance);
        $("#fee").val(total);
      });




      // Update collection
      $("#add_payment_btn").on('click', function() {
        var remarks = $("#remarks").val();
        var paid_by = $("#paid_by").val()
        var owners_name = $("#owners_name").val()
        if (paid_by.length > 0) {

        } else {
          paid_by = owners_name;
        }


        swal({
            title: 'Confirmation',
            text: 'Are you sure you want to add this payment?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                url: '../ajax/update_collection_list.php',
                type: 'POST',
                data: {
                  id_array: id_array,
                  homeowners_id: homeowners_id,
                  property_id: property_id,
                  collection_fee_id: collection_fee_id,
                  amount: amount,
                  remarks: remarks,
                  balance: balance,
                  paid_by: paid_by
                },
                success: function(response) {
                  // $(".content").html(response);

                  var transaction_number = response;

                  var archive_status = "ACTIVE";
                  var receipt = window.open('../admin-panel/receipt_monthly_dues.php?transactionNumber=' + transaction_number + '&archive_status=' + archive_status, '_blank', 'width=900,height=600');
                  
                  setTimeout(function() {
                    receipt.print();
                    setTimeout(function() {
                      receipt.close();
                      location.reload(true);
                    }, 500);

                  }, 500);
                }
              });
            } else {
              swal("Canceled");
            }
          })
      });



      // Add Collection
      $("#add_collection").on('click', function() {
        var property_id = $(this).attr('data-property');
        $("#property_id_cc").val(property_id);
      });







      // var property_id = $("#property_id").val();
      // // getCollectionList(property_id);
      // function getCollectionList(property_id) {
      //   $.ajax({
      //     url: '../ajax/collection_list_get_data.php',
      //     type: 'GET',
      //     data: {
      //       property_id: property_id
      //     },
      //     success: function(response) {
      //       $("#collection_list_container").html(response);
      //     }
      //   });
      // }


    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>