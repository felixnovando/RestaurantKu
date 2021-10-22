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
        window.location.href="{{url('/OrderDetail',['restaurantId' => $restaurant[0]['restaurantId']])}}";
    })
});
</script>
<div style="grid-template-columns: 1fr 1fr" class="relative grid grid-cols-2">
    <div style="left: 0;top:  50%;transform: translateY(-50%);" class="fixed m-4 " >
        <div style="width: 46vw;"class="p-4 bg-white rounded-lg shadow-md ">
            <div style="width: 43vw; height: 450px;">
                <img class="object-fill w-full h-full" src="{{$restaurant[0]["PhotoUrl"]}}"/>
            </div>
            <div class="flex flex-col m-4 text-3xl font-medium gap-y-5">
                <div class="flex justify-center text-5xl font-extrabold">{{$restaurant[0]["Name"]}}</div>
                <div>{{$restaurant[0]["Description"]}}</div>
                <div>
                    @for ($j=1;$j<=5;$j++)
                        @if ($j<=(int)$restaurant[0]["Rating"])
                            <i class="fas fa-star"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-6">
            <input type="button" id="addcard" style="font-size: 22px" class="btn btn-primary" value="Add to Card"></input>
        </div>
    </div>
    <div style="grid-column-start: 2;" class="flex flex-col m-4 gap-y-5">
        @foreach ( $menu as $menuIndex)
            <div class="flex p-2 bg-white rounded-lg shadow-md">
                <div style="width: 150px; height: 100px;"><img class="object-fill h-full min-w-full" src="{{$menuIndex["Image"]}}"/></div>
                <div class="ml-2">
                    <div class="text-3xl font-semibold">{{$menuIndex["Title"]}}</div>
                    <div class="text-xl font-semibold">Rp. {{$menuIndex["Price"]}}.000,00,-</div>
                    <div class='main'>
                        <button class='down_count btn btn-info' title='Down'><i class="fas fa-minus"></i></button>
                            <input class='m-1 counter' type="text" placeholder="value..." value='0' />
                        <button class='up_count btn btn-info' title='Up'><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
