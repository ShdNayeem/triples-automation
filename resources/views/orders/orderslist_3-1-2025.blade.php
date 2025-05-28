@extends('layouts.master')
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    /* setting the text-align property to center*/
   tr, td {
        padding: 5px;
        text-align: center;
    }
</style>
@section('content')
<main class="signup-form portfolio inner-page " style="padding-top:75px;">
    <div class="container mt-5 mb-5">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card ">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                </div>
                                <h5 class="user-name">
                                    @auth('customer')
                                     {{ auth('customer')->user()->name }}
                                    @endauth</h5>
                                <h6 class="user-email">
                                    @auth('customer')
                                        {{ auth('customer')->user()->email }}
                                    @endauth</h6>
                            </div>
                            <hr>
                            <div class="list-group list-group-flush">
                                    <a class="list-group-item" href="{{ route('profile') }}">Profile</a>
                                    <a class="list-group-item"  href="{{ route('orderlist') }}">OrderList</a>
                                    <a class="list-group-item"  href="{{ route('ordertrack') }}">OrderTrack</a>

                                    <a class="list-group-item" href="{{ route('logout') }}">Logout</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="row">

            <table id="cart" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th style="width:40%">Product Image</th>
                        <th style="width:10%">OrderId</th>
                        <th style="width:15%">Product Name</th>
                        <th style="width:15%">Order_at</th>
                        <th style="width:10%">Amount</th>
                        {{-- <th style="width:22%" class="text-center">Subtotal</th> --}}
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                @foreach($orderlist as $orderlists)
                <tbody>

                    <tr data-id="{{ $orderlists->id }}">
                        <td data-th="Product Image" style="text-align:center;">
                            @foreach($orderlists->product->getMedia('products') as $image)
                            <img src="{{$image->getUrl()}}" width="50%" height="50%" class="img-fluid" alt="Phone">
                            @endforeach
                        </td>
                        <td data-th="OrderId">
                            <h6 class="font-weight-normal">{{$orderlists->order_payment_id}}</h6>
                        </td>
                        <td data-th="Product Name">{{$orderlists->product->title}}</td>
                        <td data-th="Order_at">{{$orderlists->created_at}}</td>
                        <td data-th="Order_at">$ {{$orderlists->amount}}</td>

                        <td  data-th="">
                           @if($orderlists)
                            <a href="{{ route('invoice', ['orderId' => $orderlists->id]) }}" target="_blank" class="btn btn-primary">View</a>
                            @else
                            <a href="#" target="_blank" class="btn btn-primary disable">View</a>
                            @endif
                        </td>
                    </tr>


                </tbody>
                @endforeach

            </table>


            </div>
        </div>
        <div class="d-flex justify-content-end text-right mt-2">
            {!! $orderlist->links('pagination::simple-bootstrap-5') !!}
        </div>

</div>

</main>
@endsection
