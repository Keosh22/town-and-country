<?php
include("../includes/header.php");
?>

<body>

  <div class="wrapper">

    <!-- Side bar -->
    <aside id="sidebar" class="collapse show">
      <div class="h-100">
        <div class="sidebar-logo">
          <a href="#"><img class="logo-img" src="../img/logo.png" alt=""></a>
        </div>
        <ul class="sidebar-nav">
          <li class="sidebar-item">
            <div class="d-grid">
              <button class="btn btn-dashboard">
                <a href="#" class="sidebar-link "><i class="bx bxs-dashboard"></i>Dashboard</a>
              </button>
            </div>
          </li>

          <!----------- Dropdown sidebar/Homeowners ---------->
          <li class="sidebar-item">
            <div class="d-grid">
              <button class="btn btn-dashboard-dropdown">
                <a href="#" class="sidebar-link sidebar-dropdown-btn" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-dropdown-homeowners"><i class="bx bxs-home"></i>Homeowners<i class="bx bxs-chevron-up"></i></a>
              </button>
            </div>
          </li>
          <ul id="sidebar-dropdown-homeowners" class="sidebar-dropdown collapse list-unstyled">
            <li>
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Members</a>
                </button>
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Non-members</a>
                </button>
              </div>
            </li>
          </ul>

          <!-- --------- Dropdown sidebar/Payments --------
          <li class="sidebar-item">
            <div class="d-grid">
              <button class="btn btn-dashboard-dropdown">
                <a href="#" class="sidebar-link sidebar-dropdown-btn" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-dropdown-payments"><i class="bx bxs-home"></i>Payments<i class="bx bxs-chevron-up"></i></a>
              </button>
            </div>
          </li>
          <ul id="sidebar-dropdown-payments" class="sidebar-dropdown collapse list-unstyled">
            <li>
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Monthly Dues</a>
                </button>
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Construction permit</a>
                </button>
              </div>
            </li>
          </ul> -->






          <!-- <div class="accordion accordion-flush" id="accordionParent">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionCollapse">
                  Homeowners
                </button>
              </h2>
              <div class="accordion-collapse collapse" id="accordionCollapse" data-bs-parent="accordionParent">
                <ul class="accordion-dropdown">
                  <li class="accordion-item">
                    <a href="#" class="accordion-link">Members</a>
                  </li>
                  <li class="accordion-item">
                    <a href="#" class="accordion-link">Non-Members</a>
                  </li>
                  <li class="accordion-item">
                    <a href="#" class="accordion-link">Tenants</a>
                  </li>
                </ul>
              </div>
            </div>
          </div> -->
        </ul>
    </aside>

    <!-- Main body content -->
    <div class="main">
      <!-- Nav bar -->
      <div class="navbar navbar-expand-lg">
        <button id="sidebar-toggler-btn" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
          <i id="chevron-right" class="bx bx-chevrons-right fs-3"></i>
        </button>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse">
          <i class="bx bx-menu"></i>
        </button>
      </div>
    </div>
  </div>

  <?php
  include("../includes/footer.php");
  ?>