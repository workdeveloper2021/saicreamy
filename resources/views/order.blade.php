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
    <section class="page-title" style="background-image:url(<?= url('/') ?>/images/background/34.jpg)">
        <div class="auto-container">
            <h1>My Orders</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{url('/')}}">home</a></li>
                <li>My Orders</li>
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
    <!--End Cart Section-->
@endsection