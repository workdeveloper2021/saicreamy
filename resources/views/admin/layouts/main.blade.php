<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/dashboard-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Sep 2022 06:00:52 GMT -->
<head>

<meta charset="utf-8" />
<title>Dashboard | Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="{{ URL::to('/admin') }}/assets/images/favicon.ico">

<!-- Bootstrap Css -->
<link href="{{ URL::to('/admin') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::to('/admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::to('/admin') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark" data-layout-mode="light">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<div id="layout-wrapper">



 @extends('admin.layouts.header')
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

<div data-simplebar class="h-100">


 @include('admin.layouts.sidebar')

</div>
</div>
<!-- Left Sidebar End -->



<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

 @yield('content') 
 @extends('admin.layouts.footer')
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{ URL::to('/admin') }}/assets/libs/jquery/jquery.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ URL::to('/admin') }}/assets/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
<script src="{{ URL::to('/admin') }}/assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- dashboard blog init -->
<script src="{{ URL::to('/admin') }}/assets/js/pages/dashboard-blog.init.js"></script>

<script src="{{ URL::to('/admin') }}/assets/js/app.js"></script>
@yield('script')
</body>

</html>
