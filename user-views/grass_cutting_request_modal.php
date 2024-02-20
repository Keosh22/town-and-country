<?php
require_once "../libs/server.php";

$server = new Server;
?>

<div id="grassCuttingRequestModal" class="modal fade">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Grass Cutting Request</b></h4>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body mx-2">
        <h5><b>Choose property:</b></h5>
        <div class="row g-3" id="property_list_modal">
          <input type="hidden" class="form-control" id="service_maintenance" readonly>
          <?php
          $user_id = $_SESSION['user_id'];
          $property_list = "";
          $ACTIVE = "ACTIVE";

          $query = "SELECT * FROM property_list WHERE homeowners_id = :user_id AND archive = :ACTIVE ";
          $data = ["user_id" => $user_id, "ACTIVE" => $ACTIVE];
          $connection = $server->openConn();
          $stmt = $connection->prepare($query);
          $stmt->execute($data);
          if ($stmt->rowCount() > 0) {
            while ($result = $stmt->fetch()) {
              $property_id = $result['id'];
              $address = "BLK-" . $result['blk'] . " LOT-" . $result['lot'] . " " . $result['street'] . " St. " . $result['phase'];

          ?>
              <div class="col-12">
                <div class="input-group">
                  <div class="input-group-text">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input property_id_checkbox" value="<?php echo $property_id ?>">
                      <label class="form-check-label"><b>Property</b></label>
                    </div>
                  </div>
                  <input type="text" class="form-control" value="<?php echo $address ?>" readonly>
                </div>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-flat btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-flat btn-success" id="request_grasscutting_btn">Request</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    var property_id_arr = [];

    $("#grassCuttingRequestModal").on('hidden.bs.modal', function(e) {
      $("#property_list_modal").find("input[type=checkbox], input[type=hidden]").prop('checked', false);
    });


    // Checkbox
    $(".property_id_checkbox").on('change', function() {
      var property_id = $(this).val();

      if (this.checked) {
        property_id_arr.push(property_id);
      } else {
        for (var i = 0; i <= property_id_arr.length - 1; i++) {
          if (property_id === property_id_arr[i]) {
            property_id_arr.splice(i, 1)
          }
        }
      }
    });


    // Request Button
    $("#request_grasscutting_btn").on('click', function() {
      if (property_id_arr.length > 0) {
        var service_maintenance = $("#service_maintenance").val();
    
        $.ajax({
          url: '../user_ajax/grass_cutting_request.php',
          type: 'POST',
          data: {
            property_id_arr: property_id_arr,
            service_maintenance: service_maintenance
          },
          success: function() {
            location.reload();
          }
        })
      }
    });


  });
</script>