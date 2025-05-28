@extends('layouts.master')

@section('content')

<!-- ======= Hero Section ======= -->

<section id="hero" class="hero d-flex align-items-center" style="margin-top: 125px;">
  {{-- {{ dd($video->url) }} --}}
  {{-- {{ dd($channels) }} --}}
  {{-- {{ dd($libraries) }} --}}
  <div class="container-fluid p-0">
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach($sliders as $index => $slider)
      <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
          <div class="container">
              <div class="row  align-items-center">
          <div class="col-lg-7">
            <h3>{{ $slider->title }}</h3>
            <p>{{ strip_tags($slider->content) }}</p>
            <a href="{{ $slider->url }}" class="btn btn-info text-white" target="_blank">View More</a>
          </div>
          @foreach($slider->getMedia('sliders') as $image)
            <div class="col-lg-5"  loading="lazy">
              <img src="{{ $image->getUrl() }}" loading="lazy" class="img-fluid" alt="{{ $image->name }}">
            </div>
              </div>
          </div>
          @endforeach
      </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    @foreach($videos->take(1) as $video)
        @php
            $vid_loop=str_replace('https://youtu.be/', '', $video->url);
        @endphp
      <div class="video-background">
        <div class="video-foreground">
          <iframe loading="lazy" src="{{str_replace('.be', 'be.com/embed', $video->url)}}?playlist={{$vid_loop}}&autoplay=1&controls=0&loop=1&rel=0&showinfo=0&mute=1&preload=none" frameborder=0 allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>    
        </div>
      </div>
    @endforeach    

</section>

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid" data-aos="fade-up">
        <div class="row gx-20">
          <div class="col-lg-8 col-xs-12 d-grid flex-column flex-wrap align-content-center text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="abt-content d-flex flex-column  align-items-center text-center">
              <h3>Your Trusted partner for niagara integration projects</h3>
              <h2>Seamlessly Integrating Niagara Framework Solutions to Optimize and <br/> Elevate Your Building Automation Systems.</h2>
			  <div class="smart-icons grid gx-20">
				<div class="smart-icon-list">
					<img loading="lazy" src="assets/img/smart-icon1.png" class="img-fluid" alt="">
					<p>Building Automation Systems</p>
				</div>
				<div class="smart-icon-list">
					<img loading="lazy" src="assets/img/smart-icon2.png" class="img-fluid" alt="">
					<p>Lighting Control Systems</p>
				</div>
				<div class="smart-icon-list">
					<img loading="lazy" src="assets/img/smart-icon3.png" class="img-fluid" alt="">
					<p>Fire Alarm Monitoring Systems</p>
				</div>
				<div class="smart-icon-list">
					<img loading="lazy" src="assets/img/smart-icon4.png" class="img-fluid" alt="">
					<p>Power Monitoring Systems</p>
				</div>
			  </div>
            </div>
          </div>
          <div class="col-lg-4 col-xs-12 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img loading="lazy" src="assets/img/smart-image.png" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </section><!-- End About Section -->
   

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

      <div class="container-fluid" data-aos="fade-up">

        <header class="section-header">
          <p>Our Services<span>&nbsp;</span></p>
          <h4>Our talented mix of creative and technical staff offers </br>BAS engineering support, graphic services, 3D design and animation, and much more</h4>
        </header>
            <div class="row gy-4">
        <div id="news-slider" class="owl-carousel">
        <div>
          <div class="item">
              @foreach($services->take(6) as $service)
            <div class="service-box blue">
              <h3>{{$service->name}}</h3>
              @foreach($service->getMedia('category') as $image)
              <img src="{{ $image->getUrl() }}" loading="lazy" class="img-fluid" alt="{{$service->name}}">
              @endforeach
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          @endforeach
          </div>
        </div>
        <div>
          <div class="item">
            <div class="service-box blue">
              <h3>3D Floor Plan</h3>
              <img  src="assets/img/3dfloor.png" loading="lazy" class="img-fluid" alt="3D Floor Plan">
              <a href="https://triplesautomation.com/services/3d-floor" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
        </div>
        <div>
          <div class="item">
            <div class="service-box blue">
              <h3>Landscape 3D Images</h3>
              <img  src="assets/img/land.png" loading="lazy" class="img-fluid" alt="Landscape 3D Images">
              <a href="https://triplesautomation.com/services/landscape" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div>
          <div class="item">
            <div class="service-box blue">
              <h3>Chilled water system</h3>
              <img  src="assets/img/chilled.png" loading="lazy" class="img-fluid" alt="Chilled water system">
              <a href="https://triplesautomation.com/services/chilled-water-system" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div>
          <div class="item">
            <div class="service-box blue">
              <h3>Niagara 4 Custom Drivers</h3>
              <img  src="assets/img/niagara.png" loading="lazy" class="img-fluid" alt="Niagara 4 Custom Drivers">
              <a href="https://triplesautomation.com/services/niagara4-custom-drivers" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div>
          <div class="item">
            <div class="service-box blue">
              <h3>Niagara 4 Engineering Services</h3>
              <img  src="assets/img/niagara-eng.png" loading="lazy" class="img-fluid" alt="Niagara 4 Engineering Services">
              <a href="https://triplesautomation.com/services/niagara4-engineering-services" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div>
          <div class="item">
            <div class="service-box blue">
              <h3>Niagara 4 Software Services</h3>
              <img  src="assets/img/niagara-soft.png" loading="lazy" class="img-fluid" alt="Niagara 4 Software Services">
              <a href="https://triplesautomation.com/services/niagara4-software-services" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>

    </section><!-- End Services Section -->

