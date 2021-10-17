<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reservation;
use App\Http\Controllers\Order;

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
Route::get('/', [CustomerController::class, 'firstPageView']);
Route::get('/login', [CustomerController::class, 'loginView']);
Route::post('/login', [CustomerController::class, 'login']);

Route::get('/signup', [CustomerController::class, 'signUpVew']);
Route::post('/signup', [CustomerController::class, 'register']);

Route::get('/forgot', [CustomerController::class, 'forgotView']);
Route::get('/home', [CustomerController::class, 'homeMenuView']);

Route::get('/ReservationType', [ReservationController::class,'ReservationType']);
Route::get('/ReservationHistoryPast', [ReservationController::class,'ReservationHistoryPast']);
Route::get('/ReservationHistoryUpcoming', [ReservationController::class,'ReservationHistoryUpcoming']);
Route::get('/ReservationHome', [ReservationController::class,'ReservationHome']);
Route::get('/ReservationMenu/{restaurantId}', [ReservationController::class,'ReservationMenu']);
Route::get('/ReservationDetail/{restaurantId}', [ReservationController::class,'ReservationDetail']);
Route::post('/ReservationDetail/{restaurantId}', [ReservationController::class,'Reserve']);
Route::get('/ReservationConfirmation/{reservationId}', [ReservationController::class,'ReservationConfirmation']);

Route::get('/OrderHome', [OrderController::class,'OrderHome']);
Route::get('/OrderMenu/{restaurantId}', [OrderController::class,'OrderMenu']);
Route::get('/OrderDetail/{restaurantId}', [OrderController::class,'OrderDetail']);
Route::post('/OrderDetail/{restaurantId}', [OrderController::class,'Order']);
Route::get('/OrderConfirmation/{orderId}', [OrderController::class,'OrderConfirmation']);

Route::get('/PickupHome', [PickUpController::class,'PickupHome']);
Route::get('/PickupMenu/{restaurantId}', [PickUpController::class,'PickupMenu']);
Route::get('/PickupDetail/{restaurantId}', [PickUpController::class,'PickupDetail']);
Route::post('/PickupDetail/{restaurantId}', [PickUpController::class,'OrderPickUp']);
Route::get('/PickupConfirmation/{pickUpId}', [PickUpController::class,'PickupConfirmation']);
