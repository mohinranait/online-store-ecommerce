@extends('frontend.layout.template')

@section('title') <title>Sub Category withs page</title> @endsection

@section('content')

            

            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">3 Columns</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                			<div class="toolbox">
                				<div class="toolbox-left">
                					<div class="toolbox-info">
                					</div><!-- End .toolbox-info -->
                				</div><!-- End .toolbox-left -->

                				<div class="toolbox-right">
                					<div class="toolbox-sort">
                						<label for="sortby">Sort by:</label>
                						<div class="select-custom">
											<select name="sortby" id="sortby" class="form-control">
												<option value="popularity" selected="selected">Most Popular</option>
												<option value="rating">Most Rated</option>
												<option value="date">Date</option>
											</select>
										</div>
                					</div><!-- End .toolbox-sort -->
                					<div class="toolbox-layout">
                						<a href="{{route('shop-two')}}" class="btn-layout">
                							<svg width="16" height="10">
                								<rect x="0" y="0" width="4" height="4"></rect>
                								<rect x="6" y="0" width="10" height="4"></rect>
                								<rect x="0" y="6" width="4" height="4"></rect>
                								<rect x="6" y="6" width="10" height="4"></rect>
                							</svg>
                						</a>

                						

                						<a href="{{route('shop-three')}}" class="btn-layout active">
                							<svg width="16" height="10">
                								<rect x="0" y="0" width="4" height="4"></rect>
                								<rect x="6" y="0" width="4" height="4"></rect>
                								<rect x="12" y="0" width="4" height="4"></rect>
                								<rect x="0" y="6" width="4" height="4"></rect>
                								<rect x="6" y="6" width="4" height="4"></rect>
                								<rect x="12" y="6" width="4" height="4"></rect>
                							</svg>
                						</a>

                						<a href="{{route('shop-fore')}}" class="btn-layout">
                							<svg width="22" height="10">
                								<rect x="0" y="0" width="4" height="4"></rect>
                								<rect x="6" y="0" width="4" height="4"></rect>
                								<rect x="12" y="0" width="4" height="4"></rect>
                								<rect x="18" y="0" width="4" height="4"></rect>
                								<rect x="0" y="6" width="4" height="4"></rect>
                								<rect x="6" y="6" width="4" height="4"></rect>
                								<rect x="12" y="6" width="4" height="4"></rect>
                								<rect x="18" y="6" width="4" height="4"></rect>
                							</svg>
                						</a>
                					</div><!-- End .toolbox-layout -->
                				</div><!-- End .toolbox-right -->
                			</div><!-- End .toolbox -->

                            <div class="products mb-3">
                                <div class="row justify-content-center">

									<!-- Productst card start -->
                                   @foreach( App\Models\Category::where('is_parent', $categorys->id)->get() as $subCate)
                                   @foreach(App\Models\Product::where('cat_id', $subCate->id)->where('status',1)->take(9)->get() as $product)
                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center" style='border:1px solid #ddd'>
                                            <figure class="product-media ">
												@if( !empty($product->is_fiture === 1))
                                                <span class="product-label label-new"><a href="{{route('offer.product')}}" class='text-white'>OFFER</a></span>
												@endif
                                                <a href="{{route('productdetails', $product->slug)}}">
													@if( $product->imagess->count() > 0)
                                                    <img src="{{asset('image/' . $product->imagess->first()->image)}}" alt="Product image" class="product-image">
													@endif
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                    <a href="{{route('productdetails', $product->slug)}}" class="btn-product-icon btnview" title="Quick view"><span>Quick view</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
													<form action="{{route('card.store')}}" method="POST" class='w-100' >
														@csrf 
														<input type="hidden" name="product_id" value="{{$product->id}}">
														@if( !empty($product->offer_price))
														<input type="hidden" name='unite_price' value="{{$product->offer_price}}">
														@else
														<input type="hidden" name='unite_price' value="{{$product->regularprice}}">
														@endif
														<button type='submit'  class="btn-product btn-cart  " style='border:transparent; width:100%; display:inline-block;'><span>add to cart</span></button>
													</form>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">{{$product->category->name}}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="{{route('productdetails', $product->slug)}}">{{$product->name}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    @if( !empty($product->offer_price))
													<div>{{$product->offer_price}} BDT</div>
													<div style="margin-left:15px;color:#555"><del>{{$product->regularprice}} </del>BDT</div>
													
													
													@else
													{{$product->regularprice}} BDT
													@endif
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 Reviews )</span>
                                                </div><!-- End .rating-container -->

                                               
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->
                                   @endforeach
                                   @endforeach

                                   
                                </div><!-- End .row -->
                            </div><!-- End .products -->

                			<nav aria-label="Page navigation">
							    <ul class="pagination justify-content-center">
							        <li class="page-item disabled">
							            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
							                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
							            </a>
							        </li>
							        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
							        <li class="page-item"><a class="page-link" href="#">2</a></li>
							        <li class="page-item"><a class="page-link" href="#">3</a></li>
							        <li class="page-item-total">of 6</li>
							        <li class="page-item">
							            <a class="page-link page-link-next" href="#" aria-label="Next">
							                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
							            </a>
							        </li>
							    </ul>
							</nav>
                		</div><!-- End .col-lg-9 -->
                		<aside class="col-lg-3 order-lg-first">
							@include('frontend.inc.leftsitbar')
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div>

@endsection