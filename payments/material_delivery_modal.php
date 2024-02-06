<div id="materialDeliveryModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Material Delivery</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
      </div>
      <form action="" id="material_delivery_form">
        <div class="modal-body mx-3">
          <div class="row gy-3">
            <div class="col-3">
              <div class="form-floating">
                <input type="text" id="blk_md" class="form-control" placeholder="Blk">
                <label for="blk_md">Blk</label>
              </div>
            </div>
            <div class="col-3">
              <div class="form-floating">
                <input type="text" id="lot_md" class="form-control" placeholder="Lot">
                <label for="lot_md">Lot</label>
              </div>
            </div>
            <div class="col-3">
              <div class="form-floating">
                <select class="form-select" name="phase_md" id="phase_md">
                  <option value="">- Select -</option>
                  <option value="Phase 1">Phase 1</option>
                  <option value="Phase 2">Phase 2</option>
                  <option value="Phase 3">Phase 3</option>
                </select>
                <label for="phase_md">Phase #</label>
              </div>
            </div>
            <div class="col-3">
              <div class="form-floating">
                <select name="street" id="street_md" class="form-select">
                  <option value="">- Select -</option>
                </select>
                <label for="street_md">Street</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <input type="text" id="homeowners_name_md" class="form-control" readonly>
                <label for="homeowners_name_md">Homeowner's Name</label>
              </div>
            </div>
            <div>

            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-flat btn-danger" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-flat btn-success" id="submit_payment">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    var blk
    $("#materialDeliveryModal").on('hidden.bs.modal', function(e) {
      $("#material_delivery_form").find("input[type=text]").val("");
      $("#phase_md").empty().append('<option value="">- Select -</option>');
      $("#street_md").empty().append('<option value="">- Select -</option>');
    });

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
        $("#street_md").empty().append('<option value="">- Select -</option>');
        getStreet(phase);
      } else if (phase == "Phase 2") {
        $("#street_md").empty().append('<option value="">- Select -</option>');
        getStreet(phase);
      } else if (phase == "Phase 3") {
        $("#street_md").empty().append('<option value="">- Select -</option>');
        getStreet(phase);
      } else {
        $("#street_md").empty().append('<option value="">- Select -</option>');
      }
    });

    $(document).on('keyup', '#blk_md', '#lot_md', function() {
      var blk = $("#blk_md").val();
      var lot = $("#lot_md").val();
      var phase = $("#phase_md").val();
      var street = $("#street_md").val();

      console.log(blk);
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
        }
      });
    });


  });
</script>