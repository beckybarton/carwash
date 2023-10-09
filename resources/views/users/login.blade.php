@include('layouts.header')

<div class="d-flex min-vh-100 align-items-center">
    <div class="mx-auto" style="width: 24rem;">
        <h2 class="mt-5 text-center">Sign in to your account</h2>
    </div>

    <div class="mt-4 mx-auto" style="width: 24rem;">
        <form action="#" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
            </div>
        </form>
    </div>
</div>


@include('layouts.footer')
