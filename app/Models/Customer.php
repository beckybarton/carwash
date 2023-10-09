<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function jobOrder(){
        return $this->hasMany(JobOrder::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
    }
}
