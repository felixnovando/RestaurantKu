<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reservation;
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
Route::get('/ReservationType', [Reservation::class,'ReservationType']);
Route::get('/ReservationHistoryPast', [Reservation::class,'ReservationHistoryPast']);
Route::get('/ReservationHistoryUpcoming', [Reservation::class,'ReservationHistoryUpcoming']);
Route::get('/ReservationHome', [Reservation::class,'ReservationHome']);
Route::get('/ReservationMenu/{restaurantId}', [Reservation::class,'ReservationMenu']);
Route::get('/ReservationDetail/{restaurantId}', [Reservation::class,'ReservationDetail']);
Route::get('/ReservationConfirmation/{restaurantId}', [Reservation::class,'ReservationConfirmation']);
