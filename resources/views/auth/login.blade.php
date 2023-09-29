@extends('layouts.app')

@section('content')
<div class="container-fluid loginbody">
	<div class="d-flex justify-content-center h-50">
		<div class="logincard card">
			<div class="card-header logincard-header">
				<h3>{{ __('Login') }}</h3>	
			</div>
            
			<div class="card-body">
                
				<form method="POST" action="{{ route('login') }}">
                    @csrf
					<div class="input-group form-group">
						
							<span class="input-group-text input-i"><i class="fa-solid fa-envelope"></i></span>
						
						<input  type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" 
                                placeholder="{{ __('Email Address') }}" 
                                value="{{ old('email') }}" 
                                required 
                                autocomplete="email" 
                                autofocus>
						@error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div><br />
					<div class="input-group form-group">
						
							<span class="input-group-text input-i"><i class="fas fa-key"></i></span>
						
						<input  type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" 
                                required 
                                autocomplete="current-password" 
                                placeholder="{{ __('Password') }}">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
					<div class="form-check">
                        <input  class="form-check-input" 
                                type="checkbox" 
                                name="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
					</div>
				</form>
			
			<div class="card-footer">
				
				@if (Route::has('password.request'))
                    <a class="btn text-primary" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
			</div>
        </div>
		</div>
	</div>
</div>

@endsection
