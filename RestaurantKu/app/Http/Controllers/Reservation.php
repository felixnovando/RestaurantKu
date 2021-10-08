<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Reservation extends Controller
{
    public function Master()
    {
        return view('layouts/welcome');
    }
    public function ReservationType(){
        return view('pages/reservationType');
    }
    public function ReservationHistoryPast(){return view('pages/reservationHistoryPast');}
    public function ReservationHistoryUpcoming(){return view('pages/reservationHistoryUpcoming');}
    public function ReservationHome(){
        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
        $json = json_decode($json, true);
        $restaurants=$json["Restaurants"];
        return view ('pages/reservationHome',['restaurants'=>$restaurants]);
    }
    public function ReservationMenu($restaurantId){
        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
        $json = json_decode($json, true);
        $menu = $this->getInfo($restaurantId,$json["MenuItems"]);
        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);
        return view ('pages/ReservationMenu',['menu'=>$menu,'restaurant'=>$restaurant]);
    }
    public function ReservationDetail($restaurantId){
        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
        $json = json_decode($json, true);
        $menu_order = $this->getInfo($restaurantId,$json["ReservationDetail"]);
        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);
        return view ('pages/ReservationDetail',['menuOrder'=>$menu_order,'restaurant'=>$restaurant]);
    }
    public function ReservationConfirmation($restaurantId){
        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
        $json = json_decode($json, true);
        $menu_order = $this->getInfo($restaurantId,$json["ReservationDetail"]);
        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);
        return view ('pages/ReservationConfirmation',['menuOrder'=>$menu_order,'restaurant'=>$restaurant]);
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
