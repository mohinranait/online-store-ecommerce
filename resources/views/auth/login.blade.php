@extends('frontend.layout.template')

@section('title') <title>Login page</title> @endsection

@section('content')

            <div class="login-page bg-white pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="">
            	<div class="container">
            		<div class="form-box">
            			<div class="form-tab">
								@if (\Session::has('warning'))
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
										<strong>Please ! </strong>{!! \Session::get('warning') !!}
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								@endif
	            			<ul class="nav nav-pills nav-fill" role="tablist">
							    <li class="nav-item">
							        <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>
							    </li>
							    <li class="nav-item">
							        <a class="nav-link " id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Register</a>
							    </li>
							</ul>


                            <div class="tab-content">
							    <div class="tab-pane fade  show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
								
							        <x-auth-session-status class="mb-4" :status="session('status')" />
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />	
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf 
							    		<div class="form-group">
							    			<label for="singin-email-2">E-mail address *</label>
                                            <input  class="form-control" id="singin-email-2" type="email" name="email" value="{{old('email')}}" required autofocus />
							    		</div><!-- End .form-group -->

							    		<div class="form-group">
							    			<label for="singin-password-2">Password *</label>
                                            <input id="singin-password-2" class="form-control" type="password" name="password" required autocomplete="current-password" />
							    		
							    		</div><!-- End .form-group -->
							    		<div class="form-footer">
							    			<button type="submit" class="btn btn-outline-primary-2">
			                					<span>LOG IN</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>

			                				<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="signin-remember-2">
												<label class="custom-control-label" for="signin-remember-2">Remember Me</label>
											</div><!-- End .custom-checkbox -->

											<a href="{{ route('password.request') }}" class="forgot-link">Forgot Your Password?</a>
							    		</div><!-- End .form-footer -->
							    	</form>
							    	<div class="form-choice">
								    	<p class="text-center">or sign in with</p>
								    	<div class="row">
								    		<div class="col-sm-6">
								    			<a href="#" class="btn btn-login btn-g">
								    				<i class="icon-google"></i>
								    				Login With Google
								    			</a>
								    		</div><!-- End .col-6 -->
								    		<div class="col-sm-6">
								    			<a href="#" class="btn btn-login btn-f">
								    				<i class="icon-facebook-f"></i>
								    				Login With Facebook
								    			</a>
								    		</div><!-- End .col-6 -->
								    	</div><!-- End .row -->
							    	</div><!-- End .form-choice -->
							    </div><!-- .End .tab-pane -->


							    <div class="tab-pane fade" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
							    	
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf 
							    		<div class="form-group">
							    			<label for="register-email-2">Full Name *</label>
                                            <input id="name" class="form-control" type="text" name="name" value="{{old('name')}}" required autofocus />
							    		</div><!-- End .form-group -->

							    		<div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="register-password-2">E-mail Address *</label>
                                                    <input id="email" class="form-control"  type="email" name="email" value="{{old('email')}}" required />
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="register-password-2">Phone *</label>
                                                    <input id="phone" class="form-control"  type="text" name="phone" value="{{old('phone')}}" required />
                                                </div>
                                            </div>
							    			
							    		</div><!-- End .form-group -->
							    		<div class="form-group">
							    			<label for="register-password-2">Password *</label>
                                            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                            
							    		</div><!-- End .form-group -->
							    		<div class="form-group">
							    			<label for="register-password-2">Re-Password *</label>
                                            <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
							    		</div><!-- End .form-group -->

							    		<div class="form-footer">
							    			<button type="submit" class="btn btn-outline-primary-2">
			                					<span>SIGN UP</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>

			                				<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="register-policy-2" required="">
												<label class="custom-control-label" for="register-policy-2">I agree to the <a href="#">privacy policy</a> *</label>
											</div><!-- End .custom-checkbox -->
							    		</div><!-- End .form-footer -->
							    	</form>
							    	<div class="form-choice">
								    	<p class="text-center">or sign in with</p>
								    	<div class="row">
								    		<div class="col-sm-6">
								    			<a href="#" class="btn btn-login btn-g">
								    				<i class="icon-google"></i>
								    				Login With Google
								    			</a>
								    		</div><!-- End .col-6 -->
								    		<div class="col-sm-6">
								    			<a href="#" class="btn btn-login  btn-f">
								    				<i class="icon-facebook-f"></i>
								    				Login With Facebook
								    			</a>
								    		</div><!-- End .col-6 -->
								    	</div><!-- End .row -->
							    	</div><!-- End .form-choice -->
							    </div><!-- .End .tab-pane -->
							</div><!-- End .tab-content -->



				        </div><!-- End .form-tab -->
            		</div><!-- End .form-box -->
            	</div><!-- End .container -->
            </div>
@endsection