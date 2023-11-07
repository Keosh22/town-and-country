<!-- HEADER -->
<?php require_once("./includes/header.php"); ?>

<!-- HEADER -->
<?php require_once("./includes/user-navbar.php"); ?>

<div class="row row-register justify-content-center align-items-center overflow-hidden">
    <div class="col-lg-5 col-md-6 col-sm-7 col-8 bg-white shadow-lg rounded">
      <h2 class="text-center mt-3">Sign In</h2>
      <p class="text-center text-muted">Don't have account? <a href="signup.php" class="link link-underline link-underline-opacity-0  ms-2" style="font-size: 18px;">Sign up</a></p>

      <!-- Login Form -->
      <form action="index.php" method="POST">
        <div class="input-group mb-2">
          <span class="input-group-text"><i class="bx bx-user"></i></span>
          <input type="text" class="form-control input" placeholder="Username" name="username">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bx bx-lock-alt"></i></span>
          <input type="password" class="form-control input" placeholder="Password" name="password">
        </div>
        <div class="d-grid col-6 mx-auto">
          <input type="submit" class="btn btn-success" value="Sign in" name="login">
        </div>
        <div class="row my-3">
          <div class="col-6">
            <input type="checkbox" id="checkbox">
            <label for="checkbox">Remember me</label>
          </div>
          <div class="col-6 text-end">
            <a href="#" class="link-underline link-underline-opacity-0 text-muted link-primary">|Forgot Password?</a>
          </div>
        </div>
      </form>
    </div>
  </div>


<!-- HEADER -->
<?php require_once("./includes/footer.php"); ?>
