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
            padding-bottom: 50px;
        }
        .logo{
            width: 250px;
            margin-bottom: 20px;
        }
        .msg{
            margin-bottom: 10px;
        }
        .msg > p{
            margin: auto;
            width: fit-content;
            font-size: 16px;
        }
        a{
            background-color: #00FBCE;
            width: 100px;
            border-radius: 20px;
        }
        a > p{
            width: fit-content;
            margin: auto;
            font-size: 20px;
        }
        .or{
            margin-top: 10px;
            font-size: 20px;
        }
    </style>

@endsection


@section('body')
    <div class="container">
        @include('layouts.beforeLoginHeader')
        <div class="content">
            <img src="storage/assets/images/logo.jpg" alt="" class="logo">

            <h1>Welcome to RestoranKU</h1>

            <div class="msg">
                <p>New to RestoranKU App?</p>
                <p>Consider Signing Up</p>
            </div>

            <a href="/signup"><p>Sign Up</p></a>

            <p class="or">Or</p>

            <div class="msg">
                <p>Already Have An Account ?</p>
                <p>Then Please Continue to Login</p>
            </div>


            <a href="login"><p>Login</p></a>
        </div>
    </div>
@endsection
