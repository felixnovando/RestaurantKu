@extends('layouts.master')
@section('header')
    @include('layouts.headerRestaurant')
@endsection
@section('body')
    <div class="p-1 ">
        <div class="flex justify-around mt-4">
            @if($status == "ongoing")
                <a href="/Restaurant/Transaction/Detail/accept/{{$type}}/{{$id}}" class="text-2xl font-semibold text-blue-700">Complete Order</a>
                <a href="/Restaurant/Transaction/Detail/reject/{{$type}}/{{$id}}" class="text-2xl font-semibold text-blue-700">Reject Order</a>
            @elseif($status == "paid")

            @elseif($status == "canceled")

            @endif
        </div>

        <div class="tab-content" id="myTabContent">

            @if($type == "pickup")
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="relative flex items-center justify-around p-2 m-5 text-green-400 rounded-lg shadow-md bg-gray-50">
                    <div class="w-64">
                        <div class="text-xl font-semibold text-center">Pick Up</div>
                        <div class="flex items-center justify-between">
                            <div>Customer</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$datas[0]->pickup->customer->customer_name}}</div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>Date</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{date("d-M-Y",strtotime($datas[0]->pickup->pick_up_time))}}</div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>Time</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{date("h:i:sa",strtotime($datas[0]->pickup->pick_up_time))}}</div>
                        </div>
                    </div>
                </div>

                @foreach($datas as $data)
                <div class="relative flex items-center justify-around p-2 m-5 text-green-400 rounded-lg shadow-md bg-gray-50">
                    <img src="{{asset($data->menu->menu_image)}}" style="width: 200px; height: 150px; object-fit: cover; border-radius: 10px"/>
                    <div class="w-64">
                        <div class="text-xl font-semibold"></div>
                        <div class="flex items-center justify-between">
                            <div>Name</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$data->menu->menu_name}}</div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>Price</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$data->menu->menu_price}}</div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>Qty</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$data->qty}}</div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            @endif

            @if($type == "order")
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="relative flex items-center justify-around p-2 m-5 text-green-400 rounded-lg shadow-md bg-gray-50">
                        <div class="w-64">
                            <div class="text-xl font-semibold text-center">Order</div>
                            <div class="flex items-center justify-between">
                                <div>Customer</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$datas[0]->order->customer->customer_name}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Date</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{date("d-M-Y",strtotime($datas[0]->order->pick_up_time))}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Time</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{date("h:i:sa",strtotime($datas[0]->order->pick_up_time))}}</div>
                            </div>
                        </div>
                    </div>

                    @foreach($datas as $data)
                        <div class="relative flex items-center justify-around p-2 m-5 text-green-400 rounded-lg shadow-md bg-gray-50">
                            <img src="{{asset($data->menu->menu_image)}}" style="width: 200px; height: 150px; object-fit: cover; border-radius: 10px"/>
                            <div class="w-64">
                                <div class="text-xl font-semibold"></div>
                                <div class="flex items-center justify-between">
                                    <div>Name</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$data->menu->menu_name}}</div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>Price</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$data->menu->menu_price}}</div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>Qty</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$data->qty}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @endif

            @if($type == "reservation")
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="relative flex items-center justify-around p-2 m-5 text-green-400 rounded-lg shadow-md bg-gray-50">
                        <div class="w-64">
                            <div class="text-xl font-semibold text-center">Reservation</div>
                            <div class="flex items-center justify-between">
                                <div>Customer</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$datas->customer->customer_name}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Date</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{date("d-M-Y",strtotime($datas->reservation_time))}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Time</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{date("h:i:sa",strtotime($datas->reservation_time))}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Adult Seats</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$datas->adult_seats}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Child Seats</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$datas->child_seats}}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>Baby Seats</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$datas->baby_seats}}</div>
                            </div>
                        </div>
                    </div>

                    @if($datas->order != null && count($datas->order->details) > 0)
                        @foreach($datas->order->details as $detail)
                        <div class="relative flex items-center justify-around p-2 m-5 text-green-400 rounded-lg shadow-md bg-gray-50">
                            <img src="{{asset($detail->menu->menu_image)}}" style="width: 200px; height: 150px; object-fit: cover; border-radius: 10px"/>
                            <div class="w-64">
                                <div class="text-xl font-semibold"></div>
                                <div class="flex items-center justify-between">
                                    <div>Name</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$detail->menu->menu_name}}</div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>Price</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$detail->menu->menu_price}}</div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>Qty</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$detail->qty}}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            @endif


        </div>
    </div>
@endsection
