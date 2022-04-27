@extends('frontend.layout.template')

@section('title') <title>Checkout card then Order process</title> @endsection

@section('content')

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<div class="checkout-discount">
            				<form action="#">
        						<input type="text" class="form-control" required id="checkout-discount-input">
            					<label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
            				</form>
            			</div><!-- End .checkout-discount -->
            			<form action="{{ route('make_payment') }}" method="POST" class="needs-validation">
							@csrf 
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
		                				<div class="row">
		                					<div class="col-sm-12">
		                						<label>Full Name *</label>
                                                @if( Auth::check())
		                						<input type="text" name='name' value="{{Auth::user()->name}}"  class="form-control" required>
                                                @else
                                                <input type="text" name='name' value="" class="form-control" required>
                                                @endif
		                					</div><!-- End .col-sm-6 -->

		                					
		                				</div><!-- End .row -->

	            						<label>Country *</label>
                                        @if( Auth::check())
                                            <select name="cuntry" class='form-control' id="">
                                                <option value="">Select Cuntry</option>
                                                @foreach( $cuntrys as $cuntry)
                                                <option value="{{$cuntry->id}}" @if( $cuntry->id == Auth::user()->cuntry) selected @endif>{{$cuntry->name}}</option>
                                                @endforeach
                                              
                                            </select>
                                        @else
                                            <select name="cuntry" class='form-control' id="">
                                                <option value="">Select Cuntry</option>
                                                @foreach( $cuntrys as $cuntry)
                                                <option value="{{$cuntry->id}}" >{{$cuntry->name}}</option>
                                                @endforeach
                                               
                                            </select>
                                        @endif


										<div class="row">
		                					<div class="col-sm-6">
                                                @if(Auth::check())
                                                <label>Division *</label>
												<select name="division" class='form-control' id="division_id">
													<option value="">Select Division</option>
													@foreach($divisions as $division)
													<option value="{{$division->id}}" @if( $division->id == Auth::user()->division_id) selected @endif>{{$division->name}}</option>
													@endforeach
												</select>
                                                
                                                @else
                                                <label>Division *</label>
												<select name="division" class='form-control' id="division_id">
													<option value="">select Division </option>
													@foreach($divisions as $division)
													<option value="{{$division->id}}">{{$division->name}}</option>
													@endforeach
												</select>
                                               
                                                @endif
                                               
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
                                                @if(Auth::check())
                                                <label>District *</label>
												<select name="district" class='form-control' id="districtname">
													<option value="">Select District</option>
													
												</select>
		                						
                                                @else
                                                <label>District *</label>
												<select name="district" class='form-control' id="districtname">
													<option value="">District</option>
													
												</select>
		                						
                                                @endif
		                						
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->
                                        

	            						<label>Street address *</label>
                                        @if(Auth::check())
                                            <input type="text" name='address' class="form-control" value="{{Auth::user()->address}}" placeholder="House number and Street name" required>
                                        @else
                                        <input type="text" name='address' class="form-control" placeholder="House number and Street name" required>
                                        @endif
	            						

	            						<div class="row">
		                					<div class="col-sm-6">
                                                @if(Auth::check())
                                                <label>Postcode / ZIP *</label>
		                						<input name='postcode' type="text" value="{{Auth::user()->zipcode}}" class="form-control" required>
                                                @else
                                                <label>Postcode / ZIP *</label>
		                						<input name='postcode' type="text" class="form-control" required>
                                                @endif
		                						
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

		                				<div class="row">
		                					<div class="col-sm-6">
                                                @if(Auth::check())
                                                <label>Email address *</label>
                                                <input name='email' type="email" value="{{Auth::user()->email}}" class="form-control" required>
                                                @else
                                                <label>Email address *</label>
                                                <input name='email' type="email" class="form-control" required>
                                                @endif
                                               
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
                                                @if(Auth::check())
                                                <label>Phone *</label>
		                						<input name='phone' type="text" value="{{Auth::user()->phone}}"  class="form-control" required>
                                                @else
                                                <label>Phone *</label>
		                						<input name='phone' type="text"  class="form-control" required>
                                                @endif
		                						
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

	        							<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="checkout-create-acc">
											<label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
										</div><!-- End .custom-checkbox -->

										<div class="custom-control custom-checkbox">
											@if( Auth::user())
											<input type="hidden" name='user_id' value="{{Auth::user()->id}}">
											@endif
											<input type="checkbox" class="custom-control-input" id="checkout-diff-address">
											<label class="custom-control-label" for="checkout-diff-address">Ship to a different address?</label>
										</div><!-- End .custom-checkbox -->

	                					<label>Order notes (optional)</label>
	        							<textarea class="form-control" name="message" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Product</th>
		                							<th>Total</th>
		                						</tr>
		                					</thead>

		                					<tbody>
												@foreach($cards as $card)
		                						<tr>
		                							<td><a href="#">{{$card->product->name}}</a></td>
		                							<td>৳ {{$card->unite_price}}</td>
		                						</tr>
												@endforeach

		                						
		                						<tr class="summary-subtotal">
		                							<td>Subtotal:</td>
		                							<td>${{ App\Models\Card::totlaPrice()}}</td>
		                						</tr><!-- End .summary-subtotal -->
		                						<tr>
		                							<td>Shipping:</td>
		                							<td>Free shipping</td>
		                						</tr>
		                						<tr class="summary-total">
		                							<td>Total:</td>
		                							<td>৳ {{App\Models\Card::totlaPrice()}}</td>
		                						</tr><!-- End .summary-total -->
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                				<div class="accordion-summary" id="accordion-payment">
										    <div class="card">
										        <div class="card-header" id="heading-1">
										            <h2 class="card-title">
										                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
										                    Direct bank transfer
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
										            <div class="card-body">
										                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-2">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
										                    Check payments
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
										            <div class="card-body">
										                Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. 
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-3">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
										                    Cash on delivery
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
										            <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-4">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
										                    PayPal <small class="float-right paypal-link">What is PayPal?</small>
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">
										            <div class="card-body">
										                Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-5">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
										                    Credit Card (Stripe)
										                    <img src="{{asset('frontend')}}/images/payments-summary.png" alt="payments cards">
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
										            <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->
										</div><!-- End .accordion -->
										<input type="hidden" name='totalamount' value="{{App\Models\Card::totlaPrice()}}" >
		                				<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
		                					<span class="btn-text">Place Order</span>
		                					<span class="btn-hover-text">Proceed to Checkout</span>
		                				</button>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->



@endsection