@extends('layouts.master')
@section('content')
{{-- Content Goes Here  --}}
<div class="inner-banner floor" style="margin-top: 125px;">
    <h2 class="page-title">3D Floor Plan</h2>
</div>
<section class="inner-page">
<div class="container d-flex flex-column text-center details">
    <h3 class="text-primary">Revolutionize Your HVAC Systems with Precise 3D Floor Plans</h3>
    <p class="text-secondary">Unlock the Power of 3D Visualization for HVAC Planning, Maintenance Enhance Efficiency, Improve Accuracy, and Streamline Operations.</p>
</div>
</section>
<section class="inner-page pt-0">
    <div class="container-fluid d-flex flex-column text-center text-secondary">
    <h2 class="inner-tag-section text-primary">Benefits of Our HVAC 3D Floor Plans<span>&nbsp;</span></h2>
    <div class="d-flex tagBox-container">
    <div class="tagBox">
        <div class="tag-icon-bg"><img class="tag-icon" src="../assets/img/tag-icon-abt-1.png"/></div>
        <div class="tag-container shadow-lg">
            <h3>Precision and Accuracy</h3>
            <h4>Reduce the risk of costly errors by ensuring every component of the HVAC system is placed accurately.</h4>
        </div>
    </div>
    <div class="tagBox">
        <div class="tag-icon-bg"><img class="tag-icon" src="../assets/img/tag-icon-abt-6.png"/></div>
        <div class="tag-container shadow-lg">
            <h3>Efficient Design Process</h3>
            <h4>Save time and resources by visualizing, testing, and modifying your design before implementation.</h4>
        </div>
    </div>
    <div class="tagBox">
        <div class="tag-icon-bg"><img class="tag-icon" src="../assets/img/tag-icon-abt-5.png"/></div>
        <div class="tag-container shadow-lg">
            <h3>Cost Savings</h3>
            <h4>By optimizing system design and reducing errors, our 3D HVAC Floor Plans help you save on materials, labor, and long-term operational costs.</h4>
        </div>
    </div>
    <div class="tagBox">
        <div class="tag-icon-bg"><img class="tag-icon" src="../assets/img/tag-icon-abt-2.png"/></div>
        <div class="tag-container shadow-lg">
            <h3>Enhanced Communication</h3>
            <h4>Improve coordination between designers, engineers, contractors, and clients with clear, detailed visuals.</h4>
        </div>
    </div>
    </div>
    </div>
</section>
<section class="inner-page pt-0">
    <div class="container-fluid d-flex flex-column text-center text-secondary">
        <div class="row">
    <div class="d-flex flex-column align-items-center">
        @foreach($threedfloor as $threed)
            <div class="floor-sample shadow-lg">
                @foreach($threed->getMedia('threedfloors') as $image)
                    <img loading="lazy" src="{{ $image->getUrl() }}" class="d-block w-100 img-fluid" alt="{{ $image->name }}">
                @endforeach
                <h2 class="pt-3 pb-2">{{ $threed->title }}</h2>
            </div>
        @endforeach
    </div>
    </div>
    </div>
</section>
<section class="inner-page pt-0 enquiry-box">
    <div class="container-fluid d-flex flex-column text-center text-secondary">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img height="300" src="../assets/img/support.png"/>
            </div>
            <div class="col-md-8">
                <header class="section-header">
          <p class="text-primary">Have a project in mind?<span>&nbsp;</span></p>
          <h4>We’d love to help you turn your ideas into reality! At Triple-S Automation Private Limited, we are committed to delivering innovative solutions tailored to your unique needs. Our team is here to assist you every step of the way.</h4>
          <a class="btn btn-primary" href="/enquiry" role="button">Get in Touch</a>
        </header>
            </div>
        </div>
    </div>
</section>
@endsection
