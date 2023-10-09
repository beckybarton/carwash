<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobOrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });
// Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard.index');


// VEHICLE TYPES
Route::get('/vehicle-types', [VehicleTypeController::class, 'index'])->name('vehicle-types.index')->middleware('auth');
Route::post('/vehicle-type/store', [VehicleTypeController::class, 'store'])->name('vehicle-type.store')->middleware('auth');
Route::get('/vehicle-types/{id}/edit', [VehicleTypeController::class, 'edit'])->name('vehicle-types.edit')->middleware('auth');
Route::put('/vehicle-types/{id}', [VehicleTypeController::class, 'update'])->name('vehicle-types.update')->middleware('auth');
Route::get('/vehicle-types/{id}', [VehicleTypeController::class, 'show'])->name('vehicle-types.show')->middleware('auth');

// JOB ORDERS
Route::resource('job-orders', JobOrderController::class)->middleware('auth');
Route::get('/josearch', [JobOrderController::class, 'filter'])->name('jobOrder.filter');
Route::get('/joborders/data', [DashboardController::class, 'getJobOrders'])->name('joborders.data');
Route::post('/approve-jo/{id}', [JobOrderController::class, 'statusupdate'])->name('joborder.statusupdate');


// CUSTOMERS
// Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::resource('customers', CustomerController::class)->middleware('auth');

// USER MANAGEMENT
// USER MANAGEMENT
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'registerSave'])->name('register.post');
// Route::get('/users', [UserController::class, 'index'])->name('users');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');