<?php
// Server
require_once("../libs/server.php");
?>

<?php
$server = new Server;


?>

<!-- Add -->
<div class="modal fade" id="updateProperty">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Update Property</b></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body mx-3">
        <!-- Form -->

        <form method="POST" action="property_update.php" id="update_property_form">



          <div class="row gy-3" id="propertyContainer">
            <p class="fs-5 text-secondary divider personal-info mt-3 mb-0">Property Address</p>

            <input type="hidden" id="homeowners_update_id" name="homeowners_update_id">
            <input type="hidden" id="property_id" name="property_id">
            <!-- <div class="col-1 d-flex align-items-end">
                  <a class="fs-5 text-success" role="button"><i class='add_property fs-3 bx bxs-plus-circle bx-tada-hover'></i></a>
                </div> -->
            <div class="col-2">
              <label for="blk" class="form-label">Blk#</label>
              <input type="text" class="form-control" id="blk_property" name="blk_property" required>
            </div>
            <div class="col-2">
              <label for="lot" class="form-label">Lot#</label>
              <input type="text" class="form-control" id="lot_property" name="lot_property" required>
            </div>
            <div class="col-4">
              <label for="phase" class="form-label">Phase#</label>
              <select name="phase_property" id="phase_property" class="form-select" required>
                <option class="default_select" id="default_phase_property" selected>- Select -</option>
                <option value="Phase 1">Phase 1</option>
                <option value="Phase 2">Phase 2</option>
                <option value="Phase 3">Phase 3</option>
              </select>
            </div>
            <div class="col-4">
              <label for="street" class="form-label">Street</label>
              <select name="street_property" id="street_property" class="form-select" required>
                <option id="default_street_property" selected>- Select -</option>

              </select>
            </div>

          </div>





          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-flat pull-left" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" name="update_property_modal" class="update_property_modal" id="update_property_modal">Update</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>


<script>
  $(document).ready(function() {

    $("#updateProperty").on('hidden.bs.modal', function(e) {
      $("#street_property").empty().append('<option id="default_street_property" selected>- Select -</option>');
      $(".default_select").prop('selected', true);
      $("#update_property_form").find('input[type=text]').val("");
    });


    // ajax function get street
    function getStreet(phase) {
      $.ajax({
        url: '../ajax/street_fetch_select.php',
        method: 'POST',
        data: {
          phase: phase
        },
        dataType: 'JSON',
        success: function(response) {
          $.each(response, function(key, value) {
            $("#street_property").append(' <option>' + value['street'] + '</option>');
          })
        }
      });
    }

    // Fetch street to Combo box (select)
    $("#phase_property").on('change', function() {
      var phase = $(this).val();
      if (phase == "Phase 1") {
        $("#street_property").empty().append('<option selected>- Select -</option>');
        getStreet(phase);

      } else if (phase == "Phase 2") {
        $("#street_property").empty().append('<option selected>- Select -</option>');
        getStreet(phase);
      } else if (phase == "Phase 3") {
        $("#street_property").empty().append('<option selected>- Select -</option>');
        getStreet(phase);
      } else {
        $("#street_property").empty().append('<option selected>- Select -</option>');
      }
    });



    // $("#update_property_modal").on('click', function() {
    //   // var homeowners_id = $("#homeowners_id");
    //   var property_id = $("#property_id").val();
    //   var blk_property = $("#blk_property").val();
    //   var lot_property = $("#lot_property").val();
    //   var phase_property = $("#phase_property").val();
    //   var street_property = $("#street_property").val();
    //   console.log(property_id);

    //   $.ajax({
    //     url: '../ajax/property_update_ajax.php',
    //     method: 'POST',
    //     data: {
    //       homeowners_id: homeowners_id,
    //       property_id: property_id,
    //       blk_property: blk_property,
    //       lot_property: lot_property,
    //       phase_property: phase_property,
    //       street_property: street_property,
    //       success: function(data) {

    //       }
    //     }
    //   });
    //   location.reload();
    // });


    // $("#add").on('click', function() {

    //   var homeowners_id = $("#homeowners_id").val();
    //   var blk = $("#blk").val();
    //   var lot = $("#lot").val();
    //   var phase = $("#phase").val();
    //   var street = $("#street").val();

    //   $.ajax({
    //     url: '../ajax/property_register_ajax.php',
    //     type: 'POST',
    //     data: {
    //       homeowners_id: homeowners_id,
    //       blk: blk,
    //       lot: lot,
    //       phase: phase,
    //       street: street
    //     },
    //     success: function(data) {


    //     }
    //   });
    //   location.reload();
    // })

  });
</script>