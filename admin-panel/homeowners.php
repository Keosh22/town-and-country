<?php
require_once("../libs/server.php");
require_once("../includes/header.php");
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
        


<!-- wrapper end here -->
</div>
	</div>


	<?php
	// insert your modal here
	?>			

	<!-- FOOTER -->
	<?php
	include("../includes/footer.php");
	?>