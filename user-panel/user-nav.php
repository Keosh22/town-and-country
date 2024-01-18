<body>

  <nav>
    <div class="container-fluid nav-container">
      <div class="row ">
        <div class="col-8 logo d-flex align-items-center justify-content-start gap-3">
          <img src="../img/logo.png" alt="">
          <h3>TOWN AND COUNTRY HEIGHTS EXECUTIVE VILLAGE</h3>
        </div>

        <div class="nav-item dropdown col-4 d-flex user align-items-center justify-content-end ">
          <button class="nav-link dropdown-toggle fs-5" role="button" data-bs-toggle="dropdown" style="color:#DAD992">User: <?= $_SESSION["user_id"] ?>-<?= $_SESSION["username"] ?></button>
          <ul class="dropdown-menu">
            <li><a href="#" class="dropdown-item">Profile</a></li>
            <hr class="dropdown-divider">
            <li><a href="../user/logout.php" class="dropdown-item">Logout</a></li>
          </ul>
        </div>

        <!-- <div class="col-4 d-flex user align-items-center justify-content-end">
          <p style="color:#DAD992"><?= $_SESSION["user_id"] ?>-<?= $_SESSION["username"] ?> </p>
        </div> -->

      </div>
    </div>
  </nav>