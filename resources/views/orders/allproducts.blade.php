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

                <fieldset>
                    <legend>Order Details</legend>
                    <h6 style="text-align: right">
                        Order No : {{ $allproducts->id }}
                    </h6>
                </fieldset>
                    <input type="hidden" value="{{$allproducts->id}}" id="orderId">
                <div class="row">
                <table id="cart" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="width:40%">Product Image</th>
                            <th style="width:30%">Product Name</th>
                            <th style="width:10%">Amount</th>
                            <th style="width:40%">Download</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($allproducts->order_items as $order_item)
                        {{-- <input type="hidden" value="{{$order_item->product_id}}" id="productId"> --}}
                            <tr data-id="">

                                <td data-th="Product Image" style="text-align:center;">
                                    <img src="{{$order_item->product_image}}" alt="{{$order_item->product_name}}" width="50%" height="50%">
                                </td>
                                <td data-th="Product Title">{{ $order_item->product_name }}</td>

                                <td data-th="Order_amount">$ {{$order_item->product_price}}</td>
                                <td data-th="Product Attachment">
                                    {{-- @php
                                        $filename = preg_replace("/-/", ' ', $order_item->product_attachment);
                                    @endphp --}}

                                    <button id="downloadButton" data-filename="{{ basename($order_item->product_attachment) }}" class="btn btn-primary downloadLink download" onclick="disableDownloadLink(event, '{{ basename($order_item->product_attachment) }}','{{$allproducts->id}}')">Download File</button>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>

                </div>
            </div>

</div>

</main>

@endsection
