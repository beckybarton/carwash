<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'receiver_id',
        'amount',
        'receipt',
    ];

    public function jobOrder(){
        return $this->belongsTo(Customer::class);
    }

    public static function getTotalPayment($customerId){
        return self::where('customer_id', $customerId)->sum('amount');
    }


}
