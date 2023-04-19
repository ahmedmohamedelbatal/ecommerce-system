@extends('dashboard.layouts.registration')
@section('title', 'Register')
@section('content')
<div class="container-fluid">
	<div class="row no-gutter">
		<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
			<div class="row wd-100p mx-auto text-center">
				<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
					<img src="{{URL::asset('assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
			<div class="login d-flex align-items-center py-2">
				<div class="container p-0">
					<div class="row">
						<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
							<div class="card-sigin">
								<div class="main-signup-header">
									<h2 class="text-primary">Get Started</h2>
									<h5 class="font-weight-normal mb-4">It's free to signup and only takes a minute.</h5>
									<form method="post" action="{{ route('register') }}">
										@csrf
										<div class="form-group">
											<label>Firstname</label> 												
											<input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter your firstname" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
											@error('first_name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
										</div>
										<div class="form-group">
											<label>Lastname</label> 												
											<input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter your lastname" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
											@error('last_name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
										</div>
										<div class="form-group">
											<label>Email Address</label> 												
											<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" name="email" value="{{ old('email') }}" required autocomplete="email">
											@error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
										</div>
										<div class="form-group">
											<label>Password</label> 
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" required>
											@error('password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
										</div>
										<div class="form-group">
											<label>Confirm Password</label> 
											<input id="password-confirm" type="password" class="form-control" placeholder="Re-enter your password" name="password_confirmation" required>
										</div>

										<input type="submit" class="btn btn-main-primary btn-block" value="Create Account"> 
									</form>
									<div class="main-signup-footer mt-5">
										<p>Already have an account? <a href="{{route('login')}}">Login</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection