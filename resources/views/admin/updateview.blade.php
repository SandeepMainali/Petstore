@extends('layout.adminapp')
@section('content')

        
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center">
                <h1 class="title">Update Product</h1>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                    <!-- <button type="button" class="close" data-dismiss="alert">X</button> -->

                </div>
                @endif

            <form action="{{route('updateproduct', $data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div style="padding: 15px">
                    <label for="">Product Title</label>
                    <input style="color: black" type="text" name="title" value="{{$data->title}}">
                </div>

                <div style="padding: 15px">
                    <label for="">Price</label>
                    <input style="color: black" type="number" name="price" value="{{$data->price}}">
                </div>

                <div style="padding: 15px">
                    <label for="">Description</label>
                    <input style="color: black" type="text" name="des" value="{{$data->description}}">
                </div>

                <div style="padding: 15px">
                    <label for="">Quantity</label>
                    <input style="color: black" type="text" name="quantity" value="{{$data->quantity}}">
                </div>

                <div style="padding: 15px">
                    <label for="">Type</label>
                    <input style="color: black" type="text" name="type" value="{{$data->type}}">
                </div>

                <div style="padding: 15px">
                    <label for="">Old Image</label>
                    <img style="height: 100px; width=100px;" src="/productimage/{{$data->image}}">
                </div>

                <div style="padding: 15px">
                    <label>Change Image</label>
                    <input type="file" name="file">
                </div>

                <div style="padding: 15px">
                    <input class="btn btn-success" type="submit">
                </div>
            </form>
            </div>

        </div>

@endsection