<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$default_date = date("Y/m/d ", strtotime("now"));
?>



<!-- Modal Promotion -->
<div id="promotionRequest" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><b>Create Promotion</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
      </div>

      <div class="modal-body mx-3">
        <form action="request_promotion.php" method="POST" id="request_promotion_form" enctype="multipart/form-data">
          <div class="row gy-3">
            <div class="col-md-6">
              <label for="business_name" class="form-label">Business Name:</label>
              <input type="text" name="business_name" id="business_name" class="form-control" placeholder="max: 35 characters" maxlength="35" required>
            </div>
            <div class="col-md-6">
              <label for="promotion_due" class="form-label">Promotion Due:</label>
              <input value="<?php echo $default_date; ?>" name="promotion_due" id="promotion_due" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="promotion_photo" class="form-label">Photo: <span class="text-secondary">jpeg/png format (max: 25MB)</span></label>
              <input type="file" id="promotion_photo" name="promotion_photo" class="form-control" accept="image/jpeg, image/png" required>
            </div>
            <div class="col-md-6">

            </div>
            <div class="col">
              <label for="promotion_content" class="form-label">Content:</label>
              <textarea name="promotion_content" id="promotion_content" rows="10" wrap="hard" class="form-control" placeholder="max: 200 characters" maxlength="200" required></textarea>
            </div>




            <div class="modal-footer">

              <button type="submit" class="btn btn-primary btn-flat" name="request_promotion" class="request_promotion" id="request_promotion">Create</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

</div>

<script>
  $(document).ready(function() {
    $("#promotionRequest").on('hidden.bs.modal', function(e) {
      $("#request_promotion_form").find('input[type=text], input[type=file], textarea').val("");
    });

    $("#promotion_due").daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      autoApply: true,
      locale: {
        format: 'YYYY/MM/DD'
      }
    });
  });
</script>