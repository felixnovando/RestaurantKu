<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['customer_id','resto_id','status' ,'pick_up_time'];

    public function details(){
        return $this->hasMany(PickupDetail::class,'pickup_id','id');
    }

    public function resto(){
        return $this->hasOne(Resto::class,'id','resto_id');
    }

    public function customer(){
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
}
