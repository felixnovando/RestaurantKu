<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Pickup;
use App\Models\PickupDetail;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

class RestoController extends Controller
{
    public function getRestoranId(){
        if (session_status() === PHP_SESSION_NONE) session_start();
        $user_id=$_SESSION['loggedUser']['id'];
        $resto_id=DB::table('restaurant_owner')
        ->where('restaurant_owner.owner_id','=',$user_id)
        ->select('restaurant_owner.resturant_id')
        ->first();
        return $resto_id->resturant_id;
    }
    public function listMenu(){
        if (session_status() === PHP_SESSION_NONE) session_start();
        $user_id=$_SESSION['loggedUser']['id'];
        $list_menu=DB::table('restaurant_owner')
        ->join('menus','menus.resto_id','=','restaurant_owner.resturant_id')
        ->where('restaurant_owner.owner_id','=',$user_id)
        ->select('menus.*')
        ->get();
        return $list_menu;
    }
    public function insertMenu($name,$price,$image,$description){
        DB::table('menus')->insert([
            'resto_id' => $this->getRestoranId(),
            'menu_name' => $name,
            'menu_price' => (int)$price,
            'menu_image' => $image,
            'menu_description' => $description
        ]);
    }
    public function listOrder(){
        $list_order=DB::table('reservations')
        ->where('reservations','=',$this->getRestoranId())
        ->get();
        return $list_order;
    }
    public function menuListPage(){
        return view('pages.ManageMenu',['menu'=>$this->listMenu()]);
    }
    public function addMenuPage(){
        return view('pages.AddMenu');
    }
    public function transactionPage(){
        $id = $this->getRestoranId();
        $ordered_status = ['ongoing','paid', 'canceled'];
        $pickUps = Pickup::query()->where("resto_id",'=', $id)->get();

        $pickUps = $pickUps->sortBy(function ($model) use ($ordered_status){
            return array_search($model->status, $ordered_status);
        });

        $reservations = Reservation::query()->where("resto_id", '=', $id)->get();

        $reservations = $reservations->sortBy(function ($model) use ($ordered_status){
            return array_search($model->status, $ordered_status);
        });

        $orders = Order::query()->where('resto_id', '=', $id)
            ->whereNull('reservation_id')
            ->get();

        $orders = $orders->sortBy(function ($model) use ($ordered_status){
            return array_search($model->status, $ordered_status);
        });

        return view('pages.Transaction', compact('pickUps', 'reservations', 'orders'));
    }
    public function transactionDetailPage($type, $id){
        $datas = null;
        $status = null;
        if(strcmp($type, "order") == 0){
            $datas = OrderDetail::query()->where("order_id", "=", $id)->get();
            $order = Order::query()->where('id','=',$id)->get()[0];
            $status = $order->status;
        }else if(strcmp($type, "pickup") == 0){
            $datas = PickupDetail::query()->where("pickup_id", "=", $id)->get();
            $pickup = Pickup::query()->where('id','=',$id)->get()[0];
            $status = $pickup->status;
        }else if(strcmp($type, "reservation") == 0){
            $datas = Reservation::query()->where("id", "=", $id)->get();
            $datas = $datas[0];
            $status = $datas->status;
        }
        return view('pages.TransactionDetail', compact('type', 'datas', 'status', 'id'));
    }
    public function fileUpload(Request $req){
        $req->validate([
          'imageFile' => 'required',
          'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);
        if($req->hasfile('imageFile')) {
            foreach($req->file('imageFile') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/storage/assets/images', $name);
                $imgData[] = $name;
            }
            $imagePath=strval('storage/assets/images/'.$imgData[0]);
            $this->insertMenu($req->name,$req->price,$imagePath,$req->desc);
           return redirect('/Restaurant/Menu');
        }
    }

      public function acceptOrder($type, $id){
          if(strcmp($type, "order") == 0){
              $datas = OrderDetail::query()->where("order_id", "=", $id)->get()[0];
              $datas->status = "paid";
              $datas->save();
          }else if(strcmp($type, "pickup") == 0){
              $datas = PickupDetail::query()->where("pickup_id", "=", $id)->get()[0];
              $datas->status = "paid";
              $datas->save();
          }else if(strcmp($type, "reservation") == 0){
              $datas = Reservation::query()->where("id", "=", $id)->get()[0];
              if($datas->order != null) $datas->order->status = "paid";
              $datas->status = "paid";
              $datas->save();
          }
          return redirect('/Restaurant/Transaction');
      }

    public function rejectOrder($type, $id){
        if(strcmp($type, "order") == 0){
            $datas = OrderDetail::query()->where("order_id", "=", $id)->get()[0];
            $datas->status = "canceled";
            $datas->save();
        }else if(strcmp($type, "pickup") == 0){
            $datas = PickupDetail::query()->where("pickup_id", "=", $id)->get()[0];
            $datas->status = "canceled";
            $datas->save();
        }else if(strcmp($type, "reservation") == 0){
            $datas = Reservation::query()->where("id", "=", $id)->get()[0];
            if($datas->order != null) $datas->order->status = "canceled";
            $datas->status = "canceled";
            $datas->save();
        }
        return redirect('/Restaurant/Transaction');
    }
}
