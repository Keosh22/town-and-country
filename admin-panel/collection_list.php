<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
session_start();
$server = new Server;
$server->adminAuthentication();

$current_date = date("Y-m-d H:i:s", strtotime("now"));
$current_month = date("F", strtotime("now"));
$current_year = date("Y", strtotime("now"));
$month = "";



if (isset($_GET['property_id'])) {
  $property_id = $_GET['property_id'];
  $query7 = "SELECT 
  property_list.id,
  property_list.homeowners_id,
  property_list.blk as property_blk,
  property_list.lot as property_lot,
  property_list.phase as property_phase,
  property_list.street as property_street,
  homeowners_users.status,
  homeowners_users.email,
  homeowners_users.firstname,
  homeowners_users.lastname,
  homeowners_users.middle_initial FROM
  property_list INNER JOIN homeowners_users WHERE property_list.homeowners_id = homeowners_users.id AND property_list.id = :property_id
  ";
  $data7 = ["property_id" => $property_id];
  $connection7 = $server->openConn();
  $stmt7 = $connection7->prepare($query7);
  $stmt7->execute($data7);
  $count = $stmt7->rowCount();
  if ($count > 0) {
    while ($result = $stmt7->fetch()) {
      $property_id = $result['id'];
      $firstname = $result['firstname'];
      $middle_name = $result['middle_initial'];
      $lastname = $result['lastname'];
      $status = $result['status'];
      $email = $result['email'];
      $blk = $result['property_blk'];
      $lot = $result['property_lot'];
      $phase = $result['property_phase'];
      $street = $result['property_street'];
    }
  }
}





// // Get all id in the proeprty list
// $query1 = "SELECT * FROM property_list";
// $connection1 = $server->openConn();
// $stmt1 = $connection1->prepare($query1);
// $stmt1->execute();
// if ($stmt1->rowCount() > 0) {
//   while ($property_row = $stmt1->fetch()) {
//     $property_list_id = $property_row['id'];
//     $property_list_phase = $property_row['phase'];
//     // It validates if there is already have a collection for this month and year
//     $query2 = "SELECT * FROM collection_list WHERE property_id = :property_list_id AND month = :current_month AND year = :current_year";
//     $data2 = [
//       'property_list_id' => $property_list_id,
//       'current_month' => $current_month,
//       'current_year' => $current_year
//     ];
//     $connection2 = $server->openConn();
//     $stmt2 = $connection2->prepare($query2);
//     $stmt2->execute($data2);

//     if ($stmt2->rowCount() > 0) {
//     } else {


//       // get the current monthly dues fee
//       $monthly_dues = "Monthly Dues";
//       $query3 = "SELECT * FROM collection_fee WHERE category = :category";
//       $data3 = ["category" => $monthly_dues];
//       $connection3 = $server->openConn();
//       $stmt3 = $connection3->prepare($query3);
//       $stmt3->execute($data3);
//       if ($stmt3->rowCount() > 0) {
//         while ($result = $stmt3->fetch()) {
//           $collection_fee_id = $result['id'];
//         }


//         // Check the date
//         $current_day = date("j", strtotime("now"));
//         $first_day_month = date("j", strtotime("first day of this month"));
//         $current_month = date("m", strtotime("now"));
//         $current_year = date("Y", strtotime("now"));

