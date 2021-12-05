<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function order(){
        return $this->hasMany(Order::class,'customer_id','id');
    }

    public function reservation(){
        return $this->hasMany(Reservation::class,'customer_id','id');
    }

    public function pickup(){
        return $this->hasMany(Pickup::class,'customer_id','id');
    }
}
