@extends('layouts.master')
<style>
  .carousel {
  position: relative;
}
.carousel-item img {
  object-fit: cover;
}
#carousel-thumbs {
  background:#cdd0e9;
  bottom: 0;
  left: 0;
  padding: 0 50px;
  right: 0;
}
#carousel-thumbs img {
  border: 5px solid transparent;
  cursor: pointer;
}
#carousel-thumbs img:hover {
  border-color: rgba(255,255,255,.3);
}
#carousel-thumbs .selected img {
  border-color: #fff;
}
.carousel-control-prev,
.carousel-control-next {
  width: 50px;
}
@media all and (max-width: 767px) {
  .carousel-container #carousel-thumbs img {
    border-width: 3px;
  }
}
@media all and (min-width: 576px) {
  .carousel-container #carousel-thumbs {
    position: absolute;
  }
}
@media all and (max-width: 576px) {
  .carousel-container #carousel-thumbs {
    background: #ccccce;
  }
}
  </style>
@section('content')
<main id="main" style="margin-top: 125px;">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li>Product Details</li>
                <li>{{$product->category->name}}</li>
            </ol>
            <h2>{{$product->title}}</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">

                    <div class="portfolio-details-slider swiper d-flex">
                        <div class="swiper-wrapper align-items-center">


                            <div class="container">
                              <div class="carousel-container position-relative row border " style="border-color: #d5d9dd!important" >
                                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                      <div class="carousel-inner zoom-box">
                                          @foreach ($product->getMedia('product') as $index => $image)
                                          <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-slide-number="{{ $index }}">
                                            <div class="product-img--main d-block w-100" data-scale="2.2" data-image="{{$image->getUrl()}}">
                                            </div>

                                          </div>
                                          @endforeach
                                      </div>
                                  </div>

                                  <!-- Carousel Navigation -->
                                  <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                      <div class="carousel-inner">
                                          <div class="carousel-item active">
                                              <div class="row mx-0 justify-content-center">
                                                  @foreach ($product->getMedia('product') as $index => $image)
                                                  <div id="carousel-selector-{{ $index }}" class="thumb col-4 col-sm-2 px-1 py-2 {{ $index == 0 ? 'selected' : '' }}" data-target="#myCarousel" data-slide-to="{{ $index }}">
                                                      <img src="{{ $image->getUrl() }}" class="img-fluid" alt="...">
                                                  </div>
                                                  @endforeach
                                              </div>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                          </div>
                        </div>


                    </div>

                </div>

                <div class="col-lg-4 ">
                    <div class="portfolio-info">
                        @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                                @endif
                                <!-- sidebar start here-->
                        <div class="row">
                            <div class="">
                                <ul class="nav nav-tabs nav-justified" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="justified-tab-0" data-bs-toggle="tab" href="#justified-tabpanel-0" role="tab" aria-controls="justified-tabpanel-0" aria-selected="true">Product</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="justified-tab-1" data-bs-toggle="tab" href="#justified-tabpanel-1" role="tab" aria-controls="justified-tabpanel-1" aria-selected="false">Custom Solution</a>
  </li>
