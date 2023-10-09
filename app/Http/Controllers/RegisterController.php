<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\VehicleType;
use App\Models\Customer;
use App\Models\JobOrder;

class RegisterController extends Controller
{
    public function index(){
        // return view('users.register');
        $vehicleTypes = VehicleType::all();
        $allcustomers = Customer::all();
        return view('users.register', compact('vehicleTypes', 'allcustomers'));
    }

    public function registerSave(Request $request){
        // Validate the form data
        $validatedData = $request->validate([
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'role' => 'required|max:255',
            'email' => 'required|email|unique:users',
        ]);

        $password = strtolower($validatedData['first_name'] . $validatedData['last_name']);
        $password = str_replace(' ', '', $password);

        $user = new User();
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];
        $user->password = Hash::make($password);
        
        if($user->save()){
            return redirect()->back()->with('success', 'User added successfully');
        }
        
    }
}
