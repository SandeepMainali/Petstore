@extends('layout.adminapp')
@section('content')

<div class="container-fluid page-body-wrapper">
        <div class="container" align="center">

            <table>
                <tr style="background-color: grey;">
                    <td style="padding: 20px">Customer Name</td>
                    <td style="padding: 20px">Email</td>
                    <td style="padding: 20px">Phone</td>
                    <td style="padding: 20px">Address</td>
                    <td style="padding: 20px">Product Title</td>
                    <td style="padding: 20px">Price</td>
                    <td style="padding: 20px">Quantity</td>
                    <td style="padding: 20px">Status</td>
                    <td style="padding: 20px">Action</td>
                </tr>
                @foreach($order as $orders)

                <tr align="center" style="background-color: black">
                    <td style="padding: 20px">{{$orders->name}}</td>
                    <td style="padding: 20px">{{$orders->email}}</td>
                    <td style="padding: 20px">{{$orders->phone}}</td>
                    <td style="padding: 20px">{{$orders->address}}</td>
                    <td style="padding: 20px">{{$orders->product_name}}</td>
                    <td style="padding: 20px">{{$orders->price}}</td>
                    <td style="padding: 20px">{{$orders->quantity}}</td>
                    <td style="padding: 20px">{{$orders->status}}</td>
                    <td style="padding: 20px"><a class="btn btn-success" href="{{route('updatestatus',$orders->id)}}">Delivered</a></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Are you sure??')" href="{{route('deleteorder', $orders->id)}}">Delete</a></td>
                </tr>
                @endforeach
            </table>

        </div>
</div>

@endsection