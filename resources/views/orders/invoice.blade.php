<link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

<style>
    body{
        margin-top:20px;
background-color:#eee;
}

.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}
    </style>
<div class="container">
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-15">Invoice {{$receipts->id}}

                                @if($receipts->status)
                                <span class="badge bg-success font-size-12 ms-2">Paid</span>
                            @else
                                <span class="badge bg-danger font-size-12 ms-2">Unpaid</span>
                            @endif</h4>
                            <div class="mb-4">
                               <h2 class="mb-1 text-muted"><a href="/" class="logo d-flex align-items-center">
                                <img src={{$logo}} alt="" width="40%" height="40%">
                            </a></h2>
                            </div>

                            {{-- <div class="text-muted">
                                <p class="mb-1">{{$profile->door_no}} {{$profile->street}}, {{$profile->area}}, {{$profile->pincode}}</p>
                                <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> {{$profile->email_1}}</p>
                                <p><i class="uil uil-phone me-1"></i> {{$profile->mobile_1}}</p>
                            </div> --}}
                            <div class="text-muted">
                                <p class="mb-1">78 Vasu Deva Nallur, 535022</p>
                                <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> sales@triplesautomation.com</p>
                                <p><i class="uil uil-phone me-1"></i> +91 8529637415</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-muted">
                                    <h5 class="font-size-16 mb-3">Billed To:</h5>
                                    <h5 class="font-size-15 mb-2">{{auth()->guard('customer')->user()->name}}</h5>
                                    <p class="mb-1">{{$receipts->customer->profile->door_no}} , {{$receipts->customer->profile->street}}</p>
                                    <p class="mb-1">{{$receipts->customer->profile->area}} , {{$receipts->customer->profile->city}} </p>
                                    <p class="mb-1">{{$receipts->customer->profile->state}} , {{$receipts->customer->profile->country}} </p>
                                    <p class="mb-1">{{auth()->guard('customer')->user()->email}}</p>
                                    <p>{{$receipts->customer->profile->mobile}}</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-sm-6">
                                <div class="text-muted text-sm-end">
                                    <div>
                                        <h5 class="font-size-15 mb-1">Invoice No:</h5>
                                        <p>{{$receipts->id}}</p>
                                    </div>
                                    <div class="mt-4">
                                        <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                        <p>{{$receipts->created_at}}</p>
                                    </div>
                                    <div class="mt-4">
                                        <h5 class="font-size-15 mb-1">Order No:</h5>
                                        <p>{{$receipts->order_payment_id}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="py-2">
                            <h5 class="font-size-15">Order Summary</h5>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px;">No.</th>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th class="text-end" style="width: 120px;">Total</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        <tr>
                                            <th scope="row">01</th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14 mb-1">{{$receipts->product->title}}</h5>
                                                    {{-- <p class="text-muted mb-0">Watch, Black</p> --}}
                                                </div>
                                            </td>
                                            <td>$ {{$receipts->product->price}}</td>
                                            <td>{{$receipts->quantity}}</td>
                                            <td class="text-end">$ {{$receipts->amount}}</td>
                                        </tr>
                                        {{-- <tr> --}}
                                             {{-- <th  rowspan="3" colspan="1" class="border-0 ">
                                                Signature: </th> --}}
                                            {{-- <td scope="column"  rowspan="3" colspan="1" class="border-0 ">
                                                <img class="float-right" src={{$sign}} alt="" width="150px" height="150px"/>
                                            </td>  --}}
                                            {{-- <th scope="row" colspan="3" class="border-0 text-end">
                                                Shipping Charge :</th>

                                            <td class="border-0 text-end">$20.00</td> --}}
                                        {{-- </tr> --}}
                                        <!-- end tr -->
                                        <tr>
                                            {{-- <th scope="row" colspan="3" class="border-0 text-end"> --}}
                                                {{-- Tax</th> --}}
                                            {{-- <td class="border-0 text-end">$12.00</td> --}}
                                        </tr>
                                        <!-- end tr -->
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                            <td class="border-0 text-end"><h4 class="m-0 fw-semibold">${{$receipts->amount}}</h4></td>
                                        </tr>
                                        <tr>
                                            <td scope="row"   colspan="5"   class="border-0  text-end">
                                                <img class="float-right" src={{$sign}} alt="" width="150px" height="150px"/>
                                                <h4 class="m-0 fw-semibold text-darkslateblue" style="color:darkslateblue;">Triple-s Automation</h4>
                                            </td>
                                        </tr>
                                        <!-- end tr -->
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div><!-- end table responsive -->
                            <div class="d-print-none mt-4">
                                <div class="float-end">
                                    {{-- <a href="{{ route('download-invoice', ['orderId' => $receipts->id]) }}" target="_blank" class="btn btn-success me-1"><i class="fa fa-print"></i></a> --}}

                                    <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i> Print</a>
                                    <a href="{{ route('sendInvoice', ['id' => $receipts->id]) }}" class="btn btn-primary w-md"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>


