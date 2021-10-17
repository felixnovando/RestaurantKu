<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['customer_id' , 'resto_id','status', 'order_time', 'reservation_id'];

    public function details(){
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public function reservation(){
        return $this->hasOne(Reservation::class,'id','reservation_id');
    }

    public function resto(){
        return $this->hasOne(Resto::class,'id','resto_id');
    }

    public function customer(){
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
}
