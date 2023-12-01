<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
  $default_date = date("Y/m/d g:i A", strtotime("now")); 
   ?>



<!-- Modal Homeowners Regsitration -->
<div id="announcementUpdate" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><b>Update Announcement</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
      </div>

      <div class="modal-body mx-3">
        <form action="" method="POST" id="update_announcement_form">
          <div class="row gy-3">
            <div class="col-md-6">
              <label for="about_update" class="form-label">About:</label>
              <input type="text" name="about_update" id="about_update" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="announcement_date_update" class="form-label">When:</label>
              <input value="<?php echo $default_date; ?>" type="text" name="announcement_date_update" id="announcement_date_update" class="form-control">
            </div>
            <div class="col">
              <label for="content_update" class="form-label">Content:</label>
              <textarea name="content_update" id="content_update" rows="10" class="form-control"></textarea>
            </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-flat pull left" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="update_announcement" class="update_announcement" id="create_announcement">Update</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

</div>

<script>
  $(document).ready(function() {
  
    $("#announcementUpdate").on('hidden.bs.modal', function(e){
      $("#update_announcement_form").find('input[type=text]').val("");
    });

    $("#announcement_date").daterangepicker({
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