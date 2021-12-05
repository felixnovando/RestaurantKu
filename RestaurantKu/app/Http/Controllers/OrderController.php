<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Reservation;
use App\Models\Resto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function OrderHome(){
        //klu gamao spam ini taruh di header je
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');
//        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
//        $json = json_decode($json, true);
        $restaurants = Resto::paginate(4);
        return view ('pages/OrderHome',['restaurants'=>$restaurants]);
    }
    public function OrderMenu($restaurantId){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');
//        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
//        $json = json_decode($json, true);
//        $menu = $this->getInfo($restaurantId,$json["MenuItems"]);
//        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);

        $restaurant = Resto::where('id',  '=', $restaurantId)->get();
        $menu = Menu::where('resto_id', '=' , $restaurantId)->get();
        return view ('pages/OrderMenu',['menus'=>$menu,'restaurant'=>$restaurant]);
    }
    public function OrderDetail($restaurantId){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');
//        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
//        $json = json_decode($json, true);
//        $menu_order = $this->getInfo($restaurantId,$json["ReservationDetail"]);
//        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);


//        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
//        $json = json_decode($json, true);
//        $menu_order = $this->getInfo($restaurantId,$json["ReservationDetail"]);
//        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);

        $menus = Menu::Where("resto_id", "=", $restaurantId)->get();
        $restaurant = Resto::where('id',  '=', $restaurantId)->get();

        $totalPrice = 0;
        for($i=0; $i<count($menus); $i++){
            if($_SESSION['order_menu_qty'][$i] > 0){
                $totalPrice += $menus[$i]['menu_price'] * $_SESSION['order_menu_qty'][$i];
            }
        }
        $_SESSION['total'] = $totalPrice;
        return view ('pages/OrderDetail',['restaurant'=>$restaurant, 'menuOrder'=>$menus, 'totalPrice' => $totalPrice]);
    }

    public function Order(Request $request, $restaurantId){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');

        $time = ($request->time != "") ? explode(":", $request->time) : [0, 0];

//      make order
        $orderHeader = new Order([
            'customer_id' => $_SESSION['loggedUser']['id'],
            'resto_id' => $restaurantId,
            'status' => 'ongoing',
            'order_time' => date_time_set(date_create_from_format("j/m/Y" ,$request->date), $time[0],$time[1],00),
        ]);

        $orderHeader->save();
        //detail
        $len = count($_SESSION['order_menu_qty']);
        for($i = 0; $i < $len; $i++){
            if($_SESSION['order_menu_qty'][$i] > 0){
                DB::table('order_details')->insert([
                    'order_id' => $orderHeader->id,
                    'menu_id' => $_SESSION['order_menu_ids'][$i],
                    'qty' => $_SESSION['order_menu_qty'][$i],
                    'description' => ''
                ]);
            }
        }
        return redirect('OrderConfirmation/' . $orderHeader->id);
    }

    public function OrderConfirmation($orderId){
//        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
//        $json = json_decode($json, true);
//        $menu_order = $this->getInfo($restaurantId,$json["ReservationDetail"]);
//        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);

        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');

        $order = Order::where("id", "=", $orderId)->get()[0];
        $total = 0;
        foreach($order->details as $detail){
            $total += $detail->qty * $detail->menu->menu_price;
        }
        return view ('pages/OrderConfirmation',['order'=>$order,'totalPrice'=>$total]);
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