//         if ($property_list_phase == "Phase 1" && $current_day == $first_day_month) {
//           $status = "AVAILABLE";
//           $query4 = "INSERT INTO collection_list (property_id, collection_fee_id, date_created, date_expired, status, month, year) VALUES (:property_id, :collection_fee_id, :date_created, :date_expired, :status, :month, :year)";
//           $data4 = [
//             "property_id" => $property_list_id,
//             "collection_fee_id" => $collection_fee_id,
//             "date_created" => $current_date,
//             "date_expired" => $current_date,
//             "status" => $status,
//             "month" => $current_month,
//             "year" => $current_year
//           ];
//           $connection4 = $server->openConn();
//           $stmt4 = $connection4->prepare($query4);
//           $stmt4->execute($data4);
//         } elseif ($property_list_phase == "Phase 2" && $current_day == $seven_days = date("j", mktime(0, 0, 0, $current_month, 8, $current_year))) {
//           $status = "AVAILABLE";
//           $query4 = "INSERT INTO collection_list (property_id, collection_fee_id, date_created, date_expired, status, month, year) VALUES (:property_id, :collection_fee_id, :date_created, :date_expired, :status, :month, :year)";
//           $data4 = [
//             "property_id" => $property_list_id,
//             "collection_fee_id" => $collection_fee_id,
//             "date_created" => $current_date,
//             "date_expired" => $current_date,
//             "status" => $status,
//             "month" => $current_month,
//             "year" => $current_year
//           ];
//           $connection4 = $server->openConn();
//           $stmt4 = $connection4->prepare($query4);
//           $stmt4->execute($data4);
//         } elseif ($property_list_phase == "Phase 3" && $current_day == $fourteenth = date("j", mktime(0, 0, 0, $current_month, 15, $current_year))) {
//           $status = "AVAILABLE";
//           $query4 = "INSERT INTO collection_list (property_id, collection_fee_id, date_created, date_expired, status, month, year) VALUES (:property_id, :collection_fee_id, :date_created, :date_expired, :status, :month, :year)";
//           $data4 = [
//             "property_id" => $property_list_id,
//             "collection_fee_id" => $collection_fee_id,
//             "date_created" => $current_date,
//             "date_expired" => $current_date,
//             "status" => $status,
//             "month" => $current_month,
//             "year" => $current_year
//           ];
//           $connection4 = $server->openConn();
//           $stmt4 = $connection4->prepare($query4);
//           $stmt4->execute($data4);
//         }
//       } else {
//         $_SESSION['status'] = "There is no current fee for monthly duess";
//         $_SESSION['text'] = "";
//         $_SESSION['status_code'] = "warning";
//       }
//     }
//   }
// }









// Get all id in the proeprty list
// $query1 = "SELECT * FROM property_list";
// $connection1 = $server->openConn();
// $stmt1 = $connection1->prepare($query1);
// $stmt1->execute();
// if ($stmt1->rowCount() > 0) {
//   while ($property_row = $stmt1->fetch()) {
//     $property_list_id = $property_row['id'];
//     // It validates if there is already have a collection for this month and year
//     $query2 = "SELECT * FROM collection_list WHERE property_id = :property_list_id AND month = :current_month AND year = :current_year";
//     $data2 = [
//       'property_list_id' => $property_list_id,
//       'current_month' => $current_month,
//       'current_year' => $current_year
//     ];
//     $connection2 = $server->openConn();
//     $stmt2 = $connection2->prepare($query2);
//     $stmt2->execute($data2);

//     if ($stmt2->rowCount() > 0) {
//     } else {

