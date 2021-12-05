<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function  firstPageView(){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loggedUser'])) return redirect('home');
        return view('pages/first');
    }

    public function loginView(){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loggedUser'])) return redirect('home');
        return view('pages/login');
    }

    public function signUpVew(){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loggedUser'])) return redirect('home');
        return view('pages/signup');
    }

    public function forgotView(){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loggedUser'])) return redirect('home');
        print_r($_SESSION['loggedUser']);
        return view('pages/forgot');
    }

    public function homeMenuView(){
        if (session_status() === PHP_SESSION_NONE) session_start();;
        if(!isset($_SESSION['loggedUser'])) return redirect('/');
        return view('pages/home');
    }

    public function register(Request $request){

        if($request->email == null)
            return redirect()->back()->withErrors(['msg' => 'email must be filled']);
        elseif($request->name == null)
            return redirect()->back()->withErrors(['msg' => 'name must be filled']);
        else if($request->password == null)
            return redirect()->back()->withErrors(['msg' => 'password must be filled']);
        elseif($request->gender == null)
            return redirect()->back()->withErrors(['msg' => 'gender must be picked']);
        else if($request->date == null)
            return redirect()->back()->withErrors(['msg' => 'dob must be picked']);
        elseif(!$request->has('term'))
            return redirect()->back()->withErrors(['msg' => 'you must agree with our term and conditions']);

        $search = Customer::where('customer_email', '=', $request->email)->get();

        if(count($search) > 0) return redirect()->back()->withErrors(['msg' => 'username already exists']);

        $user = DB::table('customers')->insert([
            'customer_name' => $request->name,
            'customer_gender' => $request->gender,
            'customer_email' => $request->email,
            'customer_password' => password_hash($request->password, PASSWORD_BCRYPT),
            'customer_dob' => $request->date,
        ]);
        return redirect('login');
    }

    public function login(Request $request){
//        $user = Customer::where('customer_email', '=', $request->email)
//            ->where('customer_password', '=', $request->password)->get();
        if($request->email == null)
            return redirect()->back()->withErrors(['msg' => 'email must be filled']);
        else if($request->password == null)
            return redirect()->back()->withErrors(['msg' => 'password must be filled']);

        if (session_status() === PHP_SESSION_NONE) session_start();
        $user = null;
        $users = Customer::all();
        for($i = 0; $i < count($users); $i++){
            if(strcmp($users[$i]['customer_email'], $request->email) == 0 && password_verify($request->password,$users[$i]['customer_password']) == true){
                $user = $users[$i];
                break;
            }
        }
        $_SESSION['loggedUser'] = $user;
        if($user != null) {
            if($_SESSION['loggedUser']['role_id']!=3)return redirect('home');
            else if(($_SESSION['loggedUser']['role_id']==3)) return redirect('Restaurant/Menu');
        }
        else return redirect()->back()->withErrors(['msg' => 'invalid username or password']);
    }
    public function logOut(){
        session_start();
        unset($_SESSION['loggedUser']);
        session_unset();
        session_destroy();
        return redirect('login');
    }
}