</ul>
<div class="tab-content ProductDetailsTab" id="tab-content">
  <div class="tab-pane active" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
  <ul>

                                        <li><strong>Product Name</strong>: {{$product->title}}</li>
										<li><strong>Category</strong>: {{$product->category->name}}</li>
                                        <li><strong>Available Size</strong>:
                                        @foreach($product->available_size as $size)
                                         <span>{{$size}},</span>
                                        @endforeach
                                      </li>
                                        <li>
										<span><strong>Description</strong>:</span>{!! $product->description !!}
                                        </li>
										<li class="pprice"><span>Price:</span> ${{$product->price}} </li>
                                        <a class="btnProduct" id="add-to-cart" href="{{ route('add-to-cart', $product->id) }}"
                                            class="btn btn-primary cartbutton" onclick="myFunction()">Add to Cart</a>
                                    </ul>
									</div>
  <div class="tab-pane" id="justified-tabpanel-1" role="tabpanel" aria-labelledby="justified-tab-1">
  <form action="{{ route('custom') }}"  enctype="multipart/form-data" method="POST">
                                            @csrf


                                        @include('mail.flash-message')
                                        <!-- Name input -->
                                        <div data-mdb-input-init class="form-outline mb-4">
                                          <input type="text" id="form4Example1" class="form-control" placeholder="Name" name="name" required/>
                                          @error('name')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>

                                        <!-- Email input -->
                                        <div data-mdb-input-init class="form-outline mb-4">
                                          <input type="email" id="form4Example2" class="form-control" placeholder="Email" name="email" required/>
                                          @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                        </div>

                                        {{-- Company Name --}}
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="form4Example9" class="form-control" placeholder="Company" name="company" required/>
                                            @error('company')
                                            <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                        </div>
                                        <!-- Message input -->
                                        <div data-mdb-input-init class="form-outline mb-4">
                                          <textarea class="form-control" id="form4Example3" placeholder="Please describe your requirements" name="message" rows="4" required></textarea>
                                          @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                        </div>
                                        <label class="form-check-label fw-bold" for="form4Example">
                                            I would like to get this model
                                        </label>
                                        <!-- Checkbox -->
                                        <div class="form-check justify-content-center mb-4 checkbox-group required">
                                          <div>
                                            <input
                                            class="form-check-input me-2 "
                                            type="checkbox"
                                            value="with Different Angle"
                                            id="form4Example4"
                                            name="requirements[]"
                                          />
                                          <label class="form-check-label h6" for="form4Example4">
                                            with Different Angle
                                          </label>
                                        </div>
                                        <div>
                                          <input
                                            class="form-check-input me-2"
                                            type="checkbox"
                                            value="with Minor Changes"
                                            id="form4Example5"
                                            name="requirements[]"
                                          />
                                          <label class="form-check-label h6" for="form4Example5">
                                            with Minor Changes
                                          </label>
                                        </div>
                                        <div>
                                          <input
                                            class="form-check-input me-2"
                                            type="checkbox"
                                            value="with Specific Color"
                                            id="form4Example6"
                                            name="requirements[]"
                                          />
                                          <label class="form-check-label h6" for="form4Example6">
                                            with Specific Color
                                          </label>
                                        </div>
                                        <div>
                                          <input
                                            class="form-check-input me-2"
                                            type="checkbox"
                                            value="in Common 3D Format"
                                            id="form4Example7"
                                            name="requirements[]"
                                          />
                                          <label class="form-check-label h6" for="form4Example7">
                                            in Common 3D Format
                                          </label>
                                        </div>
                                        <div>
                                          <input
                                            class="form-check-input me-2"
                                            type="checkbox"
                                            value="in Common 3D Format with changes"
                                            id="form4Example8"
                                            name="requirements[]"
                                          />
                                          <label class="form-check-label h6" for="form4Example8">
                                            in Common 3D Format with changes
                                          </label>
                                        </div>
                                        </div>
                                        <div class="mb-2">
                                        <label for="formFileMultiple" class="form-label">Please Upload changes as image file less than 2mb</label>
                                        <input class="form-control" type="file" id="formFileMultiple" name="files" required/>
                                        </div>
                                        {{-- Recaptcha --}}
                                        {{-- <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="6LcNt1opAAAAAHQaifUEiIr6OlLna9ruxTNVBynP" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                            <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
                                            <div class="help-block with-errors"></div>
                                        </div> --}}
                                        <!-- Submit button -->
                                        <button data-mdb-ripple-init type="submit" class="btnProduct">Send</button>
                                      </form></div>
</div>
                            </div>
                          </div>


                    </div>
            </div>
            </div>
            <div>
                 <h3 class="inner-heading"><span class="text-left">Components and Formats</span></h3>
                <table class="table table-bordered componentTable">
                    <thead>
                        <tr>
                            <th scope="col">Components</th>
                            <th scope="col">Formats</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->component as $components)
                        {{-- {{$component}} --}}
                        <tr>

                            <td>{{$components->comp_name}}</td>
                            @foreach($components->format as $format)
                            <td>{{$format->type}}</td>
                            @break
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
			<h3 class="inner-heading"><span class="text-left">Related Products</span></h3>
              <div class="container text-center my-3">
              <div class="row mx-auto my-auto justify-content-center">
                  <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner" role="listbox">
                          @foreach($relatedProducts->take(4) as $relate)
                          <div class="carousel-item active">
                              <div class="col-md-3">
                                  <div class="card">
                                      <div class="card-img">
                                          <a style="text-decoration:none; color: white !important;" href="{{ route('detail', $relate->slug) }}">{{$relate->getFirstMedia('product')}}</a>

                                      </div>
                                      {{-- <!-- <div class="card-img-overlay">{{$relate->subcategory->name}}</div> --> --}}
                                      <div class="card-img-overlay"><a style="text-decoration:none; color: white !important;" href="{{ route('detail', $relate->slug) }}">{{$relate->title}}</a></div>

                                  </div>
                                  <div class=""><a style="text-decoration:none; color: black !important;" href="{{ route('detail', $relate->slug) }}">{{$relate->subcategory->name}}</a></div>

                              </div>
                          </div>
                          @endforeach
                      </div>
                      <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button"
                          data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      </a>
                      <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button"
                          data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      </a>
                  </div>
              </div>
          </div>
        </div>


    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

<div id="myresult" class="img-zoom-result hide"></div>

@endsection
