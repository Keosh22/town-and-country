<?php

date_default_timezone_set("Asia/Manila");
$current_year = date("Y", strtotime("now"));
?>

<div class="modal fade" id="create_collection">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Create Collection</b></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body mx-3">
        <form action="" method="POST">
          <div class="row">
            <div class="col-auto">
              <input type="hidden" id="property_id_cc" name="property_id_cc">
              <label for="choose_year" class="form-label">Choose Year:</label>
              <input type="number" id="choose_year" name="choose_year" class="form-control">
            </div>
          </div>
          <div class="modal-footer">

            <button class="btn btn-primary btn-flat" type="submit" name="create_collection_btn" id="create_collection_btn">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
   
    $("#choose_year").yearpicker({
      startYear: <?php echo $current_year; ?>
    });

    $("#create_collection_btn").on('click', function() {
      var property_id = $("#property_id_cc").val();
      var choose_year = $("#choose_year").val();
      createCollection(property_id);

      function createCollection(property_id) {
        $.ajax({
          url: '../ajax/property_create_collection.php',
          type: 'POST',
          data: {
            property_id: property_id,
            choose_year: choose_year
          },
          success: function(response) {
            location.realod(true);
          }
        })
      }
    });
  });
</script>
<!-- Year Picker Js -->
<script src="../scripts/yearpicker.js"></script>