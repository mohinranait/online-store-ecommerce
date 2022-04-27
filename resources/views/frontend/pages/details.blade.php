@extends("frontend.layout.template")

@section('title') <title>Online Shope | E-commerce Website </title> @endsection

@section('content')

            <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Default</li>
                    </ol>

                    <nav class="product-pager ml-auto" aria-label="Product">
                        <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                            <i class="icon-angle-left"></i>
                            <span>Prev</span>
                        </a>

                        <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                            <span>Next</span>
                            <i class="icon-angle-right"></i>
                        </a>
                    </nav><!-- End .pager-nav -->
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">

                            <!-- product Slider start -->
                            <div class="intro-slider-container mb-5">
                                <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" 
                                    data-owl-options='{
                                        "dots": false,
                                        "nav": false, 
                                        "responsive": {
                                            "1200": {
                                                "nav": false,
                                                "dots": false,
                                                
                                            }
                                        }
                                    }'>

                                    @php $i = 1 @endphp
                                    @foreach( $product->imagess as $item)
                                    @if( $i > 0 )
                                    <div class="intro-slide" style="background-image: url({{asset('image/'.$item->image)}});">
                                        <div class="container intro-content">
                                            <div class="row justify-content-end">
                                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                                    
                                                </div><!-- End .col-lg-11 offset-lg-1 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .intro-content -->
                                    </div><!-- End .intro-slide -->
                                    @endif
                                    @php $i++ @endphp
                                    @endforeach

                                    
                                </div><!-- End .intro-slider owl-carousel owl-simple -->

                                <span class="slider-loader"></span><!-- End .slider-loader -->
                            </div><!-- End .intro-slider-container -->

                            <!-- product Slider end -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title">{{$product->name}}</h1><!-- End .product-title -->

                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( {{$reviewCount->count()}} Reviews )</a>
                                    </div><!-- End .rating-container -->

                                    <div class="product-price">
                                        @if( !empty($product->offer_price))
                                        <div>{{$product->offer_price}} BDT</div>
                                        <div style="margin-left:15px;color:#555"><del>{{$product->regularprice}} </del>BDT</div>

                                        @else
                                        {{$product->regularprice}} BDT
                                        @endif
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p>{{substr(strip_tags($product->sort_description), 0, 200)}} </p>
                                    </div><!-- End .product-content -->

                                    <form  action="{{route('card.store')}}" method="POST">
                                        @csrf 
                                        <div class="details-filter-row details-row-size">
                                            <label>Color:</label>

                                            <div class="product-nav product-nav-thumbs">
                                                @if( !empty($product->color->image ))
                                                <a  class="active">
                                                    <img src="{{asset('image/'. $product->color->image)}}" style='width:20px; height:20px; border-radius:50%' alt="product desc">
                                                </a>
                                                @endif
                                            
                                            </div><!-- End .product-nav -->
                                        </div><!-- End .details-filter-row -->                                    

                                        <div class="details-filter-row details-row-size">
                                            <label for="qty">Qty:</label>
                                            <div class="product-details-quantity">
                                                <input type="number" id="qty" name="product_qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                            </div><!-- End .product-details-quantity -->
                                        </div><!-- End .details-filter-row -->

                                        <div class="product-details-action">
                                            <input type="hidden" name='product_id' value="{{$product->id}}" >
                                            @if( !empty($product->offer_price))
                                            <input type="hidden" name='unite_price' value="{{$product->offer_price}}">
                                            @else
                                            <input type="hidden" name='unite_price' value="{{$product->regularprice}}">
                                            @endif
                                            <input type='submit'  class="btn-product btn-cart" name='addToCard' value="Add To Card">

                                            <div class="details-action-wrapper">
                                                <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                                <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
                                            </div><!-- End .details-action-wrapper -->
                                        </div><!-- End .product-details-action -->
                                    </form>

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                               
                                            <a href="#">Women</a>,
                                            <a href="#">{{$product->category->name}}</a>,
                                            
                                        </div><!-- End .product-cat -->

                                        <div class="social-icons social-icons-sm">
                                            <span class="social-label">Share:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        </div>
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="row">
                        <div class="col-lg-9">
                            <div class="product-details-tab">
                                <ul class="nav nav-pills justify-content-center" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews ({{$reviews->count()}})</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                        <div class="product-desc-content">
                                            <h3>Product Information</h3>
                                            {!! $product->details !!}

                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. </p>
                                        </div><!-- End .product-desc-content -->
                                    </div><!-- .End .tab-pane -->
                                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                                        <div class="product-desc-content">
                                            <h3>Information</h3>
                                            {!! $product->otherinformation !!}
                                        </div><!-- End .product-desc-content -->
                                    </div><!-- .End .tab-pane -->
                                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                                        <div class="product-desc-content">
                                            <h3>Delivery & returns</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime voluptas, veniam optio inventore, pariatur blanditiis laudantium doloremque dignissimos ut, assumenda quisquam nesciunt molestiae quae magnam dolorem velit numquam earum. Commodi!</p>
                                        </div><!-- End .product-desc-content -->
                                    </div><!-- .End .tab-pane -->
                                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                        <div class="reviews">
                                            <form action="{{route('review.store')}}" method="POST">
                                                @csrf 
                                                <div class="form-group">
                                                    <label for="">Write Review</label>
                                                    <textarea name="comment" class="form-control" id="" cols="30" rows="5"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Select Ratings</label>
                                                    <select name="star" class="form-control" id="">
                                                        <option value="5">Ratings</option>
                                                        <option value="5">	&#9733; 	&#9733; 	&#9733; 	&#9733; 	&#9733;</option>
                                                        <option value="4">	&#9733; 	&#9733; 	&#9733; 	&#9733; </option>
                                                        <option value="3">	&#9733; 	&#9733; 	&#9733; 	</option>
                                                        <option value="2">	&#9733; 	&#9733; 	</option>
                                                        <option value="1">	&#9733; 	</option>
                                                     
                                                    </select>
                                                </div>
                                                <div class="form-group mb-5">
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                            <h3>Reviews ({{$reviews->count()}})</h3>
                                            @foreach($reviews as $review)
                                            <div class="review">
                                                <div class="row no-gutters">
    <div class="col-auto">
        <h4><a href="#">{{$review->user->name}}</a></h4>
        <div class="ratings-container">
            <div class="">
               @if($review->star == 1)
               <span style="font-size:17px;color:yellow;">&starf;</span>
               <span style="font-size:17px;color:yellow;">&starf;</span>
               <span style="font-size:17px;color:yellow;">&starf;</span>
               @elseif($review->star == 3)
               <span style="font-size:17px;color:yellow;">&starf;</span>
               <span style="font-size:17px;color:yellow;">&starf;</span>
               <span style="font-size:17px;color:yellow;">&starf;</span>
               @elseif($review->star == 4)
               <span style="font-size:17px;color:yellow;">&starf;</span>
               <span style="font-size:17px;color:yellow;">&starf;</span>
               <span style="font-size:17px;color:yellow;">&starf;</span>
               <span style="font-size:17px;color:yellow;">&starf;</span>
               @else
               <span style="font-size:17px;color:yellow;">&starf;</span>
               <span style="font-size:17px;color:yellow;">&starf;</span>
               <span style="font-size:17px;color:yellow;">&starf;</span>
               <span style="font-size:17px;color:yellow;">&starf;</span>
               <span style="font-size:17px;color:yellow;">&starf;</span>
               @endif
            </div><!-- End .ratings -->
        </div><!-- End .rating-container -->
      
    </div><!-- End .col -->
                                                    <div class="col">
                                                        

                                                        <div class="review-content">
                                                        <a href="#">{{$review->created_at->diffForHumans()}}</a>
                                                       
                                                            <p>{{ $review->comment }}</p>
                                                        </div><!-- End .review-content -->

                                                        <div class="review-action">
                                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                        </div><!-- End .review-action -->
                                                    </div><!-- End .col-auto -->
                                                </div><!-- End .row -->
                                            </div><!-- End .review -->
                                            @endforeach

                                            
                                        </div><!-- End .reviews -->
                                    </div><!-- .End .tab-pane -->
                                </div><!-- End .tab-content -->
                            </div><!-- End .product-details-tab -->
                        </div>
                    </div>
                    

                    <h2 class="title  mb-2">Related Products</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>

                        @foreach( $categorys as $category)
                        @foreach( App\Models\Product::where('cat_id',$category->id)->get() as $product)
                        <div class="product product-7 text-center" style='border:1px solid #ddd'>
                            <figure class="product-media">
                                @if( !empty($product->is_fiture === 1))
                                <span class="product-label label-new">OFFER</span>
                                @endif
                               
                                <a href="{{route('productdetails', $product->slug)}}">
                                    @if( $product->imagess->count() > 0)
                                    <img src="{{asset('image/' . $product->imagess->first()->image)}}" alt="Product image" class="product-image">
                                    @endif
                                   
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="{{route('sub.category', $product->category->slug)}}">{{$product->category->name}}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="{{route('productdetails', $product->slug)}}">{{substr(strip_tags($product->name), 0, 40)}}</a></h3><!-- End .product-title -->
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

                        @endforeach
                        @endforeach
                        
                       
                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->


@endsection