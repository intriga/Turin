<header class="general-header header-layout-two">
    <div class="general-header-inner">
        
        <!-- // header-top-wrapper -->
        <div class="navigation-layout-two-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-8">
                        <div class="site-info">
                            <!-- <a href="{{ url('/') }}" rel="noopener noreferrer">
                                <h1 class="site-title">Turin</h1>
                            </a>                             -->
                            <h1 class="site-title">Turin</h1>
                        </div>
                        <!-- // site-info -->
                    </div>
                    <!-- // col -->
                    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-4 position_static">
                        <nav class="main-nav layout-two">
                            <div id="main-nav" class="stellarnav">                                
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li><a href="#">About Us</a>
                                    </li>
                                    <li><a href="#">Contact Us</a>
                                    </li>
                                    @if (Route::has('login'))
                                        @auth
                                        <li>
                                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                                        </li>
                                        @endauth
                                    @endif
                                </ul>
                            </div>
                            <!-- .stellar-nav -->
                        </nav>
                    </div>
                    <!-- // col -->
                </div>
                <!-- // row -->
            </div>
            <!-- // container -->
        </div>
        <!-- // navigation-layout-two-wrapper -->
    </div>
    <!-- // general-header-inner -->
</header>