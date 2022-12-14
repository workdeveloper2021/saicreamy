<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html">
    <svg viewBox="0 0 500 500">
        <path d="M488.5,274.5L488.5,274.5l1.8-0.5l-2,0.5c-2.4-8.7-4.5-16.9-4.5-24.5c0-8,2.3-16.5,4.7-25.5
        c3.5-13,7.1-26.5,3.7-39.5c-3.6-13.2-13.5-23.1-23.1-32.7c-6.5-6.5-12.6-12.6-16.6-19.4c-3.9-6.8-6.1-15.2-8.5-24.1
        c-3.5-13.1-7.1-26.7-16.7-36.3c-9.5-9.5-22.9-13.1-35.9-16.6c-9-2.4-17.5-4.6-24.4-8.7c-6.5-3.8-12.5-9.8-18.9-16.2
        c-9.7-9.8-19.6-19.8-33.2-23.4c-13.5-3.7-27.3,0.1-40.4,3.7c-8.7,2.4-16.9,4.6-24.5,4.6c-8,0-16.5-2.3-25.5-4.7
        c-9.3-2.5-18.8-5-28.1-5c-3.8,0-7.6,0.4-11.3,1.4C172,11.1,162,21.1,152.4,30.7c-6.5,6.5-12.6,12.6-19.4,16.6
        c-6.8,3.9-15.2,6.1-24.1,8.5c-13.1,3.5-26.7,7.1-36.3,16.7c-9.5,9.5-13.1,23-16.6,36c-2.4,9-4.6,17.5-8.7,24.4
        c-3.8,6.5-9.8,12.5-16.2,18.9c-9.8,9.7-19.7,19.6-23.4,33.2c-3.7,13.5,0.1,27.3,3.7,40.5c2.4,8.7,4.6,16.9,4.6,24.5
        c0,8-2.3,16.5-4.6,25.5c-3.5,13-7.1,26.6-3.7,39.5c3.6,13.2,13.5,23.1,23.1,32.7c6.5,6.5,12.6,12.6,16.6,19.4
        c3.9,6.8,6.1,15.1,8.5,24c3.5,13.1,7.1,26.8,16.7,36.4c9.5,9.5,23,13.1,35.9,16.6c9,2.4,17.5,4.6,24.4,8.7
        c6.5,3.8,12.5,9.8,18.9,16.2c9.7,9.8,19.6,19.8,33.2,23.5c3.8,1,7.6,1.5,11.8,1.5c9.6,0,19.3-2.7,28.5-5.1c8.8-2.4,17-4.6,24.5-4.6 c8,0,16.5,2.3,25.5,4.6c13,3.6,26.6,7.1,39.5,3.7c13.2-3.6,23.1-13.5,32.7-23.1c6.5-6.5,12.6-12.6,19.4-16.6 c6.7-3.9,15.1-6.1,24-8.5c13.1-3.5,26.8-7.1,36.4-16.8c9.5-9.5,13.1-23,16.6-36c2.4-9,4.6-17.5,8.7-24.4c3.8-6.5,9.8-12.5,16.2-18.9 c9.8-9.7,19.9-19.7,23.6-33.3C495.7,301.4,494.4,287.7,488.5,274.5z"></path>
    </svg>
    <span class="fa fa-angle-up"></span>
</div>

<script src="{{ url('/') }}/js/jquery.js"></script> 
<script src="{{ url('/') }}/js/popper.min.js"></script>
<script src="{{ url('/') }}/js/bootstrap.min.js"></script>
<script src="{{ url('/') }}/js/jquery-ui.min.js"></script> 
<!--Revolution Slider-->
<script src="{{ url('/') }}/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="{{ url('/') }}/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="{{ url('/') }}/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="{{ url('/') }}/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="{{ url('/') }}/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="{{ url('/') }}/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="{{ url('/') }}/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="{{ url('/') }}/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="{{ url('/') }}/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="{{ url('/') }}/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="{{ url('/') }}/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="{{ url('/') }}/js/main-slider-script.js"></script>
<!--Revolution Slider-->
<script src="{{ url('/') }}/js/jquery.fancybox.js"></script>
<script src="{{ url('/') }}/js/owl.js"></script>
<script src="{{ url('/') }}/js/wow.js"></script>
<script src="{{ url('/') }}/js/appear.js"></script>
<script src="{{ url('/') }}/js/select2.min.js"></script>
<script src="{{ url('/') }}/js/sticky_sidebar.min.js"></script>
<script src="{{ url('/') }}/js/script.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

<script>
  @if(Session::has('success'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.success("{{ session('success') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.error("{{ session('error') }}");
  @endif

</script>
<script type="text/javascript">
    $(document).on('click','.cart-item',function(e){
        e.preventDefault();
        var product_id = $(this).attr('product_id');
        var submit = $(this).attr('submit');
        var qty = $('#qty'+product_id).val();
        $.ajax({
            url:"{{ route('cart.store')}}",
            type:'get',
            data:{product_id:product_id,qty:qty,submit:submit},
            success:function(res){
               if(res == 'cart'){
                toastr.options =
                  {
                    "closeButton" : true,
                    "progressBar" : true
                  }
                 toastr.success("Add To Cart Successfully");
               }
                getcart();
            }
        })
       // getcart();
    })
    $(document).on('click','.remove-to-cart',function(e){
        e.preventDefault();
        var id = $(this).attr('id');
         $.ajax({
            url:"{{ route('deletecart') }}",
            type:'get',
            data:{id:id},
            success:function(res){
               getcart();
            }
        })
       
    })

    function getcart(){
         $.ajax({
            url:"{{ route('getcart') }}",
            type:'get',
            success:function(res){
               $('#cartshow').html(res);
            }
        })
         getcart2();
    }


     function getcart2(){
         $.ajax({
            url:"{{ route('getcart2') }}",
            type:'get',
            success:function(res){
               $('#cartshow2').html(res);
            }
        })
    }
</script>