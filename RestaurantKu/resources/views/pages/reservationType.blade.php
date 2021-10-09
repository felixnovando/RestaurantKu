@extends('layouts.master')
@section('header')
    @include('layouts.header')
@endsection
@section('body')
<div style="grid-row-start: 2" class="flex flex-col items-center justify-center min-h-full">
    <div class="flex gap-8 ">
        <a href="{{url('/ReservationHistoryUpcoming')}}" class="flex flex-col items-center">
            <img width="250" src="{{asset('storage/assets/images/image9.png')}}"/>
            <div class="text-2xl font-semibold">Your Reservation</div>
        </a>
        <a href="{{url('/ReservationHome')}}" class="flex flex-col items-center">
            <img width="250" src="{{asset('storage/assets/images/image 13.png')}}"/>
            <div class="text-2xl font-semibold">Set Reservation</div>
        </a>
    </div>
</div>
@endsection
