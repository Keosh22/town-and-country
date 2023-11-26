<?php
// Server
require_once("../libs/server.php");
?>

<?php
$server = new Server;
if (isset($_POST['update'])) {

  $street_id = $_POST['street_id'];
  $street_update = $_POST['street_update'];
  $phase_update = $_POST['phase_update'];

  if (isset($street_id) && isset($street_update) && isset($$phase_update)) {

    $query = "SELECT * FROM street_list WHERE id = :street_id";
    $data = ["street_id" => $street_id];
    $connection = $server->openConn();
    $stmt = $connection->prepare($query);
    $stmt->execute($data);
    $count = $stmt->rowCount();

    if ($count) {
      while ($result = $stmt->fetch()) {
        $phase = $result['phase'];
        $street = $result['street'];
      }
      if ($phase == $phase_update) {
        $_SESSION['status'] = "Warning!";
        $_SESSION['text'] = "You enter the same phase!";
        $_SESSION['status_code'] = "warning";
      } elseif ($street == $street_update) {
        $_SESSION['status'] = "Warning!";
        $_SESSION['text'] = "You enter the same street!";
        $_SESSION['status_code'] = "warning";
      } else {
        $_SESSION['status'] = "Success!";
        $_SESSION['text'] = "Update Success";
        $_SESSION['status_code'] = "success";
      }
    } else {
      $_SESSION['status'] = "Warning!";
      $_SESSION['text'] = "Something went wrong!";
      $_SESSION['status_code'] = "warning";
    }

  } 
}




?>

<!-- Add -->
<div class="modal fade" id="updateStreet">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Update Street</b></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body mx-3">
        <!-- Form -->

        <form method="POST" action="street_update.php" id="phase_form">
          <input type="hidden" id="street_id" name="street_id">


          <div class="row gy-3">
            <p class="fs-5 text-secondary divider personal-info mt-3 mb-0">Street</p>


            <!-- <div class="col-1 d-flex align-items-end">
                  <a class="fs-5 text-success" role="button"><i class='add_property fs-3 bx bxs-plus-circle bx-tada-hover'></i></a>
                </div> -->

           
            <div class="col-12">
                <label for="phase" class="form-label">Phase:</label>
                <select name="phase_update" id="phase_update" class="form-select" required>
                  <option id="default_select"></option>
                  <option value="Phase 1">Phase 1</option>
                  <option value="Phase 2">Phase 2</option>
                  <option value="Phase 3">Phase 3</option>
                </select>
              </div>
            <div class="col-12">
              <label for="street" class="form-label">Street name:</label>
              <input type="text" id="street_update" name="street_update" class="form-control" required>
            </div>
          </div>





          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-flat pull-left" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" name="update" class="update" id="update">Update</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
  
    $("#updateStreet").on('hidden.bs.modal', function(e) {
 
      $("#phase_form").find("input[type=text], input[type=hidden]").val("");
    });

    // $("#updateStreet").on('show.bs.modal', function(e){



    //   })
  });
</script>