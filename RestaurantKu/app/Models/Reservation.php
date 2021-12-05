<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['customer_id', 'reservation_time', 'status', 'adult_seats', 'child_seats', 'baby_seats', 'resto_id'];

    public function order(){
        return $this->hasOne(Order::class,'reservation_id','id');
    }

    public function resto(){
        return $this->hasOne(Resto::class,'id','resto_id');
    }

    public function customer(){
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
}
