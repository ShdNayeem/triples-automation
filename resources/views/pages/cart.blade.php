@extends('layouts.master')

@section('content')
<main id="main" style="margin-top: 100px;">
    <section id="portfolio" class="portfolio inner-page cart-page" >
        <div class="container py-5 h-100">
            <div class="table-responsive">
        <table id="cart" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th style="width:20%">Product Image</th>
                    <th style="width:30%">Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @if(session('cart'))
                @foreach(session('cart') as $id => $product)
                @php $total += $product['price'] * $product['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="ProductImage">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ $product['image'] }}" class="img-fluid" />
                            </div>

                        </div>
                    </td>
                    <td data-th="Product">
                        <div class="row">
                             <div class="col-sm-9">
                                <h4 class="nomargin">{{ $product['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $product['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" readonly value="{{ $product['quantity'] }}"
                            class="form-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $product['price'] * $product['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-right">
                        <h3><strong>Total ${{ $total }}</strong></h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="text-right">
                        <a href="{{ url('/category') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue
                            Shopping</a>

                         @if(Auth::guard('customer')->guest())
                        <a href="{{ url('login') }}" class="btn btn-primary">Checkout</a>

                        @else
                        <a href="{{ url('/checkout') }}" class="btn btn-primary">Checkout</a>
                        @endif
                    </td>
                </tr>
            </tfoot>
        </table>
        </div>
        </div>
    </section>
</main>
@endsection
