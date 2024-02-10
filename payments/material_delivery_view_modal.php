<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$server = new Server;
$default_date = date("Y/m/d g:i A", strtotime("now"));
?>



<!-- Modal Promotion -->
<div id="construction_view" class="modal fade">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>View Payment</b></h4>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body mx-3">
        <input type="hidden" name="property_id_receipt" id="property_id_receipt">
        <input type="hidden" name="transaction_number_md" id="transaction_number_md">

        <!-- RECEIPT FORMAT -->

        <div class="receipt-wrapper">
          <h1 class="text-center title-receipt">Payment Receipt</h1>
          <h5 class="text-center title-receipt">Town And Country Heights Subdivision</h5>
          <div class="divider-receipt"></div>
          <div class="flex">
            <div class="w-50">
              <h4 class="details-title">Homeowners Details</h4>
              <p>Account Number: <b id="account_number"></b></p>
              <p>Name: <b id="name"></b></p>
            
            </div>
            <div class="w-50">
              <h4 class="details-title">Payment Details</h4>
              <p>Transaction Number: <b id="transaction_number"></b></p>
              <p>Date Paid: <b id="date_paid"></b></p>
              <p>Paid By: <b id="paid_by"></b></p>
            </div>
          </div>
          <div class="divider-receipt"></div>
          <h4>Payment Summary:</h4>
          <table class="table">
            <thead id="table_header">
             
            <tbody class="table_result">


            </tbody>
          </table>

          <div class="flex">
            <div class="w-50"></div>
            <div class="w-50">
              <div class="row align-items-center">
                <div class="col-auto">
                  <label for="total_amount" class="form-label">Total Amount:</label>
                </div>
                <div class="col-4">
                  <input type="text" class="form-control" id="total_amount">
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-flat btn-primary" id="print_receipt" name="print_receipt">Print</button>
        <button class="btn btn-flat btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $("#print_receipt").on('click', function() {
      // var payment_id = $("#payment_id_modal").val();
      var archive_status = "ACTIVE";
      var transaction_number_md = $("#transaction_number_md").val();
      var property_id_receipt = $("#property_id_receipt").val();
      var receipt = window.open('../payments/material_delivery_receipt.php?transaction_number_md=' + transaction_number_md + '&property_id_receipt=' + property_id_receipt, '_blank', 'width=900,height=600');
      setTimeout(function() {
        receipt.print();
        setTimeout(function() {
          receipt.close();
        }, 500)
      }, 500)
    });
  });
</script>