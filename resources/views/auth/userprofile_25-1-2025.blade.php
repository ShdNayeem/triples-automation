@extends('layouts.master')
@section('content')
<main class="signup-form portfolio inner-page" style="padding-top:100px;">
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
                                <h5 class="user-name">@if(Auth::guard('customer')->check())
                                    {{ Auth::guard('customer')->user()->name }}
                                    @elseif(Auth::guard('web')->check())
                                    {{ Auth::guard('web')->user()->name }}
                                    @endif</h5>
                                <h6 class="user-email">@if(Auth::guard('customer')->check())
                                    {{ Auth::guard('customer')->user()->email }}
                                    @elseif(Auth::guard('web')->check())
                                    {{ Auth::guard('web')->user()->email }}
                                    @endif</h6>
                            </div>
                            <hr>
                            <div class="list-group list-group-flush">
                                    <a class="list-group-item" href="{{ route('profile') }}">Profile</a>
                                    <a  class="list-group-item" href="{{ route('ordertrack') }}">OrderTrack</a>
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
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <div class="card-body">
                            <form action="{{ route('userdetails') }}" method="POST">
                                @csrf
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="form7Example13" name="user_id"
                                                value="{{ optional($data)->id }}" hidden class="form-control" />

                                            <input type="text" id="form7Example1" name="name"
                                                value="{{ optional($data)->name }}" readonly class="form-control"
                                                autocomplete="off" />
                                            <label class="form-label" for="form7Example1">First name</label>

                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="tel" id="form7Example2" name="mobile" class="form-control"
                                                required />
                                            <label class="form-label" for="form7Example2">Mobile No:</label>
                                            @if ($errors->has('mobile'))
                                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="textarea" id="form7Example3" name="door_no"
                                                class="form-control" required />
                                            <label class="form-label" for="form7Example3">Flat/House No. Building,
                                                Company Name</label>
                                            @if ($errors->has('door_no'))
                                            <span class="text-danger">{{ $errors->first('door_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="textarea" id="form7Example4" name="street" class="form-control"
                                                required />
                                            <label class="form-label" for="form7Example4">Street/Sector/Village</label>
                                            @if ($errors->has('street'))
                                            <span class="text-danger">{{ $errors->first('street') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="number" id="form7Example5" name="pincode" class="form-control"
                                                required />
                                            <label class="form-label" for="form7Example5">Pincode</label>
                                            @if ($errors->has('pincode'))
                                            <span class="text-danger">{{ $errors->first('pincode') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="form7Example6" name="area" class="form-control"
                                                required />
                                            <label class="form-label" for="form7Example6">Area</label>
                                            @if ($errors->has('area'))
                                            <span class="text-danger">{{ $errors->first('area') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="form7Example7" name="city" class="form-control"
                                                required />
                                            <label class="form-label" for="form7Example7">City</label>
                                            @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="form7Example8" name="state" class="form-control"
                                                required />
                                            <label class="form-label" for="form7Example8">State</label>
                                            @if ($errors->has('state'))
                                            <span class="text-danger">{{ $errors->first('state') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="form7Example9" name="country" class="form-control"
                                                required autocomplete="on" />
                                            <label class="form-label" for="form7Example9">Country</label>
                                            @if ($errors->has('country'))
                                            <span class="text-danger">{{ $errors->first('country') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="form7Example10" name="email" value="{{$data->email}}"
                                                readonly class="form-control" autocomplete="off" />
                                            <label class="form-label" for="form7Example10">Email</label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" id="form7Example11" name="GST" class="form-control"
                                                pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$"
                                                title="Invalid GST Number." />
                                            <label class="form-label" for="form7Example11">GST Invoice Number</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </section>
</main>
@endsection
