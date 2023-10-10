@include('layouts.header')

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin:1%;">
        <!-- Sidebar & Content Area -->
        <div class="row">
            <!-- Sidebar -->
            @include('layouts.sidebar')
            Side
            <!-- Content Area -->
            <div class="col-md-9">
                <!-- Placeholder for messages or alerts -->
                <div class="alert alert-info" role="alert">
                    Welcome to the dashboard! Choose an option from the sidebar.
                </div>
            </div>
        </div>
    </div>
    @include('users.register')
    @include('vehicle_types.create')
    @include('job_orders.create')
    @include('layouts.footer')
    @include('layouts.footer')
</body>
