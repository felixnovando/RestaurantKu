<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $primaryKey = null;

    protected $fillable = ['order_id', 'menu_id', 'qty', 'description'];

    public function menu(){
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }

    public function order(){
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
}
