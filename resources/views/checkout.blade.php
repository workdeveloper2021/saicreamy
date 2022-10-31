@extends('layouts.main')
 <!--Banner Start-->
@section('content');
<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/34.jpg)">
        <div class="auto-container">
            <h1>Checkout</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html">home</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

     <!--CheckOut Page-->
    <section class="checkout-page">
         <form method="post" action="{{ route('orderplace') }}">
                @csrf 
        <div class="auto-container">
            <!--Default Links-->
            <div class="default-links">
                <div class="message-box with-icon info"><div class="icon-box"><span class="icon fa fa-info"></span></div> Have a coupon? <a href="#">Click here to enter your code</a></div>
            </div>
            
            <!--Checkout Details-->
            <div class="checkout-form">
               
                    <div class="row clearfix">
                        <!--Column-->
                        <div class="column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="sec-title">
                                    <h3>Billing details</h3>
                                </div>

                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">First name <sup>*</sup></div>
                                    <input type="text" name="s_fname" class="form-control form-control-lg" placeholder="First name" required>
                                </div>
                                
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Last name <sup>*</sup></div>
                                    <input type="text" name="s_lname" class="form-control form-control-lg" placeholder="Last name" required>
                                </div>
                                
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Company name (optional)</div>
                                     <input type="text" name="s_cumpany" class="form-control form-control-lg" placeholder="Company (optional)">
                                </div>
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Street address <sup>*</sup></div>
                                     <input type="text" name="address2" class="form-control form-control-lg" placeholder="Apartment, suite, etc. (optional)" required>
                                </div>

                                <div class="form-group">
                                      <input type="text" name="address2" class="form-control form-control-lg" placeholder="Apartment, suite, etc. (optional)">
                                </div>
                                 <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Country <sup>*</sup></div>
                                    <input type="text" name="country" value="" placeholder="" required="">
                                </div>
                                <div class="form-group">
                                    <div class="field-label">State <sup>*</sup></div>
                                      <input type="text" name="state" value="" placeholder="" required="">
                                </div>
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Town / City <sup>*</sup></div>
                                    <input type="text" name="city" value="" placeholder="" required="">
                                </div>
                                
                               
                                
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Postcode/ ZIP <sup>*</sup></div>
                                      <input type="text" name="pincode" class="form-control form-control-lg" placeholder="Postcode" required>
                                </div>
                                
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Phone<sup>*</sup></div>
                                    <input type="text" name="contact" value="" placeholder="" required>
                                </div>

                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Email Address</div>
                                    <input type="text" name="email" value="" placeholder="">
                                </div>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="sec-title">
                                    <h3>Additional information</h3>
                                </div>
                            
                                <!--Form Group-->
                                <div class="form-group ">
                                    <div class="field-label">Order notes (optional)</div>
                                    <textarea name="order_note" placeholder="Notes about your order,e.g. special notes for delivery." ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!--End Checkout Details-->
            
            <!--Order Box-->
            <div class="order-box">
                <table>
                    <thead>
                        <tr>
                            <th class="product-name">Product</th>
                            <th class="product-total">Total</th>
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
                            <td class="product-name">{{ $product['products']['title']}}&nbsp;
                                <strong class="product-quantity">× {{ $product['qty']}}</strong>
                            </td> 
                            <td class="product-total">
                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">${{ $product['price']}}</span>
                            </td>
                        </tr>

                    
                    <?php } }else{ ?>  
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr class="cart-subtotal">
                            <th>Subtotal</th>
                            <td><span class="amount">${{ number_format( $carttotal ,2)}}</span></td>
                        </tr>
                        <tr class="order-total">
                            <th>Total</th>
                            <td><strong class="amount">${{ number_format( $carttotal ,2)}}</strong> </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!--End Order Box-->
            
            <!--Payment Box-->
            <div class="payment-box">
                <div class="upper-box">
                    <!--Payment Options-->
                    <div class="payment-options">
                        <ul>
                            <!-- <li>
                                <div class="radio-option">
                                    <input type="radio" name="payment-group" id="payment-2" checked>
                                    <label for="payment-2"><strong>Direct Bank Transfer</strong><span class="small-text">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</span></label>
                                </div>
                            </li>
                            <li>
                                <div class="radio-option">
                                    <input type="radio" name="payment-group" id="payment-1">
                                    <label for="payment-1"><strong>Check Payments</strong><span class="small-text">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</span></label>
                                </div>
                            </li> -->
                            
                            <li>
                                <div class="radio-option">
                                    <input type="radio" name="payment_mode" value="Cash On Delivery" id="payment-3" checked>
                                    <label for="payment-3"><strong>Cash on Delivery</strong><span class="small-text">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</span></label>
                                </div>
                            </li>
                        </ul>
                        <div class="text">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">privacy policy.</a></div>
                    </div>
                </div>
                <div class="lower-box">
                    <button type="submit" class="theme-btn"><span class="btn-title">Place Order</span></button>
                </div>
            </div>
            <!--End Payment Box-->
        </div>

        </form>
    </section>
    <!--End CheckOut Page-->
@endsection