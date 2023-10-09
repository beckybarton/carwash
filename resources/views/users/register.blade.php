
<div class="modal" id="userModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add User</h4>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{ route('register.post') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="name">First Name:</label>
            <input type="text" class="form-control" name="first_name" required>
          </div>

          <div class="form-group">
            <label for="name">Last Name:</label>
            <input type="text" class="form-control" name="last_name" required>
          </div>

          <div class="form-group">
            <label for="name">Email:</label>
            <input type="text" class="form-control" name="email" required>
          </div>

          <div class="form-group">
            <label for="name">Role:</label>
            <select id="role" name="role" autocomplete="role" class="form-control">  
                <option value="admin">Admin</option>
                <option value="maker">Maker</option>
                <option value="approver">Approver</option>
                <option value="washer">Washer</option>
            </select>
          </div>

          
          <div class="modal-footer">
            <div class="form-group">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>  
              <input type="submit" class="btn btn-success" value="Save">  
            </div>
           </div>
        </form>
      </div>

    </div>
  </div>
</div>