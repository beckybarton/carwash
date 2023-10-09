<div class="modal" id="jobOrderModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jobOrderModalLabel">Add Job Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('job-orders.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="customername">Customer Name:</label>
                        <select id="customerSelect" name="customer_id" class="form-control" required>
                            @foreach($allcustomers as $customerName)
                                <option value="{{ $customerName->id }}">{{ ucwords($customerName->name) }}</option>
                            @endforeach
                        </select>

                    </div>
                    

                    
                    <div class="form-group">
                        <label for="plate_number">Plate Number</label>
                        <input type="text" name="plate_number" id="plate_number" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="vehicle_type">Vehicle Type</label>
                        <select name="vehicle_type_id" id="vehicle_type" class="form-control" required>
                            @foreach($vehicleTypes as $vehicleType)
                                <option value="{{ $vehicleType->id }}">{{ $vehicleType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="time_in">Time In</label>
                        <input type="datetime-local" name="time_in" id="time_in" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
