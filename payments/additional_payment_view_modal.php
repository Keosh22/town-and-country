<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$server = new Server;
$default_date = date("Y/m/d g:i A", strtotime("now"));
?>



<!-- Modal Promotion -->
<div id="additional_payment_view" class="modal fade">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>View Payment</b></h4>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body mx-3">
        <div id="hidden_input">
          <input type="hidden" name="payment_id" id="payment_id">
          <input type="hidden" name="transaction_number_id" id="transaction_number_id">
          <input type="hidden" name="collection_fee_id" id="collection_fee_id">
          <input type="hidden" name="status" id="status">
        </div>
        <!-- RECEIPT FORMAT -->

        <div class="receipt-wrapper" id="additional_payment_receipt">
          <h2 class="text-center title-receipt"><b>Payment Receipt</b></h2>
          <h5 class="text-center title-receipt m-0">Town And Country Heights Homeowners' ASSN. INC.</h5>
          <p class="text-center title-receipt text-secondary mb-1">Clubhouse 1 La Salle Avenue, Town & Country Heights San Luis, Antipolo City</p>
          <div class="divider-receipt"></div>
          <div class="flex">
            <div class="w-50">
              <h5 class="details-title text-secondary">Payment Details</h5>
              <p class="m-0">Transaction Number: <b id="transaction_number"></b></p>
              <p class="m-0">Paid By: <b id="paid_by"></b></p>
              <p class="m-0">Date Paid: <b id="date_paid"></b></p>

            </div>
            <div class="w-50">
              <p class="m-0">Remarks: <b id="remarks"></b></p>
            </div>
          </div>
          <div class="divider-receipt"></div>
          <h5 class="text-secondary">Payment Summary:</h5>
          <table class="table">
            <thead id="table_header">

            </thead>
            <tbody class="table_body">


            </tbody>
          </table>

          <div class="flex">
            <div class="w-50">
              <div class="row align-items-center">
                <div class="col-12 d-flex">
                  <span class="border-bottom"><b id="admin_name"></b></span>
                </div>
                <div class="col-12 d-flex">
                  <span class="text-secondary">Process by</span>
                </div>
              </div>
            </div>
            <div class="w-50">
              <div class="row justify-content-end">
                <div class="col-auto">
                  <label for="total_amount" class="form-label">Total Amount:</label>
                </div>
                <div class="col-4">
                  <input type="number" class="form-control" id="total_amount" readonly>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-flat btn-primary" id="print_receipt">Print</button>
        <button class="btn btn-flat btn-success" id="download_receipt">Download</button>

      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    window.jsPDF = window.jspdf.jsPDF
    const doc = new jsPDF();

    $("#print_receipt").on('click', function() {
      var status = $("#status").val();
      var transactionNumber = $("#transaction_number_id").val();
      var collectionFeeId = $("#collection_fee_id").val();
      var receipt = window.open('../payments/additional_payment_receipt.php?transactionNumber=' + transactionNumber + '&paymentId=' + collectionFeeId + '&status=' + status, '_blank', 'width=900, height=600');
      setTimeout(function() {
        receipt.print();
        setTimeout(function() {
          receipt.close();
          location.reload();
        }, 500)
      }, 500)
    });

    $("#download_receipt").on('click', function(){
      var transaction_number = $("#transaction_number_id").val();

      i = 1;
      j = 1;

      var tbodies = document.getElementsByTagName('tbody');
      while(tbodies.length - 1 > i){
        var parent = tbodies[i].parentNode;
        while(tbodies[i].firstChild){
          parent.insertBefore(tbodies[i].firstChild, tbodies[i]);
        }
        parent.removeChild(tbodies[i]);
      }

      var theader = document.getElementsByTagName('thead');
      while(theader.length - 1 > j){
        var parent = theader[j].parentNode;
        while(theader[j].firstChild){
          parent.insertBefore(theader[j].firstChild, theader[j]);
        }
        parent.removeChild(theader[j].firstChild);
      }
      downloadReceipt();
      function downloadReceipt(){
        var receipt = document.querySelector("#additional_payment_receipt");

        doc.html(receipt, {
          callback: function (){
            doc.save(transaction_number + '.pdf');
            location.reload();
          },
          x: 10,
          y: 10,
          width: 170,
          windowWidth: 650
        })
      }
    });



  });
</script>