<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Order extends Controller
{
    public function Master()
    {
        return view('layouts/welcome');
    }
    public function OrderHome(){
        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
        $json = json_decode($json, true);
        $restaurants=$json["Restaurants"];
        return view ('pages/OrderHome',['restaurants'=>$restaurants]);
    }
    public function OrderMenu($restaurantId){
        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
        $json = json_decode($json, true);
        $menu = $this->getInfo($restaurantId,$json["MenuItems"]);
        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);
        return view ('pages/OrderMenu',['menu'=>$menu,'restaurant'=>$restaurant]);
    }
    public function OrderDetail($restaurantId){
        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
        $json = json_decode($json, true);
        $menu_order = $this->getInfo($restaurantId,$json["ReservationDetail"]);
        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);
        return view ('pages/OrderDetail',['menuOrder'=>$menu_order,'restaurant'=>$restaurant]);
    }
    public function OrderConfirmation($restaurantId){
        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
        $json = json_decode($json, true);
        $menu_order = $this->getInfo($restaurantId,$json["ReservationDetail"]);
        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);
        return view ('pages/OrderConfirmation',['menuOrder'=>$menu_order,'restaurant'=>$restaurant]);
    }
    private function getInfo($id, $array) {
        $result=[];
        foreach($array AS $index=>$json) {
            if($json['restaurantId'] == $id) {
                array_push($result,$json);
            }
        }
        return $result;
    }
}
