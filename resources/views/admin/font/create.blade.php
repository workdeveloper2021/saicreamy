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
                       
                         @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                         {!! Form::open(array('route' => 'font.store', 'method'=>'POST','enctype' => 'multipart/form-data')) !!}
                        <div class="row">
                           <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group m-0">
                                        <label  class="form-label">Font Name</label>
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required' =>'required')) !!}
                                    </div>
                                </div>
                            </div> 
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group m-0">
                                        <label  class="form-label">Font Price</label>
                                        {!! Form::number('price', null, array('placeholder' => 'Price','class' => 'form-control','required' =>'required')) !!}
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-3 m-0">
                                <div class="mb-3">
                                    <div class="form-group">

                                        <label  class="form-label">Status</label>
                                        {!! Form::select('status', array(1=>'Active',0 => 'Disable'),null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div> 

                              
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                     {!! Form::close() !!}
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
</script>
@endsection