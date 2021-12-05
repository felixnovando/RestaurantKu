@extends('layouts.master')

@section('header')
    <style>
        .container{
            padding-left: 0;
            padding-right: 0;
            background-color : white;
            width : 50%;
            height : 100vh;
        }
        .content{
            height: fit-content;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .logo{
            width: 250px;
            margin-bottom: 20px;
        }
        form{
            width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form > input{
            border: 1px solid black;
            height: 50px;
            padding-left: 10px;
            font-size: 20px;
            margin-bottom: 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        form > a{
            align-self: flex-end;
            font-size: 15px;
        }

        .loginBtn{
            margin-top: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 200px;
            border-radius: 20px;
            background-color: #00FBCE;
        }
        .loginBtn > p{
            margin-top: 5px;
            font-size: 20px;
            font-weight: bold;
        }
        .error{
            margin-top: 15px;
            font-size: 16px;
            color: red;
        }
    </style>

@endsection


@section('body')
    <div class="container">
        @include('layouts.beforeLoginHeader')
        <div class="content">
            <img src="storage/assets/images/logo.jpg" alt="" class="logo">

            <form action="/login" method="POST">
                {{csrf_field()}}
                <input type="text" name="email" id="" placeholder="email">
                <input type="password" name="password" id="" placeholder="password">
                <a href="/forgot">Forgot Password ?</a>

                @if($errors->any())
                    <div class="error">{{$errors->first()}}</div>
                @endif

                <button class="loginBtn"><p>LOGIN</p></button>
            </form>
        </div>
    </div>
@endsection
