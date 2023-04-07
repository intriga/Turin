<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Optimistic Blog</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,600,700,700i&amp;subset=cyrillic,greek-ext,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Stalemate&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Spectral+SC:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="{{ asset('frontend/assets/dist/css/style.min.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    
    <!-- // header -->
    @include('frontend.includes.header')

    <!-- // banner -->
    @include('frontend.includes.banner')
    
    
<div class="single-wrapper main-post-area-wrapper">
    <div class="single-inner">
        <div class="container">
            <div class="search-page">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                        
                    <div class="main-post-area-holder">
                            <article class="single-page-details-holder wow fadeInUp">
                                <div class="post-image">
                                    <img src="{{ asset($post->image) }}" alt="....">
                                </div>
                                <div class="single-page-other-information-holder">
                                    <div class="posted-category">
                                        <div class="post-meta-category">
                                            <span><a href="#">Lifestyle</a></span>
                                            <span><a href="#">Health</a></span>
                                            <span><a href="#">Art</a></span>
                                        </div>
                                    </div>
                                    <div class="post-title">
                                        <h2>{{ $post->title }}</h2>
                                    </div>
                                    <!-- // post-title -->
                                    <div class="post-extra-meta">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="post-author">
                                                    <img src="assets/dist/img/author4242.png" alt="....">
                                                    <span><a href="#">Sparkle Themes</a></span>
                                                </div>
                                            </div>
                                            <!-- // col -->
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="posted-date">
                                                    <span><a href="#">{{ $post->created_at }}</a></span>
                                                </div>
                                            </div>
                                            <!-- // col -->
                                        </div>
                                        <!-- // row -->
                                    </div>
                                    <!-- // post-extra-meta -->
                                    <div class="post-the-content">
                                        <p>{!! $post->content !!}</p>
                                    </div>
                                    <!-- // post-the-content  -->
                                    <div class="post-share">
                                        <div class="share"></div>
                                    </div>
                                </div>
                                <!-- // single-page-information-holder -->
                            </article>
                            
                            
                        </div>
                        <!-- // main-post-area-holder-->

                    </div>
                    <!-- // col -->

                    <!-- // aside -->
                    @include('frontend.includes.aside')
                    <!-- // col 4 -->
                </div>
                <!-- // row that divides left and right sidebar -->
            </div>
            <!-- // search-page -->
        </div>
        <!-- // container -->
    </div>
    <!-- // single_inner -->
</div>
<!-- // single-wrapper -->

<div id="instafeed" class="instafeed owl-carousel feed-carousel">

</div>

<!-- // footer -->
@include('frontend.includes.footer')

<script src="{{ asset('frontend/assets/dist/js/bundle.min.js') }}"></script>

<script src="{{ asset('frontend/assets/dist/js/scripts.js') }}"></script>

<script>


</script>

</body>




<!-- Mirrored from offshorethemes.com/html/optimistic-blog/demo/index-two.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Feb 2023 17:30:55 GMT -->
</html>