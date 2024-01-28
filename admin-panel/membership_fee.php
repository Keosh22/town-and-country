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

if (isset($_GET['homeowners_id'])) {
  $homeowners_id = $_GET['homeowners_id'];
  $query1 = "SELECT 
  id, 
  account_number, 
  firstname, 
  lastname, 
  middle_initial,
  blk,
  lot,
  phase,
  street,
  status
  FROM homeowners_users wHERE id = :homeowners_id
  ";
  $data1 = ["homeowners_id" => $homeowners_id];
  $connection1 = $server->openConn();
  $stmt1 = $connection1->prepare($query1);
  $stmt1->execute($data1);
  if($stmt1->rowCount() > 0){
    while($result1 = $stmt1->fetch()){
      $account_number = $result1['account_number'];
      $firstname = $result1['firstname'];
      $lastname = $result1['lastname'];
      $middle_initial = $result1['middle_initial'];

      $blk = $result1['blk'];
      $lot = $result1['lot'];
      $phase = $result1['phase'];
      $street = $result1['street'];
      $status = $result1['status'];
    }
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
            <li class="breadcrumb-item"><a href="#">Homeowners</a></li>
            <li class="breadcrumb-item">Homeowners List List</li>
            <li class="breadcrumb-item">Manage Payment</li>
          </ol>
        </section>


        <!-- Card Start here -->
        <div class="card card-border">
          <div class="card-header">
            <h2>Manage Payment (Membership Fee)</h2>
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
                                    <input type="hidden" id="property_id" name="property_id" value="<?php echo $homeowners_id; ?>">
                                    <div class="col-12">
                                      <label for="owners_name" class="form-label text-success">Owner's name:</label>
                                      <input type="text" class="form-control" id="owners_name" name="owners_name" value="<?php echo $firstname . " " . $middle_initial . " " . $lastname;  ?>" readonly>
                                    </div>
                                    <div class="col-12">
                                      <label for="address" class="form-label text-success">Property:</label>
                                      <input type="text" class="form-control" id="address" name="address" value="<?php echo "BLK-" . $blk . " LOT-" . $lot . " " . $street . " St. " . $phase; ?>" readonly>
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


     

     







    


    });
  </script>
  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>