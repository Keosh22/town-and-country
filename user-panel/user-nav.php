<body>

  <nav>
    <div class="container-fluid nav-container">
      <div class="row ">
        <div class="col-8 logo d-flex align-items-center justify-content-start gap-3">
          <a href="../user/home.php"><img src="../img/logo.png" alt=""></a>
         <a href="../user/home.php" style="text-decoration: none; color:white;"><h3>TOWN AND COUNTRY HEIGHTS EXECUTIVE VILLAGE</h3></a>
        </div>

        <div class="nav-item dropdown col-4 d-flex user align-items-center justify-content-end ">
          <button class=" user-text nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" style="color:#DAD992">User:<?= $_SESSION["username"] ?></button>
          <ul class="dropdown-menu">
            <li><a href="../user/profile.php" class="dropdown-item">Profile</a></li>
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