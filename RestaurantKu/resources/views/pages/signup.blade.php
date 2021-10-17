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
        .logo{
            width: 250px;
            margin-bottom: 20px;
        }
        form{
            width: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }
        form > div >  input{
            border: 1px solid black;
            height: 40px;
            padding-left: 10px;
            font-size: 20px;
            margin-bottom: 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        form > div{
            margin-bottom: 20px;
        }
        .gender > div{
            display: flex;

        }
        .gender > div > div{
            display: flex;
            align-items: center;
            margin-right: 20px;
        }
        .gender > div > div > label{
            font-size: 16px;
            margin-bottom: -4px;
            margin-left: 5px;
        }

        .loginBtn{
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

        .terms{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .terms > p{
            font-size: 16px;
            margin-bottom: -4px;
            margin-left: 10px;
        }
        .terms > p > span{
            color: #4A90E2;
        }
        .error{
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

            <form action="/signup" method="post">
                {{csrf_field()}}
                <div>
                    <h2>Create An Account</h2>
                    <br>
                    <input type="text" name="email" id="" placeholder="email">
                    <br>
                    <input type="text" name="name" id="" placeholder="name">
                    <br>
                    <input type="password" name="password" id="" placeholder="password">
                </div>
                <div class="gender">
                    <h2>Gender</h2>
                    <div>
                        <div>
                            <input type="radio" name="gender" id="male" value="male">
                            <label for="male">Male</label>
                        </div>
                        <div>
                            <input type="radio" name="gender" id="female" value="female">
                            <label for="female">Female</label>
                        </div>
                    </div>
                </div>
                <div>
                    <h2>Birthday</h2>
                    <input type="date" name="date" id="">
                </div>

                <div class="terms">
                    <input type="checkbox" name="term" id="" value="term">
                    <p>I Agree to the <span>Term of Use</span> and <span>Privacy Police</span></p>
                </div>

                @if($errors->any())
                    <div class="error">{{$errors->first()}}</div>
                @endif

                <button class="loginBtn"><p>Create</p></button>
            </form>
        </div>
    </div>
@endsection
