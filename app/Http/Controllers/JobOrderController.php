<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\JobOrder;
use App\Models\VehicleType;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;




class JobOrderController extends Controller
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

        $vehicleTypes = VehicleType::all();
        $allcustomers = Customer::all();
        return view('job_orders.index', compact('vehicleTypes', 'allcustomers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicleTypes = VehicleType::all();
        $customerNames = JobOrder::distinct()->pluck('customername');
        return view('job_orders.create')->with('vehicleTypes', $vehicleTypes)->with('customerNames', $customerNames);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_id' => 'required|string|max:255',
            'plate_number' => 'required|string|max:255',
            'vehicle_type_id' => 'required|exists:vehicle_types,id',
            'time_in' => 'required|date',
        ]);
        $data['user_id'] = auth()->id();
    
        if(JobOrder::create($data)){
            return redirect()->route('dashboard.index')->with('success', 'Job Order Created Successfully!');
            // return view('dashboard.index');
            // dd("su");
        }
        else{
            return back()->with('error', 'Job Order Not Created Successfully!');
        }
        // return redirect()->route('job-orders.index')->with('status', 'Job Order Created Successfully!');
    }

    public function filter(Request $request){
        $jobOrdersQuery = JobOrder::with(['user', 'customer', 'vehicle_type'])
                ->orderBy('created_at', 'desc');
        if ($request->has('search_term')) {
            $searchTerm = $request->search_term;
            $jobOrdersQuery->where(function ($query) use ($searchTerm) {
        
                // Search in the customer's name column through the relationship
                $query->whereHas('customer', function ($subQuery) use ($searchTerm) {
                    $subQuery->where('name', 'like', '%' . $searchTerm . '%');
                });
        
            }) // Close of the primary where function
            ->orWhere('plate_number', 'like', '%' . $searchTerm . '%')
            ->orWhere('status', 'like', '%' . $searchTerm . '%');
        }
        $jobOrders = $jobOrdersQuery->paginate(10);
    }

    /**
     * Display the specified resource.
     */

     public function statusupdate($id, Request $request){
        $jobOrder = JobOrder::findOrFail($id);
        
        $status = "";
        $message = "";
        $message_status ="";
        
        if ($request->input('action') == 'approved') {
            $status = 'approved';
            $message = "Job order approved!";
            $message_status = 'success';
        }

        elseif(($request->input('action') == 'rejected')){
            $status = 'rejected';
            $message = "Job order rejected!";
            $message_status = 'error';
        }

        elseif(($request->input('action') == 'completed')){
            $status = 'completed';
            $message = "Job order completed!";
            $message_status = 'success';
        }
        else{
            
        }

        $jobOrder->approver_id = auth()->id();
        $jobOrder->approved_date = now();
        $jobOrder->status = $status;
        $jobOrder->save();
        

        return redirect()->back()->with($message_status, $message);
    }

    public function show(JobOrder $jobOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobOrder $jobOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, JobOrder $jobOrder)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobOrder $jobOrder)
    {
        //
    }
}
