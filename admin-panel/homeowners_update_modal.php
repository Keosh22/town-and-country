<?php
require_once("../libs/server.php");
?>

<?php

?>



<!-- Modal Homeowners Regsitration -->
<div id="updateHomeowners" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><b>Update Homeowners Account</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
      </div>

      <div class="modal-body mx-3">
        <form action="homeownersUpdate.php" method="POST" id="update_homeowners">
          <input type="hidden" name="homeowners_id" id="homeowners_id">
          <div class="row gy-3">
            <p class="fs-5 text-secondary divider personal-info mt-3 mb-0">Personal Information</p>



            <div class="col-md-5">
              <label for="firstname" class="form-label ">Firstname</label>
              <input type="text" class="form-control" id="firstname_update" name="firstname_update" required>
            </div>
            <div class="col-md-5">
              <label for="lastname" class="form-label ">Lastname</label>
              <input type="text" class="form-control" id="lastname_update" name="lastname_update" required>
            </div>
            <div class="col-md-2">
              <label for="middle_initial" class="form-label ">M.I.</label>
              <input type="text" class="form-control" id="middle_initial_update" name="middle_initial_update" required>
            </div>


            <div class="col-md-6">
              <label for="email" class="form-label ">Email</label>
              <input type="text" class="form-control" id="email_update" name="email_update" required>
            </div>
            <div class="col-md-6">
              <label for="phone_number" class="form-label ">Phone Number</label>
              <input type="text" class="form-control" id="phone_number_update" name="phone_number_update" required>
              <div id='phoneNumberUpdateHelpBlock'></div>
            </div>
            <div class="col-12">
              <select name="position" id="position" class="form-select" required>
                <option class="default_select" value="">- Select -</option>
                <option value="President">President</option>
                <option value="Vice-President">Vice-President</option>
                <option value="President">Secretary</option>
                <option value="President">Treasurer</option>
              </select>
              <label for="position">Position:</label>
            </div>

            <!-- <div class="col-12">
              <label for="status" class="form-label ">Status</label>
              <select name="status_update" id="status_update" class="form-select" required>
                <option  id="status_option_update"></option>
                <option value="Member">Member</option>
                <option value="Non-member">Non-member</option>
                <option value="Tenant">Tenant</option>
              </select>
            </div> -->


            <div class="col-12" id="propertyCard_update">
              <div class="card card-body shadow-sm">
                <div class="col-12">
                  <p class="text-danger">Current Address</p>
                </div>
                <div id="propertyContainer_update">
                  <div class="row">
                    <div class="col-2">
                      <label for="blk" class="form-label ">Blk#</label>
                      <input type="text" class="form-control " id="blk_update" name="blk_update" required>
                    </div>
                    <div class="col-2">
                      <label for="lot" class="form-label ">Lot#</label>
                      <input type="text" class="form-control" id="lot_update" name="lot_update" required>
                    </div>
                    <div class="col-4">
                      <label for="phase" class="form-label ">Phase#</label>
                      <select name="phase_update" id="phase_update" class="form-select" required>
                        <option class="default_select" id="phase_option_update" selected>- Select -</option>
                        <option value="Phase 1">Phase 1</option>
                        <option value="Phase 2">Phase 2</option>
                        <option value="Phase 3">Phase 3</option>
                      </select>
                    </div>
                    <div class="col-4">
                      <label for="street" class="form-label ">Street</label>
                      <select name="street_update" id="street_update" class="form-select" required>
                        <option class="default_select" id="street_option_update">- Select -</option>
                        <!-- <option></option>
                        <option>Jackfruit</option>
                        <option>Golden Shower</option> -->
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-flat pull left" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="update_btn" class="update" id="update_btn">Update</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

</div>

<script>
  $(document).ready(function() {
    // Clear input when close
    $("#updateHomeowners").on('hidden.bs.modal', function(e) {
      $("#update_homeowners").find("input[type=text], input[type=password], input[type=hidden] ").val("");
      $("#street_update").empty().append('<option id="street_option_update" selected>- Select -</option>');

      $(".default_select").prop('selected', true);
      $("#register_property_form").find('input[type=text]').val("");



      $("#phone_number_update").prop('disabled', false);
      $("#phone_number_update").removeClass("input-success");
      $("#phone_number_update").removeClass("input-danger");
      $("#phoneNumberUpdateHelpBlock").empty().append("<div id='phoneNumberUpdateHelpBlock'></div>");

    });







    // Status on changed
    // $("#status_update").on('change', function() {
    //   var status = $("#status_update").val();
    // });


    // Phone Number validation
    $("#phone_number_update").on('keyup', function() {
      var phone_number = $(this).val().trim();
      var number = /([0-9])/;

      if (phone_number.match(number) && phone_number.length == 11) {
        $("#phone_number_update").removeClass("input-danger");
        $("#phone_number_update").addClass("input-success");
        $("#phoneNumberUpdateHelpBlock").empty().append("<div id='phoneNumberUpdateHelpBlock' class='form-text text-success'>Valid phone number</div>");
        $("#update_btn").prop('disabled', false);
      } else {
        $("#phone_number_update").removeClass("input-success");
        $("#phone_number_update").addClass("input-danger");
        $("#phoneNumberUpdateHelpBlock").empty().append("<div id='phoneNumberUpdateHelpBlock' class='form-text text-danger'>Invalid phone number</div>");
        $("#update_btn").prop('disabled', true);
      }

    });




    // Fetch street to Combo box (select)
    $("#phase_update").on('change', function() {
      var phase = $(this).val();
      if (phase == "Phase 1") {
        $("#street_update").empty().append('<option>- Select -</option>');
        getStreet(phase);

      } else if (phase == "Phase 2") {
        $("#street_update").empty().append('<option>- Select -</option>');
        getStreet(phase);
      } else if (phase == "Phase 3") {
        $("#street_update").empty().append('<option>- Select -</option>');
        getStreet(phase);
      } else {
        $("#street_update").empty().append('<option>- Select -</option>');
      }
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
            $("#street_update").append(' <option>' + value['street'] + '</option>');
          })
        }
      });
    }


  });
</script>