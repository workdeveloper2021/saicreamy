@extends('layouts.main')
 <!--Banner Start-->
@section('content');
<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/34.jpg)">
        <div class="auto-container">
            <h1>Checkout</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{url('/')}}">home</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

     <!--CheckOut Page-->
    <section class="checkout-page">
         <form method="post" id="orderplace" action="{{ route('orderplace') }}">
                @csrf 
        <div class="auto-container">
            <!--Default Links-->
           <!--  <div class="default-links">
                <div class="message-box with-icon info"><div class="icon-box"><span class="icon fa fa-info"></span></div> Have a coupon? <a href="#">Click here to enter your code</a></div>
            </div> -->
            
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
                                    <div class="field-label">Full Name <sup>*</sup></div>
                                    <input type="text" name="s_fname" id="s_fname" class="form-control form-control-lg" placeholder="First name" <?php if (Auth::user()): ?> value="{{Auth::user()->name}}" <?php endif ?> required>
                                </div>
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Company name (optional)</div>
                                     <input type="text" name="s_cumpany" id="s_cumpany" class="form-control form-control-lg" placeholder="Company (optional)">
                                </div>
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Street address <sup>*</sup></div>
                                     <input type="text" name="address" id="address" class="form-control form-control-lg" placeholder="Apartment, suite, etc. (optional)" required>
                                </div>

                                <div class="form-group">
                                      <input type="text" name="address2" id="address2" class="form-control form-control-lg" placeholder="Apartment, suite, etc. (optional)">
                                </div>
                                 <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Country <sup>*</sup></div>
                                    <input type="text" name="country" readonly  placeholder="" required="" value="India" readonly>
                                </div>
                                <div class="form-group">
                                    <div class="field-label">State <sup>*</sup></div>
                                      <select class="form-control-lg"  name="state" id="states" style="width: 100%;" required>
                                            @if($states)
                                            @foreach($states as $value)    
                                                <option <?php if ($value->id==21): ?>selected<?php endif ?>  value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                            @endif    
                                              
                                            </select>
                                </div>
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Town / City <sup>*</sup></div>
                                     <select class="form-control-lg" name="city" id="city" style="width: 100%;" required>
                                                <option value="">Select City</option>
                                                
                                            </select>
                                </div>
                                
                               
                                
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Postcode/ ZIP <sup>*</sup></div>
                                      <input type="text" name="pincode" class="form-control form-control-lg" placeholder="Postcode" required>
                                </div>
                                
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Phone<sup>*</sup></div>
                                    <input type="text" name="contact" <?php if (Auth::user()): ?> value="{{Auth::user()->contact}}" <?php endif ?> id="contact" placeholder="" required>
                                </div>

                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Email Address</div>
                                    <input type="text" name="email" id="email" <?php if (Auth::user()): ?> value="{{Auth::user()->email}}" <?php endif ?> placeholder="">
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
                                    <input type="radio" name="payment_mode" value="cod" id="payment-3" checked>
                                    <label for="payment-3"><strong>Cash on Delivery</strong></label>

                                   
                                </div>

                                 <div class="radio-option">
                                    <input type="radio" name="payment_mode" value="online" id="online-payment" checked>
                                      <label for="payment-3"><strong>Online Payment</strong></label>
                                    <input type="hidden" name="transaction_id" id="razorpay_payment_id">
                                  
                                   <input type="hidden"  id="payableamoutn" value="{{$carttotal}}">
                                   
                                </div>
                            </li>
                        </ul>
                        <div class="text">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">privacy policy.</a></div>
                    </div>
                </div>
                <div class="lower-box">
                    <button type="button" id="buy_now" class="theme-btn"><span class="btn-title">Place Order</span></button>
                </div>
            </div>
            <!--End Payment Box-->
        </div>

        </form>
    </section>
    <!--End CheckOut Page-->
@endsection

@section('script')

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#states').trigger('change');
})
$(document).on('change','#states',function(e){
        e.preventDefault();
        var state_id = $(this).val();
            $.ajax({
                type: "get",
                contentType: 'application/json',
                "url": "{{ route('city-list') }}",
                data:{state_id: state_id},
                success: function (res) {
                    console.log(res);
                    $('#state').html('');
                    if (res) {
                        var states = res;
                        $.each(states, function () {
                            $("#city").append('<option value="' + this.name + '">' + this.name + '</option>');
                        });
                    } else {
                        $("#city").append('<option value="">Select City</option>');
                    }
                    // getCityFn();
                },
                error: function (error) {
                    console.log(error);
                }
            });
    })    
</script>
<script>
var SITEURL = '{{URL::to('')}}';
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).on('click','#buy_now',function(){
// orderplace
    var mod = $('input[name="payment_mode"]:checked').val();
    
    if (mod =='online') {
        var totalAmount = $('#payableamoutn').val();
        var s_fname = $('#s_fname').val();
        var address = $('#address').val();
        var city = $('#city').val();
        var pincode = $('#pincode').val();
        var contact = $('#contact').val();
        var email = $('#email').val();
       if(s_fname == ''){
         toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
         toastr.error("Please Enter Full Name");
       }else if(address == ''){
         toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
         toastr.error("Please Enter Address");   
       }else if(city == ''){
          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
         toastr.error("Please Select City");    
       }else if(pincode == ''){
        toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
         toastr.error("Please Enter Pincode");
       }else if(contact == ''){
         toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
         toastr.error("Please Enter Contact");
       }else if(email == ''){
            
            alert('Please Enter Email'); 
       }else{
            var options = {
            "key": "rzp_test_6mKFfpGT9PzooU",
            "amount": (totalAmount*100), // 2000 paise = INR 20
            "name": "saicreamy",
            "description": "Payment",
            "image":  SITEURL +'/images/logo.png',
            "handler": function (response){
            
               $('#razorpay_payment_id').val(response.razorpay_payment_id);
               $('#orderplace').submit();
            },
            "prefill": {
            "contact": '9988665544',
            "email":   'tutsmake@gmail.com',
            },
            "theme": {
            "color": "#528FF0"
            }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
            e.preventDefault();
       }   
       

    }else if (mod =='cod'){
        $('#orderplace').submit();
    }



}) 

/*document.getElementsClass('buy_plan1').onclick = function(e){
rzp1.open();
e.preventDefault();
}*/
</script>
@endsection