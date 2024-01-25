<?php
 session_start(); ?>
<?php

require "../includes/user-header.php";
require "../user-panel/user-nav.php";
require "../libs/server.php";
$homeServer = new Server();

$homeServer->userAuthentication();
$result = $homeServer->pagination(1);
$row = mysqli_fetch_array($result['result'])
?>

<main>


  <div class="row row-title mt-3 mb-3">
    <div class="col-sm-12 col-title text-center">
      <h2>Welcome,<span style="color:#DAD992"> <?= $_SESSION["user_firstname"] ?> <?= $_SESSION["user_lastname"] ?> </span></h2>

    </div>
  </div>


  <!-- START OF ANNOUNCEMENT CAROUSEL -->
  <a class="carousel-a" href="./announcement.php">
    <div class="row carousel-container d-flex m-auto">

      <div class="card-header about">
        
        <h3 class="">ABOUT: <?= $row['about'] ?></h3>
        <p><p ><span style="color: #064420;" >Date: </span><?= date('M d, Y', strtotime($row['date'])) ?></p></p>
      </div>

      <div class="announcement-title">
        <h4 class="card-title">Announcement:</h4>
      </div>

      <div class="hr">
        <hr class="announcement-divider">
      </div>
      

      <div class="card-body">  
          <p class="scrollable-content">&nbsp &nbsp  &nbsp  &nbsp<?= preg_replace('/\s+/', ' ', trim(nl2br($row['content']))) ?></p>
          
      </div>

      <div class="footer">

        <small class="date-created"><?="Date Created: " .  date('M d, Y', strtotime($row['date_created'])). " " ?></small>
        <small class="content-signature"> By: Town and Country Heights Executive Village</small>
      </div>


    </div>


    
  </a>
  <div class="arrows">

    <div class="col-2 arrow previous">

      <a class="page-link <?= ($result['page_no'] <= 1) ? 'arrow-hover-style disabled' : ''; ?>" href="<?= ($result['page_no'] > 1) ? '?page_no=' . $result['prev_page'] : ''; ?>" aria-label="Previous">
      <span  aria-hidden="true" class="icon">&laquo;</span>
      </a>
      
    </div>

    <div class="col-2 arrow next">
      <a class="page-link <?= ($result['page_no'] >= $result['total_number_per_page']) ? 'disabled' : ''; ?>" href="<?= ($result['page_no'] < $result['total_number_per_page']) ? '?page_no=' . $result['next_page'] : ''; ?>" aria-label="Next">
        
          <span  aria-hidden="true" class="icon">&raquo;</span>
      </a>
    </div>
</div>

  <div class="row row-title mt-3 mb-3">
    <div class="col-sm-12 col-title text-center">

      <h2>What would you like to do?</h2>
    </div>
  </div>

  <div class="row options justify-content-center ">

  <a href="transactions.php" class="btn text-white col-xl-3 col-md-3 features d-flex flex-column align-items-center justify-content-center text-center">
      <i class="far fa-file-lines" style="color: white;"></i>
      <p>TRANSACTIONS</p>
    </a>
    <a href="services.php" class="btn text-white col-xl-3 col-md-3 features d-flex flex-column align-items-center justify-content-center text-center">
      <i class="fa-solid fa-bell-concierge" style="color: white;"></i>
      <p>SERVICES</p>
    </a>
    <!-- <div class="col-xl-3 col-md-3 features d-flex flex-column align-items-center justify-content-center text-center">
      <i class="fa-regular fa-user" style="color: white;"></i>
      <p>PROFILE</p>
    </div> -->
    <a href="../user/profile.php" class="btn text-white col-xl-3 col-md-3 features d-flex flex-column align-items-center justify-content-center text-center">
      <i class="fa-regular fa-user" style="color:white;"></i>
      <p>PROFILE</p>
    </a>


    <!-- <div class="col-xl-3 col-md-3 features d-flex flex-column align-items-center justify-content-center text-center"><a href="../user/promotion.php"><i class="fa-solid fa-rectangle-ad" style="color:white;"></i>
  </a>  
  <p>PROMOTIONAL</p>
    </div> -->
    <a href="../user/promotion.php" class="btn text-white col-xl-3 col-md-3 features d-flex flex-column align-items-center justify-content-center text-center">
      <i class="fa-solid fa-rectangle-ad" style="color:white;"></i>
      <p>PROMOTIONAL</p>
    </a>

    <!-- <div class="col-xl-4 col-md-4 features d-flex flex-column align-items-center justify-content-center text-center">
      <i class="fa-solid fa-bullhorn" style="color: white;" ></i>
      
      <p>ANNOUNCEMENT</p>
    </div> -->

  </div>
  </div>
</main>


</body>

</html>

</body>

</html>