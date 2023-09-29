@extends('layouts.admin')
@section('title', "Admin")
@section('content')
<div class="container">
    <h3>Categories</h3>
    @foreach($category as $item)
    <div class="card mb-3 under">
        
            <div class="card-header under">
                <img src="{{ asset('images/'.$item->image)}} " alt="" class="cate-image">
            </div>
            <div class="card-body under">
              <h5 class="card-title">{{ $item->name }}</h5>
              <p class="card-text">{{ $item->description }}</p>
              <a href="{{ url('edit-category/'.$item->id)}}" class="btn btn-primary">Edit</a>
              

              <form action="{{ url('delete-category/'. $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                </form>


            </div>
        

    </div>
    @endforeach
</div>
@endsection