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
            <li class="breadcrumb-item">Monthly Dues</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Monthly Dues Fee List</h2>
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
                          <a href="#" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>New</a>
                        </div>
                      </div>

                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="monthlyDuesTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="5%">ID</th>
                                <th width="30%">Category</th>
                                <th width="30%">Description</th>
                                <th width="10%">Fee</th>
                                <th width="10%">Date Created</th>
                                <th width="5%">Status</th>
                                <th scope="col" width="5%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                
                                
                              ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th width="5%">ID</th>
                                <th width="30%">Category</th>
                                <th width="30%">Description</th>
                                <th width="10%">Fee</th>
                                <th width="10%">Date Created</th>
                                <th width="5%">Status</th>
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
      $("#monthlyDuesTable").DataTable({
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