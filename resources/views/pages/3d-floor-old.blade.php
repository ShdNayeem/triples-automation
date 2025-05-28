@extends('layouts.master')
@section('content')
{{-- Content Goes Here  --}}
<div class="inner-banner floor" style="margin-top: 125px;">
    <h2 class="page-title">3D Floor Plan</h2>
</div>
<section class="inner-page">
<div class="container-fluid d-flex flex-column text-center details">
    <h3 class="text-primary">Revolutionize Your HVAC Systems with Precise 3D Floor Plans</h3>
    <p class="text-secondary">Unlock the Power of 3D Visualization for HVAC Planning, Maintenance Enhance Efficiency, Improve Accuracy, and Streamline Operations.</p>
</div>
<div class="container-fluid d-flex flex-column text-center details">
    <h3 class="text-primary">Benefits of Our HVAC 3D Floor Plans</h3>
    <p class="text-secondary"><span class="text-secondary">Precision and Accuracy:</span>Reduce the risk of costly errors by ensuring every component of the HVAC system is placed accurately.</p>
    
    <p class="text-secondary"><span class="text-secondary">Efficient Design Process:</span>Save time and resources by visualizing, testing, and modifying your design before implementation.</p>
    
    <p class="text-secondary"><span class="text-secondary">Cost Savings:</span>By optimizing system design and reducing errors, our 3D HVAC Floor Plans help you save on materials, labor, and long-term operational costs.</p>
    
    <p class="text-secondary"><span class="text-secondary">Enhanced Communication:</span>Improve coordination between designers, engineers, contractors, and clients with clear, detailed visuals.</p>
</div>
</section>
<section class="inner-page pt-0">
    <div class="container-fluid d-flex flex-column text-center text-secondary">
        <div class="row">
    <div class="d-flex flex-column align-items-center">
        <div class="floor-sample shadow-lg">
            <img src="../assets/img/sample-floor-1.jpg" class="img-fluid"/>
            <h2 class="pt-3 pb-2">Sample - 01</h2>
        </div>
        <div class="floor-sample shadow-lg">
            <img src="../assets/img/sample-floor-1.jpg" class="img-fluid"/>
            <h2 class="pt-3 pb-2">Sample - 02</h2>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection
