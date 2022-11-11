@extends('layouts.main')
 <!--Banner Start-->
@section('content');
 <style type="text/css">
 nav[role=navigation]{
    text-align: right;
}
.auto-container svg{
    width: 30px;
    /*width: 30px !important;*/
}
.flex.justify-between.flex-1{
    display: none;
}    
 </style>
    <!--Page Title-->
     <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/34.jpg)">
        <div class="auto-container">
            <h1>My Account</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html">home</a></li>
                <li>My Account</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Content Elements -->
    <section class="content-elements" id="page">
        <div class="auto-container">
           
          
            <div class="cws_divider margin-top-30"><img src="images/icons/icon-devider-gray.png" alt=""></div>

            <!-- Sec title -->
            <div class="sec-title text-center margin-top-50">
                <div class="divider"><img src="images/icons/divider_1.png" alt=""></div>
                <h2>My Account</h2>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 margin-bottom-50">
                    <div class="default-tabs tabs-box">
                        <!--Tabs Box-->
                        <ul class="tab-buttons clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab1">Profile</li>
                            <li class="tab-btn" data-tab="#tab2">Orders</li>
                           
                        </ul>

                        <div class="tabs-content">
                            <!--Tab-->
                            <div class="tab active-tab" id="tab1">
                               <p><strong>Name:</strong>    {{ ucfirst(Auth::user()->name) }}</p>
                               <p><strong>Email:</strong>   {{ ucfirst(Auth::user()->email) }}</p>
                               <p><strong>Contact:</strong> {{ ucfirst(Auth::user()->contact) }}</p>
                            </div>

                            <!--Tab-->
                            <div class="tab" id="tab2">
                                 <section class="cart-section">
                                    <div class="auto-container">
                                        <!--Cart Outer-->
                                        <div class="cart-outer">
                                            <div class="table-outer">
                                                @if(\Session::has('success'))
                                                    <div class="alert alert-success">
                                                        <p>{{ \Session::get('success') }}</p>
                                                    </div>
                                                @endif
                                                <table class="cart-table">
                                                    <thead class="cart-header">
                                                        <tr>
                                                            <th>Order No.</th>
                                                            <th>Total Amount</th>
                                                            <th>Status</th>
                                                            <th>Order Date</th>
                                                            <th>Invoice</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                     @if($order)
                                                     @foreach ($order as $key => $value) 
                                                        <tr class="cart-item">
                                                            <td >0000{{ $value->id}}</td>
                                                            <td >₹{{ $value->total}}</td>
                                                            <td class="product-price">{{ $value->status}}</td>
                                                            <td class="product-name">{{date('d-m-Y',strtotime($value->created_at))}}</td>
                                                            <td><a onclick="location.replace('<?= url('/inovice').'/'.$value->id; ?>'),'_top'" href="{{url('/inovice')}}/{{$value->id}}"><img style="width: 13%;" src="{{url('/')}}/images/pdf-icon.png"></a> </td>
                                                             
                                                           
                                                        </tr>
                                                    @endforeach 
                                                    
                                                    @else
                                                      <tr class="cart-item">
                                                            <td colspan="6" class="product-thumbnail">Not Have Any Order</td>
                                                        </tr>
                                                    @endif  
                                                    </tbody>
                                                </table>
                                            </div>

                                              {{ $order->links() }}
                                           
                                        </div>
                                        
                                       
                                    </div>
                                </section>
                            </div>

                            
                        </div>
                    </div>
                </div>

            </div>

           
                    
           
        </div>
    </section>
    <!--End Content Elements -->
@endsection