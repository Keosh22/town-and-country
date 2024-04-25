<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php

?>
<div class="modal fade" id="change_photo_promotion">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Change Photo</b></h4>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="promotion_change_photo.php" method="POST" enctype="multipart/form-data" id="change_photo_form">
        <div class="modal-body mx-3">
          <div class="row gy-3">
            <input type="hidden" name="change_photo_id" id="change_photo_id">
            <input type="hidden" class="form-control" name="photo_name" id="photo_name">
            <div class="col-12">
              <label for="change_photo">Choose Photo:</label>
              <input type="file" class="form-control" name="change_photo" id="change_photo" accept="image/jpeg, image/png" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger btn-flat" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary btn-flat" name="change_photo_promotion_btn" id="change_photo_promotion_btn">Change</button>
        </div>
      </form>
    </div>
  </div>
</div>




<script>
  $(document).ready(function() {


  });
</script>