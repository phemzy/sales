<!DOCTYPE html>
<html lang="en" class="no-js">
    <!-- Begin Head -->
    <head>
        <!-- Basic -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>JulyFlashSale - With Crypto2Naira</title>
        <meta name="keywords" content="TBC sales, GRC sale, Buy with TBC, Sell with TBC, Buy with GRC, TBC, GRC" />
        <meta name="description" content="Unbeatable prices at the best flash sale ever!">
        <meta name="author" content="keenthemes.com">

        <!-- Web Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet">

        <!-- Vendor Styles -->
        <link href="{{ URL::to('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('css/animate.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('vendor/themify/themify.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('vendor/scrollbar/scrollbar.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('vendor/swiper/swiper.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('vendor/cubeportfolio/css/cubeportfolio.min.css') }}" rel="stylesheet" type="text/css"/>

        <!-- Theme Styles -->
        <link href="{{ URL::to('css/style.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::to('css/global/global.css') }}" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
        {{-- <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png"> --}}
    </head>
    <!-- End Head -->

    <!-- Body -->
    <body>

        <!--========== HEADER ==========-->
        <header class="navbar-fixed-top s-header js__header-sticky js__header-overlay">
            <!-- Navbar -->
            <div class="s-header__navbar">
                <div class="s-header__container">
                    <div class="s-header__navbar-row">
                        <div class="s-header__navbar-row-col">
                            <!-- Logo -->
                            <div class="s-header__logo">
                                <a href="/" class="s-header__logo-link">
                                    <i class="g-font-size-32--xs ti-shopping-cart-full s-header__logo-img s-header__logo-img-default g-color--white"></i>
                                    <i class="g-font-size-32--xs ti-shopping-cart-full  s-header__logo-img-shrink"></i>
                                </a>
                            </div>
                            <!-- End Logo -->
                        </div>
                        <div class="s-header__navbar-row-col">
                            <!-- Trigger -->
                            <a href="javascript:void(0);" class="s-header__trigger js__trigger">
                                <span class="s-header__trigger-icon"></span>
                                <svg x="0rem" y="0rem" width="3.125rem" height="3.125rem" viewbox="0 0 54 54">
                                    <circle fill="transparent" stroke="#fff" stroke-width="1" cx="27" cy="27" r="25" stroke-dasharray="157 157" stroke-dashoffset="157"></circle>
                                </svg>
                            </a>
                            <!-- End Trigger -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Navbar -->

            <!-- Overlay -->
            <div class="s-header-bg-overlay js__bg-overlay">
                <!-- Nav -->
                <nav class="s-header__nav js__scrollbar">
                    <div class="container-fluid">
                        <!-- Menu List -->                                
                        <ul class="list-unstyled s-header__nav-menu">
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="/">Home</a></li>
                            @if(!Auth::check())
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider -is-active" href="{{ route('register') }}">Register</a></li>
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider -is-active" href="{{ route('login') }}">Login</a></li>
                            @endif
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="">How It Works</a></li>
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="">Visit Store</a></li>
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="https://crypto2naira.com" target="_blank">About Crypto2Naira</a></li>
                            @if(Auth::check())
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider -is-active" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            @endif
                        </ul>
                        <!-- End Menu List -->
                    </div>
                </nav>
                <!-- End Nav -->
                
                <!-- Action -->
                <ul class="list-inline s-header__action s-header__action--lb">
                    <li class="s-header__action-item"><a class="s-header__action-link -is-active" href="#">En</a></li>
                    <li class="s-header__action-item"><a class="s-header__action-link" href="#">Fr</a></li>
                </ul>
                <!-- End Action -->

                <!-- Action -->
                <ul class="list-inline s-header__action s-header__action--rb">
                    <li class="s-header__action-item">
                        <a class="s-header__action-link" href="https://www.behance.net/keenthemes">
                            <i class="g-padding-r-5--xs ti-facebook"></i>
                            <span class="g-display-none--xs g-display-inline-block--sm">Facebook</span>
                        </a>
                    </li>
                    <li class="s-header__action-item">
                        <a class="s-header__action-link" href="https://twitter.com/keenthemes">
                            <i class="g-padding-r-5--xs ti-twitter"></i>
                            <span class="g-display-none--xs g-display-inline-block--sm">Twitter</span>
                        </a>
                    </li>
                    <li class="s-header__action-item">
                        <a class="s-header__action-link" href="https://dribbble.com/keenthemes">
                            <i class="g-padding-r-5--xs ti-dribbble"></i>
                            <span class="g-display-none--xs g-display-inline-block--sm">Dribbble</span>
                        </a>
                    </li>
                </ul>
                <!-- End Action -->
            </div>
            <!-- End Overlay -->
        </header>
        <!--========== END HEADER ==========-->

        <!--========== PAGE CONTENT ==========-->
        
        @yield('content')
        @if(!Auth::check())
        <!-- Contact -->
        <div class="s-promo-block-v7 g-bg-position--center g-bg-color--dark-light" style="background: url('img/1920x1080/05.jpg') no-repeat;">
            <div class="g-container--sm g-padding-y-80--xs g-padding-y-125--xsm">
                <div class="g-text-center--xs g-margin-b-60--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-25--xs">Contact Us</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md g-color--white">Get in Touch</h2>
                </div>
                <form class="center-block g-width-500--sm g-width-550--md">
                    <div class="g-margin-b-30--xs">
                        <input type="text" class="form-control s-form-v3__input" placeholder="* Name">
                    </div>
                    <div class="row g-margin-b-50--xs">
                        <div class="col-sm-6 g-margin-b-30--xs g-margin-b-0--md">
                            <input type="email" class="form-control s-form-v3__input" placeholder="* Email">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control s-form-v3__input" placeholder="* Phone">
                        </div>
                    </div>
                    <div class="g-margin-b-80--xs">
                        <textarea class="form-control s-form-v3__input" rows="5" placeholder="* Your message"></textarea>
                    </div>
                    <div class="g-text-center--xs">
                        <button type="submit" class="text-uppercase s-btn s-btn--md s-btn--white-brd g-radius--50 g-padding-x-70--xs g-margin-b-20--xs">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Contact -->
        @endif
        <!--========== END PAGE CONTENT ==========-->

        <!--========== FOOTER ==========-->
        <footer class="g-bg-color--dark">
            <!-- Copyright -->
            <div class="container g-padding-y-50--xs">
                <div class="row">
                    <div class="col-xs-6 g-text-right--xs">
                        <p class="g-font-size-14--xs g-margin-b-0--xs g-color--white-opacity-light"><a href="http://keenthemes.com/preview/Megakit/">July Flash Sales</a> Powered By: <a href="https://crypto2naira.com">Crypto2Naira</a></p>
                    </div>
                </div>
            </div>
            <!-- End Copyright -->
        </footer>
        <!--========== END FOOTER ==========-->

        <!-- Back To Top -->
        <a href="javascript:void(0);" class="s-back-to-top js__back-to-top"></a>

        <!--========== JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) ==========-->
        <!-- Vendor -->
        <script type="text/javascript" src="{{ URL::to('vendor/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('vendor/jquery.migrate.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('vendor/jquery.smooth-scroll.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('vendor/jquery.back-to-top.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('vendor/scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('vendor/vidbg.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('vendor/swiper/swiper.jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('vendor/cubeportfolio/js/jquery.cubeportfolio.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('vendor/jquery.wow.min.js') }}"></script>

        <!-- General Components and Settings -->
        <script type="text/javascript" src="{{ URL::to('js/global.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('js/components/header-sticky.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('js/components/scrollbar.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('js/components/swiper.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('js/components/portfolio-4-col-slider.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('js/components/wow.min.js') }}"></script>
        <!--========== END JAVASCRIPTS ==========-->

    </body>
    <!-- End Body -->
</html>
