<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <button id="sidebar-toggler-btn" type="button">
      <i id="chevron-right" class="bx bx-chevrons-right fs-3"></i>
    </button>
    <!-- Hamburger Menu -->
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse">
      <i class="bx bx-menu"></i>
    </button>
    <div class="navbar-collapse collapse" id="navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      </ul>
      <div class="mx-auto"></div>
      <div class="nav-item dropdown me-4">
        <button  class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">Admin - <?php echo $_SESSION['firstname']; ?></button>
        <ul class="dropdown-menu">
          <li><a href="../admin-panel/profile.php" class="dropdown-item">Profile</a></li>
          <li><a href="#" class="dropdown-item">Settings</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a href="../admin/logout.php" class="dropdown-item">Logout</a></li>
        </ul>
      </div>

    </div>
  </div>

</nav>

<script>
  $(document).ready(function() {
    const chevronsElement = document.getElementById("chevron-right");
    const sidebarBtnToggler = document.getElementById("sidebar-toggler-btn");

    sidebarBtnToggler.addEventListener('click', () => {
      rotateChevrons();
      document.querySelector("#sidebar").classList.toggle("collapsed")
      document.querySelector(".main").classList.toggle("main-collapsed")
    });

    function rotateChevrons() {
      chevronsElement.classList.toggle("sidebar-toggler-left");
    }
  });
</script>