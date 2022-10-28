@extends('layouts.main')
 <!--Banner Start-->
@section('content');
  <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/34.jpg)">
        <div class="auto-container">
            <h1>Blog Single 5</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html">home</a></li>
                <li>Blog Single 5</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

        <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Content Side-->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                    <div class="blog-single">
                        <!-- News Block -->
                        <div class="news-block">
                            <div class="inner-box">
                                <div class="image-column">
                                    <div class="inner-column">
                                        <div class="quote-box">
                                            <div class="date">04 <span>Dec</span></div>
                                            <h3 class="quote_text">Donec vestibulum umn efficitur ullamcorper iaculis.</h3>
                                            <h6 class="author_name">Eva</h6>
                                            <div class="author_status">- Writer</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-column">
                                    <div class="inner-column">
                                        <ul class="post-info">
                                            <li><span class="icon fa fa-user"></span> by admin</li>
                                            <li><span class="icon fa fa-heart"></span> 5 Likes</li>
                                            <li><span class="icon fa fa-bookmark"></span> <a href="#">Cake Pops</a>, <a href="#">Caramels</a>, <a href="#">Toffees</a></li>
                                        </ul>
                                        <p>Et enim, magna felis vestibulum, ornare massa elit, in nam dignissim nam morbi odio nullam. Rhoncus vitae ligula, mauris nascetur eleifend nonummy. Mauris mattis suscipit, fermentum sed proin vestibulum in diam interdum. Dignissim lobortis fermentum in dui. Elit neque, tincidunt vestibulum, orci urna et fermentum aliquam volutpat. Id sociosqu elit vitae pellentesque sem, id velit vel ante dui proin hymenaeos. Velit ac neque orci, adipiscing taciti turpis euismod augue diam.</p>
                                        <blockquote>Quisque volutpat vel sapien id luctus. Donec vestibulum efficitur turpis ullamcorper iaculis.</blockquote>
                                        <p>Mauris sit amet elit sit amet odio iaculis sodales. Aliquam imperdiet dolor vel purus scelerisque, et condimentum nunc tempus. Nunc laoreet nulla sit amet ante vehicula consectetur. Nam cursus ut augue sed iaculis. Sed auctor dui a massa dictum cursus. Nullam eget enim quis velit efficitur malesuada pellentesque nec lacus. Maecenas sagittis porttitor convallis.</p>
                                    </div>
                                </div>
                                <div class="two-column row">
                                    <div class="image-column col-lg-6 col-md-12">
                                        <figure class="image"><img src="images/resource/post-img-2.jpg" alt=""></figure>
                                    </div>
                                    <div class="content-column col-lg-6 col-md-12">
                                        <ul class="list-style-one"> 
                                            <li>Donec ligula leo, ornare at posuere.</li>
                                            <li>Donec eu sollicitudin quam, vitae.</li>
                                            <li>Phasellus ac nulla lacinia, sodales.</li>
                                            <li>Vestibulum tincidunt felis non lectus.</li>
                                            <li>Cras sem libero, porta vestibulum in.</li>
                                            <li>Nam accumsan nulla viverra tincidunt.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="devider"><img src="images/icons/icon-devider-gray.png" alt=""></div>
                            </div>
                        </div>

                        <!--Comment Form-->
                        <div class="comment-form">
                            <div class="group-title">
                                <h3>Leave a Reply</h3>
                            </div>
                            <div class="form-outer">
                                <p>Your email address will not be published. Required fields are marked *</p>
                                <form method="post" action="http://html.cwsthemes.com/bellaria/blog-showcase.html"> 
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <div class="field-label">Comment</div>
                                            <textarea name="message" placeholder=""></textarea>
                                        </div>

                                        <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                                            <div class="field-label">Name *</div>
                                            <input type="text" name="username" placeholder="" required="">
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                                            <div class="field-label">Email *</div>
                                            <input type="email" name="email" placeholder="" required="">
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                                            <div class="field-label">Website</div>
                                            <input type="url" name="website" placeholder="" required="">
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
                                            <input type="submit" name="submit" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Sidebar Side-->
                <div class="sidebar-side sticky-container col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar theiaStickySidebar">
                        <div class="sticky-sidebar">
                            <!-- Search -->
                            <div class="sidebar-widget search-widget">
                                <form method="post" action="http://html.cwsthemes.com/bellaria/contact.html">
                                    <div class="form-group">
                                        <input type="search" name="search-field" value="" placeholder="Search…" required>
                                        <button type="submit"><span class="icon fa fa-search"></span></button>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Gallery Widget -->
                            <div class="sidebar-widget gallery-widget">
                                <div class="widget-content">
                                    <h3 class="widget-title">Gallery</h3>
                                    <div class="instagram-gallery">
                                        <div class="outer-box clearfix">
                                            <figure class="image"><a href="images/gallery/2-1.jpg" class="lightbox-image" data-fancybox='instagram'><img src="images/resource/gw-2.jpg" alt=""></a></figure>

                                            <figure class="image"><a href="images/gallery/2-2.jpg" class="lightbox-image" data-fancybox='instagram'><img src="images/resource/gw-1.jpg" alt=""></a></figure>

                                            <figure class="image"><a href="images/gallery/2-3.jpg" class="lightbox-image" data-fancybox='instagram'><img src="images/resource/gw-3.jpg" alt=""></a></figure>

                                            <figure class="image"><a href="images/gallery/2-4.jpg" class="lightbox-image" data-fancybox='instagram'><img src="images/resource/gw-4.jpg" alt=""></a></figure>

                                            <figure class="image"><a href="images/gallery/2-5.jpg" class="lightbox-image" data-fancybox='instagram'><img src="images/resource/gw-5.jpg" alt=""></a></figure>

                                            <figure class="image"><a href="images/gallery/2-6.jpg" class="lightbox-image" data-fancybox='instagram'><img src="images/resource/gw-6.jpg" alt=""></a></figure>

                                            <figure class="image"><a href="images/gallery/2-7.jpg" class="lightbox-image" data-fancybox='instagram'><img src="images/resource/gw-7.jpg" alt=""></a></figure>

                                            <figure class="image"><a href="images/gallery/2-8.jpg" class="lightbox-image" data-fancybox='instagram'><img src="images/resource/gw-8.jpg" alt=""></a></figure>

                                            <figure class="image"><a href="images/gallery/2-1.jpg" class="lightbox-image" data-fancybox='instagram'><img src="images/resource/gw-9.jpg" alt=""></a></figure>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Category  Widget -->
                            <div class="sidebar-widget category-widget">
                                <div class="widget-content">
                                    <h3 class="widget-title">Categories</h3>
                                    <ul class="categories-list">
                                        <li><a href="#">Cake</a></li>
                                        <li><a href="#">Coffee Cake</a></li>
                                        <li><a href="#">Ice Cream</a></li>
                                        <li><a href="#">Lollipop</a></li>
                                        <li><a href="#">Macaroons</a></li>
                                        <li><a href="#">Uncategorized</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!--End Sidebar Page Container-->
@endsection