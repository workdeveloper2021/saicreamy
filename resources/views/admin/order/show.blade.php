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
            <div class="col-xl-6">
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
                                        
                                        $pro = DB::table('products')->where('id',$order_id)->first();
                                        @endphp
                                        @if($order->order_products)
                                        @foreach ($order->order_products as $key => $value)

                                        @php
                                         print_r($order->order_products); die;
                                        $pro = DB::table('products')->where('id',$value['product_id'])->first();
                                        @endphp
                                          <tr>
                                            <td>
                                              <div class="d-flex mb-2">
                                                <div class="flex-shrink-0">
                                                  <img src="https://via.placeholder.com/280x280/87CEFA/000000" alt="" width="35" class="img-fluid">
                                                </div>
                                                <div class="flex-lg-grow-1 ms-3">
                                                  <h6 class="small mb-0"><a href="#" class="text-reset">{{$pro['title'] }}</a></h6>
                                                  <span class="small">Color: Black</span>
                                                </div>
                                              </div>
                                            </td>
                                            <td>1</td>
                                            <td class="text-end">$79.99</td>
                                          </tr>
                                          @endforeach
                                          @endif
                                        </tbody>
                                        <tfoot>
                                          <tr>
                                            <td colspan="2">Subtotal</td>
                                            <td class="text-end">$159,98</td>
                                          </tr>
                                          <tr>
                                            <td colspan="2">Shipping</td>
                                            <td class="text-end">$20.00</td>
                                          </tr>
                                          <tr>
                                            <td colspan="2">Discount (Code: NEWYEAR)</td>
                                            <td class="text-danger text-end">-$10.00</td>
                                          </tr>
                                          <tr class="fw-bold">
                                            <td colspan="2">TOTAL</td>
                                            <td class="text-end">$169,98</td>
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
                                          <p>Visa -1234 <br>
                                          Total: $169,98 <span class="badge bg-success rounded-pill">PAID</span></p>
                                        </div>
                                        <div class="col-lg-6">
                                          <h3 class="h6">Billing address</h3>
                                          <address>
                                            <strong>John Doe</strong><br>
                                            1355 Market St, Suite 900<br>
                                            San Francisco, CA 94103<br>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
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