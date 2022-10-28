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
                           {!! Form::model($post, ['route' => ['wallpaper.update', $post->id], 'method'=>'PATCH','enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                           <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group m-0">
                                        <label  class="form-label">Title</label>
                                        {!! Form::text('title', null, array('placeholder' => 'Name','class' => 'form-control','required' =>'required')) !!}
                                    </div>
                                </div>
                            </div>   

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group m-0">

                                        <label  class="form-label">Price</label>
                                        {!! Form::text('price', null, array('placeholder' => 'Price','class' => 'form-control','required' =>'required')) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 m-0">
                                <div class="mb-3">
                                     <label  class="form-label">Size</label>
                                     {!! Form::text('size[]', null, array('placeholder' => 'for more add press Tab','id'=>'size','class' => 'form-control','required' =>'required','data-role'=>"tagsinput")) !!}
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="mb-3">
                                    <div class="form-group">
                                        <strong>Image:</strong>
                                        {!! Form::file('image', array('placeholder' => 'image','id' => 'image','class' => 'form-control','accept' =>'image/*')) !!}
                                    </div>
                                </div>
                            </div>  
                             <div class="col-md-4">

                                <div class="mb-3">
                                    <div class="form-group">
                                        <strong>Other Image:</strong>
                                        {!! Form::file('other_img[]', array('placeholder' => 'image','id' => 'image','multiple' =>'multiple','accept' =>'image/*','class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>  
                             <div class="col-md-4">

                                <div class="mb-3">
                                    <div class="form-group">
                                        <strong>Banner Image:</strong>
                                        {!! Form::file('banner', array('placeholder' => 'banner image','id' => 'image','class' => 'form-control','accept' =>'image/*')) !!}
                                    </div>
                                </div>
                            </div>  

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <strong>Video:</strong>
                                        {!! Form::file('video', array('placeholder' => 'image','id' => 'image','class' => 'form-control','accept' =>'image/*')) !!}
                                    </div>
                                </div>
                            </div>    
                            @if($images)
                            @foreach($images as $value)
                            
                            <div class="col-md-2">
                            
                            <img src="{{URL::to('/')}}/{{$value['image']}}" style="width: 50%; height: 50%;">
                            <a href="{{URL::to('/')}}/delete-image/{{$value['id']}}">Delete</a>
                            </div> 
                            @endforeach
                            @endif   
                            <div class="col-md-12 m-0">
                                <div class="mb-3">
                                    <div class="form-group">

                                        <label  class="form-label"> Video Description</label>
                                        {!! Form::textarea('v_description', null, array('placeholder' => 'Video Description','class' => 'form-control','id'=> 'description','required' =>'required','value'=>'')) !!}
                                    </div>
                                    
                                </div>
                            </div>    

                            <div class="col-md-12 m-0">
                                <div class="mb-3">
                                    <div class="form-group">

                                        <label  class="form-label"> Features </label>
                                       
                                        <table class="table table-bordered" id="dynamicAddRemove">
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="ftitle[]" placeholder="Enter subject" class="form-control" />
                                            </td>
                                            <td><textarea type="text" name="fdescription[]" placeholder="Enter subject" class="form-control" ></textarea>
                                            </td>
                                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Subject</button></td>
                                        </tr>
                                    <?php 
                                    if(!empty($post['ftitle'])){
                                        $ftitle = explode('|', $post['ftitle']);
                                        $fdescription = explode('|', $post['fdescription']);
                                        foreach ($ftitle as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><input type="text" name="ftitle[]" placeholder="Enter subject" class="form-control" value="{{ $ftitle[$key] }}" />
                                        </td>
                                        <td><textarea type="text" name="fdescription[]" placeholder="Enter subject" class="form-control" >{{ $fdescription[$key] }}</textarea>
                                        </td>
                                        <td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td>
                                    </tr>
                                    <?php } } ?>
                                    </table>
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
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="ftitle[]" placeholder="Enter subject" class="form-control" /></td><td><textarea type="text" name="fdescription[]" placeholder="Enter subject" class="form-control" ></textarea></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
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