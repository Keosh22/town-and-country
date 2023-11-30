<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
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
            <li class="breadcrumb-item"><a href="#">Services</a></li>
            <li class="breadcrumb-item">Announcement List</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card">
          <div class="card-header">
            <h2>Announcement List</h2>
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
													<a href="#announcementCreate" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-plus bx-xs bx-tada-hover'></i>Announcement</a>
												</div>

                      </div>

                      <div class="body-box shadow-sm">

                        <div class="table-responsive mx-2">
                          <table id="announcementTable" class="table table-striped" style="width:100%">
                            <thead>
                              <tr>
                                <th width="10%">#</th>
                                <th width="10%">About</th>
                                <th width="30%">Content</th>
                                <th width="10%">Date Created</th>
                                <th width="10%">Expiration</th>
                                <th scope="col" width="5%">Action</th>
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                              <tr>
                                <th width="10%">#</th>
                                <th width="10%">About</th>
                                <th width="30%">Content</th>
                                <th width="10%">Date Created</th>
                                <th width="10%">Expiration</th>
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
// Create announcement Modal
include("../admin-panel/announcement_create_modal.php");


  ?>


  <script>
    $(document).ready(function() {

      
    


      // DataTable
      $("#announcementTable").DataTable({
        order: [
          [1, 'desc'],
          [0, 'desc']
        ]
      });



    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");

  ?>