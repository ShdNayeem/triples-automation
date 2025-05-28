@extends('layouts.master')
@section('content')
<main class="signup-form portfolio inner-page" >
    <section class="h-100 gradient-custom">
        <div class="container">
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
            @if(Auth::guard('customer')->check())
            {{ Auth::guard('customer')->user()->name }}
            @endif</h5>
                                <h6 class="user-email">
            @if(Auth::guard('customer')->check())
            {{ Auth::guard('customer')->user()->email }}
            @endif </h6>
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
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 card-header px-4 py-5 mb-10" style="background-color: midnightblue;">
                                @if($receipts)
                                    <h5 class="text-white mb-0">Thanks for your Order, <span
                                        style="color: #dd0aa6;">@if(Auth::guard('customer')->check())
                                {{ Auth::guard('customer')->user()->name }}
                                
                                @endif</span>!</h5>
                                 @else           
                                <span> No Records Found.</span></span>
                                @endif
                                </div>
                               
                            <div class="card-body p-4">
    
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
                                   @if($receipts) 
                                    <input type="hidden" value="{{$receipts->id}}" id="orderId">
                                    <p class="small text-muted mb-0">Receipt Voucher : {{$receipts->order_payment_id}}</p>
                                </div>
                                <div class="card shadow-0 border mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                @foreach($receipts->product->getMedia('products') as $image)
                                                <img src="{{$image->getUrl()}}" class="img-fluid" alt="Phone">
                                                @endforeach
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0">{{$receipts->product->title}}</p>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <ul>
                                                    @foreach ($receipts->product->product_attachments as $filename)
                                                   
                                 <button id="downloadButton" data-filename="{{ $filename }}" class="btn btn-primary downloadLink" onclick="disableDownloadLink(event, '{{ $filename }}','{{$receipts->id}}')">Download File</button>

    
                                                    
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small"></p>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">{{$receipts->quantity}}</p>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">{{$receipts->amount}}</p>
                                            </div>
                                        </div>
                                        <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
    
                                    </div>
                                </div>
    
    
                                <div class="d-flex justify-content-between pt-2">
                                    <p class="fw-bold mb-0">Order Details</p>
                                    <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> {{$receipts->amount}}
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="text-muted mb-0">Invoice Date : {{$receipts->created_at}}</p>
                                </div>
                                     @else           
                                <span class="align-center"> No Records Found.</span></span>
                                @endif
                            </div>

                          

                        <div class="card-body">
                            
                        </div>
                       
                       
                         
                    </div>
                </div>
    </section>
    
</main>
@endsection
