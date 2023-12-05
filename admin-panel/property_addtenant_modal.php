<?php
require_once("../libs/server.php");
?>

<?php


?>

<div class="modal fade" id="addTenant">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Add Tenant</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">

        <form action="property_addtenant.php" method="POST" id="addTenant_form">
          <input type="hidden" name="property_id_tenant" id="property_id_tenant">
          <p class="fs-5 text-secondary divider personal-info mb-0">Tenant Acc#:</p>
          <div class="col">
            <label for="newOwner_accountNo_tenant" class="form-label">Account#:</label>
            <input type="text" class="form-control" name="newOwner_accountNo_tenant" id="newOwner_accountNo_tenant" placeholder="Search: Account#">
          </div>

          <div id="currentOwner_tenant">
          </div>


          <div class="modal-footer">
            <button class="btn btn-danger btn-flat" type="button" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary btn-flat" type="submit" name="add_tenant" id="add_tenant">Add</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    $("#addTenant").on('hidden.bs.modal', function(e) {
      $("#addTenant_form").find('input[type=text], input[type=hidden], input[type=password]').val("");
      $("#currentOwner").empty();
    });

    // SEARCH HOMEOWNERS USER
    $("#newOwner_accountNo_tenant").on('keyup', function() {
      var account_number = $(this).val();
      $.ajax({
        url: '../ajax/search_homeowners.php',
        method: 'POST',
        data: {
          account_number: account_number
        },
        success: function(response) {
          $("#currentOwner_tenant").html(response);
        }
      });
    });
  });
</script>