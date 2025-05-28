@extends('layouts.master')
@section('content')
<main id="main">
    <section id="portfolio" class="portfolio inner-page cart-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card mb-4">
                        <div class="card-header py-3" style="background-color: midnightblue;">
                            <h5 class="mb-0 text-white">Billing details</h5>
                        </div>
                        {{-- @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif --}}

                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <address>
                                            <strong>SSS Automation</strong><br>
                                            {{$address->door_no}} {{$address->street}}<br>
                                            {{$address->area}} {{$address->pincode}}{{$address->city}}<br>
                                            {{$address->state}}<br>
                                            {{$address->country}}
                                            <abbr title="Phone">Mobile:</abbr> {{$address->mobile}}
                                        </address>

                                        <address>
                                            <strong>{{$address->customer->name}}</strong><br>
                                            <a href="mailto:">{{$address->customer->email}}</a>
                                        </address>
                                        {{-- <a href="billing">Add address</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card mb-4">
                        <div class="card-header py-3" style="background-color: midnightblue;">
                            <h5 class="mb-0 text-white">Summary</h5>
                        </div>
                        @include('orders.purchase')
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>


@endsection
