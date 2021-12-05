@extends('layouts.master')
@section('header')
    @include('layouts.header')
@endsection
@section('body')
<div style="grid-row-start: 2">
    <div class="flex justify-around mt-4">
        <a href="{{url('/ReservationHistoryUpcoming')}}" class="text-2xl font-semibold text-blue-700">Upcoming Reservation</a>
        <a href="{{url('/ReservationHistoryPast')}}" class="text-2xl font-semibold text-blue-700">Past Reservation</a>
    </div>

    @foreach($reservations as $reservation)
        @php
            $time = new DateTime($reservation->reservation_time);
        @endphp
    <div class="relative flex items-center justify-around p-2 m-5 text-green-400 rounded-lg shadow-md bg-gray-50">
        <img src="{{asset($reservation->resto->path)}}"/>
{{--        'storage/assets/images/image 13.png' kalau mau image lama--}}
        <div class="w-64">
            <div class="text-xl font-semibold">{{$reservation->resto->resto_name}}</div>
            <div class="flex items-center justify-between">
                <div>Date</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$time->format("H:i")}}</div>
            </div>
            <div class="flex items-center justify-between">
                <div>Time</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$time->format("m/d/Y")}}</div>
            </div>
            <div class="flex items-center justify-between">
                <div>Capacity</div> <div class="flex justify-center py-1 my-1 bg-gray-200 rounded-md w-36">{{$reservation->adult_seats + $reservation->child_seats + $reservation->baby_seats}}</div>
            </div>
        </div>
    </div>

    @endforeach

</div>
@endsection
