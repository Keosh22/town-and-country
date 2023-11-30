<?php
require_once("../libs/server.php");
?>

<?php


?>

<div class="modal fade" id="propertyTransfer">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Transfer Property</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">

        <form action="property_list_transfer.php" method="POST" id="propertyTransfer_form">
          <input type="text" name="property_transfer_id" id="property_transfer_id">
          <p class="fs-5 text-secondary divider personal-info mb-0">Property</p>

          <div class="col">
            <label for="property_address" class="form-label">Address:</label>
            <input type="text" class="form-control" name="property_address" id="property_address" readonly>
          </div>
          <div class="col">
            <label for="property_currentOwner" class="form-label">Current Owner:</label>
            <input type="text" class="form-control" name="property_currentOwner" id="property_currentOwner" readonly>
          </div>
          <p class="fs-5 text-secondary divider personal-info mb-0 mt-5">Transfer to:</p>

          <div class="col">
            <label for="newOwner_accountNo" class="form-label">Account#:</label>
            <input type="text" class="form-control" name="newOwner_accountNo" id="newOwner_accountNo" placeholder="Search: Account#">
          </div>

          <div id="currentOwner">
          </div>


          <div class="modal-footer">
            <button class="btn btn-danger btn-flat" type="button" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary btn-flat" type="submit" name="transfer" id="transfer">Transfer</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    $("#propertyTransfer").on('hidden.bs.modal', function(e) {
      $("#propertyTransfer_form").find('input[type=text], input[type=hidden], input[type=password]').val("");
      $("#currentOwner").empty();
    });

    // SEARCH HOMEOWNERS USER
    $("#newOwner_accountNo").on('keyup', function() {
      var account_number = $(this).val();
      $.ajax({
        url: '../ajax/search_homeowners.php',
        method: 'POST',
        data: {
          account_number: account_number
        },
        success: function(response) {
          $("#currentOwner").html(response);
        }
      });
    });
  });
</script>