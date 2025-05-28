@extends('layouts.master')
@section('content')
<main id="main" style="margin-top: 125px;">
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio inner-page" style="padding-top:140px;">

    <div class="container-fluid" data-aos="fade-up">

      <header class="section-header">
        <p class="mb-0">{{$name}} - High-Quality 3D HVAC Models <p class="text-primary">Ready for Instant Purchase</p></p>
      </header>

      <!-- <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-card">Card</li>
            <li data-filter=".filter-web">Web</li>
          </ul>
        </div>
      </div> -->

     <div class="row gy-4 d-flex justify-content-around" data-aos="fade-up" data-aos-delay="200">
        @foreach($productlist as $productslist)
          <a class="col-lg-6 col-md-6 col-sm-10 d-flex text-decoration-none" href="{{ route('detail', ['slug' => $productslist->slug]) }}">
            <div class="portfolio-item">
              <div class="portfolio-wrap product-list-wrap">
                <div class="text-center availableSize">				
                <h3>{{$productslist->title}}</h3>
                <span>Available Size :</span>
                  @if(isset($productslist->available_size) && is_array($productslist->available_size) && count($productslist->available_size) > 0)
                  <ul>
                    @foreach($productslist->available_size as $size)
                    <li>{{$size}}<span>,</span></li>
                    @endforeach
                  </ul>
                  @else
                    <span>No available sizes</span>
                  @endif
                </div>
                @foreach ($productslist->getMedia('product') as $image)            
                  <img loading="lazy" src="{{ $image->getUrl() }}" class="img-fluid" alt="">
                    @break
                @endforeach  
                
                   
              </div>
            </div>
          </a>
       @endforeach
      </div>

    </div>

  </section><!-- End Portfolio Section -->

</main>
<!-- End #main -->
@endsection