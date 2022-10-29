@extends('layouts.main')
 <!--Banner Start-->
@section('content');

    <!--Page Title-->
    <section class="page-title" style="background-image:url(<?= url('/') ?>/images/background/34.jpg)">
        <div class="auto-container">
            <h1>Birthday Cake</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{url('/')}}">home</a></li>
                <li><a href="{{url('/shop')}}">Shop</a></li>
                <li>{{$pro->title}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                    <div class="shop-single">
                        <!-- Product Detail -->
                        <div class="product-details">
                            <!--Basic Details-->
                            <div class="basic-details">
                                <div class="row clearfix">
                                    <div class="image-column col-md-6 col-sm-12">
                                        <figure class="image"><a href="{{url('/')}}/{{$pro->image}}" class="lightbox-image" title="Image Caption Here"><img src="{{url('/')}}/{{$pro->image}}" alt=""><span class="icon fa fa-search"></span></a></figure>
                                    </div>
                                    <div class="info-column col-md-6 col-sm-12">
                                        <div class="details-header">
                                            <h4>{{$pro->title}}</h4>
                                            <div class="rating">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <a class="reviews" href="#">(2 Customer Reviews)</a>
                                            <div class="item-price">${{$pro->price}}</div>
                                            <div class="text">{{$pro->s_description}}</div>
                                        </div>

                                        <div class="other-options clearfix">
                                            <div class="item-quantity">Quantity <input class="qty" type="number" value="1" name="quantity"></div>
                                            <button type="button" class="theme-btn add-to-cart"><span class="btn-title">Add To Cart</span></button>
                                            <ul class="product-meta">
                                                <li class="posted_in">Category: <a href="#">{{$pro->category->name}}</a></li>
                                                <!-- <li class="tagged_as">Tag: <a href="#">Nuts</a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Basic Details-->
                            
                            <!--Product Info Tabs-->
                            <div class="product-info-tabs">
                                <!--Product Tabs-->
                                <div class="prod-tabs tabs-box">
                                
                                    <!--Tab Btns-->
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <li data-tab="#prod-details" class="tab-btn">Descripton</li>
                                        <li data-tab="#prod-reviews" class="tab-btn active-btn">Review (2)</li>
                                    </ul>
                                    
                                    <!--Tabs Container-->
                                    <div class="tabs-content">
                                        
                                        <!--Tab-->
                                        <div class="tab" id="prod-details">
                                            <h2 class="title">Descripton</h2>
                                            <div class="content">
                                                {{$pro->l_description}}
                                            </div>
                                        </div>
                                        
                                        <!--Tab-->
                                        <div class="tab active-tab" id="prod-reviews">
                                            <h2 class="title">2 reviews for Birthday Cake</h2>
                                            <!--Reviews Container-->
                                            <div class="comments-area">
                                                <!--Comment Box-->
                                                <div class="comment-box">
                                                    <div class="comment">
                                                        <div class="author-thumb"><img src="{{ url('/') }}/images/resource/avatar-1.jpg" alt=""></div>
                                                        <div class="comment-inner">
                                                            <div class="comment-info clearfix">
                                                                <strong class="name">Stuart</strong> 
                                                                <span class="date">– 07 Jun</span>
                                                            </div> 
                                                            <div class="rating">
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star light"></span>
                                                            </div>
                                                            <div class="text">This will go great with my Hoodie that I ordered a few weeks ago.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!--Comment Box-->
                                                <div class="comment-box">
                                                    <div class="comment">
                                                        <div class="author-thumb"><img src="{{ url('/') }}/images/resource/avatar-2.png" alt=""></div>
                                                        <div class="comment-inner">
                                                             <div class="comment-info clearfix">
                                                                <strong class="name">Maria</strong> 
                                                                <span class="date">– 07 Jun</span>
                                                            </div> 
                                                            <div class="rating">
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star light"></span>
                                                            </div>
                                                            <div class="text">Love this shirt! The ninja near and dear to my heart.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!--Comment Form-->
                                            <div class="comment-form">
                                                <div class="sub-title">Add a review</div>
                                                <div class="form-outer">
                                                    <p>Your email address will not be published. Required fields are marked *</p>
                                                    <div class="rating-box">
                                                        <div class="field-label">Your Rating</div>
                                                        <div class="rating">
                                                            <a href="#"><span class="fa fa-star"></span></a>
                                                            <a href="#"><span class="fa fa-star"></span></a>
                                                            <a href="#"><span class="fa fa-star"></span></a>
                                                            <a href="#"><span class="fa fa-star"></span></a>
                                                            <a href="#"><span class="fa fa-star"></span></a>
                                                        </div>
                                                    </div>
                                                    <form method="post" action="http://html.cwsthemes.com/bellaria/blog-showcase.html"> 
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                                <div class="field-label">Your review *</div>
                                                                <textarea name="message" placeholder=""></textarea>
                                                            </div>

                                                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                                <div class="field-label">Name *</div>
                                                                <input type="text" name="username" placeholder="" required="">
                                                            </div>
                                                            
                                                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                                <div class="field-label">Email *</div>
                                                                <input type="email" name="email" placeholder="" required="">
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
                                                                <input type="submit" name="submit" value="Submit">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <!--End Product Info Tabs-->
                            
                            <!-- Related Products -->
                            <div class="related-products">
                                <div class="sec-title">
                                    <h2>Related products</h2>
                                </div>

                                <div class="row clearfix">
                                    @if($product)
                                    @foreach($product as $key => $pro) 
                            
                                        <!-- Shop Item --> 
                                        <div class="shop-item col-lg-4 col-md-6 col-sm-12">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <!-- <div class="sale-tag">sale!</div> -->
                                                    <figure class="image"><a href="{{url('/product')}}/{{ $pro->id}}"><img src="{{url('/')}}/{{$pro->image}}" alt=""></a></figure>
                                                    <div class="btn-box"><a href="{{url('/product')}}/{{ $pro->id}}">Add to cart</a></div>
                                                </div>
                                                <div class="lower-content">
                                                    <h4 class="name"><a href="{{url('/product')}}/{{ $pro->id}}">{{$pro->title}}</a></h4>
                                                    <div class="rating"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star light"></span></div>
                                                <div class="price">
                                                    <!-- <del>$29.00</del> -->
                                                     ${{$pro->price}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                   
                                </div>
                            </div><!-- End Related Products -->
                        </div><!-- Product Detail -->
                    </div><!-- End Shop Single -->
                </div>
                
                <!--Sidebar Side-->
                <div class="sidebar-side sticky-container col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar theiaStickySidebar">
                        <div class="sticky-sidebar">
                            <!-- Search Widget -->
                            <div class="sidebar-widget search-widget">
                                <form method="post" action="http://html.cwsthemes.com/bellaria/contact.html">
                                    <div class="form-group">
                                        <input type="search" name="search-field" value="" placeholder="Search products…" required>
                                        <button type="submit"><span class="icon fa fa-search"></span></button>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Cart Widget -->
                            <div class="sidebar-widget cart-widget">
                                <div class="widget-content">
                                    <h3 class="widget-title">Cart</h3>
                                    
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
                            </div>

                            <!-- Tags Widget -->
                            <div class="sidebar-widget tags-widget">
                                <h3 class="widget-title">Tags</h3>
                                <ul class="tag-list clearfix">
                                    <li><a href="#">Bars</a></li>
                                    <li><a href="#">Caramels</a></li>
                                    <li><a href="#">Chocolate</a></li>
                                    <li><a href="#">Fruit</a></li>
                                    <li><a href="#">Nuts</a></li>
                                    <li><a href="#">Toffees</a></li>
                                    <li><a href="#">Top Rated</a></li>
                                    <li><a href="#">Truffles</a></li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!--End Sidebar Page Container-->
@endsection