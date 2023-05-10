@extends('layout.app')
@section('content')

<div style="padding: 100px" align="center"> 
    <table>
        <tr style="background-color: #7AB730; color: black">
            <td style="padding: 10px; font-size: 20px">Product Name</td>
            <td style="padding: 10px; font-size: 20px">Quantity</td>
            <td style="padding: 10px; font-size: 20px">Price</td>
            <!-- <td style="padding: 10px; font-size: 20px">Image</td> -->
            <td style="padding: 10px; font-size: 20px">Action</td>
        </tr>

    <form action="{{route('order')}}" method="POST">
        @csrf
        @foreach($cart as $carts)
        <tr style="background-color: grey">
            <td style="color:white; padding: 10px;">
            <input type="text" name="productname[]" value="{{$carts->product_title}}" hidden="">
            {{$carts->product_title}}</td>
            <td style="color:white; padding: 10px;">
            <input type="text" name="quantity[]" value="{{$carts->quantity}}" hidden="">
            {{$carts->quantity}}</td>
            <td style="color:white; padding: 10px;">
            <input type="text" name="price[]" value="{{$carts->price}}" hidden="">
            {{$carts->price}}</td>
            <td style="color:white; padding: 10px;"><a class="btn btn-danger" href="{{route('deletecart', $carts->id)}}">Delete</a></td>
        </tr>
        @endforeach
        </table><br> 
        <button class="btn btn-success">Confirm Order</button>  
    </form>
</div>


@endsection