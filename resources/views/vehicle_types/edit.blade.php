<div id="editVehicleTypeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editVehicleTypeModalLabel">Edit Vehicle Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editVehicleTypeForm" action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit-name">ID:</label>
                        <input type="text" class="form-control edit-id" id="edit-id" name="id" required>
                    </div>

                    <div class="form-group">
                        <label for="edit-name">Name:</label>
                        <input type="text" class="form-control edit-name" id="edit-name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="edit-amount">Amount:</label>
                        <input type="number" class="form-control edit-amount" id="edit-amount" name="amount" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveEdit">Save changes</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>