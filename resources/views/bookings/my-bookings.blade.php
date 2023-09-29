@extends('layouts.app')
@section('title', "Booking")
@section('content')

<div class="container">
    <h1>My Bookings</h1>
    <div class="row">
        
    @foreach ($bookings as $booking)
    <div class="col-sm-4 mb-3 mb-sm-0 ">
        <div class="card mybookings-card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Package: {{ $booking->package_id}}</h5>
                <h6 class="card-text">Booking ID: #{{ $booking->id }}</h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Date: {{ $booking->booking_date }}</li>
                <li class="list-group-item inclusion-height"> Additional Inclusions:
                    @if (is_array($booking->inclusions))
                        <ul>
                        @foreach($booking->inclusions as $inclusion)
                            <li>{{ $inclusion }}</li>
                        @endforeach
                        </ul>
                        
                    @else 
                        <p>*No Additional Inclusions.</p>
                        {{ $booking->inclusions }} 
                    @endif
                </li>
                
            </ul>
            <div class="card-body">
                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                @csrf
                @method('DELETE')
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
    </div>











    
   

@endsection