@extends('frontend.layout.template')

@section('title') <title>User Dashboard</title> @endsection

@section('content')

<main class="main">
        	<div class="page-header text-center" style="">
        		<div class="container">
        			<h1 class="page-title">My Account<span>{{Auth::user()->name}}</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a >My Account</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{Auth::user()->name}}</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
	                	<div class="row">
	                		<aside class="col-md-4 col-lg-2">
	                			<ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
								    <li class="nav-item">
								        <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-downloads-link" data-toggle="tab" href="#tab-downloads" role="tab" aria-controls="tab-downloads" aria-selected="false">Downloads</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
								    </li>
								    <li class="nav-item">
										<form method="POST" action="{{ route('logout') }}">
                            				@csrf
								        	<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">Sign Out</a>
										</form>
								    </li>
								</ul>
	                		</aside><!-- End .col-lg-3 -->

	                		<div class="col-md-8 col-lg-10">
                                
	                			<div class="tab-content">
								    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                        <h5>Personal Information</h5>    
                                        <div style='border:1px solid #ddd;padding:0 10px;border-radius:5px; margin-bottom:20px '>
                                            <div class="row " >
                                                <div class="col-lg-8">
                                                    
                                                    <table class='table table-sm mb-0' >
                                                        <tbody>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>{{Auth::user()->name}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>E-mail</th>
                                                                <th>{{Auth::user()->email}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Phone</th>
                                                                <th>{{Auth::user()->phone}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>User Type</th>
                                                                <th>
																	@if( Auth::user()->role == 1)
																	Admin
																	@else
																	User
																	@endif
																</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Profile</th>
                                                                <th>
																	@if( Auth::user()->status == 1)
																		@if( !empty(Auth::user()->destrict_id))
																			@if( !empty(Auth::user()->image))
																				<span class='badge badge-success'>Active</span>
																			@else
																				<span class='badge badge-info'>Profile Picture Missing</span>
																			@endif
																		@else
																			<span class='badge badge-info'>Profile Update must</span>
																		@endif
																	@else
																		<span class='badge badge-danger'>Pending</span>
																	@endif
																</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-lg-4 d-flex align-items-center justify-content-center">
													@if( !empty(Auth::user()->image ))
													<img src="{{asset('image')}}/{{Auth::user()->image}}" width='100%' alt="">
													@else
													<img src="{{asset('mahir.jpg')}}" width='100%' alt="">
													@endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <h5>Address </h5>    
                                        <div style='border:1px solid #ddd;padding:0 10px;border-radius:5px '>
                                            <div class="row " >
                                                <div class="col-lg-12">
                                                    
                                                    <table class='table table-sm mb-0' >
                                                        <tbody>
                                                            <tr>
                                                                <th>Street Address</th>
                                                                <th>
                                                                    @if( !empty(Auth::user()->address))
																	{{Auth::user()->address}}
																	@else
																	-N/A-
																	@endif
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>District</th>
                                                                <th>

                                                                    @if( !empty(Auth::user()->destrict_id))
                                                                    	{{Auth::user()->district->name}}
                                                                    @else
                                                                    -N/A-
                                                                    @endif
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Division</th>
                                                                <th>
                                                                    @if( !empty(Auth::user()->division_id))
                                                                        {{Auth::user()->division->name}}
                                                                    @else
                                                                        -N/A-
                                                                    @endif
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Zip Code</th>
                                                                <th>
                                                                    @if( !empty(Auth::user()->zipcode))
                                                                        {{Auth::user()->zipcode}}
                                                                    @else
                                                                        -N/A-
                                                                    @endif
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Cuntry</th>
                                                                <th>
                                                                    @if( !empty(Auth::user()->cuntry))
                                                                        {{Auth::user()->cuntrys->name}}
                                                                    @else
                                                                        -N/A-
                                                                    @endif
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                        </div>
                                   

								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
										<h5>All Order History</h5> 
										<div style='border:1px solid #ddd;padding:0 10px;border-radius:5px '>
                                            <div class="row " >
                                                <div class="col-lg-12">
													<table class='table table-sm mb-0' >
														<tbody>
															<tr>
																<th>SI</th>
																<th>Total Price</th>
																<th>Prossage</th>
																<th>View</th>
																<th>Address</th>
																<th>Status</th>
																<th>Date</th>
															</tr>
															@php $i=1 @endphp
															@foreach( $orders as $order)
															<tr>
																<td>{{$i}}</td>
																<td>{{$order->amount}} {{$order->currency}}</td>
																<td>
																	@if( $order->is_paid == 0)
																	<span >COD</span>
																	@else
																	SSL
																	@endif
																</td>
																<td><a class="btn btn-info btn-sm text-white" style="padding:4px;min-width:60px">View</a>
																<div>
																	<!-- modal start -->

																	<!-- modal end -->
																</div>
																</td>
																<td>{{$order->address}}</td>
																<td>
																	@if( $order->status == 0)
																	<span class='badge badge-info'>Prossesing</span>
																	@elseif($order->status == 1)
																	<span class='badge badge-warning'>Hold</span>
																	@elseif($order->status == 2)
																	<span class='badge badge-success'>Recived Successfull</span>
																	@elseif($order->status == 3)
																	<span class='badge badge-danger'>Order Cancled</span>
																	@endif
																</td>
																<td>@if( $order->created_at) {{$order->created_at->format('d M, Y')}} @endif</td>
															</tr>
															@php $i++ @endphp
															@endforeach
														</tbody>
														
													</table>
													
												</div>
											</div>
										</div>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-downloads" role="tabpanel" aria-labelledby="tab-downloads-link">
								    	<p>No downloads available yet.</p>
								    	<a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
								    	<p>The following addresses will be used on the checkout page by default.</p>

								    	<div class="row">
								    		<div class="col-lg-6">
								    			<div class="card card-dashboard">
								    				<div class="card-body">
								    					<h3 class="card-title">Billing Address</h3><!-- End .card-title -->

														<p>Name : {{Auth::user()->name}}<br>
														District : @if( !empty(Auth::user()->destrict_id) ) 
																		{{Auth::user()->district->name}} 
																	@else 
																		your District 
																	@endif <br>
														Division : @if( !empty(Auth::user()->division) ) 
																		{{Auth::user()->division->name}} 
																	@else 
																		your Division 
																	@endif <br>
														Zip Code : @if( !empty(Auth::user()->zipcode) ) 
																		{{Auth::user()->zipcode}} 
																	@else 
																		your Zip code 
																	@endif <br>
														Phone : {{Auth::user()->phone}}<br>
														Email : {{Auth::user()->email}}<br>
														<a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Edit <i class="icon-edit"></i></a></p>
								    				</div><!-- End .card-body -->
								    			</div><!-- End .card-dashboard -->
								    		</div><!-- End .col-lg-6 -->

								    		<div class="col-lg-6">
								    			<div class="card card-dashboard">
								    				<div class="card-body">
								    					<h3 class="card-title">Shipping Address</h3><!-- End .card-title -->

														<p>You have not set up this type of address yet.<br>
														<a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Edit <i class="icon-edit"></i></a></p>
								    				</div><!-- End .card-body -->
								    			</div><!-- End .card-dashboard -->
								    		</div><!-- End .col-lg-6 -->
								    	</div><!-- End .row -->
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
								    	<form action="{{route('user.dash.update', Auth::user()->id )}}" method="POST" enctype="multipart/form-data">
											@csrf 
			                				<div class="row">
			                					<div class="col-sm-12 col-md-7">
			                						<label>Full Name *</label>
			                						<input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" required="">
			                					</div><!-- End .col-sm-6 -->
			                				</div><!-- End .row -->
			                				<div class="row">
			                					<div class="col-sm-12 col-md-7">
			                						<label>Phone *</label>
			                						<input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" required="">
			                					</div><!-- End .col-sm-6 -->
			                				</div><!-- End .row -->
			                				<div class="row">
			                					<div class="col-sm-12 col-md-7">
			                						<label>Bulding / Home address *</label>
			                						<input type="text" name="address" value="{{Auth::user()->address}}" class="form-control" required="">
			                					</div><!-- End .col-sm-6 -->
			                				</div><!-- End .row -->

											<div class="row">
			                					<div class="col-sm-6 col-md-7">
			                						<label>Cuntry</label>
													<select name="cuntry" class='form-control' id="">
														<option value="">-Select Cuntry-</option>
														@foreach($cuntrys as $cuntry)
														<option value="{{$cuntry->id}}" @if( $cuntry->id == Auth::user()->cuntry) selected @endif>{{$cuntry->name}}</option>
														@endforeach
													</select>
			                						
			                					</div><!-- End .col-sm-6 -->
			                				</div><!-- End .row -->
		            						
		            						
											<div class="row">
			                					<div class="col-sm-6 col-md-7">
			                						<label>Division</label>
													<select name="division" class='form-control' id="">
														<option value="">-Select Division-</option>
														@foreach($divisions as $division)
														<option value="{{$division->id}}" @if( $division->id === Auth::user()->division_id) selected @endif>{{$division->name}}</option>
														@endforeach
													</select>
			                						
			                					</div><!-- End .col-sm-6 -->
			                					<div class="col-sm-6 col-md-7">
													<label>District</label>
													<select name="district" class='form-control' id="">
														<option value="">-Select District-</option>
														@foreach($districts as $district)
														<option value="{{$district->id}}"  @if( $district->id === Auth::user()->destrict_id) selected @endif>{{$district->name}}</option>
														@endforeach
													</select>
			                					</div><!-- End .col-sm-6 -->
			                				</div><!-- End .row -->
											<div class="row">
			                					<div class="col-sm-6 col-md-7">
			                						<label>Zip Code</label>
													<input type="text" name="zipcode" value="{{Auth::user()->zipcode}}" class="form-control" required="">
			                					</div><!-- End .col-sm-6 -->
			                				</div><!-- End .row -->
											
		                					

		            						

		            						<div class='col-md-7' >
												<label for="">Profile Picture</label>
												<div class="custom-file mb-3 wd-450">
													<input type="file" name='image' class="custom-file-input" id="customFile">
													<label class="custom-file-label" for="customFile">Choose file</label>
												</div>
											</div>
		            						
											

		                					<button type="submit" class="btn btn-outline-primary-2">
			                					<span>SAVE CHANGES</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>

											
			                			</form>
								    </div><!-- .End .tab-pane -->
								</div>
	                		</div><!-- End .col-lg-9 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .dashboard -->
            </div><!-- End .page-content -->
        </main>

@endsection

