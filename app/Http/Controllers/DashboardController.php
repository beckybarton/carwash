<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobOrder;
use App\Models\VehicleType;
use App\Models\Customer;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
        $jobOrders = JobOrder::with([
            'user', 
            'customer',
            'vehicle_type',
        ])->orderBy('created_at', 'desc')
          ->paginate(10);
        
        $vehicleTypes = VehicleType::all();
        $allcustomers = Customer::all();
        return view('dashboard.index', compact('vehicleTypes', 'allcustomers', 'jobOrders'));
    }

    public function getJobOrders()
    {
        $jobOrders = JobOrder::select(['id', 'customer_name', 'plate_number']);

        return DataTables::of($jobOrders)->make(true);
    }
}
