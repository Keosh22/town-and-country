<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
?>
<?php  
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');

?>
<?php
session_start();
$server = new Server;
$server->adminAuthentication();
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
          <h2 class="">Activity Log</h2>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Activity Log</li>
          </ol>
        </section>



        <section class="main-content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <!-- 	HEADER TABLE -->
                <div class="header-box container-fluid d-flex align-items-center">
                  <!-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addnew">Add user</button> -->
                  <a href="#" data-bs-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class='bx bx-refresh bx-xs bx-tada-hover'></i>Refresh</a>
                </div>

                <div class="body-box shadow-sm">

                  <div class="table-responsive mx-2">
                    <table id="usersTable" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th width="10%">#</th>
                          <th width="20%">Name</th>
                          <th width="20%">Date & Time</th>
                          <th width="50%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = "SELECT * FROM activity_log ORDER BY date ASC";
                        $connection = $server->openConn();
                        $stmt = $connection->prepare($query);
                        $stmt->execute();
                        while ($result = $stmt->fetch()) {
                          $admin_id = $result['admin_id'];
                          $firstname = $result['firstname'];
                          $action = $result['action'];
                          $date = $result['date'];
                        ?>
                          <tr>
                            <td><?php echo $admin_id; ?></td>
                            <td><?php echo $firstname; ?></td>
                            <td><?php echo date("d/m/y h:i:sA",strtotime($date)); ?></td>
                            <td><?php echo $action; ?></td>
                          </tr>
                        <?php
                        }
                        ?>

                      </tbody>
                      <tfoot>
                        <tr>
                          <th width="10%">#</th>
                          <th width="20%">Name</th>
                          <th width="20%">Date & Time</th>
                          <th width="50%">Action</th>
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










      </main>





      <!-- wrapper end here -->
    </div>
  </div>


  <!-- Delete Modal -->
  <script>
    $(document).ready(function() {

      $("#usersTable").DataTable();

      // $(".delete").on('click', function() {
      // 	swal({
      // 			title: "Are you sure?",
      // 			text: "Once deleted, you will not able to recover this account!",
      // 			icon: "warning",
      // 			buttons: true,
      // 			dangerMode: true
      // 		})
      // 		.then((willDelete) => {

      // 		});
      // });


      // $(".delete").on('click', function() {
      // 	$("#deleteUser").modal("show");
      // 	var id = $(this).attr("data-id");
      // 	$("#delete_id").val(id);
      // });



    });
  </script>


  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>