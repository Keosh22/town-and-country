

<div class="modal fade" id="removeTenant">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Remove Tenant</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body mx-3">
        <form action="" method="POST">
          <input type="hidden" name="tenant_id" id="tenant_id">
          <p>Please Enter your password to archive this payment.</p>
          <input type="password" class="form-control" name="remove_tenant_password" id="remove_tenant_password" placeholder="Password" required>
          <div class="modal-footer">
            <button class="btn btn-primary btn-flat" type="submit" name="remove_tenant_btn" id="remove_tenant_btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {

    $("#remove_tenant_btn").on('click', function(){
      var tenant_id = $("#tenant_id").val();
      var password = $("#remove_tenant_password").val();
      $.ajax({
        url: '../admin-panel/property_remove_tenant.php',
        type: 'POST',
        data: {
         tenant_id: tenant_id,
         password: password
        },
        success: function(response) {
         
        }
      });

    });

    // $("#archive_monthlyDues_btn").on('click', function() {
    //   var tenant_id = $("#tenant_id").val();
     
    //   var password = $("#remove_tenant_password").val();
    //   var collection_id = $("#collection_id").val();
    //   $.ajax({
    //     url: '../archive/monthly_dues_archive.php',
    //     type: 'POST',
    //     data: {
    //       payment_id: payment_id,
    //       transaction_number: transaction_number,
    //       password: password,
    //       collection_id: collection_id
    //     },
    //     success: function(response) {

    //     }
    //   });
    // });



  });
</script>