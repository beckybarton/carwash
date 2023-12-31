<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\VehicleType;
use App\Models\JobOrder;
use App\Models\Payment;
use PDF;
use Spatie\Browsershot\Browsershot;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $jobOrders = JobOrder::with([
            'user', 
            'customer',
            'vehicle_type',
        ])->orderBy('created_at', 'desc')
          ->paginate(10);
        
        $vehicleTypes = VehicleType::all();
        $allcustomers = Customer::all();
        $customerNames = Customer::paginate(10);

        $payablesPerCustomer = [];
        foreach ($allcustomers as $customer) {
            $payablesPerCustomer[$customer->id] = JobOrder::getTotalPayable($customer->id);
        }      
        
        $paymentsPerCustomer = [];
        foreach ($allcustomers as $customer) {
            $paymentsPerCustomer[$customer->id] = Payment::getTotalPayment($customer->id);
        }  
        
        return view('customers.index', compact('vehicleTypes', 'allcustomers','jobOrders', 'payablesPerCustomer' ,'customerNames', 'paymentsPerCustomer'));
    }

    public function transactions($customer){
        $transactions = JobOrder::with([
            'user',
            'customer',
            'vehicle_type',
             ])->where('customer_id', $customer)
             ->where('status', '!=', 'rejected')
             ->doesntHave('payment') 
             ->get();

        $customername = Customer::find($customer);

        $totalPayable = JobOrder::where('customer_id', $customer)
            ->where('status', '!=', 'rejected')
            ->sum('amount');
        $totalPayment = Payment::where('customer_id', $customer)->sum('amount');

        return response()->json(['transactions' => $transactions, 'totalPayable' => $totalPayable, 'totalPayment' => $totalPayment, 'customername' => $customername->name]);
    }

    public function unpaidtransactions($customer_id){
        // Fetch data from the database (replace YourModel with your actual model)
        $unpaidtransactions = JobOrder::with([
            'user',
            'customer',
            'vehicle_type',
        ])->where('customer_id', $customer_id)
          ->doesntHave('payment') 
          ->where('status', '!=', 'rejected')
          ->get();

        $totalPayable = $unpaidtransactions->sum('amount');

        // dd($unpaidtransactions->first()->customer->name);

        $pdf = PDF::loadView('customers.billing', ['unpaidtransactions' => $unpaidtransactions, 'totalPayable' => $totalPayable]);

        // Download the PDF file
        return $pdf->download('billing_statement.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingcustomer = Customer::where('name', $request->input('name'))->first();
        if ($existingcustomer){
            return back()->with('error', 'Customer already exists!');
        }
        else {
            $data = $request->validate([
                'name' => 'required|string|max:255|unique:customers,name'
            ]);

            if(Customer::create($data)){
                return back()->with('success', 'Customer Created Successfully!');
            }
            else{
                return back()->with('error', 'Customer Created Not Successful!');
            }
        }
    }
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
