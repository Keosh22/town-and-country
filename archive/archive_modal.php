<div class="modal fade" id="arhive_monthlyDues">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Archive</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body mx-3">
        <form action="" method="POST">
          <input type="hidden" name="payment_id" id="payment_id">
          <input type="hidden" name="transaction_number" id="transaction_number">
          <input type="hidden" name="collection_id" id="collection_id">
          <p>Please Enter your password to archive this payment.</p>
          <input type="password" class="form-control" name="archive_monthlyDues_password" id="archive_monthlyDues_password" placeholder="Password" required>
          <div class="modal-footer">
            <button class="btn btn-danger btn-flat" type="button" data-bs-dismiss="modal">Cancel</button>
            <button class="btn btn-primary btn-flat" type="submit" name="archive_monthlyDues_btn" id="archive_monthlyDues_btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {



    $("#archive_monthlyDues_btn").on('click', function() {
      var payment_id = $("#payment_id").val();
      var transaction_number = $("#transaction_number").val();
      var password = $("#archive_monthlyDues_password").val();
      var collection_id = $("#collection_id").val();
      $.ajax({
        url: '../archive/archive.php',
        type: 'POST',
        data: {
          payment_id: payment_id,
          transaction_number: transaction_number,
          password: password,
          collection_id: collection_id
        },
        success: function(response) {

        }
      });
    });
  });
</script>