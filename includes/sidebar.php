<!-- Side bar -->
<aside id="sidebar" class="">
  <div class="">
    <div class="sidebar-logo">
      <a href="../admin-panel/dashboard.php"><img class="logo-img" src="../img/logo.png" alt=""></a>
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
              <a href="../admin-panel/property_list.php" class="sidebar-link-dropdown">Property List</a>
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
              <a href="../payments/monthly_dues.php" class="sidebar-link-dropdown">Monthly Dues</a>
            </button>
          </div>
        </li>
        <li class="sidebar-item">
          <div class="d-grid">
            <button class="btn btn-dropdown">
              <a href="../payments/membership_fee.php" class="sidebar-link-dropdown">Membership Fee</a>
            </button>
          </div>
        </li>
        <li class="sidebar-item">
          <div class="d-grid">
            <button class="btn btn-dropdown">
              <a href="../payments/construction.php" class="sidebar-link-dropdown">Constructions</a>
            </button>
          </div>
        </li>
        <li class="sidebar-item">
          <div class="d-grid">
            <button class="btn btn-dropdown">
              <a href="../payments/additional_payment.php" class="sidebar-link-dropdown">
                Additional Payments
              </a>
            </button>
          </div>
        </li>
        <!-- <li class="sidebar-item">
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
        </li> -->
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
              <a href="../admin-panel/collection_record.php" class="sidebar-link-dropdown">
                Collections List
              </a>
            </button>
          </div>
        </li>
        <li class="sidebar-item">
          <div class="d-grid">
            <button class="btn btn-dropdown">
              <a href="../admin-panel/collections.php" class="sidebar-link-dropdown">
                Collections Fee
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
              <a href="../admin-panel/maintenance_request.php" class="sidebar-link-dropdown">Maintenance</a>
            </button>
          </div>
        </li>
        <li class="sidebar-item">
          <div class="d-grid">
            <button class="btn btn-dropdown">
              <a href="../admin-panel/promotion.php" class="sidebar-link-dropdown">Promotions</a>
            </button>
          </div>
        </li>
        <li class="sidebar-item">
          <div class="d-grid">
            <button class="btn btn-dropdown">
              <a href="../admin-panel/announcement.php" class="sidebar-link-dropdown">Anouncement</a>
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


      <!-------- History Log Dropdown -------->
      <li class="sidebar-item">
        <div class="d-grid">
          <button class="btn btn-sidebar btn-dashboard-dropdown">
            <a href="../admin-panel/activity-log.php" class="sidebar-link collapsed sidebar-dropdown-btn"><i class="bx bx-history bx-tada-hover"></i>Activity Log</a>
          </button>
        </div>
      </li>


      <!-- ------ Archive History ------
      <li class="sidebar-item">
        <div class="d-grid">
          <button class="btn btn-sidebar btn-dashboard-dropdown">
            <a href="#" class="sidebar-link collapsed sidebar-dropdown-btn" data-bs-toggle="collapse" data-bs-target="#sidebar-dropdown-archive"><i class="bx bxs-archive bx-tada-hover"></i>Archive History</a>
          </button>
        </div>
      </li>
      <ul class="sidebar-dropdown collapse list-unstyled" id="sidebar-dropdown-archive" data-bs-parent="#sidebar">
        <li class="sidebar-item">
          <div class="d-grid">
            <button class="btn btn-dropdown">
              <a href="#" class="sidebar-link-dropdown">Monthly Dues Payment</a>
            </button>
          </div>
        </li>
      </ul> -->


      <!-------- Settings -------->
      <li class="sidebar-item">
        <div class="d-grid">
          <button class="btn btn-sidebar btn-dashboard-dropdown">
            <a href="#" class="sidebar-link collapsed sidebar-dropdown-btn" data-bs-toggle="collapse" data-bs-target="#sidebar-dropdown-settings"><i class="bx bxs-cog bx-tada-hover"></i>Settings</a>
          </button>
        </div>
      </li>
      <ul class="sidebar-dropdown collapse list-unstyled" id="sidebar-dropdown-settings" data-bs-parent="#sidebar">
        <li class="sidebar-item">
          <div class="d-grid">
            <button class="btn btn-dropdown">
              <a href="../admin-panel/street.php" class="sidebar-link-dropdown">Street List</a>
            </button>
          </div>
          <div class="d-grid">
            <button class="btn btn-dropdown">
              <a href="../admin-panel/maintenance_list.php" class="sidebar-link-dropdown">Maintenance List</a>
            </button>
          </div>
          <div class="d-grid">
            <button class="btn btn-dropdown">
              <a href="../reports/print_reports.php" class="sidebar-link-dropdown">Print Reports</a>
            </button>
          </div>
        </li>

      </ul>

    </ul>
  </div>
</aside>

<script>
  $(document).ready(function() {
    // Save dropdown State

    var saveState = localStorage.getItem('collapseBtn');
    if (saveState) {
      $("#" + saveState).collapse('show')
    } else {
      $("#" + saveState).collapse('hide')
    }

    $(".collapse").on('shown.bs.collapse', function() {
      var id = $(this).attr('id')

      localStorage.setItem('collapseBtn', id);
    });

    $(".btn-sidebar").on('click', function() {

      localStorage.removeItem('collapseBtn')
    })



  })
</script>