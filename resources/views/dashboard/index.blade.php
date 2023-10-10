@include('layouts.header')

<body>
    @include('layouts.navbar')
    @include('payments.create')

    <div class="container" style="margin:1%;">
        
        <!-- Sidebar & Content Area -->
        <div class="row">
            <!-- Sidebar -->
            @include('layouts.sidebar')

            <!-- Content Area -->
            <div class="col-md-9">
                 @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                    {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible">
                    {{ session('error') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search by Customer Name">

                    <select id="statusFilter" class="form-control">
                        <option value="">All</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="completed">Completed</option>
                        <option value="rejected">Rejected</option>
                        <!-- Add more status options as needed -->
                    </select>
                    <p></p>
                    <table class="table table-striped table-bordered table-hover" id="joborders-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Vehicle Type</th>
                                <th class="text-end">Rate</th>
                                <th>Plate Number</th>
                                <th>Time In</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobOrders as $jobOrder)
                                <tr>
                                    <td>{{ str_pad($jobOrder->id, 4, '0', STR_PAD_LEFT) }}</td>
                                    <td>{{ ucwords($jobOrder->customer->name) }}</td>
                                    <td>{{ ucwords($jobOrder->vehicle_type->name) }}</td>
                                    <td class="text-end">{{ number_format($jobOrder->amount,2) }}</td>
                                    <td>{{ strtoupper($jobOrder->plate_number) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($jobOrder->time_in)->format('M d, Y') }}</td>
                                    <td>{{ ucwords($jobOrder->status) }}</td>
                                    <td>
                                        <form style="display: inline-block;" action="{{ route('joborder.statusupdate', $jobOrder->id) }}" method="POST">
                                            @csrf
                                            @if($jobOrder->status === 'pending' && (auth()->user()->role === 'approver' || auth()->user()->role === 'admin'))
                                                <button type="submit" class="custom-green-btn" name="action" value="approved"><i class="fas fa-check"></i></button>
                                                <button type="submit" class="custom-red-btn" name="action" value="rejected"><i class="fas fa-times"></i> </button>
                                            @endif
                                            @if($jobOrder->status === "approved" || $jobOrder->status === "paid")
                                                <button type="submit" class="custom-green-btn" name="action" value="completed"><i class="fas fa-clipboard-check"></i> </button>
                                            @endif
                                        </form>
                                        @if($jobOrder->status != "rejected" && $jobOrder->status != "paid" && !($jobOrder->payment))
                                        <button style="display: inline-block;" class="btn btn-sm btn-warning pay-jo" id="pay-jo" data-target="#paymentModal" data-jobOrder="{{ $jobOrder }}"><i class="fas fa-money-bill"></i></button>
                                        @endif
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $jobOrders->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('users.register')
    @include('vehicle_types.create')
    @include('job_orders.create')
    @include('customers.create')
</body>
@include('layouts.footer')
<script type="text/javascript">
    var jobordersDataUrl = '{{ route('joborders.data') }}';
</script>
