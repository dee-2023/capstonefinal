@extends('layouts.app')

@section('content')
<div class="container-fluid loginbody">
    <div class="d-flex justify-content-center h-100">
       
            <div class="card registercard">
                <div class="card-header logincard-header"><h3>{{ __('Register') }}</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="input-group form-group">
                           
                                <span class="input-group-text input-i"><i class="fas fa-user"></i></span>
                            
                            <input  type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="{{ __('Name') }}" 
                                value="{{ old('name') }}" 
                                required 
                                autocomplete="name" 
                                autofocus>
                            @error('name') 
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br />

                        <div class="input-group form-group">
                            
                                <span class="input-group-text input-i"><i class="fa-solid fa-envelope"></i></span>
                            
                            <input id="email" type="email" name="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                placeholder="{{ __('Email Address') }}"
                                value="{{ old('email') }}" 
                                required autofocus
                                autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br />
                        
                        <div class="input-group form-group">
                          
                                <span class="input-group-text input-i"><i class="fas fa-key"></i></span>
                            
                            <input id="password" type="password" name="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                placeholder="{{ __('Password') }}"
                                required autofocus>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br />

                        <div class="input-group form-group">
                            
                                <span class="input-group-text input-i"><i class="fas fa-key"></i></span>
                            
                            <input id="password-confirm" type="password" name="password_confirmation"
                                class="form-control"
                                placeholder="{{ __('Confirm Password') }}"
                                required 
                                autofocus
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br />

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        
    </div>
</div>
@endsection
