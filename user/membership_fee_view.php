<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$server = new Server;
$default_date = date("Y/m/d g:i A", strtotime("now"));
?>



<!-- Modal Promotion -->
<div id="membership_fee_view" class="modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>View Payment</b></h4>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body mx-3">
        <input type="hidden" name="payment_id_modal_mf" id="payment_id_modal_mf">
        <input type="hidden" name="transactionNum_id_mf" id="transactionNum_id_mf">

        <!-- RECEIPT FORMAT -->

        <div class="receipt-wrapper" id="membership_fee_receipt_mf">
          <h2 class="text-center title-receipt"><b>Payment Receipt</b></h2>
          <h5 class="text-center title-receipt m-0">Town And Country Heights Homeowners' ASSN. INC.</h5>
          <p class="text-center title-receipt text-secondary mb-1">Clubhouse 1 La Salle Avenue, Town & Country Heights San Luis, Antipolo City</p>
          <div class="divider-receipt"></div>
          <div class="flex">
            <div class="w-50">
              <h5 class="details-title text-secondary">Homeowners Details</h5>
              <p class="m-0">Account Number: <b id="account_number_mf"></b></p>
              <p class="m-0">Name: <b id="name_mf"></b></p>
              <p class="m-0">Current Address: <b id="current_address_mf"></b></p>
            </div>
            <div class="w-50">
              <h5 class="details-title text-secondary">Payment Details</h5>
              <p class="m-0">Transaction Number: <b id="transaction_number_mf"></b></p>
              <p class="m-0">Date Paid: <b id="date_paid_mf"></b></p>
              <p class="m-0">Remarks: <b id="remarks_mf"></b></p>
            </div>
          </div>
          <div class="divider-receipt"></div>
          <h5 class="text-secondary">Payment Summary:</h5>
          <table class="table">
            <thead>
              <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" width="20%">Category</th>
                <th scope="col" width="15%">Amount</th>
                <th scope="col" width="60%">Details</th>
              </tr>
            </thead>
            <tbody class="table_result_mf">


            </tbody>
          </table>

          <div class="flex">
            <div class="w-50">
              <div class="row align-items-center">
                <div class="col-12 d-flex">
                  <span class="border-bottom"><b id="admin_name_mf"></b></span>
                </div>
                <div class="col-12 d-flex">
                  <span class="text-secondary">Process by</span>
                </div>
              </div>
            </div>
            <div class="w-50">
              <div class="row align-items-center">
                <div class="col-auto">
                  <label for="total_amount" class="form-label">Total Amount:</label>
                </div>
                <div class="col-4">
                  <input type="text" class="form-control" id="total_amount_mf" readonly>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-flat btn-primary" id="print_receipt_mf" name="print_receipt_mf">Print</button>
        <button class="btn btn-flat btn-success" id="download_receipt_mf">Download</button>

      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    window.jsPDF = window.jspdf.jsPDF;
    var doc = new jsPDF();



    $("#print_receipt_mf").on('click', function() {
      // var payment_id = $("#payment_id_modal_mf").val();
      var archive_status = "ACTIVE";
      var transaction_number = $("#transactionNum_id_mf").val();
      var receipt = window.open('../payments/membership_fee_receipt.php?transactionNumber=' + transaction_number + '&archive_status=' + archive_status, '_blank', 'width=900,height=600');
      setTimeout(function() {
        receipt.print();
        setTimeout(function() {
          receipt.close();
        }, 500)
      }, 500)
    });

    $("#download_receipt_mf").on('click', function() {
      var transaction_number = $("#transaction_number_mf").html()

      // Remove tbody and thead {jsPDF BUG}
      i = 2;
      j = 2;
      var tbodies = document.getElementsByTagName('tbody');
      while (tbodies.length - 1 > i) {
        var parent = tbodies[i].parentNode;
        while (tbodies[i].firstChild) {
          parent.insertBefore(tbodies[i].firstChild, tbodies[i]);
        }
        parent.removeChild(tbodies[i]);
        i++
      }
      var tbodies = document.getElementsByTagName("thead");
      while (tbodies.length - 1 > j) {
        var parent = tbodies[j].parentNode;
        while (tbodies[j].firstChild) {
          parent.insertBefore(tbodies[j].firstChild, tbodies[j]);
        }
        parent.removeChild(tbodies[j]);
        j++
      }
      downloadReceipt();

      function downloadReceipt() {
        var receipt = document.querySelector("#membership_fee_receipt_mf")
        doc.html(receipt, {
          callback: function() {
            doc.save(transaction_number + '-Membership-Fee-Receipt.pdf');
            location.reload();
          },
          x: 10,
          y: 10,
          width: 170,
          windowWidth: 650
        })
      }

    })
  });
</script>