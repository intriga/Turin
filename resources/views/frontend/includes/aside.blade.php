<div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <aside class="sidebar">
                            <div class="sidebar-inner">
                                <div class="widget widget-about-me wow fadeInUp">
                                    <div class="widget-content">
                                        <div class="widget-about-me-profile">
                                            <img src="{{ asset('frontend/assets/dist/img/profile.jpg') }}" alt="...">
                                        </div>
                                        <div class="widget-extra-info-holder">
                                            <div class="widget-author-name">
                                                <h3>Anuj Subedi</h3>
                                                <span class="author-profession">Ghost Blogger</span>
                                            </div>
                                            <div class="widget-author-bio">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                            </div>
                                            <div class="widget-author-social">
                                                <ul class="social-links">
                                                    <li><a href="https://facebook.com/"></a></li>
                                                    <li><a href="https://twitter.com/"></a></li>
                                                    <li><a href="https://instagram.com/"></a></li>
                                                    <li><a href="https://youtube.com/"></a></li>
                                                    <li><a href="https://snapchat.com/"></a></li>
                                                </ul>
                                            </div>
                                            <div class="widget-author-signature">
                                                <img src="{{ asset('frontend/assets/dist/img/post/man/signature-one.jpg') }}" alt="...">
                                            </div>
                                        </div>
                                        <!-- // widget-extra-info-holder -->
                                    </div>
                                    <!-- // widget-content -->
                                </div>
                                <!-- // widget -->
                            

                                <div class="widget widget-recent-posts wow fadeInUp">
                                    <div class="widget-content">
                                        <div class="widget-title">
                                            <h2>Recent posts</h2>
                                        </div>
                                        <div class="widget-extra-info-holder">
                                            <div class="widget-recent-posts">
                                                <div class="widget-rpag-gallery-container">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <img src="{{ asset('frontend/assets/dist/img/post-five.jpg') }}" alt="...">
                                                            <div class="mask"></div>
                                                            <div class="slide-content">
                                                                <div class="post-title">
                                                                    <h5><a href="#">That Evening At Bali Beach Was Wounderful Then Any Other Mornings</a></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="{{ asset('frontend/assets/dist/img/post-six.jpg') }}" alt="...">
                                                            <div class="mask"></div>
                                                            <div class="slide-content ">
                                                                <div class="post-title">
                                                                    <h5><a href="#">That Evening At Bali Beach Was Wounderful Then Any Other Mornings</a></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="{{ asset('frontend/assets/dist/img/post-seven.jpg') }}" alt="...">
                                                            <div class="mask"></div>
                                                            <div class="slide-content ">
                                                                <div class="post-title">
                                                                    <h5><a href="#">That Evening At Bali Beach Was Wounderful Then Any Other Mornings</a></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="{{ asset('frontend/assets/dist/img/post-four.jpg') }}" alt="...">
                                                            <div class="mask"></div>
                                                            <div class="slide-content ">
                                                                <div class="post-title">
                                                                    <h5><a href="#">That Evening At Bali Beach Was Wounderful Then Any Other Mornings</a></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="{{ asset('frontend/assets/dist/img/post-three.jpg') }}" alt="...">
                                                            <div class="mask"></div>
                                                            <div class="slide-content">
                                                                <div class="post-title">
                                                                    <h5><a href="#">That Evening At Bali Beach Was Wounderful Then Any Other Mornings</a></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-pagination"></div>
                                                </div>
                                                <!-- // widget-rpag-gallery-container -->
                                            </div>
                                            <!--// widget-recent-posts -->
                                        </div>
                                        <!-- // widget-extra-info-holder -->
                                    </div>
                                    <!-- // widget-content -->
                                </div>
                                <!-- // widget widget-newsletter -->


                                
                                <!-- // widget widget-category -->
                                <div class="widget widget-category wow fadeInUp">
                                    <div class="widget-content">
                                        <div class="widget-title">
                                            <h2>Category</h2>
                                        </div>
                                        <div class="widget-extra-info-holder">
                                            <ul class="widget-category-listings">
                                                @foreach ($categories as $category)
                                                    <li><a href="{{ url('/category/'.$category->slug) }}">{{ $category->title }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!-- // widget-extra-info-holder -->
                                    </div>
                                    <!-- // widget-content -->
                                </div>
                                <!-- // widget widget-category -->
                                
                                
                            
                            </div>
                        <!-- // sidebar-inner -->
                        </aside>
                        <!-- // sidebar -->                    
                    </div>