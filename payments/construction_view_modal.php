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
        <div id="hidden_input">
          <input type="hidden" name="property_id_receipt" id="property_id_receipt">
          <input type="hidden" name="transaction_number_md" id="transaction_number_md">
          <input type="hidden" name="collection_fee_number" id="collection_fee_number">
        </div>
        <!-- RECEIPT FORMAT -->

        <div class="receipt-wrapper" id="construction_receipt">
          <h2 class="text-center title-receipt"><b>Payment Receipt</b></h2>
          <h5 class="text-center title-receipt m-0">Town And Country Heights Homeowners' ASSN. INC.</h5>
          <p class="text-center title-receipt text-secondary mb-1">Clubhouse 1 La Salle Avenue, Town & Country Heights San Luis, Antipolo City</p>
          <div class="divider-receipt"></div>
          <div class="flex">
            <div class="w-50">
              <h5 class="details-title text-secondary">Homeowners Details</h5>
              <p class="m-0">Account Number: <b id="account_number"></b></p>
              <p class="m-0">Name: <b id="name"></b></p>

            </div>
            <div class="w-50">
              <h5 class="details-title text-secondary">Payment Details</h5>
              <p class="m-0">Transaction Number: <b id="transaction_number"></b></p>
              <p class="m-0">Date Paid: <b id="date_paid"></b></p>
              <p class="m-0">Paid By: <b id="paid_by"></b></p>
            </div>
          </div>
          <div class="divider-receipt"></div>
          <h5 class="text-secondary">Payment Summary:</h5>
          <table class="table">
            <thead id="table_header">

            <tbody class="table_result">


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
                  <input type="text" class="form-control" id="total_amount">
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

    $("#construction_view").on('hidden.bs.modal', function(e) {
      $("#hidden_input").find('input[type=hidden]').val("");
    });

    $("#print_receipt").on('click', function() {
      var collection_fee_number = $("#collection_fee_number").val();

      // Print Material Delivery Receipt
      if (collection_fee_number === "C004" || collection_fee_number === "C005" || collection_fee_number === "C006") {
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

        // Print Construction Bond Receipt
      } else if (collection_fee_number === "C002") {
        var archive_status = "ACTIVE";
        var transaction_number_md = $("#transaction_number_md").val();
        var property_id_receipt = $("#property_id_receipt").val();
        var receipt = window.open('../payments/construction_bond_receipt.php?transaction_number_md=' + transaction_number_md + '&property_id_receipt=' + property_id_receipt, '_blank', 'width=900,height=600');
        setTimeout(function() {
          receipt.print();
          setTimeout(function() {
            receipt.close();
          }, 500)
        }, 500)
      } else if (collection_fee_number === "C003") {
        var archive_status = "ACTIVE";
        var transaction_number_md = $("#transaction_number_md").val();
        var property_id_receipt = $("#property_id_receipt").val();
        var receipt = window.open('../payments/construction_clearance_receipt.php?transaction_number_md=' + transaction_number_md + '&property_id_receipt=' + property_id_receipt, '_blank', 'width=900,height=600');
        setTimeout(function() {
          receipt.print();
          setTimeout(function() {
            receipt.close();
          }, 500)
        }, 500)
      }
    });


    // Download File
    $("#download_receipt").on('click', function (){
      var transaction_number = $("#transaction_number").html();

      i = 1
      j = 1
      var tbodies = document.getElementsByTagName("tbody");
      while(tbodies.length - 1 > i){
        var parent = tbodies[i].parentNode;
        while(tbodies[i].firstChild){
          parent.insertBefore(tbodies[i].firstChild, tbodies[i])
        }
        parent.removeChild(tbodies[i]);
        i++
      }
      var tbodies = document.getElementsByTagName("thead");
      while(tbodies.length - 1 > j){
        var parent = tbodies[j].parentNode;
        while(tbodies[j].firstChild){
          parent.insertBefore(tbodies[j].firstChild, tbodies[j])
        }
        parent.removeChild(tbodies[j])
        j++
      }

      var receipt = document.querySelector("#construction_receipt");
      doc.html( receipt, {
        callback: function (){
          doc.save(transaction_number + "-Construction-Receipt.pdf")
          location.reload();
        },
        x: 10,
        y: 10,
        width: 170,
        windowWidth: 650
      })

    });

  });
</script>