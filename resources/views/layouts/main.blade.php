<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.cwsthemes.com/bellaria/index.html by HTTrack Website Copier/3.x [XR&CO'2010], Sat, 01 Oct 2022 05:28:01 GMT -->
<head>
<meta charset="utf-8">
<title>Bellaria - a Delicious Cakes and Bakery HTML Template | Home Cake</title>

@include('layouts.head')

</head>

<body>

<div class="page-wrapper">
   
   @include('layouts.header')
    
   @yield('content')
    
    <!-- Main Footer -->
     
   @include('layouts.footer')
    <!-- End Footer -->

</div><!-- End Page Wrapper -->


@include('layouts.script')
@yield('script')

</body>

<!-- Mirrored from html.cwsthemes.com/bellaria/index.html by HTTrack Website Copier/3.x [XR&CO'2010], Sat, 01 Oct 2022 05:30:54 GMT -->
</html>