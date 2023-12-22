<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$default_date = date("Y/m/d g:i A", strtotime("now"));
?>


<!-- Add Collection Modal -->
<div id="collectionCreate" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Add Collection</b></h4>
        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
      </div>
      <form action="collection_create.php" method="POST" id="create_collections_form">
        <div class="modal-body mx-3">
          <div class="row gy-3">
            <div class="col-12">
              <label for="description" class="form-label">Description:</label>
              <input type="text" class="form-control" name="description" id="description">
            </div>
            <div class="col-12">
              <label for="fee" class="form-label">Fee:</label>
              <div class="input-group flex-nowrap">
                <span class="input-group-text">₱</span>
                <input type="text" class="form-control" name="fee" id="fee">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger btn-flat" type="button" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary btn-flat" name="add_collection_btn" id="add_collection_btn">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $("#collectionCreate").on('hidden.bs.modal', function(e) {
      $("#create_collections_form").find('input[type=text]').val("");
    });
  });
</script>