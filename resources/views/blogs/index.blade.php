@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="titlebar text-center">
    <h1>B L O G S</h1>
    
  </div>
  
    
  <hr>
  <a class="btn btn-success float-end me-auto" href="{{ route('create-blog') }}" role="button">Add Blog</a>
  
    @if (count($blogs) > 0)
      @foreach ($blogs as $blog)
      <div class="card mb-3 w-50 mx-auto">
        <img src="{{ asset('images/'.$blog->image)}}" class="card-img-top " alt="..." style="max-height:400px">
        <div class="card-body">
          <h5 class="card-title">{{$blog->title}}</h5>
          <p class="card-text">{{$blog->description}}</p>
          <p class="card-text"><small class="text-body-secondary"><i class="fa-regular fa-calendar-days"></i>{{$blog->created_at->format('Y-m-d')}} | 
            Uploaded by: {{$blog->user->name}}</small></p>

            
            <form action="{{ url('delete-blog/'.$blog->id) }}" method="POST">
              @csrf
              @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
            </form>
            
        </div>
      </div>
      
      @endforeach
    @else
    <p>No Posts found</p>
  @endif
</div>
@endsection




