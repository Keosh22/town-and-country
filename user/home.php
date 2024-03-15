<?php
session_start(); ?>
<?php

require "../includes/user-header.php";
require "../user-panel/user-nav.php";
require "../libs/server.php";
// $homeServer = new Server();

// $homeServer->userAuthentication();
// $result = $homeServer->pagination(1);
// $row = mysqli_fetch_array($result['result']);

?>


<!-- PROMOTION PUSH NOTIFICATION TOAST -->
<div class=" d-flex justify-content-end">

  <?php
  $server = new Server();
  $status = "ACTIVE";
  $query = "SELECT * FROM promotion WHERE status = :status ORDER BY RAND() LIMIT 1";
  $data = ["status" => $status];
  $connection = $server->openConn();
  $stmt = $connection->prepare($query);
  $stmt->execute($data);
  $count = $stmt->rowCount();
  $current_date = date('d');
  if ($count > 0) {
    while ($result = $stmt->fetch()) {
      $photo = $result['photo'];
      $business_name = $result['business_name'];
      $content = $result['content'];
      $date_created = date("d", strtotime($result['date_created']));
      $days_ago = $current_date - $date_created;
  ?>
      <div class="toast  text-bg-success position-fixed" role="alert" data-bs-delay="5000">
        <div class="toast-header">
          <strong class="me-auto">Promotions</strong>
          <button class="btn btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
          <div class="promotion_container flex-wrap">
            <div class="promotion-toast-size">
              <img src="../promotion_photos/<?php
                                            if ($photo == "") {
                                              echo "default_image_promotion.jpg";
                                            } else {
                                              echo $photo;
                                            }
                                            ?>" alt="..." class="card-img-top promotion_toast_img">
            </div>
            <h6 class="my-1 promotion_toast_body"><?php echo $business_name; ?></h6>
            <a href="../user/promotion.php" class="btn btn-sm btn-warning">View</a>
        <?php
      }
    } else {
    }
        ?>
          </div>
        </div>
      </div>
</div>

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
      <div class="row carousel-container">

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

    <div class="arrow next">
      <i id="next" class="fa-solid fa-angles-right" style="color: #ffffff;"></i>
    </div>

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

<script>
  $(document).ready(function() {
    $('.toast').toast('show');
  })
</script>