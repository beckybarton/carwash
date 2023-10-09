<div class="col-md-3">
    <ul class="list-group">
        
        <a href="{{ route('dashboard.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-clipboard-list"></i> Job Orders</a>
        <a href="{{ route('customers.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-user"></i> Customers</a>
        <a href="{{ route('vehicle-types.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-car"></i> Vehicle Types</a>
        <a href="" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#jobOrderModal"><i class="fas fa-clipboard-list"></i> Add Job Order <i class="fas fa-plus"></i></a>
        <a href="#"class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#customerModal"><i class="fas fa-user"></i> Add Customer <i class="fas fa-plus"></i></a>
        <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#vehicleTypeModal" ><i class="fas fa-car"></i> Add Vehicle Type <i class="fas fa-plus"></i></a>
        <a href class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#userModal"><i class="fas fa-user"></i> Add User <i class="fas fa-plus"></i></a>
    </ul>
</div>