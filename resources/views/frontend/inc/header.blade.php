        <header class="header header-intro-clearance header-4">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <a href="tel:#" class='text-white'><i class="icon-phone"></i>Call: +0123 456 789</a>
                    </div><!-- End .header-left -->

                    <div class="header-right">

                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#" class='text-white'>USD</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">Eur</a></li>
                                                    <li><a href="#">Usd</a></li>
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div>
                                    </li>
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#" class='text-white'>English</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">French</a></li>
                                                    <li><a href="#">Spanish</a></li>
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div>
                                    </li>
                                    @if( Auth::check())
                                        
                                    <li>
                                        
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{route('logout')}}" class='text-white' onclick="event.preventDefault();
                                            this.closest('form').submit();"><i class="icon-user"></i>Log Out</a>
                                        </form>
                                    </li>
                                       
                                    @else
                                        <li><a href="#signin-modal" data-toggle="modal" class='text-white'><i class="icon-user"></i>Sign in</a></li>
                                    @endif
                                    
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->

                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        
                        <a href="{{route('home')}}" class="logo">
                            <h3 style='margin-bottom:0' > <b> <span style='font-size:20px !importent' class='text-primary'>MOHIN</span><span class='text-dark' >RANA</span></b></h3>

                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="{{url('/search')}}" method="GET">
                                
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <div class="select-custom">
                                        <select id="cat" name="category">
                                            <option value="ALL" {{request('category') == 'ALL' ? 'selected' : ''}}>All Departments</option>
                                            @foreach(App\Models\Category::orderby('name','asc')->where('status',1)->where('is_parent',0)->get() as $pcat)
                                            @foreach(App\Models\Category::orderby('name','asc')->where('status',1)->where('is_parent',$pcat->id)->get() as $cCat)
                                            <option value="{{$cCat->id}}" {{request('category') == $cCat->id ? 'selected' : ''}}>{{$cCat->name}}</option>
                                            @endforeach
                                            @endforeach
                                        </select>
                                    </div><!-- End .select-custom -->
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="search" value="{{request('search')}}" id="q" placeholder="Search product ..." required>
                                    <button class="btn btn-primary" id='searchbtn' type="submit"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>








                    <div class="header-right">
                        

                        <div class="wishlist">
                            <a href="wishlist.html" title="Wishlist">
                                <div class="icon">
                                    <i class="icon-heart-o"></i>
                                    <span class="wishlist-count badge">3</span>
                                </div>
                                <p>Wishlist</p>
                            </a>
                        </div><!-- End .compare-dropdown -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <div class="icon">
                                    <i class="icon-shopping-cart" style='color:#007BC4'></i>
                                    @if(App\Models\Card::orderby('id','asc')->where('order_id',null)->count() > 0)
                                    <span class="cart-count">
                                        {{App\Models\Card::totalCardItem()}}
                                    </span>
                                    @endif
                                </div>
                                <p>Cart</p>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    @if(App\Models\Card::where('order_id',null)->count() > 0)
                                    @foreach(App\Models\Card::orderby('id','asc')->where('order_id',null)->get() as $item)
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="{{route('productdetails', $item->product->slug)}}">{{$item->product->name}}</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">{{$item->product_qty}}</span>
                                                x @if( !empty($item->product->offer_price) )
                                                {{$item->product->offer_price}} BDT
                                                @else 
                                                {{$item->product->regularprice}} BDT
                                                @endif
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="{{route('productdetails', $item->product->slug)}}" class="product-image">
                                                @if($item->product->imagess->count() > 0)
                                                <img src="{{asset('image/'. $item->product->imagess->first()->image)}}" alt="product">
                                                @endif
                                            </a>
                                        </figure>
                                        <form action="{{route('card.destroy', $item->id)}}" method="POST">
                                            @csrf 
                                            <button type='submit' class="btn-remove" title="Remove Product"><i class="icon-close"></i></button>
                                        </form>
                                        
                                    </div><!-- End .product -->
                                    @endforeach
                                    @else
                                    <div class="alert alert-info text-center">Add the product first.</div>
                                    @endif

                                    
                                </div><!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>Total</span>

                                    <span class="cart-total-price">৳ {{App\Models\Card::totlaPrice()}}</span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="{{route('card.items')}}" class="btn btn-primary">View Cart</a>
                                    <a href="{{route('checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->

                        @if( Auth::check())
                        <div class="dropdown compare-dropdown">
                            <a href="{{route('user.dashboard')}}" class="dropdown-toggle">
                                <div class="icon">
                                    <i class="icon-user" style='color:#007BC4'></i>
                                </div>
                                <p>Account</p>
                            </a>

                          
                        </div><!-- End .compare-dropdown -->
                        @endif

                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                            <a href="#" class="dropdown-toggle text-white" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                                <span class='text-white'>Browse Categories</span> <i class="icon-angle-down text-white"></i>
                            </a>

                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                        <li class="item-lead"><a href="#">Daily offers</a></li>
                                        <li class="item-lead"><a href="#">Gift Ideas</a></li>
                                        @foreach(App\Models\Category::orderby('name','asc')->where('status',1)->where('is_parent',0)->get() as $maincategory)

                                        <li>
                                            <a href="{{route('primary.category', $maincategory->slug)}}">{{$maincategory->name}}</a>
                                            <!-- sub Category start -->
                                            @if(App\Models\Category::where('status',1)->where('is_parent',$maincategory->id)->count() == 0)
                                            @else
                                            <ul>
                                                @foreach(App\Models\Category::orderby('name','asc')->where('status',1)->where('is_parent', $maincategory->id)->get() as $subCate)
                                                <li><a href="{{route('sub.category', $subCate->slug)}}">{{$subCate->name}}</a></li>
                                                @endforeach
                                            </ul>
                                            @endif
                                            
                                            <!-- sub Category end -->
                                        </li>
                                        @endforeach
                                       
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">

                                <!-- Mega menu start -->
                                <!-- <li class="megamenu-container active">
                                    <a href="index.html" class="sf-with-ul">Home</a>

                                    <div class="megamenu demo">
                                        <div class="menu-col">
                                            <div class="menu-title">Choose your demo</div>

                                            Mega menu body

                                            
                                        </div>
                                    </div>
                                </li> -->
                                <!-- Mega menu end -->
                            
                                
                                <li><a href="{{route('home')}}" >Home</a></li>
                                <li><a href="{{route('shop-three')}}" >Shop</a></li>
                                <li><a href="#" >About Shop</a></li>
                                <li><a href="#" >Contact Shop</a></li>
                                
                                
                                
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->

                    <div class="header-right">
                        <i class="la la-lightbulb-o"></i><p><a href="{{route('offer.product')}}">OFFER PRODUCT</a></p>
                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->