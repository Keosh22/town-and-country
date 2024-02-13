<div id="homeowners_view_modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Homeowners Details</b></h4>
        <button class="btn btn-close" type="button" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body mx-3">
        <div class="row gy-3">
          <input type="hidden" id="homeowners_id_view" readonly>
          <div class="col-12">
            <label for="account_number_view" class="form-label text-success">Account #:</label>
            <input type="text" class="form-control" id="account_number_view" readonly>
          </div>
          <div class="col-12">
            <label for="name_view" class="form-label text-success">Name:</label>
            <input type="text" class="form-control" id="name_view" readonly>
          </div>
          <div class="col-12">
            <label for="email_address_view" class="form-label text-success">Email Address</label>
            <input type="text" class="form-control" id="email_address_view" readonly>
          </div>
          <div class="col-12">
            <label for="phone_number_view" class="form-label text-success" >Phone Number:</label>
            <input type="text" class="form-control" id="phone_number_view" readonly>
          </div>
          <div class="col-12">
            <label for="address_view" class="form-label text-success">Current Address:</label>
            <input type="text" class="form-control" id="address_view" readonly>
          </div>
          <div class="col-12">
            <label for="status_view" class="form-label text-success">Status:</label>
            <input type="text" class="form-control" id="status_view" readonly>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-flat btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-flat btn-danger" id="delete_homeowners_btn">Delete</button>
      </div>
    </div>
  </div>
</div>