<!-- ======= home-tridium Section ======= -->
    <section id="about" class="home-tridium">
      <div class="container-fluid" data-aos="fade-up">
        <div class="row gx-20">
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content text-uppercase text-center">
              <h3>Unlock the Potential of Tridium Niagara 4 with <br/> Expert System Integration Support</h3>
              <h2>Are you leveraging the power of Tridium Niagara 4  <br/>but facing challenges with system integration? <br/> Our team of experts can help! <br/> We provide comprehensive Tridium Niagara 4 system  <br/>
integration support to ensure your BAS operates at peak efficiency</h2>
<div style="    display: flex;    justify-content: space-around;margin-top: 2rem;">
    <img src="assets/img/tridium-logo.png" loading="lazy" style="width:30%" alt=""><img src="assets/img/tridium-logo-1.png" style="width:30%" alt="">
    </div>
            </div>
          </div>
          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/tridium-image.png" loading="lazy" style="width:90%"  class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </section><!-- End home-tridium Section -->
    
    <!-- ======= our channel Section ======= -->
    <section id="channel" class="channel">
      <div class="container-fluid" data-aos="fade-up">
        <div class="row gx-20">
            <header class="section-header">
          <p>Our Channel<span>&nbsp;</span></p>
          <h4>Discover Our YouTube Channel</h4>
        </header>
         <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">

            @foreach($channels as $channel)
              <div class="swiper-slide">
                <!-- <iframe width="400" height="300" src="https://www.youtube.com/embed/b2yOXlVDSyo?si=_Sh84emirznxPgSo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->


                <iframe loading="lazy" width="400" height="250" src="{{str_replace('.be', 'be.com/embed', $channel->url)}}?controls=0&rel=0&showinfo=0" frameborder=0 allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              </div>

            @endforeach
            </div>
          <div class="swiper-pagination"></div>
        </div>
          
        </div>
      </div>
    </section><!-- End our channel Section -->
    
    <!-- ======= home-hvac Section ======= -->
    <section id="about" class="home-hvac">
      <div class="container-fluid" data-aos="fade-up">
        <div class="row gx-0">
          @foreach($libraries->take(1) as $library)
            <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
              <!-- <iframe width="100%" height="400" src="https://www.youtube.com/embed/b2yOXlVDSyo?si=_Sh84emirznxPgSo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->

              <iframe loading="lazy" width="100%" height="350" src="{{str_replace('.be', 'be.com/embed', $library->url)}}?controls=0&rel=0&showinfo=0" frameborder=0 allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          @endforeach
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content text-uppercase text-center">
              <h3>HVAC Library Premium Unleash the Power of Advanced Knowledge</h3>
              <h2>Expand your expertise with exclusive in-depth resources, industry insights, and interactive tools for ultimate HVAC mastery.</h2>
                <div style="margin-top: 2rem;"><img src="assets/img/hvac-logo.jpg" width="80%" class="img-fluid" alt=""></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End home-hvac Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="display:none">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                 <p>{{$profile->door_no}} {{$profile->street}}, <br/>{{$profile->area}}, {{$profile->pincode}}</p>
				          <p>{{$profile->state}}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>{{$profile->mobile_1}}<br>{{$profile->mobile_2}}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>{{$profile->email_1}}<br>{{$profile->email_2}}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form">
              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>
                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>
                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->
@endsection