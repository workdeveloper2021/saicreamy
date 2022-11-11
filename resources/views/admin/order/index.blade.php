@extends('admin.layouts.main')
@section('content')
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Orders</h4>


                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Orders</h4>
                                        <p class="card-title-desc"> @if (\Session::has('success'))
                                            <div class="alert alert-success">
                                                <p>{{ \Session::get('success') }}</p>
                                            </div>
                                        @endif
                                   
                                        </p>
        
                                        <table id="exportexample1" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>User Name</th>
                                                <th>User Email</th>
                                                <th>Total Amount</th>
                                                <th>Order Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
<div id="exampleModal" class="modal fade bs-example-modal-center" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                <form method="post" action="{{route('orderstatus')}}">
                @csrf
                <div class="col-lg-6">
                    <div>
                        <label class="form-label">Status</label>
                        <select class="form-control" id="order_s" name="status" required>
                            <option value="">Select Status</option>
                            <option value="pending">pending</option>
                            <option value="in progress">in progress</option>
                            <option value="complete">complete</option>
                        </select>
                        <input type="hidden" name="order_id" id="order_id">
                    </div>
                    <div><br>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

@endsection


@section('script')
<script src="{{ URL::to('/admin') }}/assets/libs/jquery/jquery.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/node-waves/waves.min.js"></script>

<!-- Required datatable js -->
<script src="{{ URL::to('/admin') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{ URL::to('/admin') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/jszip/jszip.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="{{ URL::to('/admin') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="{{ URL::to('/admin') }}/assets/js/pages/datatables.init.js"></script>    

<script src="{{ URL::to('/admin') }}/assets/js/app.js"></script>

 <script>
    var table = '';
    $(document).ready(function () {

        table = $('#exportexample1').DataTable({
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('order-list') }}",
                "type": "get",
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'username', name: 'username'},
                {data: 'useremail', name: 'useremail'},
                {data: 'total', name: 'total'},
                {data: 'created_at', name: 'created_at'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "fnDrawCallback": function () {
            }
        });
    });


</script>
<script type="text/javascript">
    $(document).on('click','.changestatus',function(){
        var order_id = $(this).attr('id');
        var status = $(this).attr('status');
        $('#exampleModal').modal('show');
        $('#order_s').val(status);
        $('#order_id').val(order_id);
    })
</script>
@endsection
