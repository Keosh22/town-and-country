
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Poppins FONT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Box Icon -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">




  <!------------- CSS Styles  ------------------->



 

     <!-- USER PAGE CSS -->
     <link rel="stylesheet" href="./styles/user-panel.css">

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>

<div class="wrapper-container">



<nav class="navbar navbar-expand-md fixed-top  color">
  <div class="container-fluid ">
    <a href="#" class="navbar-brand"><img class="navbar-logo" src="./img/logo.png"></a>

    <!-- Hamburger menu Button -->
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggle"><i class="bx bx-menu bx-sm" style="color:#fffffe;"></i></button>

   <!-- Navbar collapse -->
  <div class="collapse navbar-collapse ms-5" id="toggle">
    <ul class="navbar-nav align-items-center">
      <li class="navbar-item">
        <a href="#" class="nav-link fs-5 mx-2">Home</a>
      </li>
      <li class="navbar-item">
        <a href="#" class="nav-link fs-5 mx-2">About</a>
      </li>
      <li class="navbar-item">
        <a href="#" class="nav-link fs-5 mx-2k">Contacts</a>
      </li>
      <li class="navbar-item">
        <a href="#" class="nav-link fs-5 mx-2">Services</a>
      </li>
    </ul>
  </div>

  </div>
 </nav>




<div class="row row-register justify-content-center align-items-center overflow-hidden">
    <div class="col-lg-5 col-md-6 col-sm-7 col-8 bg-white shadow-lg rounded">
      <h2 class="text-center mt-3">Sign In</h2>
      <p class="text-center text-muted">Town and Country Heights</p>

      <!-- Login Form -->
      <form action="index.php" method="POST">
        <div class="input-group mb-2">
          <span class="input-group-text"><i class="bx bx-user"></i></span>
          <input type="text" class="form-control input" placeholder="Username" name="username">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bx bx-lock-alt"></i></span>
          <input type="password" class="form-control input" placeholder="Password" name="password">
        </div>
        <div class="d-grid col-6 mx-auto">
          <input type="submit" class="btn btn-success" value="Sign in" name="login">
        </div>
        <div class="row my-3">
          <div class="col-6">
            <input type="checkbox" id="checkbox">
            <label for="checkbox">Remember me</label>
          </div>
          <div class="col-6 text-end">
            <a href="#" class="link-underline link-underline-opacity-0 text-muted link-primary">|Forgot Password?</a>
          </div>
        </div>
      </form>
    </div>
  </div>

  </div>



<!-- Bootstrap Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<!-- Sweet Alert Script -->
<script src="./libraries/sweetalert.js"></script>

<!-- DataTables CDN -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>


<script>
  $(document).ready( function () {
    // $('#myTable').DataTable();
  // const dataTable = $('#myTable').DataTable({
  //   "paging": true,
  //   "processing": true,
  //   "serverSide": true,
  //   "order": [],
  //   "info": true,
  //   "ajax": {
  //     url:"../fetch.php",
  //     type:"POST",
  //   },
  //   "columDefs": [
  //     {
  //     "targets": [0,3,4],
  //     "orderable":false,
  //     },
  // ],

  // });
  
  });
</script>






<?php
// ----------------- Pop up Alert ---------------- 
if (isset($_SESSION['status']) && $_SESSION['status'] != "") {
?>
  <script>
    swal({
        title: " <?php echo $_SESSION['status'] ?>",
        text: "<?php echo $_SESSION['text'] ?>",
        icon: "<?php echo $_SESSION['status_code'] ?>",
        buttons: "Okay",
      })
      .then((buttons) => {
        if (buttons) {
          <?php
          unset($_SESSION['status']);
          unset($_SESSION['text']);
          unset($_SESSION['status_code']);
          // session_unset();
          // session_destroy();
          ?>
        }
      });
  </script>
<?php
}
?>

</body>

</html>
