<section class="general-banner banner-layout-two">
        <div class="general-banner-inner">
            <!-- Swiper -->
            <div class="banner-style-two-container">
                <div class="swiper-wrapper">

                    @foreach($postsSlider as $post)
                    <div class="swiper-slide  banner-card">
                        <div class="featured-post-image">
                            <img src="{{ $post->image }}" alt="....">
                            <div class="mask"></div>
                        </div>
                       
                        <div class="featured-content-holder">
                            <div class="featured-content-meta">
                                <a href="#"><span class="category">{{ $post->category ? $post->category->title : 'Uncategorized' }}</span></a>
                            </div>
                            <div class="featured-content-title">
                                <h2><a href="#">{{ $post->title }}</a></h2>
                            </div>
                            <div class="featured-posted-date">
                                <span class="posted-date">{{ $post->created_at }}</span>
                            </div>
                        </div>
                    <!-- // featured-content-holder -->
                    </div>
                    @endforeach

                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
        </div>
        <!-- // general banner inner -->
    </section>