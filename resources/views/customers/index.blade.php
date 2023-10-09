@include('layouts.header')

<body>
    @include('layouts.navbar')

    <div class="container mt-5">
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
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customerNames as $customerName)
                                <tr>
                                    <td>{{ $customerName->id }}</td>
                                    <td>{{ $customerName->name }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning edit-customer" id="edit-customer" data-target="#editVehicleTypeModal" data-vehicletype="{{ $customerName }}">Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $customerNames->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    @include('users.register')
    @include('vehicle_types.create')
    @include('job_orders.create')
    @include('customers.create')

    @include('layouts.footer')
</body>
