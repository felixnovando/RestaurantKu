@extends('layouts.master')
@section('header')
    @include('layouts.header')
@endsection
@section('body')
<div>
    <div>
        <div class="mt-5">
            <span>
                <h4 class="font-semibold">Our Recommendation</h4>
            </span>
            <div id="carouselExampleFade" class="carousel slide " data-ride="carousel" >
                <div class="px-4 carousel-inner ">
                    @for ( $i=0;$i<2;$i++ )
                    @if ($i==0)
                        <div class="carousel-item active">
                    @else
                        <div class="carousel-item ">
                    @endif
                        <div class="row ">
                            <a href="{{url('/PickupMenu',['restaurantId' => $restaurants[0+$i+$i+$i+$i]["restaurantId"]])}}" class="flex flex-col items-center justify-center p-1.5  rounded-xl h-80 col-3">
                                <img class="object-fill w-full h-64 rounded-xl" src="{{$restaurants[0+$i+$i+$i+$i]["PhotoUrl"]}}">
                                <div class="flex flex-col items-center justify-center">
                                    <div>{{$restaurants[0+$i+$i+$i+$i]["Name"]}}</div>
                                    <div style="color: grey">
                                        @for ($j=1;$j<=5;$j++)
                                            @if ($j<=(int)$restaurants[0+$i+$i+$i+$i]["Rating"])
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </a>
                            <a href="{{url('/PickupMenu',['restaurantId' => $restaurants[1+$i+$i+$i+$i]["restaurantId"]])}}" class="flex flex-col items-center justify-center p-1.5  rounded-xl h-80 col-3">
                                <img class="object-fill w-full h-64 rounded-xl"  src="{{$restaurants[1+$i+$i+$i+$i]["PhotoUrl"]}}">
                                <div class="flex flex-col items-center justify-center">
                                    <div>{{$restaurants[1+$i+$i+$i+$i]["Name"]}}</div>
                                    <div style="color: grey">
                                        @for ($j=1;$j<=5;$j++)
                                            @if ($j<=(int)$restaurants[1+$i+$i+$i+$i]["Rating"])
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </a>
                            <a href="{{url('/PickupMenu',['restaurantId' => $restaurants[2+$i+$i+$i+$i]["restaurantId"]])}}" class="flex flex-col items-center justify-center p-1.5 rounded-xl h-80 col-3">
                                <img class="object-fill w-full h-64 rounded-xl"src="{{$restaurants[2+$i+$i+$i+$i]["PhotoUrl"]}}" >
                                <div class="flex flex-col items-center justify-center">
                                    <div>{{$restaurants[0+$i+$i+$i+$i]["Name"]}}</div>
                                    <div style="color: grey">
                                        @for ($j=1;$j<=5;$j++)
                                            @if ($j<=(int)$restaurants[2+$i+$i+$i+$i]["Rating"])
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </a>
                            <a href="{{url('/PickupMenu',['restaurantId' => $restaurants[3+$i+$i+$i+$i]["restaurantId"]])}}" class="flex flex-col items-center justify-center p-1.5  rounded-xl h-80 col-3">
                                <img class="object-fill w-full h-64 rounded-xl"src="{{$restaurants[3+$i+$i+$i+$i]["PhotoUrl"]}}" >
                                <div class="flex flex-col items-center justify-center">
                                    <div>{{$restaurants[0+$i+$i+$i+$i]["Name"]}}</div>
                                    <div style="color: grey">
                                        @for ($j=1;$j<=5;$j++)
                                            @if ($j<=(int)$restaurants[3+$i+$i+$i+$i]["Rating"])
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endfor
                <a class="p-0 m-0 carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="p-0 m-0 carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <span>
                <h4 class="font-semibold">Near To You</h4>
            </span>
            <div id="carouselExampleFade" class="carousel slide " data-ride="carousel" >
                <div class="px-4 carousel-inner ">
                    @for ( $i=0;$i<2;$i++ )
                    @if ($i==0)
                        <div class="carousel-item active">
                    @else
                        <div class="carousel-item ">
                    @endif
                        <div class="row ">
                            <a href="{{url('/PickupMenu',['restaurantId' => $restaurants[0+$i+$i+$i+$i]["restaurantId"]])}}" class="flex flex-col items-center justify-center p-1.5  rounded-xl h-80 col-3">
                                <img class="object-fill w-full h-64 rounded-xl" src="{{$restaurants[0+$i+$i+$i+$i]["PhotoUrl"]}}">
                                <div class="flex flex-col items-center justify-center">
                                    <div>{{$restaurants[0+$i+$i+$i+$i]["Name"]}}</div>
                                    <div style="color: grey">
                                        @for ($j=1;$j<=5;$j++)
                                            @if ($j<=(int)$restaurants[0+$i+$i+$i+$i]["Rating"])
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </a>
                            <a href="{{url('/PickupMenu',['restaurantId' => $restaurants[1+$i+$i+$i+$i]["restaurantId"]])}}" class="flex flex-col items-center justify-center p-1.5  rounded-xl h-80 col-3">
                                <img class="object-fill w-full h-64 rounded-xl"  src="{{$restaurants[1+$i+$i+$i+$i]["PhotoUrl"]}}">
                                <div class="flex flex-col items-center justify-center">
                                    <div>{{$restaurants[1+$i+$i+$i+$i]["Name"]}}</div>
                                    <div style="color: grey">
                                        @for ($j=1;$j<=5;$j++)
                                            @if ($j<=(int)$restaurants[1+$i+$i+$i+$i]["Rating"])
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </a>
                            <a href="{{url('/PickupMenu',['restaurantId' => $restaurants[2+$i+$i+$i+$i]["restaurantId"]])}}" class="flex flex-col items-center justify-center p-1.5 rounded-xl h-80 col-3">
                                <img class="object-fill w-full h-64 rounded-xl"src="{{$restaurants[2+$i+$i+$i+$i]["PhotoUrl"]}}" >
                                <div class="flex flex-col items-center justify-center">
                                    <div>{{$restaurants[0+$i+$i+$i+$i]["Name"]}}</div>
                                    <div style="color: grey">
                                        @for ($j=1;$j<=5;$j++)
                                            @if ($j<=(int)$restaurants[2+$i+$i+$i+$i]["Rating"])
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </a>
                            <a href="{{url('/PickupMenu',['restaurantId' => $restaurants[3+$i+$i+$i+$i]["restaurantId"]])}}" class="flex flex-col items-center justify-center p-1.5  rounded-xl h-80 col-3">
                                <img class="object-fill w-full h-64 rounded-xl"src="{{$restaurants[3+$i+$i+$i+$i]["PhotoUrl"]}}" >
                                <div class="flex flex-col items-center justify-center">
                                    <div>{{$restaurants[0+$i+$i+$i+$i]["Name"]}}</div>
                                    <div style="color: grey">
                                        @for ($j=1;$j<=5;$j++)
                                            @if ($j<=(int)$restaurants[3+$i+$i+$i+$i]["Rating"])
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endfor
                <a class="p-0 m-0 carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="p-0 m-0 carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
    </div>
</div>
@endsection
