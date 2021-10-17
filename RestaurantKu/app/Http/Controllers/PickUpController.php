<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Pickup;
use App\Models\Resto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PickUpController extends Controller
{
    public function Master()
    {
        return view('layouts/welcome');
    }
    public function PickupHomeView()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');
        return view('pages/PickupHome');
    }
    public function PickupHome()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');
//        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
//        $json = json_decode($json, true);
//        $restaurants=$json["Restaurants"];

        $restaurants = Resto::paginate(4);
        return view ('pages/PickupHome',['restaurants'=>$restaurants]);
    }
    public function PickupMenu($restaurantId)
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');
//        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
//        $json = json_decode($json, true);
//        $menu = $this->getInfo($restaurantId,$json["MenuItems"]);
//        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);
//        return view ('pages/PickupMenu',['menu'=>$menu,'restaurant'=>$restaurant]);

        $restaurant = Resto::where('id',  '=', $restaurantId)->get();
        $menu = Menu::where('resto_id', '=' , $restaurantId)->get();
        return view ('pages/PickupMenu',['menus'=>$menu,'restaurant'=>$restaurant]);
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
//        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
//        $json = json_decode($json, true);
//        $menu_order = $this->getInfo($restaurantId,$json["ReservationDetail"]);
//        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);

        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');
//        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
//        $json = json_decode($json, true);
//        $menu_order = $this->getInfo($restaurantId,$json["ReservationDetail"]);
//        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);

        $menus = Menu::Where("resto_id", "=", $restaurantId)->get();
        $restaurant = Resto::where('id',  '=', $restaurantId)->get();
        $totalPrice = 0;

        for($i=0; $i<count($menus); $i++){
            if($_SESSION['pickup_menu_qty'][$i] > 0){
                $totalPrice += $menus[$i]['menu_price'] * $_SESSION['pickup_menu_qty'][$i];
            }
        }
        $_SESSION['total'] = $totalPrice;
        return view ('pages/PickupDetail',['restaurant'=>$restaurant, 'menuOrder'=>$menus, 'totalPrice' => $totalPrice]);
    }

    public function OrderPickUp(Request $request, $restaurantId){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');

        $time = ($request->time != "") ? explode(":", $request->time) : [0, 0];

//      make order
        $pickupHeader = new Pickup([
            'customer_id' => $_SESSION['loggedUser']['id'],
            'resto_id' => $restaurantId,
            'status' => 'ongoing',
            'pick_up_time' => date_time_set(date_create_from_format("j/m/Y" ,$request->date), $time[0],$time[1],00),
        ]);

        $pickupHeader->save();
        //detail
        $len = count($_SESSION['order_menu_qty']);
        for($i = 0; $i < $len; $i++){
            if($_SESSION['order_menu_qty'][$i] > 0){
                DB::table('pickup_details')->insert([
                    'pickup_id' => $pickupHeader->id,
                    'menu_id' => $_SESSION['order_menu_ids'][$i],
                    'qty' => $_SESSION['order_menu_qty'][$i],
                    'description' => ''
                ]);
            }
        }
        return redirect('PickupConfirmation/' . $pickupHeader->id);
    }

    public function PickupConfirmation($pickUpId){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');

        $pickup = Pickup::where("id", "=", $pickUpId)->get()[0];
        $total = 0;
        foreach($pickup->details as $detail){
            $total += $detail->qty * $detail->menu->menu_price;
        }

        return view ('pages/PickupConfirmation',['pickup'=>$pickup,'totalPrice'=>$total]);
    }
}
