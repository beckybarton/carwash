@include('layouts.header')
<body>
@include('vehicle_types.create')
@include('vehicle_types.edit')
@include('layouts.navbar')
@include('job_orders.create')
@include('customers.create')
@include('layouts.footer')
@include('users.register')
<div class="container mt-5">
        
        <!-- Sidebar & Content Area -->
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Content Area -->
        <div class="col-md-9">
            @if (session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                {{ session('error') }}
                </div>
            @endif

            <div class="table-responsive">
                this is the content
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vehicleTypes as $vehicleType)
                            <tr>
                                <td>{{ $vehicleType->id }}</td>
                                <td>{{ $vehicleType->name }}</td>
                                <td>{{ number_format($vehicleType->amount,2) }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning edit-vehicle" id="edit-vehicle" data-target="#editVehicleTypeModal" data-vehicletype="{{ $vehicleType }}">Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $vehicleTypes->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
</div>


</div>
</body>
@include('layouts.footer')