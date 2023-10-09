<!-- The Modal -->
<div class="modal" id="paymentModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Payment</h4>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{ route('payment.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="edit-name">ID:</label>
            <input type="text" class="form-control joid_payment" id="joid" name="joid" readonly>
          </div>

          <div class="form-group">
            <label for="name">Customer Name:</label>
            <input type="text" class="form-control customername_payment" name="name" readonly>
          </div>

          <div class="form-group">
            <label for="name">Payable:</label>
            <input type="text" class="form-control payable_payment" name="payable" readonly>
          </div>

          <div class="form-group">
            <label for="name">Payment:</label>
            <input type="number" class="form-control amount_payment" name="payment" required>
          </div>

          <div class="form-group">
            <label for="name">Receipt #:</label>
            <input type="text" class="form-control receipt_payment" name="receipt" required>
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