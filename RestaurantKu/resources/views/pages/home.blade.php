@extends('layouts.master')

@section('header')
    <style>
        h2{
            width: fit-content;
            margin: auto;
            margin-bottom: 10px;
        }
        .container{
            padding-left: 0;
            padding-right: 0;
            background-color : white;
            width : 50%;
            height: fit-content;
        }
        .content{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .content > a > div{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 5px 20px 5px 20px;
            border: 1px solid black;
            margin-bottom: 20px;
            border-radius: 20px;
        }
        .content > a >  div > img{
            margin-bottom: 10px;
        }
        .content > a >  div > p{
            font-size: 18px;
        }
        .logo{
            width: 250px;
            margin-bottom: 10px;
        }
        .logo-button{
            width: 100px;
            object-fit: cover;
        }
    </style>

@endsection


@section('body')
    <div class="container">
        @include('layouts.beforeLoginHeader')
        <div class="content">
            <img src="storage/assets/images/logo.jpg" alt="" class="logo">

            <a href="./ReservationHome">
                <div>
                    <img src="storage/assets/images/chair.png" alt="" class="logo-button">
                    <p>Reservation</p>
                </div>
            </a>

            <a href="./OrderHome">
                <div>
                    <img src="storage/assets/images/plate.png" alt="" class="logo-button">
                    <p>Order</p>
                </div>
            </a>


            <a href="./PickupHome">
                <div>
                    <img src="storage/assets/images/bag.png" alt="" class="logo-button">
                    <p>Pick - Up</p>
                </div>
            </a>

        </div>
    </div>
@endsection
