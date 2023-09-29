@extends('layouts.app')
@section('content')
<div class="container">
  <div class="titlebar text-center">
    <h1>B L O G S</h1>
  </div>
    
  <hr>
  <!-- Message if a blog is posted successfully -->
  
    @if (count($blogs) > 0)
      @foreach ($blogs as $blog)
      <div class="card mb-3 w-50 mx-auto">
        <img src="{{ asset('images/'.$blog->image)}}" class="card-img-top " alt="..." style="max-height:400px">
        <div class="card-body">
          <h5 class="card-title">{{$blog->title}}</h5>
          <p class="card-text">{{$blog->description}}</p>
          <p class="card-text"><small class="text-body-secondary"><i class="fa-regular fa-calendar-days"></i>{{$blog->created_at->format('Y-m-d')}} | 
            Uploaded by: {{$blog->user->name}}</small></p>
            
        </div>
      </div>
      
      @endforeach
    @else
    <p>No Posts found</p>
  @endif
</div>
@endsection




