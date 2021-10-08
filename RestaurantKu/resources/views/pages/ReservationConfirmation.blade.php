@extends('layouts.master')
@section('header')
    @include('layouts.header')
@endsection
@section('body')
<style>
    .main {
      margin-left: 5px;
    }
    .counter {
      width: 45px;
      border-radius: 0px !important;
      text-align: center;
    }
    .up_count {
      margin-bottom: 10px;
      margin-left: -4px;
      border-top-left-radius: 0px;
      border-bottom-left-radius: 0px;
    }
    .down_count {
      margin-bottom: 10px;
      margin-right: -4px;
      border-top-right-radius: 0px;
      border-bottom-right-radius: 0px;
    }
    </style>
    <script>
    $(document).ready(function(){
        $('button').click(function(e){
            e.preventDefault();
            let index = Math.floor($(this).index("button")/2);
            let button_classes, value=0;
            button_classes, value = +$('.counter:eq('+index+')').val();
            button_classes = $(e.currentTarget).prop('class');
            if(button_classes.indexOf('up_count') !== -1){
                value = (value) + 1;
            } else {
                value = (value) - 1;
            }
            value = value < 0 ? 0 : value;
            $('.counter:eq('+index+')').val(value);
        });
        $('.counter').click(function(){
            $(this).index(".counter")
            $(this).focus().select();
        });
        $('#addcard').click(function(){
            console.log("input")
            window.location.href="{{url('/ReservationDetail',['restaurantId' => $restaurant[0]['restaurantId']])}}";
        })
    });
    $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
<div style="grid-template-columns: 1fr 1fr" class="grid grid-cols-2 grid-rows-1 m-4">
    <div style="grid-column-start: 2; " class="fixed flex items-center justify-center ">
        <div class="sticky top-0 w-full p-4 rounded-lg shadow-md bg-gray-50">
            <div >
                <div class="mb-10 text-4xl font-semibold">Capacity</div>
                <div class="flex items-center justify-around ">
                    <div class="text-3xl font-medium">Adult</div>
                    <div class='main'>
                        <input class='m-1 text-2xl counter' type="text" placeholder="value..." value='1' disabled/>
                    </div>
                </div>
                <div class="flex items-center justify-around ">
                    <div class="text-3xl font-medium">Child</div>
                    <div class='main'>
                        <input class='m-1 text-2xl counter' type="text" placeholder="value..." value='2' disabled/>
                    </div>
                </div>
                <div class="flex items-center justify-around ">
                    <div class="text-3xl font-medium">Baby</div>
                    <div class='main'>
                        <input class='m-1 text-2xl counter' type="text" placeholder="value..." value='3' disabled/>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-y-4">
                <div class="my-10 text-4xl font-semibold">Date/Time</div>
                <div  class="grid items-center justify-between grid-cols-2 ">
                    <div class="text-2xl font-medium">Date</div>
                    <div class="w-full"><input class="w-full text-2xl" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Date" value="11/11/2021" disabled></div>
                </div>
                <div class="grid items-center justify-between grid-cols-2 ">
                    <div class="text-2xl font-medium">Time</div>
                    <div  class="w-full"><input class="w-full text-2xl" placeholder="Time" value="11.11" disabled></div>
                </div>
                <div class="grid items-center justify-between grid-cols-2 ">
                    <div class="text-2xl font-medium">Total</div>
                    <div  class="w-full"><input disabled  class="w-full text-2xl "  type="text" name="" id=""  value="1234"> </div>
                </div>
                <div class="text-2xl font-medium">
                    Please come 15 minutes before your reservation time !
                </div>

            </div>
            <div class="flex justify-center my-4"><input type="button" class="p-4 text-4xl btn btn-primary" value="Back To Home"/></div>
        </div>
    </div>
    <div style="grid-column-start: 2" class="relative flex flex-col gap-y-5">
        @foreach ( $menuOrder as $menuIndex)
            <div class="flex p-2 bg-white rounded-lg shadow-md">
                <div style="width: 150px; height: 100px;"><img class="object-fill h-full min-w-full" src="{{$menuIndex["Image"]}}"/></div>
                <div class="ml-2">
                    <div class="text-3xl font-semibold">{{$menuIndex["Title"]}}</div>
                    <div class="text-xl font-semibold">Rp. {{$menuIndex["Price"]}}.000,00,-</div>
                    <div class="text-xl font-semibold">{{$menuIndex["Order"]}}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection