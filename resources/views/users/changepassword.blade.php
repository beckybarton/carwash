<!-- The Modal -->
<div class="modal" id="changepasswordModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Password</h4>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="mt-4" method="post" action="{{ route('change.password') }}">
            @csrf
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Confirm New Password:</label>
                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>

      </div>
    </div>
  </div>
</div>