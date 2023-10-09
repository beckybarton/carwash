<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobOrder;
use App\Models\VehicleType;
use App\Models\Customer;
use App\Models\User;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $jobOrder = JobOrder::with(['customer','user','vehicle_type'])->find($request->joid);

        $payment =  new Payment();
        $payment->job_order_id = $jobOrder->id;
        $payment->customer_id = $jobOrder->customer_id;
        $payment->receiver_id = auth()->id();
        $payment->amount = $request->payment;
        $payment->receipt = $request->receipt;

        if($payment->save()){
            $jobOrder->status = "paid";
            if($jobOrder->save()){
                return back()->with('status', 'Payment Recorded Successfully!');
            }
            else{
                return back()->with('error', 'Something went wrong!');
            }
        }
        else{
            return back()->with('error', 'Something went wrong!');
        }

        // dd($jobOrder->customer->name);
        // $jobOrder = JobOrder::findOrFail($request->id);

        // $data = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'amount' => 'required|numeric|min:0'
        // ]);

        // $vehicleType->update($data);

        // return back()->with('status', 'Vehicle Type Updated Successfully!');
    }
}
