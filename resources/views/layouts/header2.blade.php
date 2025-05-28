<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <img  src={{$logo}} alt=""/>  
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="/">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li class="dropdown"><a class="nav-link scrollto" href="services.html"><span>Services</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul>
                        @foreach($categories as $category)

                        {{-- @if($category->subcategories->count()>0) --}}
                        <li><a href="{{ route('subcategory', ['slug' => $category->slug]) }}">{{$category->name}}</a>
                        </li>
                        
                        @endforeach
                    </ul>
                </li>
                <!--<li><a class="nav-link scrollto" href="portfolio.html">Portfolio</a></li>-->
                {{-- <li><a class="nav-link scrollto" href="#clients">Clients</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li> --}}
                <li><a class="nav-link scrollto" href="{{route('clients')}}">Clients</a></li>
                <li><a class="nav-link scrollto" href="{{route('contact')}}">Contact</a></li> 

                @if(Auth::guard('customer')->guest())
                <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>

                @else
                <li class="dropdown">
                    <a><span>@if(Auth::guard('customer')->check())
                            {{ Auth::guard('customer')->user()->name }}
                            @endif</span>
                        <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        
                            
                        <li><a href="{{ route('profile') }}">Profile</a></li>
                        <li><a href="{{ route('orderlist') }}">OrderList</a></li>
                        <li><a href="{{ route('ordertrack') }}">OrderTrack</a></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
                @endif          
                </ul>

            {{-- Cart Code Starting Here --}}
            <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown" style="margin-left:5px;" onclick()="test">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span
                        class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>

                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span
                                class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </div>

                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $product)
                        @php $total += $product['price'] * $product['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                    @foreach(session('cart') as $id => $product)
                    <div class="row cart-detail">
                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                            <img src="{{ $product['image'] }}" />
                        </div>
                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                            <p>{{ $product['name'] }}</p>
                            <span class="price text-info"> ${{ $product['price'] }}</span> <span class="count">
                                Quantity:{{ $product['quantity'] }}</span>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12  checkout">
                            <a href="{{ route('cart') }}" class="btn btn-info btn-sm text-white text-center">View Cart</a>
                        </div>
                        
                    </div>
                </div>
            </div>
    </div>
    </div>
    <i class="bi bi-list mobile-nav-toggle"></i>
    {{-- @if(session('success'))
    </div>
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    </div>
    @endif --}}
    </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
