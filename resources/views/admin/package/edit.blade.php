@extends('layouts.admin')
@section('title', "Admin")
@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">
        <div class="content">
            
            <div class="card">
                <div class="card-header">
                    <h4>Edit Package</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('update-package/'.$packages->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        
                        <div class="row">
                            <select class="form-select">
                                <option selected>{{$packages->category->name}}</option>
                               
                            </select>                    
                            <div class="col-md-6 mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" value="{{$packages->title}}" name="title">
                            </div>
                            <div class="col-md-12  mb-3">
                                <label for="">{{$packages->description}}</label>
                                <textarea name="description" rows="3" class="form-control"></textarea>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" name="price" value="{{$packages->price}}">
                            </div>

                            <fieldset >
            
                                <label >Add Inclusions:</label>
                                <div class="form-check">
                                <input type="checkbox" name="inclusions[]" class="form-check-input" value="complimentary drink">Complimentary Drink<br />
                                <input type="checkbox" name="inclusions[]" class="form-check-input" value="tour guide">Tour Guide<br />
                                <input type="checkbox" name="inclusions[]" class="form-check-input" value="entrance fees">Entrance fees<br />
                                <input type="checkbox" name="inclusions[]" class="form-check-input" value="tour transportation">Tour Transportation<br />
                                <input type="checkbox" name="inclusions[]" class="form-check-input" value="taxes">Taxes<br />
                                </div>
                                <p>Number of pax included:</p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inclusions[]" value="Solo">
                                    <label class="form-check-label" >Solo</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inclusions[]" value="Couple(2 pax)">
                                    <label class="form-check-label" >Couple(2 pax)</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inclusions[]" value="Couple(2 pax)">
                                    <label class="form-check-label" >Group(5 pax)</label>
                                  </div>
                                </fieldset><br />
                            @if($packages->image)
                                <img src="{{ asset('images'.$packages->image)}}" alt="...">
                            @endif
                            <div class="col-md-12">                        
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="col-md-12">                        
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url('packages')}}" class="btn btn-warning">Cancel</a>

                            </div>
                        </div>
                    </form>
                </div>
        
            </div>
        </div>
    </div>
</div>










        

@endsection