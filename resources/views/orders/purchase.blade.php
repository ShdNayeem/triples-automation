@php $total = 0 @endphp

@if(session('cart'))

@foreach(session('cart') as $id => $product)
    @php $total += $product['price'] * $product['quantity'];
    @endphp

    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Product Image
            <span><img src="{{ $product['image'] }}" width="100" height="100" class="img-responsive" /></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Products

                <span>{{ $product['name'] }}</span>
            </li><hr>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Quantity
                <span>{{ $product['quantity'] }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Price
                <span>${{ $product['price'] }}</span>
            </li>
        </ul><hr>
@endforeach

@php

    if (session()->has('coupon_discount_value')) {
                $discountValue = session('coupon_discount_value');
                $total -= $discountValue;
                $total = max($total, 0);
    }
@endphp
        <div id="responseContainer" class="primary text-center font-italic  text-danger" style="font-size: small;">

            <!-- Response will be displayed here -->

                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif
        </div>

        <ul>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0" id="{{ $id }}">
                Discount
                @if(session('coupon_discount_value'))
                    <span> -${{ session('coupon_discount_value') }}</span>
                    <button class="btn btn-danger btn-sm remove-discount"><i class="fa fa-trash-o"></i></button>
                @else
                    <span> $0</span>
                @endif
            </li><hr>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                    <strong>Total amount</strong>
                    <strong>
                        <p class="mb-0">(including VAT)</p>
                    </strong>
                </div>
                <span><strong>${{ $total }}</strong></span>
            </li>
            <hr>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">

                    <div class="card card-body">
                        <form action="{{ route('discount') }}" method="POST" class="form-inline" id="myForm">
                            @csrf
                            <div class="form-group mx-sm-1 ">
                                <input type="text" name="coupon_name"   class="form-control" id="inputcouponcode" placeholder="Promotion Code">
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Apply</button>
                        </form>
                    </div>

            </li>
        </ul>
    @endif
    <form action="{{ route('razorpay.payment.store') }}" method="POST">
        @csrf
        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}"
            data-amount="{{ $total * 100 }}" data-currency="USD" data-buttontext="Make Purchase"
            data-name="triplesautomation.com" data-description="Razorpay" {{--
            data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png" --}}
            data-prefill.name="@if(Auth::guard('customer')->check())
                                    {{ Auth::guard('customer')->user()->name }}@endif" data-prefill.email="@if(Auth::guard('customer')->check())
                                    {{ Auth::guard('customer')->user()->email }}@endif"
            data-theme.color="#ff7529">
            </script>
    </form>
