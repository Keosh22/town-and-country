<?php
 session_start(); ?>


<?php
require "../includes/user-header.php";
require "../libs/server.php";
require "../includes/user-header.php";
require "../user-panel/user-nav.php";
date_default_timezone_set('Asia/Manila');
$server = new Server();
$status = "ACTIVE";
$query = "SELECT * FROM promotion WHERE status = :status";
$data = ["status" => $status];
$connection = $server->openConn();
$stmt = $connection->prepare($query);
$stmt->execute($data);
$count = $stmt->rowCount();
$current_date = date('d');


?>


<body>
  <div class="wrapper">
    <div class="row">
      <div class="col">
        <a href="#" class="announcement-title fs-1"><b>Promotional</b></a>
      </div>
    </div>
  </div>

  <div class="row mx-3 my-5 justify-content-center">
    <div class="col-md-6">
      <?php
      if ($count > 0) {
        while ($result = $stmt->fetch()) {
          $photo = $result['photo'];
          $business_name = $result['business_name'];
          $content = $result['content'];
          $date_created = date("d", strtotime($result['date_created']));
          $days_ago = $current_date - $date_created;
          ?>
          <div class="card mb-4 shadow-lg">
            <img src="../promotion_photos/<?php
               if($photo == ""){
                echo "default_image_promotion.jpg";
              } else {
                 echo $photo;
              }
            ?>" alt="..." class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?php echo $business_name; ?></h5>
              <p class="card-text"><?php echo $content; ?></p>
              <p class="card-text"><small class="text-body-secondary">
                  <?php
                  if ($current_date == $date_created) {
                  ?>
                    posted today
                  <?php
                  } elseif ($days_ago == 1) {
                    echo $days_ago;
                  ?>
                    day ago
                  <?php
                  } else {
                    echo $days_ago
                  ?>
                    days ago
                  <?php
                  }
                  ?>
                </small>
              </p>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>

  </div>
</body>