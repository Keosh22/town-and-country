<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;
$server->adminAuthentication();


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
        <section class="content-header d-flex justify-content-end align-items-center mb-3">

          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Property</a></li>
            <li class="breadcrumb-item">Property List</li>
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
                        <div class="header-box container-fluid d-flex align-items-center">
                          <div class="col">
                            <a id="add_payment_btn" name="add_payment_btn" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Add Payment</a>
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
                                      <input type="text" class="form-control" id="address" name="address" value="<?php echo "BLK-" . $blk . " LOT-" . $lot . " " . $street . " Phase " . $phase; ?>" readonly>
                                    </div>
                                    <div class="col-12">
                                      <label for="fee" class="form-label text-success">Fee::</label>
                                      <input type="text" class="form-control" id="fee" name="fee" value="" readonly>
                                    </div>
                                    <div class="col-12">
                                      <label for="remarks" class="form-label text-success">Remarks:</label>
                                      <textarea name="remarks" id="remarks" wrap="hard" rows="5" class="form-control"></textarea>
                                    
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>



                            <!------------------------- COLLECTION DATE ---------------------------->
                            <div class="col-8">
                              <div class="card shadow-sm">
                                <div class="card-header">
                                  <h5>Collections List</h5>
                                </div>
                                <div class="card-body">
                                  <div id="collection_list_container" class="row gy-2">
                                    <div class="col-12">
                                      <h5>Year: <b>2024</b></h5>
                                    </div>
                                    <?php
                                    $year = date("Y", strtotime("now"));
                                    $property_id = $_GET['property_id'];
                                    $query2 = "SELECT 
                                  collection_list.*, 
                                  collection_fee.*,
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

                                    ?>
                                        <div class="col-2">
                                          <div class="card text-bg-<?php echo $color; ?> text-center">
                                            <input type="checkbox" class="checkbox form-check-input mx-1 mt-1" <?php echo $checkbox_status; ?> value="<?php echo $colleciton_id; ?>" data-fee-id="<?php echo $collection_fee_id; ?>" data-fee="<?php echo $fee; ?>" data-month="<?php echo $month; ?>" data-status="<?php echo $status; ?>" data-owner="<?php echo $homeowners_id; ?>" data-property="<?php echo $property_id; ?>">
                                            <h5 class="card-title month"><b><?php echo $month_abr; ?></b></h5>
                                            <p class="card-text mb-1 status"><?php echo $status_abr; ?></p>
                                          </div>
                                        </div>
                                    <?php

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

  ?>


  <script>
    $(document).ready(function() {


      // Add fee
      var id_array = [];
      var total = 0;
      var homeowners_id;
      var property_id;
      var collection_fee_id;
      var amount;

      $(".checkbox").on('change', function() {
        var collection_fee = $(this).attr('data-fee');
        var collection_FeeId = $(this).attr('data-fee-id');
        var new_val = parseInt(collection_fee);
        var collection_id = $(this).val();
        var owner = $(this).attr('data-owner');
        var month = $(this).attr('data-month');
        var status = $(this).attr('data-status');
        var property = $(this).attr('data-property');
        


        if (this.checked) {
          total = total + new_val;
          homeowners_id = owner;
          collection_fee_id = collection_FeeId;
          property_id = property;
          amount = collection_fee;
          id_array.push(collection_id);

        } else {
          total = total - new_val;
          homeowners_id = owner;
          collection_fee_id = collection_FeeId;
          property_id = property;
          amount = collection_fee;

          // id array
          for (var i = 0; i <= id_array.length - 1; i++) {
            if (collection_id === id_array[i]) {
              id_array.splice(i, 1);
            }
          }
        }
       
        $("#fee").val(total);
      });




      // Update collection
      $("#add_payment_btn").on('click', function() {
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
                  amount: amount
                },
                success: function(response) {
                  // $(".content").html(response);
                  
                  var transaction_number = response;
                  var receipt = window.open('../admin-panel/receipt.php?transactionNumber='+transaction_number, '_blank','width=900,height=600');
                  setTimeout(function(){
                    receipt.print();
                    setTimeout(function(){
                      receipt.close();
                      location.reload(true);
                    },500);
                    
                  }, 500);

                  
                }
              });
            } else {
              swal("Canceled");
            }

          })

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