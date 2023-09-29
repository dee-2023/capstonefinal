@extends('layouts.admin')
@section('title', "Packages")
@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                <h3>Travel Packages</h3>
            </div>
            <hr>
            <a class="btn btn-success me-auto mb-3" href="{{ route('add-packages') }}">{{ __(' Add Packages') }}</a>
            <div class="row mb-5 cstm-height-card">
            @foreach($packages as $package)
            
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('images/'.$package->image)}}" class="card-img-top" alt="...">
                        <h5 class="card-title">{{ $package->title }}</h5>                        
                        <div class="card-body">
                            <p class="card-text">{{ $package->description }}</p>
                            <p class="card-text">Price: Php{{ $package->price }}</p>
                            <p>Package Inclusions:</p>
                                <ul>
                                @foreach($package->inclusions as $inclusion)
                                    <li>-{{ $inclusion }}</li>
                                @endforeach
                                </ul>
                            <p class="card-text">Created by: {{$package->user->name}} | {{$package->created_at->format('Y-m-d')}} </p>
                            <p class="card-text">Category:  {{$package->category->name}}</p>
                            <a href="{{ url('edit-package/'.$package->id)}}" class="btn btn-primary">Edit</a>
                            <form action="{{ url('delete-package/'. $package->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button id="swalltrigger" class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this package?')">
                                    Delete
                                </button>             
                                  
                            </form>
                        </div>
                    </div>
                </div>
            
            @endforeach
        </div>
    </div>
</div>
        
@endsection