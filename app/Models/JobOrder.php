<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'user_id',
        'vehicle_type_id',
        'plate_number',
        'time_in',
        'status',
        'approver_id',
        'approved_date',
        'amount',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function vehicle_type()
    {
        return $this->belongsTo('App\Models\VehicleType');
    }
    public function payment(){
        return $this->has(Payment::class);
    }

    public static function getTotalPayable($customerId){
        return self::where('customer_id', $customerId)
               ->sum('amount');
    }

}
