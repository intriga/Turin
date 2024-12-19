@extends('frontend.layouts.app')

@section('content')
    
    <!-- header 2 -->
    @include('frontend.includes.header-2')
    
    
    <div class="general-single-page-layout single-page-layout-one">
        <!-- header 2 -->
        @include('frontend.includes.breadcrumb')

        <div class="single-wrapper main-post-area-wrapper">
            <!-- // breadcrumb-wrapper -->
            <div class="single-page-wrapper">
                <div class="single-page-inner">
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
                                                        <span><a href="{{ url('/category/'.$post->category->slug) }}">{{ $post->category->title }}</a></span>
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
                                                                <img src="{{ asset('frontend/assets/dist/img/author4242.png') }}" alt="....">
                                                                <span><a href="#">{{ $post->user->name }}</a></span>
                                                            </div>
                                                        </div>
                                                        <!-- // col -->
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="posted-date">
                                                                <span><a href="#">{{ \Carbon\Carbon::parse($post->created_at)->isoFormat('MMM Do YYYY')}}</a></span>
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
        </div>
        <!-- // single-wrapper -->
    </div>



<!-- // footer -->
@include('frontend.includes.footer')


@endsection