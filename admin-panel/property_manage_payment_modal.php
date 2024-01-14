<?php

// use LDAP\Result;

require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$default_date = date("Y/m/d g:i A", strtotime("now"));
$server = new Server;
?>

<!-- Add Monthly Dues Modal -->
<div id="addMonthlyDues" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Add Monthly Dues Payment</b></h4>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="" id="manage_payment_form">
        <div class="modal-body mx-3">
          <div class="row gy-3">
            <input type="hidden" id="property_id" name="property_id">
            <div class="col-12">
              <label for="homeowners_name">Homeowner's Name:</label>
              <input type="text" name="homeowners_name" id="homeowners_name" class="form-control" readonly>
            </div>
            <div class="col-12">
              <label for="address">Property Address:</label>
              <input type="text" name="address" id="address" class="form-control" readonly>
            </div>
            <div class="row gy-3" id="collection_container">

            </div>
            

            <!-- <div class="col-2">
              <div class="card text-bg-danger text-center">
                <div class="card-body">
                  <input type="checkbox" class="form-check-input mb-2">
                  <h5 class="card-title"><b>JAN</b></h5>
                  <p class="card-text">Due</p>
                </div>
              </div>
            </div>
            <div class="col-2">
              <div class="card text-bg-secondary text-center">
                <div class="card-body">
                  <input type="checkbox" class="form-check-input mb-2">
                  <h5 class="card-title"><b>FEB</b></h5>
                  <p class="card-text">N/A</p>
                </div>
              </div>
            </div>
            <div class="col-2">
              <div class="card text-bg-secondary text-center">
                <div class="card-body">
                  <input type="checkbox" class="form-check-input mb-2">
                  <h5 class="card-title"><b>MAR</b></h5>
                  <p class="card-text">N/A</p>
                </div>
              </div>
            </div>
            <div class="col-2">
              <div class="card text-bg-secondary text-center">
                <div class="card-body">
                  <input type="checkbox" class="form-check-input mb-2">
                  <h5 class="card-title"><b>APR</b></h5>
                  <p class="card-text">N/A</p>
                </div>
              </div>
            </div>
            <div class="col-2">
              <div class="card text-bg-secondary text-center">
                <div class="card-body">
                  <input type="checkbox" class="form-check-input mb-2">
                  <h5 class="card-title"><b>MAY</b></h5>
                  <p class="card-text">N/A</p>
                </div>
              </div>
            </div>
            <div class="col-2">
              <div class="card text-bg-secondary text-center">
                <div class="card-body">
                  <input type="checkbox" class="form-check-input mb-2">
                  <h5 class="card-title"><b>JUN</b></h5>
                  <p class="card-text">N/A</p>
                </div>
              </div>
            </div>
            <div class="col-2">
              <div class="card text-bg-danger text-center">
                <div class="card-body">
                  <input type="checkbox" class="form-check-input mb-2">
                  <h5 class="card-title"><b>JAN</b></h5>
                  <p class="card-text">Due</p>
                </div>
              </div>
            </div>
            <div class="col-2">
              <div class="card text-bg-secondary text-center">
                <div class="card-body">
                  <input type="checkbox" class="form-check-input mb-2">
                  <h5 class="card-title"><b>FEB</b></h5>
                  <p class="card-text">N/A</p>
                </div>
              </div>
            </div>
            <div class="col-2">
              <div class="card text-bg-secondary text-center">
                <div class="card-body">
                  <input type="checkbox" class="form-check-input mb-2">
                  <h5 class="card-title"><b>MAR</b></h5>
                  <p class="card-text">N/A</p>
                </div>
              </div>
            </div>
            <div class="col-2">
              <div class="card text-bg-secondary text-center">
                <div class="card-body">
                  <input type="checkbox" class="form-check-input mb-2">
                  <h5 class="card-title"><b>APR</b></h5>
                  <p class="card-text">N/A</p>
                </div>
              </div>
            </div>
            <div class="col-2">
              <div class="card text-bg-secondary text-center">
                <div class="card-body">
                  <input type="checkbox" class="form-check-input mb-2">
                  <h5 class="card-title"><b>MAY</b></h5>
                  <p class="card-text">N/A</p>
                </div>
              </div>
            </div>
            <div class="col-2">
              <div class="card text-bg-secondary text-center">
                <div class="card-body">
                  <input type="checkbox" class="form-check-input mb-2">
                  <h5 class="card-title"><b>JUN</b></h5>
                  <p class="card-text">N/A</p>
                </div>
              </div>
            </div> -->
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

<script>
  $(document).ready(function() {
    $("#addMonthlyDues").on('hidden.bs.modal', function(e) {
      $("#manage_payment_form").find('input[type=text], input[type=hidden]').val("");
    });
  });
</script>