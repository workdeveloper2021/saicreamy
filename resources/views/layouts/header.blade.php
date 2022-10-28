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
                <div class="logo"><a href="index.html"><img src="{{ url('/') }}/images/logo.png" alt="" title=""></a></div>

                <!--Nav Box-->
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation menu-left clearfix">
                                <li class="current dropdown"><a href="{{ url('/')}}">Home</a>
                                    <ul>
                                        <li class="current"><a href="{{ url('/')}}">Cakes</a></li>
                                        <li><a href="{{ url('/Lollipop')}}">Lollipop</a></li>
                                        <li><a href="{{ url('/Wedding')}}">Wedding</a></li>
                                        <li><a href="{{ url('/Coffee')}}">Coffee</a></li>
                                        <li><a href="{{ url('/Ice-Cream')}}">Ice-Cream</a></li>
                                        <li><a href="{{ url('/Macaron')}}">Macaron</a></li>
                                        <li><a href="{{ url('/Shop')}}">Shop</a></li>
                                        <li><a href="{{ url('/Landing')}}">Landing</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="{{ url('/about-us')}}">Pages</a>
                                    <ul>
                                        <li><a href="{{ url('/about-us')}}">About Us</a></li>
                                        <li><a href="{{ url('/our-staff')}}">Our Staff</a></li>
                                        <li><a href="{{ url('/pricing-tables')}}">Pricing Tables</a></li>
                                        <li><a href="{{ url('/content-elements')}}">Content Elements</a></li>
                                        <li><a href="{{ url('/recipes-list')}}">Recipes Grid</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="{{ url('/portfolio-masonry')}}">Portfolio</a>
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
                                </li>
                            </ul>

                            <ul class="navigation menu-right clearfix">
                                <li class="dropdown"><a href="{{ url('/blog-showcase')}}">Blog</a>
                                    <ul>
                                        <li><a href="{{ url('/blog-showcase')}}">Checkerboard</a></li>
                                        <li><a href="{{ url('/blog-standard')}}">Standard</a></li>
                                        <li><a href="{{ url('/blog-masonry')}}">Masonry</a></li>
                                        <li><a href="{{ url('/blog-masonry-full-width')}}">Masonry Full Width</a></li>
                                        <li><a href="{{ url('/blog-two-column')}}">Two Columns Grid</a></li>
                                        <li><a href="{{ url('/blog-three-column-wide')}}">Three Columns Wide</a></li>
                                        <li class="dropdown"><a href="#">Post Types</a>
                                            <ul>
                                                <li><a href="{{ url('/blog-single')}}">Standard Post</a></li>
                                                <li><a href="{{ url('/blog-single-2')}}">Gallery Post</a></li>
                                                <li><a href="{{ url('/blog-single-3')}}">Video Post</a></li>
                                                <li><a href="{{ url('/blog-single-4')}}">Audio Post</a></li>
                                                <li><a href="{{ url('/blog-single-5')}}">Quote Post</a></li>
                                                <li><a href="{{ url('/blog-single-6')}}">Link Post</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="{{ url('/shop')}}">Shop</a>
                                    <ul>
                                        <li><a href="{{ url('/shop')}}">Shop</a></li>
                                        <li><a href="{{ url('/shopping-cart')}}">Cart</a></li>
                                        <li><a href="{{ url('/checkout')}}">Checkout</a></li>
                                        <li><a href="{{ url('/login')}}">My account</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('/contact')}}">Contacts</a></li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->

                    <div class="outer-box clearfix">
                        <!-- Shoppping Car -->
                        <div class="cart-btn">
                            <a href="shopping-cart.html"><i class="icon flaticon-commerce"></i> <span class="count">2</span></a>

                            <div class="shopping-cart">
                                <ul class="shopping-cart-items">
                                    <li class="cart-item">
                                        <img src="{{ url('/') }}/images/resource/products/prod-thumb-1.jpg" alt="#" class="thumb" />
                                        <span class="item-name">Birthday Cake</span>
                                        <span class="item-quantity">1 x <span class="item-amount">$84.00</span></span>
                                        <a href="shop-single.html" class="product-detail"></a>
                                        <button class="remove-item"><span class="fa fa-times"></span></button>
                                    </li>

                                    <li class="cart-item">
                                        <img src="{{ url('/') }}/images/resource/products/prod-thumb-2.jpg" alt="#" class="thumb"  />
                                        <span class="item-name">French Macaroon</span>
                                        <span class="item-quantity">1 x <span class="item-amount">$13.00</span></span>
                                        <a href="shop-single.html" class="product-detail"></a>
                                        <button class="remove-item"><span class="fa fa-times"></span></button>
                                    </li>
                                </ul>

                                <div class="cart-footer">
                                    <div class="shopping-cart-total"><strong>Subtotal:</strong> $97.00</div>
                                    <a href="cart.html" class="theme-btn">View Cart</a>
                                    <a href="checkout.html" class="theme-btn">Checkout</a>
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
            <div class="logo"><a href="index.html"><img src="{{ url('/') }}/images/logo-small.png" alt="" title=""></a></div>

            <!--Nav Box-->
            <div class="nav-outer clearfix">
                <!--Keep This Empty / Menu will come through Javascript-->
            </div>
        </div>

        <!-- Mobile Menu  -->
        <div class="mobile-menu">            
            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html"><img src="{{ url('/') }}/images/logo-small.png" alt="" title=""></a></div> 
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
    