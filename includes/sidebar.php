

    <!-- Side bar -->
    <aside id="sidebar">
      <div class="">
        <div class="sidebar-logo">
          <a href="#"><img class="logo-img" src="../img/logo.png" alt=""></a>
        </div>
        <ul class="sidebar-nav">
          <li class="sidebar-item">
            <div class="d-grid">
              <button class="btn dashboard-btn btn-sidebar btn-dashboard">
                <a href="../admin-panel/dashboard.php" class="sidebar-link "><i class="bx bxs-dashboard bx-tada-hover"></i>Dashboard</a>
              </button>
            </div>
          </li>

          <!------------------------- Dropdown sidebar ---------------------->
          <li class="sidebar-item">
            <!-- Homeowners dropdown -->
            <div class="d-grid">
              <button class="btn btn-sidebar btn-dashboard-dropdown btn-homeowners">
                <a href="#" class="sidebar-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-dropdown-homeowners"><i class="bx bxs-home bx-tada-hover"></i>Homeowners</i></a>
              </button>
            </div>
          </li>
          <ul id="sidebar-dropdown-homeowners" class="sidebar-dropdown collapse list-unstyled" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn  btn-dropdown">
                  <a href="../admin-panel/homeowners.php" class="sidebar-link-dropdown">Homeowners List</a>
                </button>
              </div>
            </li>
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Register Accounts</a>
                </button>
              </div>
            </li>
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Send Email</a>
                </button>
              </div>
            </li>
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Schedule Meeting</a>
                </button>
              </div>
            </li>
          </ul>

          <!-------- Payments Dropdown -------->
          <li class="sidebar-item">
            <div class="d-grid">
              <button class="btn btn-sidebar btn-dashboard-dropdown">
                <a href="#" class="sidebar-link collapsed sidebar-dropdown-btn" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-dropdown-payments"><i class="bx bxs-dollar-circle bx-tada-hover"></i>Payments</a>
              </button>
            </div>
            
             
                <!-- <a href="#" class="sidebar-link collapsed sidebar-dropdown-btn" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-dropdown-payments"><div class="d-grid"><button class="btn btn-dashboard-dropdown"><i class="bx bxs-dollar-circle"></i>Payments</button></div></a> -->
           
           
          </li>

          <ul class="sidebar-dropdown collapse list-unstyled" id="sidebar-dropdown-payments" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Monthly Dues</a>
                </button>
              </div>
            </li>
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Membership Fee</a>
                </button>
              </div>
            </li>
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Construction Bond</a>
                </button>
              </div>
            </li>
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Construction Clearance</a>
                </button>
              </div>
            </li>
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Material Delivery</a>
                </button>
              </div>
            </li>
          </ul>

          <!-------- Collections Dropdown -------->
          <li class="sidebar-item">
            <div class="d-grid">
              <button class="btn btn-sidebar btn-dashboard-dropdown">
                <a href="#" class="sidebar-link collapsed sidebar-dropdown-btn" data-bs-toggle="collapse" data-bs-target="#sidebar-dropdown-collections"><i class="bx bxs-collection bx-tada-hover"></i>Collections</a>
              </button>
            </div>
          </li>
          <ul class="sidebar-dropdown collapse list-unstyled" id="sidebar-dropdown-collections" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">
                    Add collection
                  </a>
                </button>
              </div>
            </li>
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">
                    Update collection
                  </a>
                </button>
              </div>
            </li>
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">
                    Delete collection
                  </a>
                </button>
              </div>
            </li>
          </ul>


          <!-------- Services Dropdown -------->
          <li class="sidebar-item">
            <div class="d-grid">
              <button class="btn btn-sidebar btn-dashboard-dropdown">
                <a href="#" class="sidebar-link collapsed sidebar-dropdown-btn" data-bs-toggle="collapse" data-bs-target="#sidebar-dropdown-services"><i class="bx bxs-wrench bx-tada-hover"></i>Services</a>
              </button>
            </div>
          </li>
          <ul class="sidebar-dropdown collapse list-unstyled" id="sidebar-dropdown-services" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Maintenance list</a>
                </button>
              </div>
            </li>
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Promotions list</a>
                </button>
              </div>
            </li>
          </ul>


          <!-------- User Management Dropdown -------->
          <li class="sidebar-item">
            <div class="d-grid">
              <button class="btn user-btn btn-sidebar btn-dashboard">
                <a href="../admin-panel/user.php" class="sidebar-link "><i class="bx bxs-user-circle bx-tada-hover"></i>User Management</a>
              </button>
            </div>
          </li>
          <!-- <li class="sidebar-item">
            <div class="d-grid">
              <button class="btn btn-sidebar btn-dashboard-dropdown">
                <a href="#" class="sidebar-link collapsed sidebar-dropdown-btn" data-bs-toggle="collapse" data-bs-target="#sidebar-dropdown-users"><i class="bx bxs-user-circle"></i>User Management</a>
              </button>
            </div>
          </li>
          <ul class="sidebar-dropdown collapse list-unstyled" id="sidebar-dropdown-users" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown"></a>
                </button>
              </div>
            </li>
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Update user</a>
                </button>
              </div>
            </li>
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Delete user</a>
                </button>
              </div>
            </li>
          </ul> -->

          <!-------- History Log Dropdown -------->
          <li class="sidebar-item">
            <div class="d-grid">
              <button class="btn btn-sidebar btn-dashboard-dropdown">
                <a href="../admin-panel/activity-log.php" class="sidebar-link collapsed sidebar-dropdown-btn"><i class="bx bx-history bx-tada-hover"></i>Activity Log</a>
              </button>
            </div>
          </li>
          <!-- <ul class="sidebar-dropdown collapse list-unstyled" id="sidebar-dropdown-history" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Log in history</a>
                </button>
              </div>
            </li>
            <li class="sidebar-item">
              <div class="d-grid">
                <button class="btn btn-dropdown">
                  <a href="#" class="sidebar-link-dropdown">Transaction history</a>
                </button>
              </div>
            </li>
          </ul> -->










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
      </div>
    </aside>
