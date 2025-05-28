@extends('layouts.master')

@section('content')
<!-- ======= Hero Section ======= -->

<section id="hero" class="hero d-flex align-items-center" style="margin-top: 125px;">
  
  <div class="container-fluid p-0">
      <div class="video-background">
  <div class="video-foreground">
    <!--<iframe src="https://www.youtube.com/embed/vmgINve_B3Y?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&mute=1" frameborder="0" allowfullscreen></iframe>-->
    <iframe src="https://www.youtube.com/embed/b2yOXlVDSyo?si=G2GITkkeIqZrjr6pcontrols=0&showinfo=0&rel=0&autoplay=1&loop=1&mute=1" frameborder="0" allowfullscreen></iframe>
  </div>
</div>
<div id="carouselExampleFade" class="carousel carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach($gallery as $index => $galleries)
      <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
          <div class="container">
              <div class="row">
                  
          <div class="col-lg-8"  data-aos="fade-up" data-aos-delay="200">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
            </div>
          @foreach($galleries->getMedia('gallery') as $image)
            <div class="col-lg-4" data-aos="fade-down" data-aos-delay="200">
              <img src="{{ $image->getUrl() }}" class="img-fluid" alt="{{ $image->name }}">
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

</section>

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid" data-aos="fade-up">
        <div class="row gx-20">
          <div class="col-lg-8 d-flex flex-column flex-wrap align-content-center text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="abt-content">
              <h3>Your Trusted partner for niagara integration projects</h3>
              <h2>Seamlessly Integrating Niagara Framework Solutions to Optimize and Elevate Your Building Automation Systems.</h2>
			  <div class="smart-icons grid gx-20">
				<div class="smart-icon-list">
					<img src="assets/img/smart-icon1.png" class="img-fluid" alt="">
					<p>HVAC</p>
				</div>
				<div class="smart-icon-list">
					<img src="assets/img/smart-icon2.png" class="img-fluid" alt="">
					<p>Ligting</p>
				</div>
				<div class="smart-icon-list">
					<img src="assets/img/smart-icon3.png" class="img-fluid" alt="">
					<p>Fire Alarm Monitering</p>
				</div>
				<div class="smart-icon-list">
					<img src="assets/img/smart-icon4.png" class="img-fluid" alt="">
					<p>PMS Monitering</p>
				</div>
			  </div>
            </div>
          </div>
          <div class="col-lg-4 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/smart-image.png" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <p>Our Services</p>
		  <p></p>
          <h4>Our talented mix of creative and technical staff offers BAS graphic services, 3D design and animation, video production, and much more.</h4>
        </header>

        <div class="row gy-4">

           @foreach($services->take(6) as $service)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue">
              @foreach($service->getMedia('category') as $image)
              <img src="{{ $image->getUrl() }} " class="img-fluid" alt="">
              @endforeach
              <h3>{{$service->name}}</h3>
              <p>{!! $service->description !!}</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          @endforeach

          <!--<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">-->
          <!--  <div class="service-box orange">-->
          <!--    <img src="assets/img/portfolio/portfolio-20.jpg" class="img-fluid" alt="">-->
          <!--    <h3>Navigation Graphics</h3>-->
          <!--    <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>-->
          <!--    <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>-->
          <!--  </div>-->
          <!--</div>-->

          <!--<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">-->
          <!--  <div class="service-box green">-->
          <!--    <img src="assets/img/portfolio/portfolio-20.jpg" class="img-fluid" alt="">-->
          <!--    <h3>BAS Symbol Library</h3>-->
          <!--    <p>A BAS symbol library is a collection of graphic files and animations that can be used to create building automation system (BAS) graphics, Some other BAS symbol libraries are: The Vector Symbol Library, The N4 Module by QA Graphics, The HVAC (BAS) Symbol Library.</p>-->
          <!--    <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>-->
          <!--  </div>-->
          <!--</div>-->

          <!--<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">-->
          <!--  <div class="service-box red">-->
          <!--    <img src="assets/img/portfolio/portfolio-20.jpg" class="img-fluid" alt="">-->
          <!--    <h3>3D HVAC Design & 3D Room System</h3>-->
          <!--    <p>3D HVAC design is the process of creating and visualizing. Three-dimensional models of heating, ventilation, and air conditioning (HVAC) systems for buildings. Some software tools that can help you with 3D HVAC design are Autodesk CFD, Turbos quid, QA Graphics& CADMATIC,</p>-->
          <!--    <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>-->
          <!--  </div>-->
          <!--</div>-->

          <!--<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">-->
          <!--  <div class="service-box purple">-->
          <!--    <img src="assets/img/portfolio/portfolio-20.jpg" class="img-fluid" alt="">-->
          <!--    <h3>System Graphics</h3>-->
          <!--    <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>-->
          <!--    <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>-->
          <!--  </div>-->
          <!--</div>-->

          <!--<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">-->
          <!--  <div class="service-box pink">-->
          <!--    <img src="assets/img/portfolio/portfolio-20.jpg" class="img-fluid" alt="">-->
          <!--    <h3>Video & Motion Graphics</h3>-->
          <!--    <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>-->
          <!--    <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>-->
          <!--  </div>-->
          <!--</div>-->

        </div>

      </div>

    </section><!-- End Services Section -->

