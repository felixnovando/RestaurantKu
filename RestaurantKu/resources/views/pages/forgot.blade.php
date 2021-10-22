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
            padding-bottom: 40px;
        }
        .logo{
            width: 125px;
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
            width: 350px;
            border: 1px solid black;
            height: 40px;
            padding-left: 10px;
            font-size: 20px;
            margin-bottom: 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        form > div{
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
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
        .error{
            font-size: 16px;
            color: red;
        }
        .otherLink{
            margin-top: 30px;
        }
        .statement{
            width: 450px;
            text-align: center;
            font-size: 18px;
        }
        .line-box{
            position: relative;
            display: flex;
            align-items: center;
        }
        .line{
            width: 300px;
            border-bottom: 1px solid black;
            line-height: 0px;
        }
        .line-box > span{
            position: absolute;
            font-size: 18px;
            left: 45%;
            padding: 5px;
            background-color: white;    
        }
    </style>
    
@endsection


@section('body')
    <div class="container">
        @include('layouts.beforeLoginHeader')
        <div class="content">

            <svg xmlns="http://www.w3.org/2000/svg" class="logo" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
            
            <form action="">
                <div>
                    <p class="statement">Enter your email, phone, or username and we'll send you a link to get back to your account</p>
                    <input type="text" name="" id="" placeholder="Email, username, or Phone Number">
                </div>

                <div class="error">User is not registered</div>

                <button class="loginBtn"><p>Send Login Link</p></button>
            </form>

            <div class="line-box">
                <div class="line"></div>
                <span>OR</span>
            </div>
            

            <a href="" class="loginBtn otherLink"><p>Create New Account</p></a>

            <a href="" class="loginBtn otherLink"><p>Back To Login</p></a>

        </div>
    </div>
@endsection