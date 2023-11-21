<nav class="navbar">
  <div class="container-fluid">
    <button id="sidebar-toggler-btn" type="button">
      <i id="chevron-right" class="bx bx-chevrons-right fs-3"></i>
    </button>
    <!-- Hamburger Menu -->
    
    
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <div class="mx-auto"></div>
      <div class="nav-item dropdown me-4">
        <button  class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">Admin - <?php echo $_SESSION['firstname']; ?></button>
        <ul class="dropdown-menu">
          <li><a href="../admin-panel/profile.php" class="dropdown-item">Profile</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a href="../admin/logout.php" class="dropdown-item">Logout</a></li>
        </ul>
      </div>

    
  </div>

</nav>

<script>
  $(document).ready(function() {
    
    // Default sidebar

    // document.querySelector(".main").classList.toggle("main-collapsed");
    // document.querySelector(".navbar").classList.toggle("navbar-collapse");


    document.getElementById("sidebar-toggler-btn").addEventListener('click', () => {
      rotateChevrons();
      document.querySelector("#sidebar").classList.toggle("collapsed");
      document.querySelector(".main").classList.toggle("main-collapsed");
      document.querySelector(".navbar").classList.toggle("navbar-collapse");
    });

    function rotateChevrons() {
      document.getElementById("chevron-right").classList.toggle("sidebar-toggler-left");
    }
  });
</script>