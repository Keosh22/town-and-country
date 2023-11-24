<?php
require "../includes/user-header.php";
require "../libs/server.php";
$homeServer = New Server();

$result = $homeServer->carousel();
$row = mysqli_fetch_array($result['result'])
?>

<main>

      
<div class="row row-title mt-3 mb-3">
    <div class="col-sm-12 col-title text-center">
      <h2>Welcome,<span style="color:#DAD992"> <?= $_SESSION["user_firstname"] ?> <?= $_SESSION["user_lastname"] ?> </span></h2>

    </div>
  </div>

  <div class="row carousel-container d-flex justify-content-center align-items-center m-auto">

    <div class="col-sm-8 col-md-8 card-1 carousel-content">
      
      <h2>About: <?= $row['about'] ?></h2>
      
      <h4>Date: <?= date('M d, Y', strtotime($row['date']))?></h4>
      <br>
      <h3>Announcement</h3>
      <br>
      <p class="scrollable-content"><?= $row['content']?> </p>
    </div>
  </div>

  <div class="row arrows d-flex text-center">
    <div class="col-2 arrow previous">
      <a class="page-link <?= ($result['page_no'] <= 1) ? 'arrow-hover-style disabled' : ''; ?>"
        href="<?= ($result['page_no'] > 1) ? '?page_no=' . $result['prev_page'] : ''; ?>"
        aria-label="Previous">
        <span aria-hidden="true" class="icon">&laquo;</span>
      </a>
    </div>

    <div class="col-2 arrow next">
      <a class="page-link <?= ($result['page_no'] >= $result['total_number_per_page']) ? 'disabled' : ''; ?>"
        href="<?= ($result['page_no'] < $result['total_number_per_page']) ? '?page_no=' . $result['next_page'] : ''; ?>"
        aria-label="Next">
        <span aria-hidden="true" class="icon">&raquo;</span>
      </a>
    </div>
  </div>


  <div class="row row-title mt-3 mb-3">
    <div class="col-sm-12 col-title text-center">

      <h2>What would you like to do?</h2>
    </div>
  </div>

  <div class="row options justify-content-center ">
    
    <div class="col-xl-3 col-md-3 transaction d-flex flex-column align-items-center justify-content-center  text-center" >
      <div class="inner features">
        <i class="far fa-file-lines"style="color: white;" ></i>
        <p>TRANSACTION</p>
      </div>

    </div>
    
    <div class="col-xl-3 col-md-3 features d-flex flex-column align-items-center justify-content-center text-center">
      <i class="fa-solid fa-bell-concierge" style="color: white;" ></i>
      
      <p>SERVICES</p>
    </div>

    <div class="col-xl-3 col-md-3 features d-flex flex-column align-items-center justify-content-center text-center">
      <i class="fa-regular fa-user" style="color: white;"></i>
      <p>PROFILE</p>
    </div>

    <div class="col-xl-3 col-md-3 features d-flex flex-column align-items-center justify-content-center text-center">
    <i class="fa-solid fa-rectangle-ad" style="color:white;"></i>
      <p>PROMOTIONAL</p>
    </div>

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