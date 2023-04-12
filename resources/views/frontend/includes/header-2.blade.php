<header class="general-header header-layout-one">
    <div class="general-header-inner">
        <!-- // header-top-wrapper -->
        <div class="container">
            <div class="site-info">
                <h1 class="site-title">Turin</h1>
                <!--  <img src="./assets/dist/img/logo.png" alt="logo"> -->
            </div>
            <!-- // site-info -->
        </div>
        <!-- // container -->
        <nav class="main-nav layout-one">
            <div id="main-nav" class="stellarnav light left desktop"><a href="#" class="menu-toggle full"><i class="fa fa-bars"></i> Menu</a>
                <ul><a href="#" class="close-menu full"><i class="fa fa-close"></i> <span>Close</span></a>                        
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li class=""><a href="#">Contact Us</a></li>
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
    <!-- // general-header-inner -->
</header>