<?php
$default_date = date("Y/m/d", strtotime("now"));
$date_created = date("Y-m-d H:s:iA", strtotime("now"));
?>

<div id="constructionClearanceModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Construction Clearance</b></h4>
        <button class="btn btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div id="form_construction_clearance" class="modal-body mx-3">
        <div class="row gy-3">
          <input type="hidden" class="form-control" id="homeowners_id_cc">
          <input type="hidden" class="form-control" id="property_id_cc">
          <input type="hidden" class="form-control" id="collection_fee_id_cc">
          <div class="col-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="blk_cc" placeholder="BLK" required>
              <label for="blk_cc">BLK</label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="lot_cc" placeholder="Lot" required>
              <label for="lot_cc">Lot</label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-floating">
              <select name="phase_cc" id="phase_cc" class="form-control" required>
                <option value="" class="default_select">- Select -</option>
                <option value="Phase 1">Phase 1</option>
                <option value="Phase 2">Phase 2</option>
                <option value="Phase 3">Phase 3</option>
              </select>
              <label for="phase_cc">Phase #</label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-floating">
              <select name="street_cc" id="street_cc" class="form-control" required>
                <option value="" class="default_select">- Select -</option>
              </select>
              <label for="street_cc">Street</label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-floating">
              <input type="text" class="form-control" id="homeowners_name_cc" required readonly>
              <label for="homeowners_name_cc">Homeowners's name</label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-floating">
              <input type="text" class="form-control" id="paid_by_cc">
              <label for="paid_by_cc">Paid By</label>
            </div>
          </div>

          <div class="col-6">
            <div class="form-floating">
              <input type="number" class="form-control" id="amount_cc" required readonly>
              <label for="amount_cc">Amount</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-flat btn-danger" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-flat btn-success" id="add_construction_clearance">Submit</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $("#constructionClearanceModal").on('hidden.bs.modal', function(e) {
      $("#form_construction_clearance").find('input[type=text], input[type=hidden], input[type=number]').val("");
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
            $("#street_cc").append('<option value="' + value['street'] + '" >' + value['street'] + '</option>');
          });
        }
      });
    }
    $("#phase_cc").on('change', function() {
      var phase = $(this).val();
      if (phase == "Phase 1") {
        $("#street_cc").empty().append('<option value="">- Select -</option>');
        getStreet(phase);
      } else if (phase == "Phase 2") {
        $("#street_cc").empty().append('<option value="">- Select -</option>');
        getStreet(phase);
      } else if (phase == "Phase 3") {
        $("#street_cc").empty().append('<option value="">- Select -</option>');
        getStreet(phase);
      } else {
        $("#street_cc").empty().append('<option value="">- Select -</option>');
      }
    });


    // Get the owners name
    $('#phase_cc, #street_cc, #blk_cc, #lot_cc').bind('change keyup', function() {
      var blk = $("#blk_cc").val();
      var lot = $("#lot_cc").val();
      var phase = $("#phase_cc").val();
      var street = $("#street_cc").val();
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
            $("#homeowners_name_cc").val(response.name);
            $("#homeowners_id_cc").val(response.homeowners_id);
            $("#property_id_cc").val(response.property_id);
          }
        });
      }
    });

    $("#add_construction_clearance").click('click', function() {
      var property_id = $("#property_id_cc").val();
      var collection_fee_id = $("#collection_fee_id_cc").val();
      var paid_by = $("#paid_by_cc").val();

      var amount = $("#amount_cc").val();

      if (paid_by.length > 0) {

      } else {
        paid_by = $("#homeowners_name_cc").val();
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
              url: '../payments/construction_clearance_add_payment.php',
              type: 'POST',
              data: {
                property_id: property_id,
                collection_fee_id: collection_fee_id,
                paid_by: paid_by,
                amount: amount
              },
              success: function(response) {

                var transaction_number = response
                var property_id_ = $("#property_id_cc").val();
                var receipt = window.open('../payments/construction_clearance_receipt.php?transaction_number_md=' + transaction_number + '&property_id_receipt=' + property_id_, '_blank', 'width=900,height=600');
                setTimeout(function() {
                  receipt.print();
                  setTimeout(function() {
                    receipt.close();
                  }, 500)
                }, 500)
              }
            })
          } else {
            swal('Canceled');
          }
        })
    });


  })
</script>