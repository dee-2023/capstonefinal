@extends('layouts.admin')
@section('title', "Bookings")
@section('content')

<div class="container">
  <div class="flex-center position-ref full-height">
    <div class="content">
      <h3 class="title m-b-md">Customer's Booking:</h3>
    
      @foreach($bookings as $booking)
      <div>
        <img src="/img/logo.jpg" alt="logo" class="bookings_logo">
          <a href="/bookings/{{ $booking->id }}">{{ $booking->name }}</a>
      </div>
      @endforeach
            
    </div>       
  </div>
</div>

@endsection

