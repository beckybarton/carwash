<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>C-ONE Sports Center : Car Wash Job Order</title>
        <style>
             body {
                font-family: Arial, sans-serif;
            }

            .billing-statement {
                max-width: 800px;
                margin: 0 auto;
                padding: 40px;
                border: 1px solid #ccc;
                border-radius: 10px;
            }

            .header {
                text-align: center;
                margin-bottom: 40px;
            }

            .customer-info {
                margin-bottom: 30px;
            }
            table.table-striped tbody tr:nth-child(odd) {
                background-color: #f2f2f2;
            }

            table.table-bordered,
            table.table-bordered th,
            table.table-bordered td {
                border: 1px solid #ddd; /* Border color */
            }

            table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
                border-collapse: collapse;
            }

            table th,
            table td {
                padding: 0.75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
            }

            table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }

            table tbody + tbody {
                border-top: 2px solid #dee2e6;
            }

            .text-end {
                text-align: right;
            }

            .small {
                font-size: 0.875rem; /* 14px */
            }

            .text-left{
                text-align: left;
            }




        </style>
    </head>

<body>
    <div class="container mt-5">
        <div class="billing-statement bg-light p-4">
            <div class="header">
                <h2 class="mb-4">C-ONE Sports Center : Car Wash</h2>
                <h3 class="mb-4">Billing Statement</h3>
            </div>

            <div class="customer-info">
                <p><strong>Customer Name:</strong>{{ ucwords($unpaidtransactions->first()->customer->name) }}</p>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="small text-left">ID</th>
                            <th class="small text-left">Date</th>
                            <th class="small text-left">Type</th>
                            <th class="small text-left">Plate Number</th>
                            <th class="text-end small">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unpaidtransactions as $unpaidtransaction)
                            <tr>
                                <td class="small text-left">{{ str_pad($unpaidtransaction->id, 4, '0', STR_PAD_LEFT) }}</td>
                                <td class="small text-left">{{ Carbon\Carbon::parse($unpaidtransaction->created_at)->format('M d, Y') }}</td>
                                <td class="small text-left">{{ ucwords($unpaidtransaction->vehicle_type->name) }}</td>
                                <td class="small text-left">{{ strtoupper($unpaidtransaction->plate_number) }}</td>
                                <td class="text-end small">{{ number_format($unpaidtransaction->amount,2) }}</td>
                            </tr>   
                        @endforeach
                        <tr>
                            <td class="small text-left" colspan="3"><strong>Total Payable: </strong></td>
                            <td class="text-end small"><strong>{{number_format($totalPayable,2)}}</strong></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <p class="small">Please make checks payable to: C-ONE Sports Center</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>
