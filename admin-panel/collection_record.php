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

                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="collectionRecord" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="5%">Account#</th>
                                <th width="5%">Date Created</th>
                                <th width="15%">Name</th>
                                <th width="15%">Property</th>
                                <th width="10%">Status</th>
                                <th width="5%">Fee</th>
                                <th width="5%">Month/Year</th>
                                <th scope="col" width="5%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $query = "SELECT 
                                  collection_list.id,
                                  collection_list.property_id,
                                  collection_list.collection_fee_id,
                                  collection_list.date_created,
                                  collection_list.balance,
                                  collection_list.status,
                                  collection_list.month,
                                  collection_list.year,
                                  property_list.id,
                                  property_list.homeowners_id,
                                  property_list.blk,
                                  property_list.lot,
                                  property_list.phase,
                                  property_list.street,
                                  property_list.tenant,
                                  homeowners_users.id,
                                  homeowners_users.account_number,
                                  homeowners_users.firstname,
                                  homeowners_users.lastname,
                                  homeowners_users.middle_initial
                                FROM collection_list 
                                INNER JOIN property_list ON collection_list.property_id = property_list.id 
                                INNER JOIN homeowners_users ON property_list.homeowners_id = homeowners_users.id
                                ";
                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute();
                              if ($stmt->rowCount() > 0) {
                                while ($result = $stmt->fetch()) {
                                  //collectionlist table
                                  $collection_id = $result['id'];
                                  $date_created = $result['date_created'];
                                  $status = $result['status'];
                                  $balance = $result['balance'];
                                  $month = $result['month'];
                                  $year = $result['year'];

                                  // propertylist table
                                  $proeprty_id = $result['id'];
                                  $blk = $result['blk'];
                                  $lot = $result['lot'];
                                  $phase = $result['phase'];
                                  $street = $result['street'];

                                  // homeowners table
                                  $account_number = $result['account_number'];
                                  $firstname = $result['firstname'];
                                  $lastname = $result['lastname'];
                                  $middle_initital = $result['middle_initial'];
                              ?>

                                  <?php
                                  if ($status == "AVAILABLE") {
                                  ?>
                                    <tr class="table-primary">
                                    <?php
                                  } elseif ($status == "DUE") {
                                    ?>
                                    <tr class="table-danger">
                                    <?php
                                  } elseif ($status == "PAID") {
                                    ?>
                                    <tr class="table-success">
                                    <?php
                                  } else {
                                    ?>
                                    <tr class="table-secondary">
                                    <?php
                                  }
                                    ?>
                                    <td><?php echo $account_number; ?></td>
                                    <td><?php echo date("M d, Y", strtotime($date_created)); ?></td>
                                    <td><?php echo $firstname . " " . $middle_initital . " " . $lastname; ?></td>
                                    <td><?php echo "BLK-" . $blk . " LOT-" . $lot . ", " . $street . ", " . $phase; ?></td>
                                    <td>
                                      <?php
                                      if ($status == "AVAILABLE") {
                                      ?>
                                        <span class="badge rounded-pill text-bg-primary">AVAILBALE</span>
                                      <?php
                                      } elseif ($status == "DUE") {
                                      ?>
                                        <span class="badge rounded-pill text-bg-danger">DUE</span>
                                      <?php
                                      } elseif ($status == "PAID") {
                                      ?>
                                        <span class="badge rounded-pill text-bg-success">PAID</span>
                                      <?php
                                      } else {
                                      ?>
                                        <span class="badge rounded-pill text-bg-secondary">NOT AVAILBLE</span>
                                      <?php
                                      }
                                      ?>
                                    </td>
                                    <td><span class="badge rounded-pill text-bg-secondary"><?php echo $balance; ?></span></td>
                                    <td><?php echo $month . "-" . $year; ?></td>
                                    <td>
                                      <div class="dropdown">
                                        <a type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Action</a>
                                        <ul class="dropdown-menu">
                                          <li><a href="#" class="dropdown-item">Edit</a></li>
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
                                <th width="5%">Account#</th>
                                <th width="5%">Date Created</th>
                                <th width="15%">Name</th>
                                <th width="15%">Property</th>
                                <th width="10%">Status</th>
                                <th width="5%">Fee</th>
                                <th width="5%">Month/Year</th>
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

  ?>


  <script>
    $(document).ready(function() {


      // DataTable
      $("#collectionRecord").DataTable({
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