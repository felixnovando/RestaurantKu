<?php

namespace App\Http\Controllers;

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
        return view('pages.Transaction');
    }
    public function transactionDetailPage(){
        return view('pages.TransactionDetail');
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
}
