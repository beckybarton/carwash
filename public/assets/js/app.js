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

    $(function() {
        $('#joborders-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: jobordersDataUrl, // use the variable here
            columns: [
                { data: 'id', name: 'id' }
            ]
        });
    });
    
    
    

});



