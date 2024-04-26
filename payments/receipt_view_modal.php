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
        <input type="hidden" name="payment_id_modal" id="payment_id_modal">
        <input type="hidden" name="transactionNum_id_modal" id="transactionNum_id_modal">

        <!-- RECEIPT FORMAT -->

        <div class="receipt-wrapper" id="monthly_dues_receipt">

          <h2 class="text-center title-receipt"><b>Payment Receipt</b></h2>
          <h5 class="text-center title-receipt m-0">Town And Country Heights Homeowners' ASSN. INC.</h5>
          <p class="text-center title-receipt text-secondary mb-1">Clubhouse 1 La Salle Avenue, Town & Country Heights San Luis, Antipolo City</p>
          <div class="divider-receipt"></div>
          <div class="flex">
            <div class="w-50">
              <h5 class="details-title text-secondary">Homeowners Details</h5>
              <p class="m-0">Account Number: <b id="account_number"></b></p>
              <p class="m-0">Name: <b id="name"></b></p>
              <p class="m-0">Current Address: <b id="current_address"></b></p>
            </div>
            <div class="w-50">
              <h5 class="details-title text-secondary">Payment Details</h5>
              <p class="m-0">Transaction Number: <b id="transaction_number"></b></p>
              <p class="m-0">Date Paid: <b id="date_paid"></b></p>
              <p class="m-0">Paid by: <b id="paid_by"></b></p>
              <p class="m-0">Remarks: <b id="remarks"></b></p>
            </div>
          </div>
          <div class="divider-receipt"></div>
          <h5 class="text-secondary">Payment Summary:</h5>
          <table class="table">
            <thead id="thead_id">
              <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" width="20%">Category</th>
                <th scope="col" width="5%">Amount</th>
                <th scope="col" width="60%">Details</th>

              </tr>
            </thead>
            <tbody class="table_result" id="tbody_id">


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
        <button class="btn btn-flat btn-primary" id="print_receipt" name="print_receipt">Print</button>
        <button class="btn btn-flat btn-success" id="download_receipt">Download</button>
      
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    window.jsPDF = window.jspdf.jsPDF;
    var doc = new jsPDF();


    $("#print_receipt").on('click', function() {
      // var payment_id = $("#payment_id_modal").val();
      var transaction_number = $("#transactionNum_id_modal").val();
      var archive_status = "ACTIVE";
      var receipt = window.open('../admin-panel/receipt_monthly_dues.php?transactionNumber=' + transaction_number + '&archive_status=' + archive_status, '_blank', 'width=900,height=600');
      setTimeout(function() {
        receipt.print();
        setTimeout(function() {
          receipt.close();
        }, 500)
      }, 500)
    });


    $("#download_receipt").on('click', function() {
      var transaction_number = $("#transaction_number").html();

      i = 1
      var tbodies = document.getElementsByTagName("tbody");
      while (tbodies.length - 1 == i) {
        var parent = tbodies[i].parentNode;
        while (tbodies[i].firstChild) {
          parent.insertBefore(tbodies[i].firstChild, tbodies[i]);
        }
        parent.removeChild(tbodies[i]);
        i++
      }

      j = 1
      var tbodies = document.getElementsByTagName("thead");
      while (tbodies.length - 1 == j) {
        var parent = tbodies[j].parentNode;
        while (tbodies[j].firstChild) {
          parent.insertBefore(tbodies[j].firstChild, tbodies[j]);
        }
        parent.removeChild(tbodies[j]);
        j++
      }


      downloadReceipt()

      function downloadReceipt() {

        var receipt = document.querySelector("#monthly_dues_receipt")
        doc.html(receipt, {
          callback: function() {
            doc.save(transaction_number + "-Monthly-Dues-Receipt.pdf")
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