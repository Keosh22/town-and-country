<?php
// Server
require_once("../libs/server.php");
?>

<?php
$server = new Server;





?>

<!-- Add -->
<div class="modal fade" id="updateStreet">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Update Street</b></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body mx-3">
        <!-- Form -->

        <form method="POST" action="street_update_modal.php" id="phase_form">



          <div class="row gy-3">
            <p class="fs-5 text-secondary divider personal-info mt-3 mb-0">Street</p>


            <!-- <div class="col-1 d-flex align-items-end">
                  <a class="fs-5 text-success" role="button"><i class='add_property fs-3 bx bxs-plus-circle bx-tada-hover'></i></a>
                </div> -->
            <input type="text" id="street_id" name="street_id">
            <div class="col-12">
              <label for="phase" class="form-label">Phase:</label>
              <input type="text" 
              value="" 
              id="phase_update" name="phase_update" class="form-control">
            </div>
            <div class="col-12">
              <label for="street" class="form-label">Street name:</label>
              <input type="text" id="street_update" name="street_update" class="form-control" required>
            </div>
          </div>





          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-flat pull-left" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" name="add" class="add" id="add">Add</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    
    $("#updateStreet").on('hidden.bs.modal', function(e) {
      $("#phase_form").find("input[type=text]").val("");
    });

    // $("#updateStreet").on('show.bs.modal', function(e){
      
      
     
    //   })
    });
   
    




</script>