@if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        {!! \Session::get('success') !!} <b>{{Auth::user()->name}} . </b> Thanks For Comback.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


@extends("frontend.layout.template")

@section('title') <title>Online Shope | E-commerce Website </title> @endsection

@section('content')

        <main class="main">
            <div class="intro-slider-container mb-5">
                <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" 
                    data-owl-options='{
                        "dots": true,
                        "nav": false, 
                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": true
                            }
                        }
                    }'>
                    <div class="intro-slide" style="background-image: url({{asset('frontend')}}/images/demos/demo-4/slider/swap2.jpg);">
                        <div class="container intro-content">
                            <div class="row justify-content-end">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-third"></h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title"></h1>
                                    <h1 class="intro-title"></h1><!-- End .intro-title -->

                                    <div class="intro-price">
                                        <sup class="intro-old-price"></sup>
                                        <span class="text-third">
                                            <sup></sup>
                                        </span>
                                    </div><!-- End .intro-price -->

                                    <!-- <a href="category.html" class="btn btn-primary btn-round">
                                        <span></span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a> -->
                                </div><!-- End .col-lg-11 offset-lg-1 -->
                            </div><!-- End .row -->
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-image: url({{asset('frontend')}}/images/demos/demo-4/slider/swap46.jpg);">
                        <div class="container intro-content">
                            <div class="row justify-content-end">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-primary"></h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title"><br></h1><!-- End .intro-title -->

                                    <div class="intro-price">
                                        <sup></sup>
                                        <span class="text-primary">
                                            <sup></sup>
                                        </span>
                                    </div><!-- End .intro-price -->

                                   
                                </div><!-- End .col-md-6 offset-md-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->
                </div><!-- End .intro-slider owl-carousel owl-simple -->

                <span class="slider-loader"></span><!-- End .slider-loader -->
            </div><!-- End .intro-slider-container -->

            <!-- Categorys -->
            <div class="container">
                <h2 class="title text-center mb-4">Explore Popular Categories</h2><!-- End .title text-center -->
                
                <div class="cat-blocks-container">
                    <div class="row">
                        @foreach($categorys as $category)
                        <div class="col-6 col-sm-4 col-lg-3">
                            <a href="{{route('primary.category', $category->slug)}}" class="cat-block">
                                <figure>
                                    <span>
                                        @if($category->image)
                                        <img src="{{asset('image/'. $category->image)}}" alt="Category image">
                                        @endif
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">{{$category->name}}</h3><!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                        @endforeach

                    </div><!-- End .row -->
                </div><!-- End .cat-blocks-container -->
            </div><!-- End .container -->

            <div class="mb-4"></div><!-- End .mb-4 -->

            <div class="mb-3"></div><!-- End .mb-5 -->

            <div class="container electronics">
                <div class="heading heading-flex heading-border mb-3">
                    <div class="heading-left">
                        <h2 class="title">Electronics</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                   <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="elec-new-link" data-toggle="tab" href="#elec-new-tab" role="tab" aria-controls="elec-new-tab" aria-selected="true">New</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="elec-featured-link" data-toggle="tab" href="#elec-featured-tab" role="tab" aria-controls="elec-featured-tab" aria-selected="false">Featured</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="elec-best-link" data-toggle="tab" href="#elec-best-tab" role="tab" aria-controls="elec-best-tab" aria-selected="false">Best Seller</a>
                            </li>
                        </ul>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="elec-new-tab" role="tabpanel" aria-labelledby="elec-new-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                    "1280": {
                                        "items":4,
                                        "nav": true
                                    }
                                }
                            }'>
                            @foreach(App\Models\Product::where('status',1)->latest()->limit(9)->get() as $product)
                            <div class="product" style='border:1px solid #ddd'>
                                <figure class="product-media">
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
                                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        <a href="{{route('productdetails' , $product->slug)}}" class="btn-product-icon btnview" title="Quick view"><span>Quick view</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action p-0">
                                    <form action="{{route('card.store')}}" method="POST" class='w-100' >
                                        @csrf 
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        @if( !empty($product->offer_price))
                                        <input type="hidden" name='unite_price' value="{{$product->offer_price}}">
                                        @else
                                        <input type="hidden" name='unite_price' value="{{$product->regularprice}}">
                                        @endif
                                        <input type="hidden" name="product_qty" value="1">
                                        <button type='submit'  class="btn-product btn-cart  " style='border:transparent; width:100%; display:inline-block;background:#0363cd; padding:12px 0 ;font-size:16px;color:white;'>add to cart</button>
                                    </form>
                                        <!-- <a href="#" class="btn-product btn-cart" style='' title="Add to cart">Add to Cart</a> -->
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{route('sub.category', $product->category->slug)}}">{{$product->category->name}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{route('productdetails', $product->slug)}}">{{substr(strip_tags($product->name), 0, 40)}}</a></h3><!-- End .product-title -->
                                    <div class="product-price " style='color:#0363cd;text-align:center'>
                                        @if( !empty($product->offer_price))
                                            <div>{{$product->offer_price}} BDT</div>
                                            <div style="margin-left:6px;color:#555"><del>{{$product->regularprice}} </del>BDT</div>
                                        @else
                                            {{$product->regularprice}} BDT
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="">
                                            <span style="font-size:17px;color:yellow;">&starf;</span>
                                            <span style="font-size:17px;color:yellow;">&starf;</span>
                                            <span style="font-size:17px;color:yellow;">&starf;</span>
                                            <span style="font-size:17px;color:yellow;">&starf;</span>
                                            <span style="font-size:17px;color:yellow;">&starf;</span>
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( {{$product->review->count()}} Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="elec-featured-tab" role="tabpanel" aria-labelledby="elec-featured-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                    "1280": {
                                        "items":4,
                                        "nav": true
                                    }
                                }
                            }'>

                            @foreach(App\Models\Product::where('status',1)->where('is_fiture',1)->get() as $product)
                            <div class="product" style='border:1px solid #ddd'>
                                <figure class="product-media">
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
                                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        <a href="{{route('productdetails', $product->slug)}}" class="btn-product-icon btnview" title="Quick view"><span>Quick view</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action p-0">
                                    <form action="{{route('card.store')}}" method="POST" class='w-100' >
                                        @csrf 
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        @if( !empty($product->offer_price))
                                        <input type="hidden" name='unite_price' value="{{$product->offer_price}}">
                                        @else
                                        <input type="hidden" name='unite_price' value="{{$product->regularprice}}">
                                        @endif
                                        <input type="hidden" name="product_qty" value="1">
                                        <button type='submit'  class="btn-product btn-cart  " style='border:transparent; width:100%; display:inline-block;background:#0363cd; padding:12px 0 ;font-size:16px;color:white;'>add to cart</button>
                                    </form>
                                        <!-- <a href="#" class="btn-product btn-cart" style='' title="Add to cart">Add to Cart</a> -->
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{route('sub.category', $product->category->slug)}}">{{$product->category->name}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{route('productdetails', $product->slug)}}">{{substr(strip_tags($product->name), 0, 40)}}</a></h3><!-- End .product-title -->
                                    <div class="product-price " style='color:#0363cd;text-align:center'>
                                        @if( !empty($product->offer_price))
                                            <div>{{$product->offer_price}} BDT</div>
                                            <div style="margin-left:6px;color:#555"><del>{{$product->regularprice}} </del>BDT</div>
                                        @else
                                            {{$product->regularprice}} BDT
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="">
                                            <span style="font-size:17px;color:yellow;">&starf;</span>
                                            <span style="font-size:17px;color:yellow;">&starf;</span>
                                            <span style="font-size:17px;color:yellow;">&starf;</span>
                                            <span style="font-size:17px;color:yellow;">&starf;</span>
                                            <span style="font-size:17px;color:yellow;">&starf;</span>
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( {{$product->review->count()}} Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            @endforeach

                           
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="elec-best-tab" role="tabpanel" aria-labelledby="elec-best-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                    "1280": {
                                        "items":5,
                                        "nav": true
                                    }
                                }
                            }'>

                           
                           
                            <div class="product">
                                <figure class="product-media">
                                    <span class="product-label label-top">Top</span>
                                    <a href="product.html">
                                        <img src="{{asset('frontend')}}/images/demos/demo-13/products/product-7.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Laptops</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">Best Laptops Core i5</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        $1,199.00
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                          

                            
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .container -->












           

            <div class="mb-6"></div><!-- End .mb-6 -->

            

            

           


            <div class="mb-5"></div><!-- End .mb-5 -->

            <div class="container for-you">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Recommendation For You</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                   <div class="heading-right">
                        <a href="#" class="title-link">View All Recommendadion <i class="icon-long-arrow-right"></i></a>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="products">
                    <div class="row justify-content-center">
                        @foreach($random as $product)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="product product-2">
                                <figure class="product-media">
                                    @if( !empty($product->is_fiture === 1))
                                    <span class="product-label label-new"><a href="{{route('offer.product')}}" class='text-white'>OFFER</a></span>
                                    @endif
                                    <a href="{{route('productdetails', $product->slug)}}">
                                        @if( $product->imagess->count() > 0)
                                        <img src="{{asset('image/' . $product->imagess->first()->image)}}" alt="Product image" class="product-image">
                                        @endif
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">

                                        <div  class="btn-product btn-cart" title="Add to cart">
                                            <span>
                                                <form action="{{route('card.store')}}" method="POST">
                                                    @csrf 
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    @if( !empty($product->offer_price))
                                                    <input type="hidden" name='unite_price' value="{{$product->offer_price}}">
                                                    @else
                                                    <input type="hidden" name='unite_price' value="{{$product->regularprice}}">
                                                    @endif
                                                    <input type="hidden" name="product_qty" value="1">
                                                    <button type="submit" style="border:none;background:transparent;">Add to Card</button>
                                                </form>
                                            </span>
                                        </div>
                                        <a href="{{route('productdetails', $product->slug)}}" class="btn-product btnview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{$product->category->name}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{route('productdetails', $product->slug)}}">{{$product->name}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        @if(!empty($product->offer_price))
                                        <span class="new-price"> ??? {{$product->offer_price}}</span>
                                        <span class="old-price">Was ??? {{$product->regularprice}}</span>
                                        @else
                                        <span class="new-price">??? {{$product->regularprice}}</span>
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( {{$product->review->count()}} Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        @endforeach

                    </div><!-- End .row -->
                </div><!-- End .products -->
            </div><!-- End .container -->

            <div class="mb-4"></div><!-- End .mb-4 -->

            <div class="container">
                <hr class="mb-0">
            </div><!-- End .container -->

            <div class="icon-boxes-container bg-transparent">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rocket"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                                    <p>Orders $50 or more</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                                    <p>Within 30 days</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-info-circle"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                                    <p>when you sign up</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                    <p>24/7 amazing services</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .icon-boxes-container -->
        </main><!-- End .main -->

@endsection