document.addEventListener('DOMContentLoaded', function() {
    $(document).on('click', '.edit-vehicle', function() {
        var vehicletype = $(this).data('vehicletype');
        $('.edit-id').val(vehicletype.id);
        $('.edit-name').val(vehicletype.name);
        $('.edit-amount').val(vehicletype.amount);
        $('#editVehicleTypeForm').attr('action', '/vehicle-types/' + vehicletype.id);
        $('#editVehicleTypeModal').modal('show');
        console.log(vehicletype);
    });

    var element = document.getElementById('customerSelect');
    var choices = new Choices(element, {
        searchEnabled: true,
        itemSelectText: '',
    });

    $(document).on('click', '.pay-jo', function() {
        // var jobOrder = $(this).data('jobOrder');
        var jobOrderString = $(this).attr('data-jobOrder');
        var jobOrder = JSON.parse(jobOrderString);
        $('.joid_payment').val(jobOrder.id);
        $('.customername_payment').val(jobOrder.customer.name);
        $('.payable_payment').val(jobOrder.vehicle_type.amount);
        $('#paymentModal').modal('show');
        console.log(jobOrder.vehicle_type.amount);
    });
    
    
    $(document).on('click', '.customer-transactions', function() {
        var customer = $(this).data('customer');
        // $('.edit-id').val(vehicletype.id);
        // $('.edit-name').val(vehicletype.name);
        // $('.edit-amount').val(vehicletype.amount);
        // $('#editVehicleTypeForm').attr('action', '/vehicle-types/' + vehicletype.id);
        $('#customertransactionsModal').modal('show');
        console.log(customer);
    });

});



