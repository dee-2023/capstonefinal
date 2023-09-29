@extends('layouts.app')
@section('title', "Contact")
@section('content')

<section class="container-fluid contact-head text-center img-fluid">
  <div class="row">
    
    <div class=" text-container mt-5">
        <h2>Need Travel</h2>
        <h1>Contact Us</h1>
    </div>  
  </div>
</section>


<!--=======================Contact==========================-->
<div class="container mt-5">
  <div class="row g-0">
    <div class="col-lg-6 col-md-12">

      <div>
        <span class="text-bg-warning">Need Help</span>
        <h2 class="text-primary">Don't hesitate to contact us</h2>
        <p class="contact__description">
          Need a guide in first trip or need a consultation about traveling? just
          contact us.
        </p>
      </div>

      <div class="container">
        <!-- Row 1 -->
        <div class="row g-2">
          <!--Call card-->
          <div class="col-6 p-3">
            <div class="card card-body" style="width: 10rem;">
              <h5 class="card-title"><i class="fa-solid fa-phone-volume"></i> Call</h5>
              <div class="text-center">
                <p class="card-text">022.321.165.19</p>
                <a href="#" class="btn btn-primary">Call Now</a></div>
            </div> 
          </div>
          <!--Whatsapp card-->
          <div class="col-6 p-3">
            <div class="card-body card" style="width: 10rem;">
              <h5 class="card-title"><i class="fa-brands fa-whatsapp"></i> WhatsApp</h5>
              <div class="text-center">
                <p class="card-text">022.321.165.19</p>
                <a href="#" class="btn btn-primary">Chat Now</a></div>
            </div>
          </div>
        </div>  <!-- end of row 1 -->
          <!-- row2 -->
        <div class="row g-2">

          <div class="col-6 p-3">
            <div class="card-body card" style="width: 10rem;">
              <h5 class="card-title"><i class="fa-solid fa-message"></i> Message</h5>
              <div class="text-center">
                <p class="card-text">022.321.165.19</p>
                <a href="#" class="btn btn-primary">Message Now</a></div>
            </div> 
          </div>
      
          <div class="col-6 p-3">
            <div class="card-body card" style="width: 10rem;">
              <h5 class="card-title"><i class="fa-solid fa-video"></i></i> Video Call</h5>
              <div class="text-center">
                <p class="card-text">022.321.165.19</p>
                <a href="#" class="btn btn-primary">Video Call</a></div>
            </div>
          </div>
        </div> <!-- end of row 2 -->
      </div>
    </div>
    
    <div class="col-lg-6 col-md-12 p-5">
    <div class="p-3 contact-team" >
            
        </div></div>
  
</div>
</div>
  
    



@endsection