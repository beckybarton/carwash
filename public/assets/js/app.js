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
        $('.amount_payment').val(jobOrder.vehicle_type.amount);
        $('#paymentModal').modal('show');
        console.log(jobOrder.vehicle_type.amount);
    });
    
    
    $(document).on('click', '.customer-transactions', function() {
        var customerid = $(this).data('customer');
         $.ajax({
            url: 'customer-transactions/' + customerid,  
            method: 'GET',
            success: function(response){
                var downloadbuttondiv = $('#downloadbuttondiv');
                downloadbuttondiv.empty();
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
                    row.append($('<td class="small">').text(String(transaction.id).padStart(4, '0')));
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

                
                var downloadButton = document.createElement('a');
                var downloadUrl = '/download-billing-statement/' + customerid;
                downloadButton.setAttribute('href', downloadUrl);
                downloadButton.setAttribute('class', 'btn btn-primary');
                downloadButton.textContent = 'Download Billing Statement';
                downloadbuttondiv.append(downloadButton);

                $('#customertransactionsModal').modal('show');
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    $(document).ready(function() {
        // Add event listeners for input and select change
        $('#searchInput, #statusFilter').on('keyup change', function() {
            // Get search input value and selected filter value
            var searchText = $('#searchInput').val().toLowerCase();
            var statusFilter = $('#statusFilter').val();
    
            // Filter the table rows based on search input and status filter
            $('#joborders-table tbody tr').each(function() {
                var row = $(this);
                var isMatch = false;
    
                // Iterate through each column in the row and check for a match
                row.find('td').each(function() {
                    var cellText = $(this).text().toLowerCase();
                    // If the column text contains the search text and matches the selected status, set isMatch to true
                    if (cellText.includes(searchText) && (statusFilter === '' || row.find('td:eq(6)').text().toLowerCase() === statusFilter)) {
                        isMatch = true;
                        return false; // Exit the loop if a match is found in this row
                    }
                });
    
                // Show/hide the row based on search and filter results
                row.toggle(isMatch);
            });
        });
    });
    

});



