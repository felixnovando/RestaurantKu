<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Reservation;
use App\Models\Resto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function ReservationType(){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');
        return view('pages/reservationType');
    }

    public function ReservationHistoryPast(){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');
        $reservations = Reservation::where('customer_id', '=', $_SESSION['loggedUser']["id"])->where("status","!=","ongoing")->orderBy("id",'DESC')->get();
        return view('pages/reservationHistoryPast',['reservations' => $reservations]);
    }

    public function ReservationHistoryUpcoming(){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');

        $reservations = Reservation::where('customer_id', '=', $_SESSION['loggedUser']["id"])->where("status","=","ongoing")->orderBy("id",'DESC')->get();
        return view('pages/reservationHistoryUpcoming',['reservations' => $reservations]);
    }
    public function ReservationHome(){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');
//        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
//        $json = json_decode($json, true);
//        $restaurants=$json["Restaurants"];
        $restaurants = Resto::paginate(4);
        return view ('pages/reservationHome',['restaurants'=>$restaurants]);
    }
    public function ReservationMenu($restaurantId){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');
//        $json = file_get_contents(base_path('public\storage\assets\dummy\Restorant.json'));
//        $json = json_decode($json, true);
//        $menu = $this->getInfo($restaurantId,$json["MenuItems"]);
//        $restaurant = $this->getInfo($restaurantId,$json["Restaurants"]);
//        return view ('pages/ReservationMenu',['menu'=>$menu,'restaurant'=>$restaurant]);

        $restaurant = Resto::where('id',  '=', $restaurantId)->get();
        $menu = Menu::where('resto_id', '=' , $restaurantId)->get();
        return view ('pages/ReservationMenu',['menus'=>$menu,'restaurant'=>$restaurant]);
    }
    public function ReservationDetail($restaurantId){
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
            if($_SESSION['reservation_menu_qty'][$i] > 0){
                $totalPrice += $menus[$i]['menu_price'] * $_SESSION['reservation_menu_qty'][$i];
            }
        }
        $_SESSION['total'] = $totalPrice;
        return view ('pages/ReservationDetail',['restaurant'=>$restaurant, 'menuOrder'=>$menus, 'totalPrice' => $totalPrice]);
    }


    public function reserve(Request $request , $restaurantId){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');

        $time = ($request->time != "") ? explode(":", $request->time) : [0, 0];
        $reservation_header = new Reservation([
            'customer_id' => $_SESSION['loggedUser']['id'],
            'reservation_time' => date_time_set(date_create_from_format("j/m/Y" ,$request->date), $time[0],$time[1],00),
            'status' => 'ongoing',
            'adult_seats' => $request->adult_count,
            'child_seats' => $request->child_count,
            'baby_seats' => $request->baby_count,
            'resto_id' => $restaurantId,
        ]);

        $reservation_header->save();

        $len = count($_SESSION['reservation_menu_ids']);

        $total = 0;
        for($i = 0; $i < $len; $i++){
            $total += $_SESSION['reservation_menu_qty'][$i];
        }

        if($total > 0){
//          make order
            $orderHeader = new Order([
                'customer_id' => $_SESSION['loggedUser']['id'],
                'resto_id' => $restaurantId,
                'status' => 'ongoing',
                'order_time' => date_time_set(date_create_from_format("j/m/Y" ,$request->date), $time[0],$time[1],00),
                'reservation_id' => $reservation_header->id,
            ]);

            $orderHeader->save();
            //detail
            $total = 0;
            $details = [];
            for($i = 0; $i < $len; $i++){
                if($_SESSION['reservation_menu_qty'][$i] > 0){
                    DB::table('order_details')->insert([
                        'order_id' => $orderHeader->id,
                        'menu_id' => $_SESSION['reservation_menu_ids'][$i],
                        'qty' => $_SESSION['reservation_menu_qty'][$i],
                        'description' => ''
                    ]);
                }
            }
        }
        return redirect('ReservationConfirmation/' . $reservation_header->id);
    }


    public function ReservationConfirmation($reservation_id){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');

        $reservation = Reservation::where("id", "=", $reservation_id)->get();

        $order = $reservation[0]->order;
        $total = 0;
        if($order != null){
            foreach($order->details as $detail){
                $total += $detail->qty * $detail->menu->menu_price;
            }
        }

        return view ('pages/ReservationConfirmation',['reservation'=>$reservation[0],'total'=>$total]);
    }
    private function getInfo($id, $array) {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(!isset($_SESSION['loggedUser'])) return redirect('/');
        $result=[];
        foreach($array AS $index=>$json) {
            if($json['restaurantId'] == $id) {
                array_push($result,$json);
            }
        }
        return $result;
    }
}
