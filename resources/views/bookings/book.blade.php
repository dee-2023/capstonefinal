@extends('layouts.app')
@section('title', "Booking")
@section('content')


<div class="container book-card">
    
            <div class="card book-card">
                <div class="card-body">

                    <h1>Book your Package</h1>
                    <span class="text-success">{{ session('message')}}</span>
                    <form action="/bookings" method="POST">
                    @csrf
        
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{auth()->user()->name}}" disabled>
                    </div>
        <label for="package">Select Package:</label>

            <select name="package_id" id="package_id" required>
                <option selected>Select a Package</option>
                @foreach ($packages as $package)
                    <option value="{{ $package->id}}">{{ $package->title}} </option>
                @endforeach
            </select><br />
        <label for="booking_date" >Date: </label>
        <input type="date" class="form-control" name="booking_date" id="booking_date" required><br />
        <fieldset >
            
            <label >Add Inclusions:</label>
            <div class="form-check">
            <input type="checkbox" name="inclusions[]" class="form-check-input" value="breakfast">Breakfast<br />
            <input type="checkbox" name="inclusions[]" class="form-check-input" value="lunch">Lunch<br />
            <input type="checkbox" name="inclusions[]" class="form-check-input" value="dinner">Dinner<br />
            <input type="checkbox" name="inclusions[]" class="form-check-input" value="airport transfer">Airport Transfer<br />
            <input type="checkbox" name="inclusions[]" class="form-check-input" value="accomodation">Accomodation<br />
            </div>
        </fieldset><br />
 
        
        <input type="submit" class="btn btn-primary" value="Book Now">
        <a class="btn btn-success" href="{{ route('my-bookings') }}">{{ __('My Bookings') }}</a>

        
    </form>

</div>

<script>
   
    var today = new Date();
    today.setDate(today.getDate() + 5);
    var minDate = today.toISOString().split('T')[0];
    document.getElementById('booking_date').setAttribute('min', minDate);
  </script>
</div>
@endsection