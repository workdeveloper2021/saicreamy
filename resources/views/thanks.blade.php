@extends('layouts.main')
 <!--Banner Start-->
@section('content');

    <!--Page Title-->
    <section class="page-title" style="background-image:url(<?= url('/') ?>/images/background/34.jpg)">
        <div class="auto-container">
            <h1>My Order</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{url('/')}}">home</a></li>
                <li>My Order</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- About Section Two -->
    <section class="about-section-two alternate" style="background-image: url(<?= url('/') ?>/images/background/36.jpg);">
        <div class="auto-container">
            <div class="sec-title text-center">
                <div class="divider"><img src="images/icons/divider_1.png" alt=""></div>
                <h2>Thanks</h2>
            </div>
            <div class="content-box">
                <span class="devider_icon_one"></span>
                <p>Thank You For Your Purchase. Your Oder Place Successfully!</p>
            </div>
            <div class="btn-box text-center">
                <a href="{{url('order')}}>" class="theme-btn btn-style-two regular"><span></span>Go To Products<span></span></a>
            </div>
        </div>
    </section>
    <!--End About Section -->

@endsection