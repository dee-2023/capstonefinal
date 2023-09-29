@extends('layouts.admin')
@section('title', "Bookings")
@section('content')
<div class="container">

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Booking for {{ $booking->name }}</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Package: {{ $booking->package_id}}</h6>

            <p>Date: {{ $booking->booking_date}} </p>
            <p>Added inclusions:</p>
            <ul>
                @foreach($booking->inclusions as $inclusion)
                    <li>- {{ $inclusion }}</li>
                @endforeach
            </ul>
            <p>Booking created at: {{ $booking->created_at}}</p>
        <form action="/bookings/{{ $booking->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-success" onclick="return confirm('Are you sure you want to complete this booking?')">Complete Booking</button>
        </form>
          
          <a href="/bookings" class="card-link"><-Back to Customer Bookings</a>
        </div>
      </div>  
</div>

@endsection