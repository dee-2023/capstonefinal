@extends('layouts.app')
@section('title', "Home")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Hello, {{ Auth::user()->name }}</h6></div>

                <div class="card-body">
                   
                    <a class="btn btn-primary" href="{{ route('booknow') }}">{{ __('Book a Tour') }}</a>
                    <a class="btn btn-primary" href="{{ route('shop') }}">{{ __('Shop') }}</a>
                    <a class="btn btn-primary" href="{{ route('my-bookings') }}">{{ __('My Bookings') }}</a>
                </div>
            </div>
        </div>
    </div>
  
      
</div>
@endsection

