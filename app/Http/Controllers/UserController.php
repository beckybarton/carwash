<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobOrder;
use App\Models\VehicleType;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('username', 'asc')
          ->paginate(10);
        
          $jobOrders = JobOrder::with([
            'user', 
            'customer',
            'vehicle_type',
        ])->orderBy('created_at', 'desc')
          ->paginate(10);
        
        $vehicleTypes = VehicleType::all();
        $allcustomers = Customer::all();

        $totalsPerCustomer = [];
        foreach ($allcustomers as $customer) {
            $totalsPerCustomer[$customer->id] = JobOrder::getTotalPayable($customer->id);
        }    
        
        return view('users.index', compact('vehicleTypes', 'allcustomers','jobOrders', 'totalsPerCustomer', 'users'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);
        $user = User::find($request->user_id);

        $user->password = Hash::make($user->username);
        $user->save();
        return redirect()->back()->with('success', 'Password reset successfully.');
    }

    public function showChangePasswordForm()
    {
        return view('change-password-form');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        $user->password = Hash::make($request->new_password);
        $user->save();

        if($user->save()){
            return redirect()->back()->with('success', 'Password changed successfully.');
        }
        else{
            return redirect()->back()->with('error', 'Password reset not successful.');
        }

            
    }
}
