<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pickup extends Controller
{
    public function Master()
    {
        return view('layouts/welcome');
    }
    public function PickupHomeView()
    {
        return view('pages/PickupHome');
    }
    public function PickupHome()
    {
        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
        $json = json_decode($json, true);
        $restaurants=$json["Restaurants"];
        return view ('pages/PickupHome',['restaurants'=>$restaurants]);
    }
    public function PickupMenu($restaurantId)
    {
        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
        $json = json_decode($json, true);
        $menu = $this->getInfo($restaurantId,$json["MenuItems"]);
        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);
        return view ('pages/PickupMenu',['menu'=>$menu,'restaurant'=>$restaurant]);
    }
    private function getInfo($id, $array)
    {
        $result=[];
        foreach($array AS $index=>$json) {
            if($json['restaurantId'] == $id) {
                array_push($result,$json);
            }
        }
        return $result;
    }
    public function PickupDetail($restaurantId){
        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
        $json = json_decode($json, true);
        $menu_order = $this->getInfo($restaurantId,$json["ReservationDetail"]);
        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);
        return view ('pages/PickupDetail',['menuOrder'=>$menu_order,'restaurant'=>$restaurant]);
    }
    public function PickupConfirmation($restaurantId){
        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
        $json = json_decode($json, true);
        $menu_order = $this->getInfo($restaurantId,$json["ReservationDetail"]);
        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);
        return view ('pages/PickupConfirmation',['menuOrder'=>$menu_order,'restaurant'=>$restaurant]);
    }
}
