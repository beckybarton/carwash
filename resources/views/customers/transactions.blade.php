<!-- The Modal -->
<div class="modal" id="customertransactionsModal">
  <div class="modal-dialog modal-dialog-centered" style="width: 100% !important;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Vehicle Type</h4>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="customertransactions">
              <thead class="thead-dark">
                <tr>
                  <th class="small">ID</th>
                  <th class="small">Date</th>
                  <th class="small">Type</th>
                  <th class="small">Plate Number</th>
                  <th class="text-end small">Amount</th>
                  <th class="text-end small">Status</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <button type="button" class="btn btn-primary" >Download Billing Statement</button>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>