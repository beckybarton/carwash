<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\VehicleType;
use App\Models\JobOrder;
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
        $customerNames = Customer::paginate(10);
        $allcustomers = Customer::all();
        return view('customers.index', compact('vehicleTypes','customerNames', 'allcustomers'));
        // dd($customerNames);
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
