@extends('admin.layouts.main')
@section('content')
<style type="text/css">
    .bootstrap-tagsinput{
        width: 100%!important;
    }
    .bootstrap-tagsinput .tag{
        background-color: #556ee6;
        padding: 2px 7px;

    }
</style>
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
<link rel="stylesheet" href="{{ URL::to('/admin') }}/assets/bootstrap-tagsinput.css">
 <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Create</h4>


                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                       <div class="container-fluid">
                            <div class="container">
                              <!-- Title -->
                              <div class="d-flex justify-content-between align-items-center py-3">
                                <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order 0000{{ $order->id }}</h2>
                              </div>

                              <!-- Main content -->
                              <div class="row">
                                <div class="col-lg-12">
                                  <!-- Details -->
                                  <div class="card mb-4">
                                    <div class="card-body">
                                      <div class="mb-3 d-flex justify-content-between">
                                        <div>
                                          <span class="me-3">{{ date('d-m-Y',strtotime($order->created_at)) }}</span>
                                          <span class="me-3">Order No. 0000{{ $order->id }}</span>
                                          <!-- <span class="me-3">Visa -1234</span> -->
                                          <!-- <span class="badge rounded-pill bg-info">SHIPPING</span> -->
                                        </div>
                                        <div class="d-flex">
                                          <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i class="bi bi-download"></i> <span class="text">Invoice</span></button>
                                          <div class="dropdown">
                                            <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                                              <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                              <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                                              <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i> Print</a></li>
                                            </ul>
                                          </div>
                                        </div>
                                      </div>
                                      <table class="table table-borderless">
                                        <tbody>
                                        @php
                                        $carttotal = 0;
                                        $order_products = DB::table('order_products')->where('id',$order->id)->get();
                                        @endphp
                                        @if($order_products)
                                        @foreach ($order_products as $key => $value)
                                         
                                        @php
                                        $carttotal += $value->price;
                                        $pro = DB::table('products')->where('id',$value->product_id)->first();
                                        $cat = DB::table('categories')->where('id',$pro->category_id)->first();
                                        @endphp
                                          <tr>
                                            <td>
                                              <div class="d-flex mb-2">
                                                <div class="flex-shrink-0">
                                                  <img src="{{ url('/') }}/{{$pro->image }}" alt="" width="35" class="img-fluid">
                                                </div>
                                                <div class="flex-lg-grow-1 ms-3">
                                                  <h6 class="small mb-0"><a href="#" class="text-reset">{{$pro->title }}</a></h6>
                                                  <span class="small">Category: {{ $cat->name}}</span>
                                                </div>
                                              </div>
                                            </td>
                                            <td>1</td>
                                            <td class="text-end">${{$pro->price }}</td>
                                          </tr>
                                          @endforeach
                                          @endif
                                        </tbody>
                                        <tfoot>
                                          <tr>
                                            <td colspan="2">Subtotal</td>
                                            <td class="text-end">${{ number_format($carttotal,2) }}</td>
                                          </tr>
                                          <!-- <tr>
                                            <td colspan="2">Shipping</td>
                                            <td class="text-end">$0</td>
                                          </tr> -->
                                         <!--  <tr>
                                            <td colspan="2">Discount (Code: NEWYEAR)</td>
                                            <td class="text-danger text-end">-$10.00</td>
                                          </tr> -->
                                          <tr class="fw-bold">
                                            <td colspan="2">TOTAL</td>
                                            <td class="text-end">${{ number_format($carttotal,2) }}</td>
                                          </tr>
                                        </tfoot>
                                      </table>
                                    </div>
                                  </div>
                                  <!-- Payment -->
                                  <div class="card mb-4">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-lg-6">
                                          <h3 class="h6">Payment Method</h3>
                                          <p>{{$order->payment_mode}}</p>
                                        </div>
                                        <div class="col-lg-6">
                                          <h3 class="h6">Billing address</h3>
                                          <address>
                                            <strong>{{$order->s_fname}} {{$order->s_lname}}</strong><br>
                                           {{$order->address}} {{$order->address2}}<br>
                                            {{$order->city}}, {{$order->state}}, {{$order->country}}, {{$order->pincode}}<br>
                                            <abbr title="Phone">P:</abbr> {{$order->contact}} <abbr title="Phone">E:</abbr> {{$order->email}}
                                          </address>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                              </div>
                    </div>
                </div>
                <!-- end card -->
            </div> <!-- end col -->

           
        </div>
      

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection
@section('script')
<script src="{{ URL::to('/admin') }}/assets/bootstrap-tagsinput.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/bootstrap-tagsinput/bootstrap-tagsinput-angular.min.js"></script>
<script type="text/javascript">
    
$("#size").tagsinput('items');
</script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="ftitle[' + i +
            ']" placeholder="Enter subject" class="form-control" /></td><td><textarea type="text" name="fdescription[' + i +
            ']" placeholder="Enter subject" class="form-control" ></textarea></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
 <script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'image' );
</script>
@endsection