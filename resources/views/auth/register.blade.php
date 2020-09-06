@extends('layouts.main_auth')

@section('content')
<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card" style="height: 30em !important">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<!-- <img src="https://cdn.freebiesupply.com/logos/large/2x/pinterest-circle-logo-png-transparent.png" class="brand_logo" alt="Logo"> -->
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
                    
                    <form method="POST" action="/register">
                        @csrf
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<!-- <input type="text" name="User name" class="form-control input_user" value="" placeholder="username" required> -->
							<input type="text" name="user_name" class="form-control" value="" autocomplete="off" placeholder="username" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="email" name="email" class="form-control" value="" autocomplete="off" placeholder="email" required>
                        </div>
                        
                        <div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" autocomplete="off" placeholder="password" required>
                        </div>
                        <div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="confirm_password" class="form-control input_pass" autocomplete="off" placeholder="confirm password" required>
						</div>
						
							<div class="d-flex justify-content-center mt-3 login_container">
				 	    <button type="submit"  class="btn login_btn">Register</button>
				   </div>
                    </form>
                    
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Already have an account? <a href="{{route('login.form')}}" class="ml-2">Login</a>
					</div>
					<!-- <div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div> -->
				</div>
			</div>
		</div>
	</div>
@endsection
