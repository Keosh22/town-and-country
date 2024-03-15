<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
  $default_date = date("Y/m/d g:i A", strtotime("now")); 
   ?>



<!-- Modal Homeowners Regsitration -->
<div id="announcementCreate" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><b>Create Announcement</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
      </div>

      <div class="modal-body mx-3">
        <form action="announcement_create.php" method="POST" id="create_announcement_form">
          <div class="row gy-3">
            <div class="col-md-6">
              <label for="about" class="form-label">About:</label>
              <input type="text" name="about" id="about" class="form-control" maxlength="100">
            </div>
            <div class="col-md-6">
              <label for="announcement_date" class="form-label">When:</label>
              <input value="<?php echo $default_date; ?>"  name="announcement_date" id="announcement_date" class="form-control">
            </div>
            <div class="col">
              <label for="content" class="form-label">Content:</label>
              <textarea name="content" id="content" rows="10"  wrap="hard"  class="form-control" maxlength="350"></textarea>
            </div>

            <div class="modal-footer">
              
              <button type="submit" class="btn btn-primary btn-flat" name="create_announcement" class="create_announcement" id="create_announcement">Register</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

</div>

<script>
  $(document).ready(function() {
    $("#announcementCreate").on('hidden.bs.modal', function(e){
      var default_date = $("#announcement_date").val("<?php echo $default_date; ?>");
      $("#create_announcement_form").find('input[type=text]').val("");
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