@extends('admin.layouts.main')
@section('content')
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Blogs</h4>


                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Blogs</h4>
                                        <p class="card-title-desc"> @if (\Session::has('success'))
                                            <div class="alert alert-success">
                                                <p>{{ \Session::get('success') }}</p>
                                            </div>
                                        @endif
                                        <span class="float-right">
                                            <a class="btn btn-primary" href="{{ route('blog.create') }}">Create</a>
                                        </span>
                                        </p>
        
                                        <table id="exportexample1" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Write By</th>
                                                <th>Tags</th>
                                                <th>Likes</th>
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
                "url": "{{ route('blog-list') }}",
                "type": "get",
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'image', name: 'image'},
                {data: 'title', name: 'title'},
                {data: 'writeby', name: 'writeby'},
                {data: 'tags', name: 'tags'},
                {data: 'no_of_like', name: 'no_of_like'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "fnDrawCallback": function () {
            }
        });
    });


</script>
@endsection
