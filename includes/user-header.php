<?php
// session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Bootstrap CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


  <!-- User Home Page CSS -->
  <link rel="stylesheet" href="../styles/user-home.css">
  <link rel="stylesheet" href="../styles/announcment.css">
  <script src="https://kit.fontawesome.com/c4567093fc.js" crossorigin="anonymous"></script>
  <title>TCH | Home</title>
</head>

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