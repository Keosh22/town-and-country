<?php
require "../includes/user-header.php";

?>

<main>

      
<div class="row row-title mt-3 mb-3">
    <div class="col-sm-12 col-title text-center">
      <h2>Welcome, <?= $_SESSION["user_firstname"] ?> <?= $_SESSION["user_lastname"] ?> </h2>

    </div>
  </div>

  <div class="row carousel-container d-flex justify-content-center align-items-center m-auto">
    <div class=" col-sm-12 col-md- card-1 carousel-content">
      <h2>ANNOUNCEMENT</h2>
      <h3>Date: </h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit ad consectetur esse unde provident ipsam, accusamus incidunt est quidem placeat eveniet officiis repudiandae veritatis ducimus. Labore laborum dicta minima inventore!</p>
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