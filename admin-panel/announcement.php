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

                                <th width="10%">About</th>
                                <th width="30%">Content</th>
                                <th width="10%">Date Created</th>
                                <th width="10%">Event Date</th>
                                <th width="5%">Status</th>
                                <th scope="col" width="5%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $query = "SELECT * FROM announcement";
                              $connection = $server->openConn();
                              $stmt = $connection->prepare($query);
                              $stmt->execute();
                              $count = $stmt->rowCount();
                              if ($count > 0) {
                                while ($result = $stmt->fetch()) {
                                  $announcement_id = $result['id'];
                                  $about = $result['about'];
                                  $content = $result['content'];
                                  $date = $result['date'];
                                  $date_created = $result['date_created'];
                                  $status = $result['status'];
                              ?>

                                  <tr>

                                    <td><?php echo $about ?></td>
                                    <td><?php echo nl2br($content) ?></td>
                                    <td><?php echo date("F j, Y  g:i a", strtotime($date_created)); ?></td>
                                    <td><?php echo date("F j, Y  g:i a", strtotime($date)) ?></td>
                                    <td>
                                      <?php
                                        if($status == "ACTIVE"){
                                          ?>
                                            <span class="badge rounded-pill text-bg-success"><?php echo $status ?></span>
                                          <?php
                                        } else {
                                          ?>
                                          <span class="badge rounded-pill text-bg-danger"><?php echo $status ?></span>
                                        <?php
                                        }
                                      ?>
                                    </td>
                                    <td>
                                      <div class="dropdown">
                                      <a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">Action</a>
                                      <ul class="dropdown-menu">
                                        <li><a href="#" class="dropdown-item">Delete</a></li>
                                        <li><a data-id="<?php echo $announcement_id ?>" href="#announcementUpdate" class="dropdown-item" data-bs-toggle="modal" id="update_dropdown_btn">Update</a></li>
                                      </ul>
                                    </div>
                                  </td>
                                  </tr>
                              <?php
                                }
                              } else {
                                $_SESSION['status'] = "Warning";
                                $_SESSION['text'] = "Something went wrong.";
                                $_SESSION['status_code'] = "warning";
                              }
                              ?>
                            </tbody>
                            <tfoot>
                              <tr>

                                <th width="10%">About</th>
                                <th width="30%">Content</th>
                                <th width="10%">Date Created</th>
                                <th width="10%">Date & Time</th>
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
  // Create announcement Modal
  include("../admin-panel/announcement_create_modal.php");
  // Update announcement Modal
  include("../admin-panel/announcement_update_modal.php")


  ?>


  <script>
    $(document).ready(function() {

      $("#announcementTable").on('click', '#update_dropdown_btn', function (){
        var announcement_id = $(this).attr('data-id');
        $("#announcement_id").val(announcement_id);
        getAnnouncement(announcement_id);

        function getAnnouncement(announcement_id){
          $.ajax({
            url: '../ajax/announcement_get_data.php',
            type: 'POST',
            data: {announcement_id: announcement_id},
            dataType: 'JSON',
            success: function(response){
              $("#about_update").val(response.about);
              $("#announcement_date_update").val(response.date);
              $("#content_update").val(response.content);

            }
          });
        }
        
      });



      // DataTable
      $("#announcementTable").DataTable({
        order: [
          [4, 'asc']
          
        ]
      });



    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");

  ?>