//       // get the current monthly dues fee
//       $monthly_dues = "Monthly Dues";
//       $query3 = "SELECT * FROM collection_fee WHERE category = :category";
//       $data3 = ["category" => $monthly_dues];
//       $connection3 = $server->openConn();
//       $stmt3 = $connection3->prepare($query3);
//       $stmt3->execute($data3);
//       if ($stmt3->rowCount() > 0) {
//         while ($result = $stmt3->fetch()) {
//           $collection_fee_id = $result['id'];
//         }
//         // Insert a collection for the current month and year
//         $status = "AVAILABLE";
//         $query4 = "INSERT INTO collection_list (property_id, collection_fee_id, date_created, date_expired, status, month, year) VALUES (:property_id, :collection_fee_id, :date_created, :date_expired, :status, :month, :year)";
//         $data4 = [
//           "property_id" => $property_list_id,
//           "collection_fee_id" => $collection_fee_id,
//           "date_created" => $current_date,
//           "date_expired" => $current_date,
//           "status" => $status,
//           "month" => $current_month,
//           "year" => $current_year
//         ];
//         $connection4 = $server->openConn();
//         $stmt4 = $connection4->prepare($query4);
//         $stmt4->execute($data4);
//       } else {
//         $_SESSION['status'] = "There is no current fee for monthly duess";
//         $_SESSION['text'] = "";
//         $_SESSION['status_code'] = "warning";
//       }
//     }
//   }
// }


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
            <li class="breadcrumb-item"><a href="#">Collections</a></li>
            <li class="breadcrumb-item">Collections List</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Collections List</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">

              <section class="main-content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <!-- 	HEADER TABLE -->
                      <div class="header-box container-fluid d-flex align-items-center">
                        <div class="col">
                          <a href="#collectionCreate" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>New Collection</a>
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
                                  <div class="col-12">
                                    <label for="owners_name" class="form-label text-success">Owner's name:</label>
                                    <input type="text" class="form-control" id="owners_name" name="owners_name" value="<?php echo $firstname . " " . $middle_name . " " . $lastname;  ?>" readonly>
                                  </div>
                                  <div class="col-12">
                                    <label for="status" class="form-label text-success">Status:</label>
                                    <input type="text" class="form-control" id="status" name="status" value="<?php echo $status; ?>" readonly>
                                  </div>
                                  <div class="col-12">
                                    <label for="email" class="form-label text-success">Email Address:</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly>
                                  </div>
                                  <div class="col-4">
                                    <label for="blk" class="form-label text-success">Blk:</label>
                                    <input type="text" class="form-control" id="blk" name="blk" value="<?php echo $blk; ?>" readonly>
                                  </div>
                                  <div class="col-4">
                                    <label for="lot" class="form-label text-success">Lot:</label>
                                    <input type="text" class="form-control" id="lot" name="lot" value="<?php echo $lot; ?>" readonly>
                                  </div>
                                  <div class="col-4">
                                    <label for="phase" class="form-label text-success">Phase:</label>
                                    <input type="text" class="form-control" id="phase" name="phase" value="<?php echo $phase; ?>" readonly>
                                  </div>
                                  <div class="col-12">
                                    <label for="street" class="form-label text-success">Street:</label>
                                    <input type="text" class="form-control" id="street" name="street" value="<?php echo $street; ?>" readonly>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>



                          <!------------------------- COLLECTION DATE ---------------------------->
                          <div class="col-8">
                            <div class="card shadow-sm">
                              <div class="card-header">
                                <h5>Collections Due Date</h5>
                              </div>
                              <div class="card-body">
                                <div class="row gy-2">
                                  <table id="collection_list_Table" class="table table-striped" style="width:100%">
                                    <thead>
                                      <tr>
                                        <th width="5%">Month</th>
                                        <th width="5%">Month</th>
                                        <th width="30%">Year</th>
                                        <th width="30%">Status</th>
                                        <th scope="col" width="5%">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      // Retrieve the Collection date
                                      $query8 = "SELECT * FROM collection_list WHERE property_id = :property_id ";
                                      $data8 = ["property_id" => $property_id];
                                      $connection8 = $server->openConn();
                                      $stmt8 = $connection8->prepare($query8);
                                      $stmt8->execute($data8);
                                      if ($stmt8->rowCount() > 0) {
                                        while ($result_collection = $stmt8->fetch()) {
                                          $status_collection = $result_collection['status'];
                                          $month = $result_collection['month'];
                                          $month_int = $result_collection['month_int'];
                                          $year = $result_collection['year'];
                                      ?>

                                          <?php
                                          if ($status_collection == "AVAILABLE") {
                                          ?>
                                            <tr class="table-primary">
                                            <?php
                                          } elseif ($status_collection == "DUE") {
                                            ?>
                                            <tr class="table-danger">
                                            <?php
                                          } elseif ($status_collection == "PAID"){
                                            ?>
                                            <tr class="table-success">
                                          <?php
                                          } else {
                                            ?>
                                            <tr class="table-secondary">
                                          <?php
                                          }
                                            ?>

                                            <td><?php echo $month; ?></td>
                                            <td><?php echo $month_int; ?></td>
                                            <td><?php echo $year; ?></td>
                                            <td><?php echo $status_collection; ?></td>
                                            <td>
                                              <div class="dropdown">
                                                <a type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Action</a>
                                                <ul class="dropdown-menu">
                                                  <li><a class="dropdown-item">Sample</a></li>
                                                </ul>
                                              </div>
                                            </td>
                                            </tr>
                                        <?php
                                        }
                                      }
                                        ?>
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


      
      $("#collection_list_Table").DataTable({
        "pageLength": 12,
        order: [
          [1, 'asc']
       
        ],
        'columnDefs' : [
        //hide the first column
        { 'visible': false, 'targets': [1] }
    ]
      });

    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>