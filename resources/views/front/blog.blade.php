<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Start your development with JohnDoe landing page." />
    <meta name="author" content="Devcrud" />
    <title>JohnDoe Landing page | Free Bootstrap 4.3.x landing page</title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css" />
    <!-- Bootstrap + JohnDoe main styles -->
    <link rel="stylesheet" href="assets/css/johndoe.css" />
</head>

@include('front.layouts.header')

<section class="section" id="blog">
    <div class="container">
        <h2 class="mb-5">Latest <span class="text-danger">News</span></h2>
        <div class="row">
            @foreach($blog as $blogs)
            <div class="blog-card">
                <div class="img-holder">
                    <img src="{{ asset('blog_images/' . $blogs->image) }}" alt="{{ $blogs->title }}" />
                </div>
                <div class="content-holder">
                    <h6 class="title">{{ $blogs->title }}</h6>

                    <p class="post-details">
                        <a href="#">By: Admin</a>
                        <a href="#"><i class="ti-heart text-danger"></i> 234</a>
                        <a href="#"><i class="ti-comment"></i> 123</a>
                    </p>

                    <p style="max-width:800px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        {{ $blogs->short_description }}
                    </p>

                    <p style="max-width:800px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        {{ $blogs->long_description }}
                    </p>

                    <a href="{{ URL::to('blog_single_details/' . encrypt($blogs->blog_id)) }}" class="read-more">
                        Read more <i class="ti-angle-double-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@include('front.layouts.footer')

<script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
<script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>
<script src="assets/vendors/isotope/isotope.pkgd.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>
<script src="assets/js/johndoe.js"></script>

</html>
