<div class="modal fade" id="constructionArchiveModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Archive</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body mx-3">

        <input type="hidden" name="construction_payment_id" id="construction_payment_id">
        <input type="hidden" name="transaction_number_archive" id="transaction_number_archive">
        <p>Please Enter your password to archive this payment.</p>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        <div class="modal-footer">
          <button class="btn btn-danger btn-flat" type="button" data-bs-dismiss="modal">Cancel</button>
          <button class="btn btn-primary btn-flat" type="submit" name="archive_construction_btn" id="archive_construction_btn">Submit</button>
        </div>

      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function (){

    $("#archive_construction_btn").on('click', function (){
      var construction_payment_id = $("#construction_payment_id").val();
      var transaction_number_archive = $("#transaction_number_archive").val();
      var password = $("#password").val();

      $.ajax({
        url: '../archive/construction_archive.php',
        type: 'POST',
        data: {
          construction_payment_id: construction_payment_id,
          transaction_number_archive: transaction_number_archive,
          password: password
        },
        success: function (response) {
          location.reload(true);
        }
      })
    })

  });
</script>