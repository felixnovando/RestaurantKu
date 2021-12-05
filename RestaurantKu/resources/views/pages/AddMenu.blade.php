@extends('layouts.master')
@section('header')
    @include('layouts.headerRestaurant')
@endsection
@section('body')
    <div class="h-auto p-4 mx-64 my-8 bg-white border rounded-lg ">
        <div class="flex items-center my-4">
            <span class="text-2xl font-bold">Add New Menu</span>
        </div>
        <form action="/Restaurant/Menu/SaveData" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="mb-3 form-floating">
                <input name="name"type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Name</label>
            </div>
            <div class="mb-3 form-floating">
                <input name="price"type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Price</label>
            </div>
            <div class="mb-3 form-floating">
                <input name="desc"type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Description</label>
            </div>
            <div class="mb-3 input-group">
                <input class="form-control form-control-lg" name="imageFile[]" id="formFileLg" type="file">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            <div class="flex justify-center my-6">
                <button type="submit" class="btn-lg btn-primary">Add</button>
            </div>
        </form>
    </div>
@endsection
