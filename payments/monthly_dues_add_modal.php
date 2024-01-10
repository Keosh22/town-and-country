<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$default_date = date("Y/m/d g:i A", strtotime("now"));
?>

<!-- Add Monthly Dues Modal -->
<div id="addMonthlyDues" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Add Monthly Dues Payment</b></h4>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="" id="monthly_dues_form">
      <div class="modal-body mx-3">
        <div class="row gy-3">
          <div class="col">
            <label for="search_monthly_dues" class="form-label">Search Account:</label>
            <input class="form-control" type="text" id="search_monthly_dues" name="search_monthly_dues" placeholder="Input Account # or Fullname">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger btn-flat" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary btn-flat" id="add_monthly_dues" name="add_monthly_dues">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>