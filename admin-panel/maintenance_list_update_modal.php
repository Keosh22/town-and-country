<div id="updateMaintenanceModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Update Maintenance</b></h4>
        <button class="btn btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="form_input_update" class="row g-3">
          <input type="hidden" id="category_id">
          <div class="col-12">
            <label for="category_update" class="form-label">Category:</label>
            <input class="form-control" type="text" id="category_update" name="category_update" maxlength="35" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      
        <button class="btn btn-falt btn-success" id="update_maintenance_btn">Update</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    $("#updateMaintenanceModal").on('hidden.bs.modal', function (e) {
      $("#form_input_update").find("input[type=text], input[type=hidden]").val("");
    });

    $("#update_maintenance_btn").on('click', function() {
      var category_update = $("#category_update").val();
      var category_id = $("#category_id").val();

      $.ajax({
        url: '../admin-panel/maintenance_list_update.php',
        type: 'POST',
        data: {
          category_update: category_update,
          category_id: category_id
        },
        success: function(response) {
          location.reload();
        }
      });
    });
  });
</script>