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
            window.location.href="{{url('/PickupDetail',['restaurantId' => $restaurant[0]['restaurantId']])}}";
        });
        $('#datepicker').datepicker({
                uiLibrary: 'bootstrap4'
            });
    });
    </script>
<div style="grid-template-columns: 1fr 1fr" class="grid grid-cols-2 grid-rows-1 m-4">
    <form method="post" target="_self"  style="grid-column-start: 2; " class="fixed flex items-center justify-center ">
        {{csrf_field()}}
        <div class="sticky top-0 w-full p-4 rounded-lg shadow-md bg-gray-50">
            <div class="flex flex-col gap-y-4">
                <div  class="grid items-center justify-between grid-cols-2 ">
                    <div class="text-2xl font-medium">Date</div>
                    <div class="w-full"><input name="date" class="w-full text-2xl" data-provide="datepicker" data-date-format="dd/mm/yyyy" placeholder="Date"></div>
                </div>
                <div class="grid items-center justify-between grid-cols-2 ">
                    <div class="text-2xl font-medium">Time</div>
                    <div  class="w-full"><input class="w-full text-2xl" type="time" name="time" placeholder="Time"></div>
                </div>
                <div  class="grid items-center justify-between grid-cols-2 ">
                    <div class="text-2xl font-medium">Voucher</div>
                    <div  class="w-full"><input  class="w-full text-2xl"  type="text" name="" id=""  placeholder="Enter Your Voucher"> </div>
                </div>
                <div class="grid items-center justify-between grid-cols-2 ">
                    <div class="text-2xl font-medium">Total</div>
                    <div  class="w-full"><input disabled  class="w-full text-2xl "  type="text" name="" id=""  value="{{$totalPrice}}"> </div>
                </div>
                <div class="grid items-center justify-between grid-cols-2 ">
                    <div class="w-full text-2xl font-medium">Payment Method</div>
                    <div class="w-full form-group">
                        <select class="w-full form-control" id="sel1">
                          <option>OVO</option>
                          <option>GoPay</option>
                          <option>Dana</option>
                        </select>
                      </div>
                </div>
            </div>
            <div class="flex justify-center my-4"><input id="Order" type="submit" class="p-4 text-4xl btn btn-primary" value="Pay"/></div>
        </div>
    </form>
    <div style="grid-column-start: 2" class="relative flex flex-col gap-y-5">
        @for ($i = 0; $i < count($menuOrder); $i++)
            @php
                if($_SESSION['pickup_menu_qty'][$i] < 1) continue;
            @endphp
            <div class="flex p-2 bg-white rounded-lg shadow-md">
                <div style="width: 150px; height: 100px;"><img class="object-fill h-full min-w-full" src="{{\Illuminate\Support\Facades\URL::asset($menuOrder[$i]["menu_image"])}}"/></div>
                <div class="ml-2">
                    <div class="text-3xl font-semibold">{{$menuOrder[$i]["menu_name"]}}</div>
                    <div class="text-xl font-semibold">Rp. {{$menuOrder[$i]["menu_price"]}}.00,-</div>
                    <div class="text-xl font-semibold">{{$_SESSION['pickup_menu_qty'][$i]}}</div>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection
