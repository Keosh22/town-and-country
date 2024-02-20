<?php
session_start(); ?>
<?php

require "../includes/user-header.php";
require "../user-panel/user-nav.php";
//require "../libs/server.php";
// $homeServer = new Server();

// $homeServer->userAuthentication();
// $result = $homeServer->pagination(1);
// $row = mysqli_fetch_array($result['result']);

?>

<main>


  <div class="row row-title mt-3 mb-3">
    <div class="col-sm-12 col-title text-center">
      <h2>Welcome,<span style="color:#DAD992"> <?= $_SESSION["user_firstname"] ?> <?= $_SESSION["user_lastname"] ?> </span></h2>

    </div>
  </div>


  <!-- START OF ANNOUNCEMENT CAROUSEL -->
  <div class="whole-carousel">

    <div class="arrow previous">
      <i id="back" class="fa-solid fa-angles-left" style="color: #f7f7f7;" aria-disabled="true"></i>
    </div>


    <a class="carousel-a" href="./announcement.php">
      <div class="row carousel-container d-flex m-auto">

        <div class="card-header about">

          <h3 class="" id="about">ABOUT: <span id="span_about"></span> </h3>

          <p id="date">
            <span style="color: #064420;">Date: <span id="span_date"> </span></span>
          </p>
        </div>

        <div class="announcement-title">
          <h4 class="card-title">Announcement: <span id="span_announcement"></span></h4>
        </div>

        <div class="hr">
          <hr class="announcement-divider">
        </div>


        <div class="card-body">
          <p class="scrollable-content">&nbsp &nbsp &nbsp &nbsp <span id="span_content"></span></p>

        </div>

        <div class="footer">

          <small class="date-created">Date Created: <span id="span_date_created"></span></small>
          <small class="content-signature"> By: Town and Country Heights Executive Village</small>
        </div>


      </div>



    </a>
    <div class="arrows">

      <div class="arrow next">
        <i id="next" class="fa-solid fa-angles-right" style="color: #ffffff;"></i>
      </div>

      <div class="footer">

        <!-- <small class="date-created">Date Created: <span id="span_date_created"></span></small> -->
        <!-- <small class="content-signature"> By: Town and Country Heights Executive Village</small> -->
      </div>


    </div>
    </a>

    <!-- <div class="arrow next">
      <i id="next" class="fa-solid fa-angles-right" style="color: #ffffff;"></i>
    </div> -->

  </div>


  <div class="row row-title mt-3 mb-3">
    <div class="col-sm-12 col-title text-center">

      <h2>What would you like to do?</h2>
    </div>
  </div>

  <div class="row options justify-content-center">

    <div class="col-xl-3 col-md-3 d-flex flex-column align-items-center justify-content-center text-center">
      <a href="transactions.php" class="btn text-white features ">
        <i class="far fa-file-lines" style="color: white;"></i>
        <p>TRANSACTIONS</p>
      </a>
    </div>

    <div class="col-xl-3 col-md-3 d-flex flex-column align-items-center justify-content-center text-center">
      <a href="services.php" class="btn text-white features ">
        <i class="fa-solid fa-bell-concierge" style="color: white;"></i>
        <p>SERVICES</p>
      </a>
    </div>

    <div class="col-xl-3 col-md-3 d-flex flex-column align-items-center justify-content-center text-center">
      <a href="../user/profile.php" class="btn text-white features ">
        <i class="fa-regular fa-user" style="color:white;"></i>
        <p>PROFILE</p>
      </a>
    </div>

    <div class="col-xl-3 col-md-3 d-flex flex-column align-items-center justify-content-center text-center">
      <a href="../user/promotion.php" class="btn text-white features ">
        <i class="fa-solid fa-rectangle-ad" style="color:white;"></i>
        <p>PROMOTIONAL</p>
      </a>
    </div>
  </div>


</main>


</body>

</html>

<script src="../scripts/carousel.js">

</script>