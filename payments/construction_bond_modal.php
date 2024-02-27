<?php
$default_date = date("Y/m/d", strtotime("now"));
$date_created = date("Y-m-d H:s:iA", strtotime("now"));
?>

<div id="constructionBondModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Construction Bond</b></h4>
        <button class="btn btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div id="form_construction_bond" class="modal-body mx-3">
        <div class="row gy-3">
          <input type="hidden" class="form-control" id="homeowners_id_cb">
          <input type="hidden" class="form-control" id="property_id_cb">
          <input type="hidden" class="form-control" id="collection_fee_id_cb">
          <div class="col-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="blk_cb" placeholder="BLK" required>
              <label for="blk_cb">BLK</label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="lot_cb" placeholder="Lot" required>
              <label for="lot_cb">Lot</label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-floating">
              <select name="phase_cb" id="phase_cb" class="form-control" required>
                <option value="" class="default_select">- Select -</option>
                <option value="Phase 1">Phase 1</option>
                <option value="Phase 2">Phase 2</option>
                <option value="Phase 3">Phase 3</option>
              </select>
              <label for="phase_cb">Phase #</label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-floating">
              <select name="street_cb" id="street_cb" class="form-control" required>
                <option value="" class="default_select">- Select -</option>
              </select>
              <label for="street_cb">Street</label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-floating">
              <input type="text" class="form-control" id="homeowners_name_cb" required readonly>
              <label for="homeowners_name_cb">Homeowners's name</label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-floating">
              <input type="text" class="form-control" id="paid_by_cb">
              <label for="paid_by_cb">Paid By</label>
            </div>
          </div>
          <div class="col-6">
            <div class="input-group">
              <div class="form-floating">
                <input type="number" class="form-control" id="sqm_cb" required>
                <label for="sqm_cb">Square Meter</label>
              </div>
              <span class="input-group-text">Sqm.</span>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating">
              <input type="number" class="form-control" id="amount_deposit_cb" required readonly>
              <label for="amount_deposit_cb">Amount</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
     
        <button class="btn btn-flat btn-success" id="add_construction_bond">Submit</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $("#constructionBondModal").on('hidden.bs.modal', function(e) {
      $("#form_construction_bond").find('input[type=text], input[type=hidden], input[type=number]').val("");
      $(".default_select").prop("selected", true);
    });

    // Get current street list
    function getStreet(phase) {
      $.ajax({
        url: '../ajax/street_fetch_select.php',
        type: 'POST',
        data: {
          phase: phase
        },
        dataType: 'JSON',
        success: function(response) {
          $.each(response, function(key, value) {
            $("#street_cb").append('<option value="' + value['street'] + '" >' + value['street'] + '</option>');
          });
        }
      });
    }
    $("#phase_cb").on('change', function() {
      var phase = $(this).val();
      if (phase == "Phase 1") {
        $("#street_cb").empty().append('<option value="">- Select -</option>');
        getStreet(phase);
      } else if (phase == "Phase 2") {
        $("#street_cb").empty().append('<option value="">- Select -</option>');
        getStreet(phase);
      } else if (phase == "Phase 3") {
        $("#street_cb").empty().append('<option value="">- Select -</option>');
        getStreet(phase);
      } else {
        $("#street_cb").empty().append('<option value="">- Select -</option>');
      }
    });


    // Get the owners name
    $('#phase_cb, #street_cb, #blk_cb, #lot_cb').bind('change keyup', function() {
      var blk = $("#blk_cb").val();
      var lot = $("#lot_cb").val();
      var phase = $("#phase_cb").val();
      var street = $("#street_cb").val();
      if (blk.length > 0 && lot.length > 0 && phase.length > 0 && street.length > 0) {
        $.ajax({
          url: '../ajax/material_delivery_get_property.php',
          type: 'POST',
          data: {
            blk: blk,
            lot: lot,
            phase: phase,
            street: street
          },
          dataType: 'JSON',
          success: function(response) {
            $("#homeowners_name_cb").val(response.name);
            $("#homeowners_id_cb").val(response.homeowners_id);
            $("#property_id_cb").val(response.property_id);
          }
        });
      }
    });


    // Amount
    $("#sqm_cb").bind('keyup change', function() {
      var sqm_cb = $("#sqm_cb").val();
      constructionBondFee(sqm_cb);

      function constructionBondFee(sqm_cb) {
        $.ajax({
          url: '../ajax/construction_bond_get_fee.php',
          type: 'POST',
          data: {
            sqm_cb: sqm_cb
          },
          dataType: 'JSON',
          success: function(response) {
            $("#amount_deposit_cb").val(response.fee);
            $("#collection_fee_id_cb").val(response.collection_fee_id);
          }
        });
      }
    });

    // Add Payment
    $("#add_construction_bond").on('click', function() {

      var property_id = $("#property_id_cb").val();
      var collection_fee_id = $("#collection_fee_id_cb").val();
      var paid_by = $("#paid_by_cb").val();
      var amount_deposit = $("#amount_deposit_cb").val();

      if (paid_by.length > 0){

      } else {
        $paid_by = $("#homeowners_name_cb").val();
      }
      
      swal({
          title: 'Payment Confirmation',
          text: 'Are you sure you want to add this payment?',
          icon: 'warning',
          buttons: true,
          dangerMode: true
        })
        .then((proceed) => {
          if (proceed) {
            $.ajax({
              url: '../payments/construction_bond_add_payment.php',
              type: 'POST',
              data: {
                property_id: property_id,
                collection_fee_id: collection_fee_id,
                paid_by: paid_by,
                amount_deposit: amount_deposit
              },
              success: function (response){
                var transaction_number = response;
                var print_receipt_cb = window.open('../payments/construction_bond_receipt.php?transaction_number_md=' + transaction_number + '&property_id_receipt=' + property_id, '_blank', 'width=900,height=600');
                setTimeout(function (){
                  print_receipt_cb.print();
                  setTimeout(function (){
                    print_receipt_cb.close();
                    location.reload(true);
                  }, 500)
                }, 500)
              }
            })
          } else {
            swal("Canceled");
          }
        })

    });


  });
</script>