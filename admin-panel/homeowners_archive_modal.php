<div class="modal fade" id="delete_homeowners">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Archive</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body mx-3">
        <form action="" method="POST">
          <input type="hidden" name="homeowners_id_delete" id="homeowners_id_delete">
          <input type="hidden" name="account_number" id="account_number">
          <p>Please Enter your password to remove this account.</p>
          <input type="password" class="form-control" name="archive_monthlyDues_password" id="archive_monthlyDues_password" placeholder="Password" required>
          <div class="modal-footer">
            <button class="btn btn-danger btn-flat" type="button" data-bs-dismiss="modal">Cancel</button>
            <button class="btn btn-primary btn-flat" type="submit" name="archive_homeowners" id="archive_homeowners">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {



    $("#archive_homeowners").on('click', function() {
     var homeowners_id = $("#homeowners_id_delete").val();
     var account_number = $("#account_number").val();
      console.log(homeowners_id);
      $.ajax({
        url: '../admin-panel/homeowners_archive.php',
        type: 'POST',
        data: {
          homeowners_id: homeowners_id,
          account_number: account_number
        },
        success: function(response) {
          location.reload(true);
        }
      });
    });
  });
</script>