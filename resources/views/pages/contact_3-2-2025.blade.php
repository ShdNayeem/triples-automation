@extends('layouts.master')

@section('content')

{{-- Content Goes Here  --}}

<div class="inner-banner aboutus" style="margin-top: 125px;">
    <h2 class="page-title">Contact Us</h2>
</div>
<section class="inner-contact blue-bg position-relative">
    <div class="container-fluid d-flex flex-column">
        <h3 class="text-blue display-5 fw-bolder">Send us a message</h3>
        <p class="h6 lh-base text-dark">Do you have a question ? Or need any help to choose the </br>
right product from Triple-S Automation Private Limited.  </br>
Feel free to contact us</p>
            <div class="row g-3">
        <div class="contact-form col-md-7">
            <form class="row g-3" action="{{route('contactMail')}}" method="get">
    @include('mail.flash-message')
  <div class="col-md-6">
    <label for="validationDefault01" class="form-label">First name</label>
    <input type="text" name="f_name" class="form-control" id="validationDefault01" required placeholder="Enter your first name">
  </div>
  <div class="col-md-6">
    <label for="validationDefault02" class="form-label">Last name</label>
    <input type="text" name="l_name" class="form-control" id="validationDefault02" required placeholder="Enter your last name">
  </div>
  <div class="col-md-6">
  <label for="validationDefault03" class="form-label">Email address</label>
  <input type="email" name="email" class="form-control" id="validationDefault03" placeholder="Enter your email" required>
    </div>
    <div class="col-md-6">
  <label for="validationDefault04" class="form-label">Contact Details</label>
  <input type="number" name="contact" class="form-control" id="validationDefault04" placeholder="Enter your contact number" required>
    </div>
    <div class="col-md-12">
  <label for="validationDefault05" class="form-label">Message</label>
  <textarea  class="form-control" name="message" id="validationDefault05" placeholder="Enter your message" required></textarea>
    </div>
  <div class="col-12 d-flex justify-content-end">
    <button class="btn btn-primary button-blue" type="submit">Send a Message</button>
  </div>
</form>
        </div>
            </div>
        <div class="contact-details col-md-5 position-absolute">
            <h3>Hi! We are always here <br/>to help you.</h3>
            <div class="contact-details-box">
                <a  href="tel:+919488837676">
                <img src="../assets/img/icon-phone.png"/>
                <p>Hot Line:</br>+91 94 888 376 76</p>
                </a>
            </div>
            <div class="contact-details-box">
                <a href="https://api.whatsapp.com/send?phone=919080666043" target="_blank">
                <img src="../assets/img/icon-chat.png"/>
                <p>SMS / Whatsapp:</br>+91 94 888 376 76</p>
                </a>
            </div>
            <div class="contact-details-box">
                <a href="mailto:sales@triplesautomation.com" target="_blank">
                <img src="../assets/img/icon-mail.png"/>
                <p>Email:</br>sales@triplesautomation.com</p>
                </a>
            </div>
            <div class="contact-connect">
               <h3> Connect with us</h3>
               <div class="connect-icons">
                   <a href="https://www.facebook.com/profile.php?id=61561747867944"><img src="../assets/img/icon-facebook.png" alt="faceboox"/></a>
                   <a href="https://x.com/tripleltd121251/status/1819689357617316318"><img src="../assets/img/icon-twitter.png" alt="twitter"/></a>
                   <a href="http://www.linkedin.com/in/muthukumar-poomari"><img src="../assets/img/icon-linkedin.png" alt="linkedin"/></a>
                   <a href="https://youtube.com/@triplesautomation?si=EbSTLIVrqKWbk5iv"><img src="../assets/img/icon-youtube.png" alt="youtube"/></a>
               </div>
            </div>
            </div>
    </div>
</section>

@endsection
