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

            @include('mail.flash-message')

            <table id="cart" class="table table-hover table-bordered">
                <thead>
                    <tr style="vertical-align: middle;">
                        {{-- <th style="width:40%">Product Image</th> --}}
                        <th style="width:10%">Order Payment Id</th>
                        {{-- <th style="width:15%">Product Name</th> --}}
                        <th style="width:15%">Order Date</th>
                        <th style="width:10%">Order Amount</th>
                        {{-- <th style="width:22%" class="text-center">Subtotal</th> --}}
                        <th style="width:10%">Download Invoice</th>
                        <th style="width:15%">Products View</th>
                    </tr>
                </thead>
                @foreach($orderlists as $orderlist)
                <tbody>

                    <tr data-id="{{ $orderlist->id }}" style="vertical-align: middle;">
{{--
                        <td data-th="Product Image" style="text-align:center;">
                            {{$orderlist->product->getFirstMedia('product')}}

                        </td> --}}
                        {{-- <td data-th="Product Image" style="text-align:center;">
                        </td> --}}
                        <td data-th="OrderId">
                            <h6 class="font-weight-normal">{{$orderlist->order_payment_id}}</h6>
                        </td>

                        {{-- <td data-th="Product Title">{{ $orderlists->product->title }}</td> --}}
                        {{-- @foreach ($orderlists->order_items as $order_item)

                                <td data-th="Product Title">{{ $order_item->product_name }}</td>

                        @endforeach --}}
                        <td data-th="Order_at">{{$orderlist->created_at->format('j F, Y')}}</td>
                        <td data-th="Order_amount">$ {{$orderlist->amount}}</td>

                        <td  data-th="">
                           @if($orderlist)
                            {{-- <a href="{{ route('showInvoice', ['orderId' => $orderlist->id]) }}" target="_blank" class="btn btn-primary">View</a> --}}
                            <a href="{{ route('download-invoice', ['orderId' => $orderlist->id]) }}" class="btn btn-primary me-1"
                                style="width: max-content;"><i class="fa fa-download" aria-hidden="true"></i> Invoice</a>
                            @else
                            <a href="#" target="_blank" class="btn btn-primary disable">View</a>
                            @endif

                        </td>
                        <td  data-th="">
                           @if($orderlist)
                            {{-- <a href="{{ route('showInvoice', ['orderId' => $orderlist->id]) }}" target="_blank" class="btn btn-primary">View</a> --}}
                            <a href="{{ route('all-products', ['orderId' => $orderlist->id]) }}" class="btn btn-primary me-1"
                                style="width: max-content;"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                            @else
                            <a href="#" target="_blank" class="btn btn-primary disable">View</a>
                            @endif

                        </td>
                        {{-- <td  data-th="">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-eye" aria-hidden="true"></i> View
                            </button>

                                <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Order No : {{$orderlist->id}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">

                                            @foreach($orderlist->product->getMedia('product') as $image)
                                            <img src="{{$image->getUrl()}}" class="img-fluid" alt="Phone">
                                            @endforeach
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td> --}}

                    </tr>


                </tbody>
                @endforeach

            </table>


            </div>
        </div>
        <div class="d-flex justify-content-end text-right mt-2">
            {!! $orderlists->links('pagination::simple-bootstrap-5') !!}
        </div>

</div>

</main>
@endsection
