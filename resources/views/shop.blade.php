@extends('layouts.main')
 <!--Banner Start-->
@section('content');


    <!--Page Title-->
    <section class="page-title" style="background-image:url(<?= url('/') ?>/images/background/34.jpg)">
        <div class="auto-container">
            <h1>Shop</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{url('/')}}">home</a></li>
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
                            <div class="items-label">Showing all {{count($product)}} results</div>
                            <div class="orderby">
                                <select name="orderby" id="orderby" class="sortby-select select2-offscreen">
                                    <!-- <option value="popularity">Sort by popularity</option> -->
                                    <!-- <option value="rating" >Sort by average rating</option> -->
                                    <option value="latest"<?php if(isset($_GET['sort'])){ if($_GET['sort'] =='latest'){ ?>selected <?php }} ?>>Sort by Latest</option>
                                    <option value="price-asc" <?php if(isset($_GET['sort'])){ if($_GET['sort'] =='price-asc'){ ?>selected <?php }} ?>>Sort by price: low to high</option>
                                    <option value="price-desc" <?php if(isset($_GET['sort'])){ if($_GET['sort'] =='price-desc'){ ?>selected <?php }} ?>>Sort by price: high to low</option>
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
                                         <input class="qty" id="qty{{ $pro->id}}"  type="hidden" value="1" name="qty">
                                       
                                        <div class="btn-box"><a href="javascript:void(0);" product_id="{{$pro->id}}" submit="cart" class="cart-item">Add to cart</a></div>
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
                                <form method="get" action="">
                                    <div class="form-group">
                                            <input type="hidden" name="category" value="<?php if(isset($_GET['category'])){echo $_GET['category']; } ?>">
                                                
                                        <input type="search" name="search" value="" placeholder="Search products…" required>
                                        <button type="submit"><span class="icon fa fa-search"></span></button>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Cart Widget -->
                            <div class="sidebar-widget cart-widget">
                                <div class="widget-content">
                                    <h3 class="widget-title">Cart</h3>
                                    
                                    <div class="shopping-cart" id="cartshow2">
                                       @if(!empty($cart))
                                         <ul class="shopping-cart-items">
                                        <?php 
                                         $carttotal = 0;
                                         if(count($cart) > 0) {
                                            foreach ($cart as $key => $product) {
                                             $carttotal += $product['price'];
                                         ?>     
                                           
                                            <li class="cart-item">
                                                <img src="{{ URL::to('/') }}/{{ $product['products']['image']}}" alt="#" class="thumb" />
                                                <span class="item-name">Birthday Cake</span>
                                                <span class="item-quantity">{{ $product['qty']}} x <span class="item-amount">${{ $product['unit_price']}}</span></span>
                                                 <a href="{{url('/product')}}/{{$product['products']['id']}}" class="product-detail"></a>
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

                                        @endif

                                    </div> <!--end shopping-cart -->
                                </div>
                            </div>

                            <!-- Range Slider Widget -->
                            <div class="sidebar-widget rangeslider-widget">
                                <div class="widget-content">
                                    <h3 class="widget-title">Price Filter</h3>
                                    <form method="get" action="{{ url()->full() }}">
                                    <div class="range-slider-one clearfix">
                                        <div class="clearfix">
                                            <div class="row">
                                                <div class="col-5">
                                                    <input style="border-radius: 0;"  class="theme-btn" type="number" name="min" value="0" placeholder="min">
                                                </div>
                                                <div class="col-2">
                                                    <p>to</p>
                                                </div>
                                                <div class="col-5">
                                                    <input style="border-radius: 0;" class="theme-btn" type="number" name="max" value="1000" placeholder="max">
                                                    <input type="hidden" name="category" value="<?php if(isset($_GET['category'])){echo $_GET['category']; } ?>">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="btn-box">
                                                <button type="submit" class="theme-btn" style="background: #4b4342; color: #fff; display: inline-block; width: 100%; margin: 0 auto;">
                                                    <span class="btn-title">Filtter</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Tags Widget -->
                           <!--  <div class="sidebar-widget tags-widget">
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
                            </div> -->
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!--End Sidebar Page Container-->
@endsection

@section('script');
<script type="text/javascript">
    $(document).ready(function(){
        $('#orderby').change(function(){
           var type = $(this).val();
           window.location.href = "?sort="+type;
        })
    })
</script>
@endsection
