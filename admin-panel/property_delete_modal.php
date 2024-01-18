<div class="modal fade" id="deleteProperty">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Delete Property</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body mx-3">
        <form action="property_delete.php" method="POST">
          <input type="hidden" name="delete_property_id" id="delete_property_id">
          <p>Please Enter your password to delete this account.</p>
          <input type="password" class="form-control" name="delete_property_password" id="delete_property_password" placeholder="Password" required>
          <div class="modal-footer">
            <button class="btn btn-danger btn-flat" type="button" data-bs-dismiss="modal">Cancel</button>
            <button class="btn btn-primary btn-flat" type="submit" name="delete_property_btn" id="delete_property_btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>