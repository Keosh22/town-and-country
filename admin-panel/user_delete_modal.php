


<div class="modal fade" id="deleteUser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Delete User Account</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
      </div>

      <div class="modal-body mx-3">

      <form action="user_delete_account.php" method="POST">
        <div class="form-group">
          <input type="hidden" name="delete_id" id="delete_id">
          <p>Please Enter your password to delete this account.</p>
          <input type="password" class="form-control" id="passwordSubmit" name="password" placeholder="Password" required>
        </div>
     

      </div>

      <div class="modal-footer">
        <button class="btn btn-danger btn-flat pull-left" type="button" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary btn-flat register" type="submit" name="submit" id="submit">Submit</button>
      </div>
      </form>

    </div>
  </div>
</div>


