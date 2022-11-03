 <!-- Preloader -->
    <div class="preloader">
        <div class="loader_overlay"></div>
        <div class="loader_cogs">
            <div class="loader_cogs__top">
                <div class="top_part"></div>
                <div class="top_part"></div>
                <div class="top_part"></div>
                <div class="top_hole"></div>
            </div>
            <div class="loader_cogs__left">
                <div class="left_part"></div>
                <div class="left_part"></div>
                <div class="left_part"></div>
                <div class="left_hole"></div>
            </div>
            <div class="loader_cogs__bottom">
                <div class="bottom_part"></div>
                <div class="bottom_part"></div>
                <div class="bottom_part"></div>
                <div class="bottom_hole"></div>
            </div>
        </div>
    </div>
    
    <!-- Main Header-->
    <header class="main-header">
        <!-- Menu Wave -->
        <div class="menu_wave"></div>

        <!-- Main box -->
        <div class="main-box">
            <div class="menu-box">
                <div class="logo"><a href="{{url('/')}}"><img src="{{ url('/') }}/images/logo.png" alt="" title=""></a></div>

                <!--Nav Box-->
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation menu-left clearfix">
                                <li><a href="{{ url('/')}}">Home</a></li>
                                <li><a href="{{ url('/about-us')}}">About Us</a></li>
                                <li><a href="{{ url('/shop')}}">Shop</a></li>
                                <li><a href="{{ url('/blog')}}">Blog</a></li>
                                
                                <!-- <li class="dropdown"><a href="{{ url('/about-us')}}">Pages</a>
                                    <ul>
                                        <li><a href="{{ url('/our-staff')}}">Our Staff</a></li>
                                        <li><a href="{{ url('/pricing-tables')}}">Pricing Tables</a></li>
                                        <li><a href="{{ url('/content-elements')}}">Content Elements</a></li>
                                        <li><a href="{{ url('/recipes-list')}}">Recipes Grid</a></li>
                                    </ul>
                                </li> -->
                                <!-- <li class="dropdown"><a href="{{ url('/portfolio-masonry')}}">Portfolio</a>
                                    <ul>
                                        <li><a href="{{ url('/portfolio-masonry')}}">Masonry</a></li>
                                        <li><a href="{{ url('/portfolio-masonry-wide')}}">Masonry Wide</a></li>
                                        <li><a href="{{ url('/portfolio-wide')}}">Wide</a></li>
                                        <li><a href="{{ url('/portfolio-with-filter')}}">With Filter</a></li>
                                        <li><a href="{{ url('/portfolio-two-column')}}">Two Columns</a></li>
                                        <li><a href="{{ url('/portfolio-with-sidebar')}}">With Sidebar</a></li>
                                        <li><a href="{{ url('/portfolio-square')}}">Square</a></li>
                                        <li><a href="{{ url('/portfolio-single')}}">single Post</a></li>
                                    </ul>
                                </li> -->
                            </ul>

                            <ul class="navigation menu-right clearfix">
                                
                                <li><a href="{{ url('/contact')}}">Contacts</a></li>
                                @auth
                                 <li><a href="{{ url('/myorder')}}">My Order</a></li>
                                 
                                 <li>   <a  href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                           Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                </li>      
                                @endauth
                                @guest
                                <li><a href="{{ URL::to('login') }}">Login</a></li>
                                @endauth 
                               
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->

                    <div class="outer-box clearfix">
                        <!-- Shoppping Car -->
                        <div class="cart-btn" id="cartshow">
                            <?php 
                            $user_id =0;
                            $cart = array();
                            if(Auth::user()){
                               $user_id = Auth::user()->id;
                            }else{
                               $user_id = Cookie::get('cart');
                            }
                            $cart =  DB::table('carts')->where('user_id',$user_id)->get();

                             ?>
                            <a href="{{url('cart')}}"><i class="icon flaticon-commerce"></i> <span class="count">{{count($cart)}}</span></a>

                            <div class="shopping-cart" >
                               <ul class="shopping-cart-items">
                            <?php 
                            $carttotal = 0;
                             if(count($cart) > 0) {
                                foreach ($cart as $key => $product) {
                                 $pro_image = DB::table('products')->where('id',$product->product_id)->first();

                                 $carttotal += $product->price;
                             ?>     
                               
                                <li class="cart-item">
                                    <img src="{{ URL::to('/') }}/{{ $pro_image->image}}" alt="#" class="thumb" />
                                    <span class="item-name">Birthday Cake</span>
                                    <span class="item-quantity">{{ $product->qty}} x <span class="item-amount">${{ $product->unit_price}}</span></span>
                                    <a href="{{url('/product')}}/{{ $pro_image->id}}" class="product-detail"></a>
                                      <a class="remove-item remove-to-cart" href="javascript:void(0);" class="remove-to-cart" id="{{$product->id}}">
                                    <span class="fa fa-times"></span></a>
                                </li>

                            <?php } }else{ ?>  
                            <li class="clearfix">
                                <div class="row" style="width: 253px;">
                                  
                                     <span class="item-name"style="color: red;margin-left: 17px">Cart Empty</span>
                                    
                                </div>
                            </li> 

                            <?php } ?>
                            </ul>

                            <div class="cart-footer">
                                <div class="shopping-cart-total"><strong>Subtotal:</strong> ${{$carttotal }}</div>
                                <a href="{{ url('cart') }}" class="theme-btn">View Cart</a>
                                <a href="{{ url('checkout') }}" class="theme-btn">Checkout</a>
                            </div>
                            </div> <!--end shopping-cart -->
                        </div>

                        <!-- Search Btn -->
                        <div class="search-box">
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo">
                    <a href="#" title="Sticky Logo"><img src="{{ url('/') }}/images/logo-small.png" alt="Sticky Logo"></a>
                </div>

                <!--Nav Outer-->
                <div class="nav-outer">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav><!-- Main Menu End-->
                </div>
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Header -->
        <div class="mobile-header">
            <div class="logo"><a href="{{url('/')}}"><img src="{{ url('/') }}/images/logo-small.png" alt="" title=""></a></div>

            <!--Nav Box-->
            <div class="nav-outer clearfix">
                <!--Keep This Empty / Menu will come through Javascript-->
            </div>
        </div>

        <!-- Mobile Menu  -->
        <div class="mobile-menu">            
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{url('/')}}"><img src="{{ url('/') }}/images/logo-small.png" alt="" title=""></a></div> 
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </nav>
        </div><!-- End Mobile Menu -->

        <!-- Header Search -->
        <div class="search-popup">
            <span class="search-back-drop"></span>
            
            <div class="search-inner">
                <button class="close-search"><span class="fa fa-times"></span></button>
                <form method="post" action="http://html.cwsthemes.com/bellaria/blog-showcase.html">
                    <div class="form-group">
                        <input type="search" name="search-field" value="" placeholder="Search..." required="">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Header Search -->

    </header>
    <!--End Main Header -->
    