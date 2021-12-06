@extends('layouts.master')
@section('header')
    @include('layouts.headerRestaurant')
@endsection
@section('body')
    <div class="p-1 ">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Order</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Reservation</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">PickUp</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                @foreach($orders as $order)
                    <a href="/Restaurant/Transaction/Detail/order/{{$order->id}}" style="text-decoration: none">
                    <div class="relative flex items-center justify-around p-2 m-5 text-green-400 rounded-lg shadow-md bg-gray-50  {{(strcmp($order->status, "paid") == 0) ? "bg-green-100" : "bg-gray-50"}}">
                        <div class="w-64">
                            <div class="text-xl font-semibold">{{$order->customer->customer_name}}</div>
                            <div class="flex items-center justify-between">
                                <div>Date</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{date("d-M-Y",strtotime($order->order_time))}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Time</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{date("h:i:sa",strtotime($order->order_time))}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Status</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$order->status}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Description</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$order->description}}</div>
                            </div>
                        </div>
                        @if(strcmp($order->status, "canceled") == 0):
                        <div class="absolute z-10 flex items-center justify-center w-full h-full gap-8 text-3xl font-bold text-red-400 bg-gray-600 rounded-lg opacity-60 ">
                            <i class="fas fa-times-circle"></i>
                            <div>CANCELLED</div>
                        </div>
                        @endif
                    </div>
                    </a>
                @endforeach
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                @foreach($reservations as $reservation)
                    <a href="/Restaurant/Transaction/Detail/reservation/{{$reservation->id}}" style="text-decoration: none">
                    <div class="relative flex items-center justify-around p-2 m-5 text-green-400 rounded-lg shadow-md bg-gray-50   {{(strcmp($reservation->status, "paid") == 0) ? "bg-green-100" : "bg-gray-50"}}">
                        <div class="w-64">
                            <div class="text-xl font-semibold">{{$reservation->customer->customer_name}}</div>
                            <div class="flex items-center justify-between">
                                <div>Date</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{date("d-M-Y",strtotime($reservation->reservation_time))}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Time</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{date("h:i:sa",strtotime($reservation->reservation_time))}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Number of Seats</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$reservation->adult_seats + $reservation->child_seats + $reservation->baby_seats}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Status</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$reservation->status}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Description</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$order->description}}</div>
                            </div>
                        </div>

                        @if(strcmp($reservation->status, "canceled") == 0):
                        <div class="absolute z-10 flex items-center justify-center w-full h-full gap-8 text-3xl font-bold text-red-400 bg-gray-600 rounded-lg opacity-60 ">
                            <i class="fas fa-times-circle"></i>
                            <div>CANCELLED</div>
                        </div>
                        @endif
                    </div>
                    </a>
                @endforeach
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                @foreach($pickUps as $pickup)
                    <a href="/Restaurant/Transaction/Detail/pickup/{{$pickup->id}}" style="text-decoration: none">
                    <div class="relative flex items-center justify-around p-2 m-5 text-green-400 rounded-lg shadow-md bg-gray-50 {{(strcmp($pickup->status, "paid") == 0) ? "bg-green-100" : "bg-gray-50"}}">
                        <div class="w-64">
                            <div class="text-xl font-semibold">{{$pickup->customer->customer_name}}</div>
                            <div class="flex items-center justify-between">
                                <div>Date</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{date("d-M-Y",strtotime($pickup->pick_up_time))}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Time</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{date("h:i:sa",strtotime($pickup->pick_up_time))}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Status</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$pickup->status}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Description</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$order->description}}</div>
                            </div>
                        </div>

                        @if(strcmp($pickup->status, "canceled") == 0):
                        <div class="absolute z-10 flex items-center justify-center w-full h-full gap-8 text-3xl font-bold text-red-400 bg-gray-600 rounded-lg opacity-60 ">
                            <i class="fas fa-times-circle"></i>
                            <div>CANCELLED</div>
                        </div>
                        @endif
                    </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
