@include('layouts.header')

<body>
    @include('users.changepassword')
    @include('layouts.navbar')

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
                    <input type="text" class="form-control" id="searchInputuser" placeholder="Search by Name">

                    <select id="roleFilter" class="form-control">
                        <option value="">All</option>
                        <option value="approver">Approver</option>
                        <option value="maker">Maker</option>
                        <option value="admin">Admin</option>
                        <option value="washer">Washer</option>
                        <!-- Add more status options as needed -->
                    </select>
                    <p></p>
                    <table class="table table-striped table-bordered table-hover" id="users-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ ucwords($user->id) }}</td>
                                    <td>{{ ucwords($user->first_name) }} {{ ucwords($user->last_name) }}</td>
                                    <td>{{ ucwords($user->username) }}</td>
                                    <td>{{ ucwords($user->role) }}</td>
                                    <td>
                                    <form action="{{ route('password.reset') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <button type="submit" class="btn btn-primary btn-sm">Reset Password</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $users->links('pagination::bootstrap-4') }}
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