<!-- ======= home-tridium Section ======= -->
    <section id="about" class="home-tridium">
      <div class="container-fluid" data-aos="fade-up">
        <div class="row gx-20">
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content text-uppercase text-center">
              <h3>Unlock the Potential of Tridium Niagara 4 with Expert System Integration Support</h3>
              <h2>ARE you leveraging the power of Tridium Niagara 4 but facing challenges with system integration? Our team of experts can help! We provide comprehensive Tridium Niagara 4 system 
integration support to ensure your BAS operates at peak efficiency</h2>
<div><img src="assets/img/tridium-logo.png" class="img-fluid" alt=""></div>
<div class="we-support">
    <p>we support</p>
    <p><span>* pROJECT bASIS</span><span>* mONTHLY bASIS</span></p>
</div>
            </div>
          </div>
          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/tridium-image.jpg" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </section><!-- End home-tridium Section -->
    
    <!-- ======= home-hvac Section ======= -->
    <section id="about" class="home-hvac">
      <div class="container-fluid" data-aos="fade-up">
        <div class="row gx-20">
          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/hvac-image.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content text-uppercase text-center">
              <h3>Unlock the Potential of Tridium Niagara 4 with Expert System Integration Support</h3>
              <h2>ARE you leveraging the power of Tridium Niagara 4 but facing challenges with system integration? Our team of experts can help! We provide comprehensive Tridium Niagara 4 system 
integration support to ensure your BAS operates at peak efficiency</h2>
<div><img src="assets/img/hvac-logo.png" width="80%" class="img-fluid" alt=""></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End home-hvac Section -->
    
    <!-- ======= Portfolio Section ======= -->
    <!--<section id="portfolio" class="portfolio hero">-->

    <!--  <div class="container" data-aos="fade-up">-->

    <!--    <header class="section-header">-->
    <!--      <h2>Portfolio</h2>-->
    <!--      <p>Check our latest work</p>-->
    <!--    </header>-->


    <!--    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">-->

    <!--      <div class="col-lg-4 col-md-6 portfolio-item filter-app">-->
    <!--        <div class="portfolio-wrap">-->
    <!--          <img src="assets/img/portfolio/portfolio-25.jpg" class="img-fluid" alt="">-->
			 <!-- <h4>19XR</h4>-->
    <!--        </div>-->
    <!--      </div>-->
		  <!--<div class="col-lg-4 col-md-6 portfolio-item filter-app">-->
    <!--        <div class="portfolio-wrap">-->
    <!--          <img src="assets/img/portfolio/portfolio-26.jpg" class="img-fluid" alt="">-->
			 <!-- <h4>WaterHeater</h4>-->
    <!--        </div>-->
    <!--      </div>-->
		  <!--<div class="col-lg-4 col-md-6 portfolio-item filter-app">-->
    <!--        <div class="portfolio-wrap">-->
    <!--          <img src="assets/img/portfolio/portfolio-27.jpg" class="img-fluid" alt="">-->
			 <!-- <h4>Wall_Mount</h4>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
		
    <!--      <div data-aos="fade-up" data-aos-delay="600">-->
    <!--        <div class="text-center">-->
    <!--          <a href="portfolio.html" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">-->
    <!--            <span>View More</span>-->
    <!--            <i class="bi bi-arrow-right"></i>-->
    <!--          </a>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--  </div>-->
              
    <!--</section><!-- End Portfolio Section -->

   
    <!-- ======= Clients Section ======= -->
    <!--<section id="clients" class="clients">-->

    <!--  <div class="container" data-aos="fade-up">-->

    <!--    <header class="section-header">-->
    <!--      <h2>Our Clients</h2>-->
    <!--      <p>Out Best Clients</p>-->
    <!--    </header>-->

    <!--    <div class="clients-slider swiper">-->
    <!--      <div class="swiper-wrapper align-items-center">-->
    <!--        <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>-->
    <!--        <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>-->
    <!--        <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>-->
    <!--        <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>-->
    <!--        <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>-->
    <!--        <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>-->
    <!--        <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>-->
    <!--        <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>-->
    <!--      </div>-->
    <!--      <div class="swiper-pagination"></div>-->
    <!--    </div>-->
    <!--  </div>-->

    <!--</section><!-- End Clients Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

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