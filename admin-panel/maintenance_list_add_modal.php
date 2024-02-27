<div id="addMaintenanceModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Add Maintenance</b></h4>
        <button class="btn btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="form_input" class="row g-3">
          <div class="col-12">
            <label for="category" class="form-label">Category:</label>
            <input class="form-control" type="text" id="category" name="category" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
       
        <button class="btn btn-falt btn-success" id="add_maintenance_btn">Add</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $("#addMaintenanceModal").on('hidden.bs.modal', function (e) {
      $("#form_input").find("input[type=text]").val("");
    });

    $("#add_maintenance_btn").on('click', function() {
      var category = $("#category").val();

      $.ajax({
        url: '../admin-panel/maintenance_list_add.php',
        type: 'POST',
        data: {
          category: category
        },
        success: function(response) {
          location.reload();
        }
      });
    });
  });
</script>