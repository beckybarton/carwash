<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use App\Models\JobOrder;
use App\Models\Customer;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobOrders = JobOrder::with([
            'user', 
            'customer',
            'vehicle_type',
        ])->orderBy('created_at', 'desc')
          ->paginate(10);
          
        $vehicleTypes = VehicleType::paginate(10);
        $allcustomers = Customer::all();
        return view('vehicle_types.index', compact('vehicleTypes', 'allcustomers'));
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
        $existingVehicleType = VehicleType::where('name', $request->input('name'))->first();
        if ($existingVehicleType){
            return back()->with('error', 'Vehicle Type already exists!');
        }
        else {
            $data = $request->validate([
                'name' => 'required|string|max:255|unique:vehicle_types,name',
                'amount' => 'required|numeric|min:0'
            ]);

            if(VehicleType::create($data)){
                return back()->with('success', 'Vehicle Type Created Successfully!');
            }
            else{
                return back()->with('error', 'Vehicle Type Created Not Successful!');
            }
        }

        
    }


    /**
     * Display the specified resource.
     */
    public function show(VehicleType $vehicleType)
    {
        $vehicleType = VehicleType::findOrFail($id);
        return response()->json($vehicleType);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleType $vehicleType)
    {
        $vehicleType = VehicleType::findOrFail($id);
        return view('vehicle_type_edit', compact('vehicleType')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleType $vehicleType)
    {
        $vehicleType = VehicleType::findOrFail($request->id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0'
        ]);

        $vehicleType->update($data);

        return back()->with('status', 'Vehicle Type Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleType $vehicleType)
    {
        //
    }
}
