@extends('layouts.master')

@section('content')

{{-- Content Goes Here  --}}

<div class="inner-banner enquiry">
    <h2 class="page-title">Enquiry Form</h2>
</div>
<section class="inner-enquiry blue-bg position-relative">
            <img src="../assets/img/enquiry-flower.png" class="enquiry-flower">
    <div class="container enquiry-container overflow-hidden">
        <h3 class="text-blue display-5">Enquiry Form</h3>
            <div class="row gy-5">
        <div class="enquiry-form col-md-12">
            <form class="row g-3" action="{{route('enquiryMail')}}" method="get">
                @include('mail.flash-message')
  <div class="col-md-6">
    <input type="text" name="f_name" class="form-control" id="validationDefault01" required placeholder="Enter your first name">
  </div>
  <div class="col-md-6">
    <input type="text" name="l_name" class="form-control" id="validationDefault02" required placeholder="Enter your last name">
  </div>
  <div class="col-md-6">
  <input type="email" name="email" class="form-control" id="validationDefault03" placeholder="Enter your official email" required>
    </div>
  <div class="col-md-6">
    <input type="text" name="company" class="form-control" id="validationDefault02" required placeholder="Enter your company name">
  </div>
    <div class="col-md-6">
  <input type="number" name="contact" class="form-control" id="validationDefault04" placeholder="Enter your contact number" required>
    </div>
    <div class="col-md-6">
  <input type="text" name="city" class="form-control" id="validationDefault04" placeholder="Enter your city name" required>
    </div>
    <div class="col-md-6">
  <input type="text" name="state" class="form-control" id="validationDefault04" placeholder="Enter your state name" required>
    </div>
    <div class="col-md-6">
  <input type="text" name="country" class="form-control" id="validationDefault04" placeholder="Enter your country name" required>
    </div>
    <div class="col-md-6">
  <input type="number" name="zipcode" class="form-control" id="validationDefault04" placeholder="Enter your zip code" required>
    </div>
    <div class="col-md-12 select-box">
        <h4>What service are you looking to purchase ?</h4>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="services[]" value="HVAC 3D Images" id="hav3dimages">
          <label class="form-check-label" for="hav3dimages">
            HVAC 3D Images
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="services[]" value="BAS Library" id="baslibrary">
          <label class="form-check-label" for="baslibrary">
            BAS Library
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="services[]" value="Niagara 4 Engineering Services" id="niagara4engineering">
          <label class="form-check-label" for="niagara4engineering">
            Niagara 4 Engineering Services
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="services[]" value="Niagara 4 Custom Development" id="niagara4custom">
          <label class="form-check-label" for="niagara4custom">
            Niagara 4 Custom Development
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="services[]" value="Niagara 4 Software" id="niagara4software">
          <label class="form-check-label" for="niagara4software">
            Niagara 4 Software
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="services[]" value="Niagara 4 Controllers" id="niagara4controllers">
          <label class="form-check-label" for="niagara4controllers">
            Niagara 4 Controllers
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="services[]" value="3D Floor Plan" id="3dfloorplan">
          <label class="form-check-label" for="3dfloorplan">
            3D Floor Plan
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="services[]" value="3D Landscape Images" id="3dlandscape">
          <label class="form-check-label" for="3dlandscape">
            3D Landscape Images
          </label>
        </div>
    </div>
    <div class="col-md-12">
  <label for="validationDefault05" class="form-label">Leave Your Message</label>
  <textarea  class="form-control" name="message" id="validationDefault05" placeholder="Enter your message" required></textarea>
    </div>
  <div class="col-12 d-flex justify-content-end">
    <button class="btn btn-primary button-blue" type="submit">Send a Message</button>
  </div>
</form>
        </div>
            </div>
    </div>
</section>


@endsection
