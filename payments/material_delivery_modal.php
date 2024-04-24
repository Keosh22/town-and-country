<?php
$default_date = date("Y/m/d", strtotime("now"));
$date_created = date("Y-m-d H:s:iA", strtotime("now"));
?>
<div id="materialDeliveryModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Material Delivery</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
      </div>
      <div id="material_delivery_form">
        <div class="modal-body mx-3">
          <div class="row gy-3">
            <input type="hidden" class="form-control" id="homeowners_id_md" name="homeowners_id_md" required>
            <input type="hidden" class="form-control" id="property_id_md" name="property_id_md" required>
            <input type="hidden" class="form-control" id="collection_fee_id_md" name="collection_fee_id_md" required>

            <div class="col-3">
              <div class="form-floating">
                <input type="text" id="blk_md" name="blk_md" class="form-control" placeholder="Blk" required>
                <label for="blk_md">Blk</label>
              </div>
            </div>
            <div class="col-3">
              <div class="form-floating">
                <input type="text" id="lot_md" name="lot_md" class="form-control" placeholder="Lot" required>
                <label for="lot_md">Lot</label>
              </div>
            </div>
            <div class="col-3">
              <div class="form-floating">
                <select class="form-select" name="phase_md" id="phase_md" required>
                  <option value="" class="default_select"></option>
                  <option value="Phase 1">Phase 1</option>
                  <option value="Phase 2">Phase 2</option>
                  <option value="Phase 3">Phase 3</option>
                </select>
                <label for="phase_md">Phase #</label>
              </div>
            </div>
            <div class="col-3">
              <div class="form-floating">
                <select name="street_md" id="street_md" class="form-select" required>
                  <option value="" class="default_select"></option>
                </select>
                <label for="street_md">Street</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <input type="text" id="homeowners_name_md" name="homeowners_name_md" class="form-control" readonly>
                <label for="homeowners_name_md">Homeowner's Name</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="paid_by_md" placeholder="Paid by">
                <label for="paid_by_md" class="text-secondary">Paid By: (Optional)</label>
              </div>
            </div>
            <div class="col-4">
              <div class="form-floating">
                <select name="wheelers" id="wheelers" class="form-select" required>
                  <option value="" class="default_select"></option>
                  <option value="C004">6 Wheelers</option>
                  <option value="C005">10 Wheelers</option>
                  <option value="C006">12+ Wheelers</option>
                </select>
                <label for="wheelers">Vehicle Type</label>
              </div>
            </div>
            <div class="col-4">
              <div class="form-floating">
                <input type="text" class="form-control" name="amount_md" id="amount_md" required readonly>
                <label for="amount_md">Amount:</label>
              </div>
            </div>
            <div class="col-4">
              <div class="form-floating">
                <input class="form-control" name="delivery_date_md" id="delivery_date_md" value="<?php echo $default_date; ?>">
                <label for="delivery_date_md">Delivery Date:</label>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">

          <button class="btn btn-flat btn-success" id="submit_payment_md">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    // Clear inputs when close
    $("#materialDeliveryModal").on('hidden.bs.modal', function(e) {
      $("#material_delivery_form").find("input[type=text], input[type=hidden]").val("");
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
            $("#street_md").append('<option value="' + value['street'] + '" >' + value['street'] + '</option>');
          });
        }
      });
    }
    $("#phase_md").on('change', function() {
      var phase = $(this).val();
      if (phase == "Phase 1") {
        $("#street_md").empty().append('<option value=""></option>');
        getStreet(phase);
      } else if (phase == "Phase 2") {
        $("#street_md").empty().append('<option value=""></option>');
        getStreet(phase);
      } else if (phase == "Phase 3") {
        $("#street_md").empty().append('<option value=""></option>');
        getStreet(phase);
      } else {
        $("#street_md").empty().append('<option value=""></option>');
      }
    });

    // Get the owners name
    $('#phase_md, #street_md, #blk_md, #lot_md').bind('change keyup', function() {
      var blk = $("#blk_md").val();
      var lot = $("#lot_md").val();
      var phase = $("#phase_md").val();
      var street = $("#street_md").val();
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
            $("#homeowners_name_md").val(response.name);
            $("#homeowners_id_md").val(response.homeowners_id);
            $("#property_id_md").val(response.property_id);
          }
        });
      }
    });

    // Amount
    $("#wheelers").on('change', function() {
      var wheelers = $("#wheelers").val();
      materialDeliveryFee(wheelers);

      function materialDeliveryFee(wheelers) {
        $.ajax({
          url: '../ajax/material_delivery_get_fee.php',
          type: 'POST',
          data: {
            wheelers: wheelers
          },
          dataType: 'JSON',
          success: function(response) {
            $("#amount_md").val(response.fee);
            $("#collection_fee_id_md").val(response.collection_fee_id);
          }
        });
      }
    });


    // Add Material Delivery Payment
    $("#submit_payment_md").on('click', function() {
      var property_id = $("#property_id_md").val();
      var collection_fee_id = $("#collection_fee_id_md").val();
      var amount = $("#amount_md").val();
      var delivery_date = $("#delivery_date_md").val();
      var paid_by = $("#paid_by_md").val();

      if (paid_by.length > 0) {

      } else {
        paid_by = $("#homeowners_name_md").val();
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
              url: '../payments/material_delivery_add_payment.php',
              type: 'POST',
              data: {
                property_id: property_id,
                collection_fee_id: collection_fee_id,
                amount: amount,
                delivery_date: delivery_date,
                paid_by: paid_by
              },
              dataType: 'JSON',
              success: function(response) {
                if (response.isSuccess) {
                  if (response.isSuccess) {
                    var transaction_number_md = response.transaction_number;
                    var material_delivery_receipt = window.open('../payments/material_delivery_receipt.php?transaction_number_md=' + transaction_number_md + '&property_id_receipt=' + property_id, '_blank', 'width=900, height=600');
                    setTimeout(function() {
                      material_delivery_receipt.print();
                      setTimeout(function() {
                        material_delivery_receipt.close();
                        location.reload();
                      }, 500);
                    }, 500)
                  } else {
                    location.reload();
                  }
                } else {
                  location.reload();
                }




              }
            });

          } else {
            swal("Canceled")
          }
        })
    })

    // Delivery date
    $("#delivery_date_md").daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      autoApply: true,
      locale: {
        format: 'YYYY/MM/DD'
      }
    });

  });
</script>