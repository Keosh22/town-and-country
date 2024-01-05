<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
  $default_date = date("Y/m/d g:i A", strtotime("now")); 
   ?>



<!-- Modal Promotion -->
<div id="promotionCreate" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><b>Create Promotion</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
      </div>

      <div class="modal-body mx-3">
        <form action="" method="POST" id="create_promotion_form">
          <div class="row gy-3">
            <div class="col-md-6">
              <label for="business_name" class="form-label">Business Name:</label>
              <input type="text" name="business_name" id="business_name" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="promotion_due" class="form-label">Promotion Due:</label>
              <input value="<?php echo $default_date; ?>"  name="promotion_due" id="announcement_date" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="promotion_photo" class="form-label">Photo:</label>
              <input type="file" id="promotion_photo" name="promotion_photo" class="form-control">
            </div>
            <div class="col-md-6">

            </div>
            <div class="col">
              <label for="promotion_content" class="form-label">Content:</label>
              <textarea name="promotion_content" id="promotion_content" rows="10"  wrap="hard"  class="form-control"></textarea>
            </div>




            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-flat pull left" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="create_promotion" class="create_promotion" id="create_promotion">Create</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

</div>

<script>
  $(document).ready(function() {
    $("#promotionCreate").on('hidded.bs.modal',function(e){
      $("#create_promotion_form").find('input=[type=text]').val("");
    });

    $("#promotion_due").daterangepicker({
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