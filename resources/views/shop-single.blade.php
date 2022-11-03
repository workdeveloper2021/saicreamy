@extends('layouts.main')
 <!--Banner Start-->
@section('content');
 <style type="text/css">

.startlight{
    color: #aaa!important;
}
}
.rating > input { display: none; } 

.rating.star > label {
    color: #dee2e6;
    margin: 1px 20px 0px 0px;
    background-color: #ffffff;
    border-radius: 0;
    height: 48px;
    float: right;
    width: 44px;
    border: 1px solid #ffffff;
}
fieldset.rating.star > label:before { 
    margin-top: 0;
    padding: 0px;
    font-size: 47px;
    font-family: FontAwesome;
    display: inline-block;
    content: "\2605";
    position: relative;
    top: -9px;
}
.rating > label:before {
    margin-top: 2px;
    padding: 5px 12px;
    font-size: 1.25em;
    font-family: FontAwesome;
    display: inline-block;
    content: "";
}
.rating > .half:before { 
  content: "\f089";
  position: absolute;
}
.rating.star > label{
  background-color: transparent !important;
}
.rating > label { 
    color: #fff;
    margin: 1px 11px 0px 0px;
    background-color: #dee2e6;
    border-radius: 2px;
    height: 16px;
    float: right;
    width: 16px;
    border: 1px solid #c1c0c0;  
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { 
    background-color:#ebba44!important;
  cursor:pointer;
} /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { 
    background-color:#ebba44!important;
  cursor:pointer;
} 
.rating.star:not(:checked) > label:hover, /* hover current star */
.rating.star:not(:checked) > label:hover ~ label { 
  color:#ebba44!important;
  background-color: transparent !important;
  cursor:pointer;
} /* hover previous stars in list */

.rating.star > input:checked + label:hover, /* hover current star when changing rating.star */
.rating.star > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating.star > input:checked ~ label:hover ~ label { 
  color:#ebba44!important;
  cursor:pointer;
  background-color: transparent !important;
} 
.star_rating{
        width: 500px;
    margin: 0 auto;
    border: 1px solid #ff0000;
    padding: 3px 30px 72px 35px;
    box-shadow: 0 0 15px #ebba44;
    margin-top: 2%;
    border-radius: 14px;
}
.star_rating h2 {
  font-size: 27px;
  text-transform: uppercase;
}
.star_rating p {
  font-size: 17px;
  color: #dee2e6;
  clear: both;
  margin-bottom: 3px;
}
.star_rating h4 {
    font-size: 17px;
    color: #dee2e6;
    clear: both;
    margin-bottom: 3px;
    border-top: 2px solid #ebba44;
    padding-top: 16px;
    text-align: center;
}
@media screen and (max-width: 500px){
  .star_rating {
    width: 100%;
    padding: 3px 8px 72px 6px;
  }
  .rating.star {
    margin: 0 auto;
    display: block;
    text-align: center;
    float: none;
  }
  .rating.star > label {
    margin: 1px;
    width: 19%;
  }
}
/*css by hemant*/
.comments-area svg{
    width: 30px;
    /*width: 30px !important;*/
}
.flex.justify-between.flex-1{
    display: none;
}
nav[role=navigation]{
    text-align: right;
}
/*css by hemant*/
 </style>
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
                                            <div class="item-price">₹{{$pro->price}}</div>
                                            <div class="text">{{$pro->s_description}}</div>
                                        </div>

                                        <div class="other-options clearfix">
                                           
                                            <div class="item-quantity">Quantity <input class="qty" id="qty{{$pro->id}}" type="number" value="1" name="qty"></div>
                                            <button  product_id="{{$pro->id}}" submit="cart" type="button"   class="theme-btn add-to-cart cart-item"><span class="btn-title">Add To Cart</span></button>
                                            
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
                                        <li data-tab="#prod-reviews" class="tab-btn active-btn">Review ({{$totalr}})</li>
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
                                            <h2 class="title">{{$totalr}} reviews for  {{$pro->title}}</h2>
                                            <!--Reviews Container-->
                                            <div class="comments-area">
                                                @if($review)
                                                @foreach($review as $key => $rating)
                                                <!--Comment Box-->
                                                <div class="comment-box">
                                                    <div class="comment">
                                                        <div class="author-thumb"><img src="{{ url('/') }}/images/resource/149071.png" alt=""></div>
                                                        <div class="comment-inner">
                                                            <div class="comment-info clearfix">
                                                                <strong class="name">{{$rating->name}}</strong> 
                                                                <span class="date">– {{date('d',strtotime($rating->created_at))}} {{date('M',strtotime($rating->created_at))}}</span>
                                                            </div> 
                                                            <div class="rating">
                                                             @if($rating->rating == 1)

                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star startlight"></span>
                                                            <span class="fa fa-star startlight"></span>
                                                            <span class="fa fa-star startlight"></span>
                                                            <span class="fa fa-star startlight light"></span>

                                                             @elseif($rating->rating == 2)
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star startlight"></span>
                                                            <span class="fa fa-star startlight"></span>
                                                            <span class="fa fa-star startlight"></span>

                                                             @elseif($rating->rating == 3)
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star startlight"></span>
                                                            <span class="fa fa-star startlight"></span>

                                                             @elseif($rating->rating == 4)

                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star startlight"></span>

                                                             @elseif($rating->rating == 5)
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                             @endif
                                                                
                                                            </div>
                                                            <div class="text">{{$rating->review}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                              
                                                @endforeach
                                                @endif
                                                {{ $review->links() }}
                                            </div>
                                            
                                            <!--Comment Form-->
                                            <div class="comment-form">
                                                <div class="sub-title">Add a review</div>
                                                <div class="form-outer">
                                                    <p>Your email address will not be published. Requi#ebba44 fields are marked *</p>
                                                    <form method="post" action="{{ route('review.store')}}">
                                                    @csrf 
                                                    <div class="rating-box">
                                                        <div class="field-label">Your Rating</div>
                                                        
                                                        <fieldset class="rating star">
                                                        <input type="radio" id="field6_star5" name="rating" value="5" style="display: none;"  />
                                                        <label class = "full" for="field6_star5"></label>
                                                        <input type="radio" id="field6_star4" name="rating" value="4" style="display: none;"  />
                                                        <label class = "full" for="field6_star4"></label>
                                                        <input type="radio" id="field6_star3" name="rating" value="3" style="display: none;"  />
                                                        <label class = "full" for="field6_star3"></label>
                                                        <input type="radio" id="field6_star2" name="rating" value="2" style="display: none;" />
                                                        <label class = "full" for="field6_star2"></label>
                                                        <input type="radio" id="field6_star1" name="rating" value="1" style="display: none;" />
                                                        <label class = "full" for="field6_star1"></label>
                                                         
                                                         </fieldset>
                                                      
                                                    </div>
                                                  
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                                <div class="field-label">Your review *</div>
                                                                <textarea required name="review" placeholder=""></textarea>
                                                            </div>

                                                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                                <div class="field-label">Name *</div>
                                                                <input type="text" name="name" placeholder="" requi#ebba44="">
                                                            </div>
                                                            
                                                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                                <div class="field-label">Email *</div>
                                                                <input type="email" name="email" placeholder="" requi#ebba44="">
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
                                                            <input type="hidden" name="product_id" value="{{$pro->id}}">   
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
                                                     ₹{{$pro->price}}</div>
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
                                        <input type="search" name="search-field" value="" placeholder="Search products…" requi#ebba44>
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
                                                <span class="item-quantity">{{ $product['qty']}} x <span class="item-amount">₹{{ $product['unit_price']}}</span></span>
                                                 <a href="{{url('/product')}}/{{$product['products']['id']}}" class="product-detail"></a>
                                                  <a class="remove-item remove-to-cart" href="javascript:void(0);" class="remove-to-cart" id="{{$product->id}}">
                                                <span class="fa fa-times"></span></a>
                                            </li>

                                        <?php } }else{ ?>  
                                        <li class="clearfix">
                                            <div class="row" style="width: 253px;">
                                               
                                                 <span class="item-name"style="color: #ebba44;margin-left: 17px">Cart Empty</span>
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
@section('script')
<script type="text/javascript">
    $("label").click(function(){
      $(this).parent().find("label").css({"background-color": "#dee2e6"});
      $(this).css({"background-color": "#ebba44"});
      $(this).nextAll().css({"background-color": "#ebba44"});
    });
    $(".star label").click(function(){
      $(this).parent().find("label").css({"color": "#dee2e6"});
      $(this).css({"color": "#ebba44"});
      $(this).nextAll().css({"color": "#ebba44"});
      $(this).css({"background-color": "transparent"});
      $(this).nextAll().css({"background-color": "transparent"});
    });
</script>
@endsection