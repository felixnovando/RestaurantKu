<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $primaryKey = null;

    public $fillable = ['pickup_id','menu_id', 'qty', 'description'];

    public function menu(){
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }

    public function pickup(){
        return $this->hasOne(Pickup::class, 'id', 'pickup_id');
    }
}
