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
        var customerid = $(this).data('customer');
        // $('.edit-id').val(vehicletype.id);
        // $('.edit-name').val(vehicletype.name);
        // $('.edit-amount').val(vehicletype.amount);
        // // $('#editVehicleTypeForm').attr('action', '/vehicle-types/' + vehicletype.id);
        // $('#customertransactionsModal').modal('show');

        //  // Make an AJAX request to fetch data
         $.ajax({
            url: 'customer-transactions/' + customerid,  
            method: 'GET',
            success: function(response){
                var tableBody = $('#customertransactions tbody');
                tableBody.empty()
                $.each(response.transactions, function(index, transaction) {
                    var createdAt = new Date(transaction.created_at);
                    var formattedDate = (createdAt).toLocaleDateString(undefined, {
                        year: 'numeric',
                        month: 'short',
                        day: 'numeric'
                    });
                    var row = $('<tr>');
                    row.append($('<td class="small">').text(transaction.id));
                    row.append($('<td class="small">').text(formattedDate));
                    row.append($('<td class="small">').text(transaction.vehicle_type.name));
                    row.append($('<td class="small">').text(transaction.plate_number));
                    row.append($('<td class="text-end small">').text(parseFloat(transaction.amount).toLocaleString(undefined,{minimumFractionDigits:2, maximumFractionDigits:2})));
                    row.append($('<td class="small">').text(transaction.status));
                    tableBody.append(row);
                });

                var payablerow = $('<tr>');
                payablerow.append($('<td class="small" colspan="4">').text("Total Payables: "));
                payablerow.append($('<td class="small text-end" colspan="2">').text(parseFloat(response.totalPayable).toLocaleString(undefined,{minimumFractionDigits:2, maximumFractionDigits:2})));
                tableBody.append(payablerow);

                var paymentrow = $('<tr>');
                paymentrow.append($('<td class="small" colspan="4">').text("Total Payments: "));
                paymentrow.append($('<td class="small text-end" colspan="2">').text(parseFloat(response.totalPayment).toLocaleString(undefined,{minimumFractionDigits:2, maximumFractionDigits:2})));
                tableBody.append(paymentrow);

                var duerow = $('<tr>');
                duerow.append($('<td class="small" colspan="4">').text("Remaining Due: "));
                duerow.append($('<td class="small text-end" colspan="2">').text(parseFloat((response.totalPayable - response.totalPayment)).toLocaleString(undefined,{minimumFractionDigits:2, maximumFractionDigits:2})));
                tableBody.append(duerow);

                $('#customertransactionsModal').modal('show');
            },
            error: function(error){
                console.log(error);
            }
        });
        // console.log(customer);
    });

});



