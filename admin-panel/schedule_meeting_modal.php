<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$default_date = date("Y/m/d g:i A", strtotime("now"));
?>



<!-- Modal Homeowners Regsitration -->
<div id="scheduleMeetingModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><b>Schedule Meeting</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
      </div>

      <div class="modal-body mx-3">
        <form id="schedule_meeting_form">
          <div class="row gy-3">
            <div class="col-md-6">
              <label for="about" class="form-label">About:</label>
              <input type="text" name="about_meeting" id="about_meeting" class="form-control" maxlength="100" required>
            </div>
            <div class="col-md-6">
              <label for="meeting_date" class="form-label">When:</label>
              <input value="<?php echo $default_date; ?>" name="meeting_date" id="meeting_date" class="form-control">
            </div>
            <div class="col">
              <label for="meeting_content" class="form-label">Content:</label>
              <textarea name="meeting_content" id="meeting_content" rows="10" wrap="hard" class="form-control" maxlength="350" required></textarea>
            </div>


            <div class="modal-footer">

              <a type="submit" class="btn btn-primary btn-flat" name="create_meeting" class="create_meeting" id="create_meeting">Register</a>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

</div>

<script>
  $(document).ready(function() {
    $("#scheduleMeetingModal").on('hidden.bs.modal', function(e) {
      var default_date = $("#meeting_date").val("<?php echo $default_date; ?>");

      $("#schedule_meeting_form").find('input[type=text]').val("");
      $("#meeting_content").val("");

    });


    $("#meeting_date").daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      autoApply: true,
      timePicker: true,
      locale: {
        format: 'YYYY/MM/DD hh:mm A'
      }
    });


    $("#create_meeting").on('click', function() {
      var about = $("#about_meeting").val();
      var meeting_date = $("#meeting_date").val();
      var meeting_content = $("#meeting_content").val();

      if (about.length > 0 && meeting_content.length > 0) {
        swal({
            title: 'Confirmation',
            text: 'Are you sure you want to schedule a meeting?',
            icon: 'warning',
            buttons: true,
            dangerMode: true
          })
          .then((proceed) => {
            if (proceed) {
              $.ajax({
                url: '../admin-panel/schedule_meeting.php',
                type: 'POST',
                data: {
                  about: about,
                  meeting_date: meeting_date,
                  meeting_content: meeting_content
                },
                success: function() {
                  location.reload();
                }
              })
            } else {
              swal("Canceled");
            }
          })
      }



    });

  });
</script>