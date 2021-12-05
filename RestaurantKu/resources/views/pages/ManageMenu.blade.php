@extends('layouts.master')
@section('header')
    @include('layouts.headerRestaurant')
@endsection
@section('body')
    <div style="grid-template-rows: 40px auto" class="grid grid-rows-2 p-6">
        <div class="flex justify-end px-6">
            <a href="/Restaurant/Menu/Add">
                <button type="button" class="btn btn-success">
                    <span class="text-xl font-semibold">Add Menu</span>
                </button>
            </a>
        </div>
        <div  class="grid grid-cols-4 grid-rows-2">
            @foreach ($menu as $menu)
                <div class="m-4 card" style="width: auto; min-height: 220px">
                    <img src="{{URL::asset($menu->menu_image)}}" class="object-fill h-44 card-img-top" alt="{{$menu->menu_name}}">
                    <div class="card-body">
                        <h5 class="text-2xl font-black capitalize card-title">{{$menu->menu_name}}</h5>
                        <h6 class="my-2 text-lg card-subtitle text-muted">Rp. {{$menu->menu_price}}</h6>
                        <p class="text-1xl card-text">{{$menu->menu_description}}</p>
                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
