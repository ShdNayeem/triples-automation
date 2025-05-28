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
                                <h5 class="user-name">@if(Auth::guard('customer')->check())
                                    {{ Auth::guard('customer')->user()->name }}@endif</h5>
                                <h6 class="user-email">@if(Auth::guard('customer')->check())
                                    {{ Auth::guard('customer')->user()->email }}@endif</h6>
                            </div>
                            <hr>
                            <div class="list-group list-group-flush">
                                    <a class="list-group-item" href="{{ route('profile') }}">Profile</a>
                                    <a  class="list-group-item" href="{{ route('orderlist') }}">OrderTrack</a>
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
               
                <tbody>
                    
                <tr> <td colspan="5">No Orders Records Found</td></tr>
                
                </tbody>
            </table>
            
                   
            </div>
        </div>
        <div class="d-flex justify-content-end text-right mt-2">
          
        </div>
    
</div>

</main>
@endsection