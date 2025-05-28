@extends('layouts.master')
@section('content')
<main id="main" style="margin-top: 50px;">
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio inner-page" style="padding-top:140px;">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <p class="mb-0">High-Quality 3D HVAC Models <p class="text-primary">Ready for Instant Purchase</p></p>
      </header>
      <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
        
        
        @foreach($categories as $categorieslist)
   <a class="d-flex" href="{{ route('subcategory', ['slug' => $categorieslist->slug]) }}">
        <div class="col-lg-4 col-md-4 portfolio-item filter-app mt-4  p-3">
          <div class="portfolio-wrap">
            
              @if ($categorieslist->hasMedia('category'))
              <img loading="lazy" src="{{ $categorieslist->getFirstMedia('category')->getUrl() }}" class="img-fluid" alt="Product Image">
              
              @else

              <p>No image available</p>
              @endif
              <h4>{{$categorieslist?->name}}</h4>
          </div>
        </div>
         </a>
         @endforeach  
        </div>
       
    
    </div>

    </div>
      
  </section><!-- End Portfolio Section -->
</main>
<!-- End #main -->
@endsection