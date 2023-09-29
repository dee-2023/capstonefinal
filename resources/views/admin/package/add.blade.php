@extends('layouts.admin')
@section('title', "Admin")
@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">
        <div class="content">
            
            <div class="card">
                <div class="card-header">
                    <h4>Add Package</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('insert-package')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <select class="form-select" name="cate_id" required>
                                <option selected>Select a Category</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id}}">{{ $item->name}} </option>
                                @endforeach
                            </select>                    
                            <div class="col-md-6 mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="col-md-12  mb-3">
                                <label for="">Description</label>
                                <textarea name="description" rows="3" class="form-control" required></textarea>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" name="price" required>
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
    </div>
</div>










        

@endsection