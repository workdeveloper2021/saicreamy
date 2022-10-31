@extends('layouts.main')
 <!--Banner Start-->
@section('content');
 
    <!--Page Title-->
    <section class="page-title" style="background-image:url(<?= url('/') ?>/images/background/34.jpg)">
        <div class="auto-container">
            <h1>Cart</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html">home</a></li>
                <li>Cart</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Cart Section-->
    <section class="cart-section">
        <div class="auto-container">
            <!--Cart Outer-->
            <div class="cart-outer">
                <div class="table-outer">
                    <table class="cart-table">
                        <thead class="cart-header">
                            <tr>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $carttotal = 0;
                        if(count($cart) > 0) {
                         foreach ($cart as $key => $product) {
                           $carttotal += $product['price'];
                        ?>       
                            <tr class="cart-item">
                                <td class="product-thumbnail"><a href="{{url('/product')}}/{{$product['products']['id']}}"><img src="{{ URL::to('/') }}/{{ $product['products']['image']}}" alt=""></a></td>
                                <td class="product-name"><a href="shop-single.html">{{$product['products']['title']}}</a></td>
                                <td class="product-price">${{ number_format( $product['unit_price'],2)}}</td> 
                                <td class="product-quantity"><div class="quantity"><label>Quantity</label><input type="number" class="qty" name="qty" value="{{$product['qty']}}"> </div></td>
                                <td class="product-subtotal"><span class="amount">${{ number_format($product['price'],2)}}</span></td>
                                <td class="product-remove"> <a href="#" class="remove"><span class="fa fa-times"></span></a></td>
                            </tr>
                        <?php } }else{ ?>  
                        <tr class="cart-item" colspan="6">
                            <img src="{{ URL::to('assets/')}}/images/cart.png" width="600">
                        </tr>
                    <?php } ?>    
                        </tbody>
                    </table>
                </div>

                <div class="cart-options clearfix">
                    <div class="pull-left">
                        <div class="apply-coupon clearfix">
                            <div class="form-group clearfix">
                                <input type="text" name="coupon-code" value="" placeholder="Coupon Code">
                            </div>
                            <div class="form-group clearfix">
                                <button type="button" class="theme-btn coupon-btn">Apply Coupon</button>
                            </div>
                        </div>
                    </div>

                    <div class="pull-right">
                        <button type="button" class="theme-btn cart-btn">update cart</button>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-between">                    
                <div class="column col-lg-4 offset-lg-8 col-md-6 col-sm-12">
                    <!--Totals Table-->
                    <ul class="totals-table">
                        <li><h3>Cart Totals</h3></li>
                        <li class="clearfix"><span class="col">Subtotal</span><span class="col price">${{ number_format( $carttotal ,2)}}</span></li>
                        <li class="clearfix"><span class="col">Total</span><span class="col total-price">${{ number_format( $carttotal ,2)}}</span></li>
                        <li class="text-right" style="margin-top: 20px;"><a  href="{{ URL::to('checkout') }}" class="theme-btn proceed-btn">Proceed to Checkout</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </section>
    <!--End Cart Section-->
@endsection