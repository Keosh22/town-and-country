<?php
require_once("../libs/server.php");
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
?>

<?php
$default_date = date("Y/m/d g:i A", strtotime("now"));
?>

<!-- Update Collection Modal -->
<div id="collectionUpdate" class="modal modal-fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Update Collection</b></h4>
        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
      </div>
      <form action="collection_update.php" method="POST" id="update_collection_form">
        <div class="modal-body mx-3">
          <div class="row gy-3">
            <input type="text" name="update_collection_id" id="update_collection_id" required>
            <div class="col-12">
              <label for="update_category" class="form-label">Category:</label>
              <input type="text" class="form-control" name="update_category" id="update_category" required>
            </div>
            <div class="col-12">
              <label for="update_description" class="form-label">Description:</label>
              <input type="text" class="form-control" name="update_description" id="update_description">
            </div>
            <div class="col-12">
              <label for="update_fee" class="form-label">Fee:</label>
              <div class="input-group">
                <span class="input-group-text">₱</span>
                <input type="text" class="form-control" name="update_fee" id="update_fee" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger btn-flat" data-bs-dismiss="modal" type="button">Close</button>
          <button class="btn btn-primary btn-primary" name="update_collection_btn" id="update_collection_btn">Update</button>
        </div>
      </form>

    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $("#collectionUpdate").on('hidden.bs.modal', function (e){
      $("#update_collection_form").find('input[type=text], input[type=hidden]').val("");
    });
  });

  
</script>