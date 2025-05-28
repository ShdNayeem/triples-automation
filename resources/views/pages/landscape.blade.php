@extends('layouts.master')
@section('content')
{{-- Content Goes Here  --}}
<div class="inner-banner land" style="margin-top: 125px;">
    <h2 class="page-title">LANDSCAPE 3D IMAGES</h2>
</div>
<section class="inner-page">
<div class="container d-flex flex-column text-center details">
    <h3 class="text-primary">Transform Your Outdoor Spaces with Stunning 3D Landscape Images</h3>
    <p class="text-secondary">Bring Your Landscape Vision to Life with High-Quality 3D Renderings—Perfect for Design, Planning, and Presentation.</p>
</div>
</section>
<section class="inner-page pt-0">
    <div class="container-fluid d-flex flex-column text-center text-secondary">
    <h2 class="inner-tag-section text-primary">Benefits of Our Landscape 3D Images<span>&nbsp;</span></h2>
    <div class="d-flex tagBox-container">
    <div class="tagBox">
        <div class="tag-icon-bg"><img class="tag-icon" src="../assets/img/tag-icon-abt-13.png"/></div>
        <div class="tag-container shadow-lg">
            <h3>Accurate Visualization</h3>
            <h4>Our 3D images help you accurately visualize the final look of your landscape design, reducing guesswork and uncertainty.</h4>
        </div>
    </div>
    <div class="tagBox">
        <div class="tag-icon-bg"><img class="tag-icon" src="../assets/img/tag-icon-abt-2.png"/></div>
        <div class="tag-container shadow-lg">
            <h3>Improved Design Flexibility</h3>
            <h4>Make quick, easy modifications to your design to meet client preferences or environmental considerations, all before construction begins.</h4>
        </div>
    </div>
    <div class="tagBox">
        <div class="tag-icon-bg"><img class="tag-icon" src="../assets/img/tag-icon-abt-5.png"/></div>
        <div class="tag-container shadow-lg">
            <h3>Cost Savings</h3>
            <h4>By making informed design decisions upfront, you reduce the risk of costly changes during construction and ensure efficient use of materials and space.</h4>
        </div>
    </div>
    <div class="tagBox">
        <div class="tag-icon-bg"><img class="tag-icon" src="../assets/img/tag-icon-abt-9.png"/></div>
        <div class="tag-container shadow-lg">
            <h3>Enhanced Marketing Materials</h3>
            <h4>Our stunning 3D renderings can be used for marketing, brochures, websites, and presentations, helping you promote your design services with visually compelling content.</h4>
        </div>
    </div>
    </div>
    </div>
</section>
<section class="inner-page pt-0">
    <div class="container-fluid d-flex flex-column text-center text-secondary">
        <div class="row">
    <div class="d-flex flex-column align-items-center">
        @foreach($landscape as $land)
            <div class="floor-sample shadow-lg">
                @foreach($land->getMedia('landscape') as $image)

                    <img loading="lazy" src="{{ $image->getUrl() }}" class="d-block w-100 img-fluid" alt="{{ $image->name }}">

                @endforeach
                <h2 class="pt-3 pb-2">{{ $land->title }}</h2>
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
