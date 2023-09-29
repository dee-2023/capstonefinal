@extends('layouts.app')
@section('title', 'Create Product')

@section('content')
<div class="container">
    <h2>Create a New Product</h2>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <!-- Add form fields for product name, category, etc. -->
        <div class="form-group">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" id="product_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" class="form-control" required>
        </div>

        <!-- Add more form fields as needed -->

        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>
@endsection