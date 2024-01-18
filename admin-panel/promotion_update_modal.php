<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
  $default_date = date("Y/m/d g:i A", strtotime("now")); 
   ?>



<!-- Modal Promotion -->
<div id="promotionUpdate" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><b>Update Promotion</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
      </div>

      <div class="modal-body mx-3">
        <form action="promotion_update.php" method="POST" id="update_promotion_form" enctype="multipart/form-data">
          <div class="row gy-3">
            <input type="hidden" class="form-control" name="promotion_id" id="promotion_id" required>

            <div class="col-md-6">
              <label for="update_business_name" class="form-label">Business Name:</label>
              <input type="text" name="update_business_name" id="update_business_name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="update_promotion_due" class="form-label">Promotion Due:</label>
              <input name="update_promotion_due" id="update_promotion_due"  class="form-control" required>
            </div>
            <!-- <div class="col-md-6">
              <label for="update_promotion_photo" class="form-label">Photo:</label>
              <input type="file" id="update_promotion_photo" name="update_promotion_photo" class="form-control">
            </div> -->
            <div class="col-md-12">
              <label for="promotion_status" class="form-label">Status:</label>
              <select name="promotion_status" id="promotion_status" class="form-select" required>
                <option id="promotion_status_default" value="">- SELECT -</option>
                <option value="ACTIVE">ACTIVE</option>
                <option value="INACTIVE">INACTIVE</option>
              </select>
            </div>
            <div class="col">
              <label for="update_promotion_content" class="form-label">Content:</label>
              <textarea name="update_promotion_content" id="update_promotion_content" rows="10"  wrap="hard"  class="form-control" required></textarea>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-flat pull left" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="update_promotion" id="update_promotion">Update</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

</div>

<script>
  $(document).ready(function() {
    $("#promotionUpdate").on('hidden.bs.modal',function(e){
      $("#update_promotion_form").find('input[type=text], input[type=file], textarea').val("");
      $("#promotion_status_default").prop('selected', true);
    });

    $("#update_promotion_due").daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      autoApply: true,
      timePicker: true,
      locale: {
        format: 'YYYY/MM/DD hh:mm A'
      }
    });
  });
</script>