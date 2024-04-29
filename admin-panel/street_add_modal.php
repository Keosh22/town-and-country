<?php
// Server
require_once("../libs/server.php");
?>

<?php


?>

<!-- Add -->
<div class="modal fade" id="addStreet">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Add Street</b></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body mx-3">
        <!-- Form -->

        <form method="POST" action="street_add.php" id="form_input">



          <div class="row gy-3">
            <p class="fs-5 text-secondary divider personal-info mt-3 mb-0">Street</p>


            <!-- <div class="col-1 d-flex align-items-end">
                  <a class="fs-5 text-success" role="button"><i class='add_property fs-3 bx bxs-plus-circle bx-tada-hover'></i></a>
                </div> -->
            <div class="col-12">
              <label for="phase" class="form-label">Phase:</label>
              <select name="phase" id="phase" class="form-select" required>
                <option></option>
                <option value="Phase 1">Phase 1</option>
                <option value="Phase 2">Phase 2</option>
                <option value="Phase 3">Phase 3</option>
              </select>
            </div>
            <div class="col-12">
              <label for="street" class="form-label">Street name:</label>
              <input type="text" id="street" name="street" class="form-control" maxlength="35" required>
            </div>
          </div>





          <div class="modal-footer">
        
            <button type="submit" class="btn btn-primary btn-flat" name="add" class="add" id="add">Add</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>


<script>
  $(document).ready(function() {



    $("#addStreet").on('hidden.bs.modal', function() {

      $("#form_input").find("input[type=text], select[id=phase]").val("");


    });







  });
</script>