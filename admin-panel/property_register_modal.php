<?php
// Server
require_once("../libs/server.php");
?>

<?php
$server = new Server;

// if(isset($_POST['add'])){
//   $homeowners_id = $_POST['homeowners_id'];
//   $blk = $_POST['blk'];
//   $lot = $_POST['lot'];
//   $phase = $_POST['phase'];
//   $street = $_POST['street'];



//   $query = "INSERT INTO property_list (homeowners_id, blk, lot, phase, street) VALUES(:homeowners_id, :blk, :lot, :phase, :street)";
//   $data = [
//     "homeowners_id" => $homeowners_id,
//     "blk" => $blk,
//     "lot" => $lot,
//     "phase" => $phase,
//     "street" => $street
//   ];
//   $path = "../admin-panel/property.php";
//   $server->insert($query, $data, $path);
//   // $connection = $server->openConn();
//   // $stmt = $connection->prepare($query);
//   // $stmt->execute($data);
//   // $count = $stmt->rowCount();



// }
?>

< <!-- Add -->
  <div class="modal fade" id="addProperty">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><b>Add Property</b></h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body mx-3">
          <!-- Form -->

          <form method="POST" action="" id="form_input">



            <div class="row gy-3" id="propertyContainer">
              <p class="fs-5 text-secondary divider personal-info mt-3 mb-0">Property Address</p>

              <input type="hidden" id="homeowners_id" name="homeowners_id">
              <!-- <div class="col-1 d-flex align-items-end">
                  <a class="fs-5 text-success" role="button"><i class='add_property fs-3 bx bxs-plus-circle bx-tada-hover'></i></a>
                </div> -->
              <div class="col-2">
                <label for="blk" class="form-label">Blk#</label>
                <input type="text" class="form-control" id="blk" name="blk" required>
              </div>
              <div class="col-2">
                <label for="lot" class="form-label">Lot#</label>
                <input type="text" class="form-control" id="lot" name="lot" required>
              </div>
              <div class="col-4">
                <label for="phase" class="form-label">Phase#</label>
                <select name="phase" id="phase" class="form-select" required>
                  <option value=""></option>
                  <option value="PH1">Phase 1</option>
                  <option value="PH2">Phase 2</option>
                  <option value="PH3">Phase 3</option>
                </select>
              </div>
              <div class="col-4">
                <label for="street" class="form-label">Street</label>
                <select name="street" id="street" class="form-select" required>
                  <option></option>
                  <option>Jackfruit</option>
                  <option>Golden Shower</option>
                </select>
              </div>

            </div>





            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-flat pull-left" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add" class="add" id="add">Add</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>


  <script>
    $(document).ready(function() {
      $("#add").on('click', function() {
        
        var homeowners_id = $("#homeowners_id").val();
        var blk = $("#blk").val();
        var lot = $("#lot").val();
        var phase = $("#phase").val();
        var street = $("#street").val();

        $.ajax({
          url: '../ajax/property_register_ajax.php',
          type: 'POST',
          data: {
            homeowners_id: homeowners_id,
            blk: blk,
            lot: lot,
            phase: phase,
            street: street
          },
          success: function(data) {


          }
        });
      })

    });
  </script>