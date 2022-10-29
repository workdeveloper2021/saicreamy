@extends('layouts.main')
 <!--Banner Start-->
@section('content');


    <!--Page Title-->
    <section class="page-title" style="background-image:url(<?= url('/') ?>/images/background/34.jpg)">
        <div class="auto-container">
            <h1>Shop</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html">home</a></li>
                <li>Shop</li>
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
                    <div class="our-shop">
                        <div class="shop-upper-box clearfix">
                            <div class="items-label">Showing all 12 results</div>
                            <div class="orderby">
                                <select name="orderby" class="sortby-select select2-offscreen">
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating" >Sort by average rating</option>
                                    <option value="date" >Sort by newness</option>
                                    <option value="price" >Sort by price: low to high</option>
                                    <option value="price-desc" >Sort by price: high to low</option>
                                </select>
                            </div>
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
                    </div>
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
                                                <img src="images/resource/products/prod-thumb-1.jpg" alt="#" class="thumb" />
                                                <span class="item-name">Birthday Cake</span>
                                                <span class="item-quantity">1 x <span class="item-amount">$84.00</span></span>
                                                <a href="shop-single.html" class="product-detail"></a>
                                                <button class="remove-item"><span class="fa fa-times"></span></button>
                                            </li>

                                            <li class="cart-item">
                                                <img src="images/resource/products/prod-thumb-2.jpg" alt="#" class="thumb"  />
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

                            <!-- Range Slider Widget -->
                            <div class="sidebar-widget rangeslider-widget">
                                <div class="widget-content">
                                    <h3 class="widget-title">Price Filter</h3>
                                    
                                    <div class="range-slider-one clearfix">
                                        <div class="price-range-slider"></div>
                                        <div class="clearfix">
                                            <div class="pull-left input-box">
                                                <div class="title">Price:</div>
                                                <div class="input"><input type="text" class="property-amount" name="field-name" readonly></div>
                                            </div>
                                            <div class="pull-right btn-box">
                                                <a href="#" class="theme-btn"><span class="btn-title">Filtter</span></a>
                                            </div>
                                        </div>
                                    </div>
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