<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
?>

<?php
session_start();
$server = new Server;
$server->userAuthentication();
?>


<?php

$id = $_SESSION['user_id'];
$query = "SELECT * FROM admin_users WHERE id = :id";
$data = ["id" => $id];
$connection = $server->openConn();
$stmt = $connection->prepare($query);
$stmt->execute($data);

$rowCount = $stmt->rowCount();

if ($rowCount > 0) {
  while ($result = $stmt->fetch()) {
    $id = $result['id'];
    $username = $result['username'];
    $firstname = $result['firstname'];
    $lastname = $result['lastname'];
    $email = $result['email'];
    $phone = $result['phone_number'];
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

        <div class="card">
          <div class="card-header">
            <h2>Profile</h2>
          </div>
          <div class="card-body">
            <div class="container-fluid">
              <form method="POST" action="profile_update.php" >
                <p class="card-title fs-5 text-secondary divider personal-info">Personal Information</p>
                <div class="row mb-3 justify-content-center">
                  <img src="../uploads/default-profile.png" class="profile-photo rounded-circle shadow">
                  <p class="text-secondary text-center personal-info">ID #: <?php echo $id; ?></p>
                </div>
                <div class="row gap-3">
                  <div class="col">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $firstname; ?>">
                  </div>
                  <div class="col">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $lastname; ?>">
                  </div>
                </div>
                <div class="row gap-3">
                  <div class="col-lg-5">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>" disabled>
                  </div>
                  <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                  </div>
                  <div class="col">
                    <label for="phone_number" class="form-label">Phone #</label>
                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $phone; ?>">
                  </div>
                </div>
                <div class="col">
                  <label for="photo" class="form-label">Change photo</label>
                  <input type="file" id="photo" name="input" class="form-control" value="">
                </div>

                <div class="d-flex justify-content-end">
                  <input type="submit" class="btn btn-primary" name="update_info">
                </div>
              </form>


              
                <p class="card-title fs-5 text-secondary divider personal-info mt-4">Change Password</p>
                <div class="row gap-3">
                  <div class="col-lg-5">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" class="form-control" name="current_password" id="current_password">
                  </div>
                  <div class="col">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="new_password" id="new_password">
                  </div>
                  <div class="col">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                  </div>
                </div>
                <div class="d-flex justify-content-end">
                  <input type="submit" class="btn btn-primary" name="update_password" value="Update">
                </div>



           
            </div>
            <!-- form -->

          </div>
        </div>




      </main>




      <!-- wrapper end here -->
    </div>
  </div>

  <!-- FOOTER -->
  <?php
  include("../includes/footer.php");
  ?>