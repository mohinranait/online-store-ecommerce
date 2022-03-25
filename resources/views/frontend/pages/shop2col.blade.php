@extends('frontend.layout.template')

@section('title') <title>Shop page</title> @endsection

@section('content')


            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">product rows</li>
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
                						Showing <span>9 of {{$totalProducts}}</span> Products
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
                						<a href="{{route('shop-two')}}" class="btn-layout active">
                							<svg width="16" height="10">
                								<rect x="0" y="0" width="4" height="4"></rect>
                								<rect x="6" y="0" width="10" height="4"></rect>
                								<rect x="0" y="6" width="4" height="4"></rect>
                								<rect x="6" y="6" width="10" height="4"></rect>
                							</svg>
                						</a>

                					

                						<a href="{{route('shop-three')}}" class="btn-layout">
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
								@foreach( $products as $product)
                                <div class="product product-list">
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <figure class="product-media">
												@if( !empty($product->is_fiture === 1))
                                                <span class="product-label label-new"><a href="{{route('offer.product')}}" class='text-white'>OFFER</a></span>
												@endif
                                                <a href="{{route('productdetails', $product->slug)}}">
													@if( $product->imagess->count() > 0)
                                                    <img src="{{asset('image/' . $product->imagess->first()->image)}}" alt="{{$product->name}}e" class="product-image">
													@endif
                                                   
                                                </a>
                                            </figure><!-- End .product-media -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-6 col-lg-3 order-lg-last">
                                            <div class="product-list-action">
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

                                                <div class="product-action">
                                                    <a href="{{route('productdetails', $product->slug)}}" class="btn-product vtnview" title="Quick view"><span>quick view</span></a>
                                                    <a href="#" class="btn-product btn-compare" title="Compare"><span>compare</span></a>
                                                </div><!-- End .product-action -->

                                                <div  class="btn-product btn-cart">
													<span>
														<form action="{{route('card.store')}}" method="POST">
															@csrf 
															<input type="hidden" name="product_id" value="{{$product->id}}">
															@if( !empty($product->offer_price))
															<input type="hidden" name='unite_price' value="{{$product->offer_price}}">
															@else
															<input type="hidden" name='unite_price' value="{{$product->regularprice}}">
															@endif

															<button type="submit" style="border:none;background:transparent;">Add to Card</button>
														</form>
													</span>
												</div>
                                            </div><!-- End .product-list-action -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-lg-6">
                                            <div class="product-body product-action-inner">
                                                <a href="#" class="btn-product btn-wishlist" title="Add to wishlist"><span>add to wishlist</span></a>
                                                <div class="product-cat">
                                                    <a href="{{route('sub.category', $product->category->slug)}}">{{$product->category->name}}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="{{route('productdetails', $product->slug)}}">{{substr(strip_tags($product->name), 0, 50)}}</a></h3><!-- End .product-title -->

                                                <div class="product-content">
                                                    <p>{{substr(strip_tags($product->sort_description), 0, 100)}}</p>
                                                </div><!-- End .product-content -->
                                                
                                                <div class="product-nav product-nav-thumbs">
													@foreach( $product->imagess as $item)
													<a href="#" class="active">
                                                        <img src="{{asset('image/'. $item->image)}}" alt="product desc">
                                                    </a>
													@endforeach
                                                    
                                                    
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .product -->
								@endforeach

                                

                               
                            </div><!-- End .products -->

                			<nav aria-label="Page navigation">
							    <ul class="pagination">
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