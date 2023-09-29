@extends('layouts.admin')
@section('title', "Admin")
@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">
        <div class="content">

    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-category')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Hide</label>
                        <input type="checkbox"  name="hide">
                    </div>
                    <div class="col-md-12  mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                        
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="meta_descrip">Meta Description</label>
                        <input type="text" class="form-control" name="meta_descrip">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords">
                    </div>
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
        
</div></div></div>
@endsection