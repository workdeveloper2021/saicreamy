@if(!empty($cart))
 <a href="shopping-cart.html"><i class="icon flaticon-commerce"></i> <span class="count">{{count($cart)}}</span></a>

                            <div class="shopping-cart" > 
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
</div>
@endif
