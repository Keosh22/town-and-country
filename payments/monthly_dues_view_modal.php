<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$server = new Server;
$default_date = date("Y/m/d g:i A", strtotime("now"));
?>



<!-- Modal Promotion -->
<div id="monthly_dues_view" class="modal fade">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>View Payment</b></h4>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body mx-3">
        <input type="text" name="payment_id_modal" id="payment_id_modal">

        <!-- RECEIPT FORMAT -->
       
        <div class="receipt-wrapper">
          <h1 class="text-center title-receipt">Payment Receipt</h1>
          <div class="divider-receipt"></div>
          <div class="flex">
            <div class="w-50">
              <h3 class="details-title">Homeowners Details</h3>
              <p>Account Number: <b  id="account_number"></b></p>
              <p>Name: <b id="name"></b></p>
              <p>Current Address: <b id="current_address"></b></p>
            </div>
            <div class="w-50">
              <h3 class="details-title">Payment Details</h3>
              <p>Transaction Number: <b id="transaction_number"></b></p>
              <p>Date Paid: <b id="date_paid"></b></p>
            </div>
          </div>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Payment Category</th>
                <th scope="col">Paid Amount</th>
                <th scope="col">Details</th>
              </tr>
            </thead>
            <tbody  id="table_result">
             
             
            </tbody>
          </table>
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
    // $("#promotionCreate").on('hidden.bs.modal', function(e) {
    //   $("#create_promotion_form").find('input[type=text], input[type=file], textarea').val("");
    // });

    // $("#promotion_due").daterangepicker({
    //   singleDatePicker: true,
    //   showDropdowns: true,
    //   autoApply: true,
    //   timePicker: true,
    //   locale: {
    //     format: 'YYYY/MM/DD hh:mm A'
    //   }
    // });
  });
</script>