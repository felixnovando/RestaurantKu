<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reservation;
use App\Http\Controllers\Order;
use App\Http\Controllers\Pickup;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [Reservation::class,'Master']);
Route::get('/first', [Reservation::class, 'firstPageView']);
Route::get('/login', [Reservation::class, 'loginView']);
Route::get('/signup', [Reservation::class, 'signUpVew']);
Route::get('/forgot', [Reservation::class, 'forgotView']);
Route::get('/home', [Reservation::class, 'homeMenuView']);

Route::get('/ReservationType', [Reservation::class,'ReservationType']);
Route::get('/ReservationHistoryPast', [Reservation::class,'ReservationHistoryPast']);
Route::get('/ReservationHistoryUpcoming', [Reservation::class,'ReservationHistoryUpcoming']);
Route::get('/ReservationHome', [Reservation::class,'ReservationHome']);
Route::get('/ReservationMenu/{restaurantId}', [Reservation::class,'ReservationMenu']);
Route::get('/ReservationDetail/{restaurantId}', [Reservation::class,'ReservationDetail']);
Route::get('/ReservationConfirmation/{restaurantId}', [Reservation::class,'ReservationConfirmation']);

Route::get('/OrderHome', [Order::class,'OrderHome']);
Route::get('/OrderMenu/{restaurantId}', [Order::class,'OrderMenu']);
Route::get('/OrderDetail/{restaurantId}', [Order::class,'OrderDetail']);
Route::get('/OrderConfirmation/{restaurantId}', [Order::class,'OrderConfirmation']);

Route::get('/PickupHome', [Pickup::class,'PickupHome']);
Route::get('/PickupMenu', [Pickup::class,'PickupMenu']);
Route::get('/PickupMenu/{restaurantId}', [Pickup::class,'PickupMenu']);
Route::get('/PickupDetail/{restaurantId}', [Pickup::class,'PickupDetail']);
Route::get('/PickupConfirmation/{restaurantId}', [Pickup::class,'PickupConfirmation']);
