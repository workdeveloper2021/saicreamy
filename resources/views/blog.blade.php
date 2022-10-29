@extends('layouts.main')
 <!--Banner Start-->
@section('content');
 <!--Page Title-->
    <section class="page-title" style="background-image:url(<?= url('/') ?>/images/background/34.jpg)">
        <div class="auto-container">
            <h1>Blog</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{url('/')}}">home</a></li>
                <li>Blog</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Blog Showcase -->
    <section class="blog-section blog-three-column">
        <div class="container-fluid">
            <div class="row">
            @if($blog)
            @foreach($blog as $key => $value)    
                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-column">
                            <div class="inner-column">
                                <figure class="image"><img src="{{url('/')}}/{{ $value->image }}" alt=""></figure>
                                <div class="date">{{ date('d',strtotime($value->date)) }} <span>{{ date('M',strtotime($value->date)) }}</span></div>
                            </div>
                        </div>
                        <div class="content-column">
                            <div class="inner-column">
                                <h3><a href="{{ url('/blog-single')}}/{{ $value->id }}">{{ $value->title }}</a></h3>
                                <ul class="post-info">
                                    <li><span class="icon fa fa-heart"></span>{{ $value->no_of_like }} Likes</li>
                                    <li><span class="icon fa fa-bookmark"></span>{{ $value->tags }}</li>
                                </ul>
                                <div class="text"><?= substr($value->description, 0,100); ?>...</div>
                                <div class="devider"><img src="images/icons/icon-devider-gray.png" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
            </div>
        </div>
    </section>
    <!-- End Blog Showcase -->
@endsection