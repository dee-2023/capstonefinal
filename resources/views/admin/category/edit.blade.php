@extends('layouts.admin')
@section('title', "Admin")
@section('content')
<div class="container">
    <div class="card under">
        <div class="card-header">
            <h4>Edit/Update Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" value="{{ $category->name }}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Hide</label>
                        <input type="checkbox" {{ $category->hide =="1" ? 'checked' : '' }} name="hide">
                    </div>
                    <div class="col-md-12  mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{ $category->description }}</textarea>
                        
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" value="{{ $category->meta_title }}" name="meta_title">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="meta_descrip">Meta Description</label>
                        <input type="text" class="form-control" value="{{ $category->meta_descrip }}" name="meta_descrip">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control" value="{{ $category->meta_keywords }}" name="meta_keywords">
                    </div>
                    @if($category->image)
                    <img src="{{ asset('images/'.$category->image)}}" alt="Category image">
                    @endif
                    <div class="col-md-12">                        
                        <input type="file" class="form-control" name="image">
                    </div>
                    
                    <div class="col-md-12">                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
        
</div>
@endsection