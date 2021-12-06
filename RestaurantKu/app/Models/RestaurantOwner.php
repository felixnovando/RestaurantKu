<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantOwner extends Model
{
    use HasFactory;

    //    public function menu(){
//        return $this->hasMany(Menu::class,'resto_id','id');
//    }
//
//    public function order(){
//        return $this->hasMany(Order::class, 'resto_id','id');
//    }
//
//    public function reservation(){
//        return $this->hasMany(Reservation::class, 'resto_id','id');
//    }
//
//    public function pickup(){
//        return $this->hasMany(Pickup::class, 'resto_id','id');
//    }

    public function owner(){
        return $this->hasOne(Customer::class, 'id' , 'owner_id');
    }

    public function resto(){
        return $this->hasOne(Customer::class, 'id', 'resturant_id');
    }
}
