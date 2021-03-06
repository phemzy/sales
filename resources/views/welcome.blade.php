@extends('layouts.main')

@section('content')
<!--========== PROMO BLOCK ==========-->
    <div class="s-promo-block-v1 g-bg-color--primary-to-blueviolet-ltr g-fullheight--md">
        <div class="container g-ver-center--md g-padding-y-100--xs">
            <div class="row g-hor-centered-row--md g-margin-t-30--xs g-margin-t-20--sm">
                <div class="col-lg-6 col-lg-offset-3 col-sm-6 g-hor-centered-row__col g-text-center--xs g-text-left--md g-margin-b-60--xs g-margin-b-0--md">
                    <div class="s-promo-block-v1__square-effect g-margin-b-60--xs">
                        <h1 class="g-font-size-32--xs g-font-size-45--sm g-font-size-50--lg g-color--white text-center">July Cryptocurrency<br>Flash Sales</h1>
                        <p class="g-font-size-20--xs g-font-size-26--md g-color--white g-margin-b-0--xs">Over 3,000 items for sale | For only 750 registered users | Up to 100% off with Cryptocurrencies | Visit store and preorder</p>
                    </div>
                    <span class="g-display-block--xs g-display-inline-block--lg g-margin-b-10--xs g-margin-b-10--lg">
                        <a href="{{ route('store.index') }}" class="s-btn s-btn--xs s-btn--white-brd g-padding-x-30--xs g-radius--50">
                            <span class="s-btn__element--left">
                                <i class="g-font-size-32--xs ti-shopping-cart"></i>
                            </span>
                            <span class="s-btn__element--right g-padding-x-10--xs">
                                <span class="g-display-block--xs g-font-size-11--xs">Go to the</span>
                                <span class="g-font-size-16--xs">Store</span>
                            </span>
                        </a>
                    </span>
                    @if(!Auth::check())
                    <span class="g-padding-x-0--xs g-padding-x-10--lg">
                        <a href="#register" class="s-btn s-btn--xs s-btn--white-brd g-padding-x-30--xs g-radius--50">
                            <span class="s-btn__element--left">
                                <i class="g-font-size-32--xs ti-user"></i>
                            </span>
                            <span class="s-btn__element--right g-padding-x-10--xs">
                                <span class="g-display-block--xs g-font-size-11--xs">Or quickly</span>
                                <span class="g-font-size-16--xs">Register</span>
                            </span>
                        </a>
                    </span>
                    @else
                    <span class="g-padding-x-0--xs g-padding-x-10--lg">
                        <a href="home" class="s-btn s-btn--xs s-btn--white-brd g-padding-x-30--xs g-radius--50">
                            <span class="s-btn__element--left">
                                <i class="g-font-size-32--xs ti-user"></i>
                            </span>
                            <span class="s-btn__element--right g-padding-x-10--xs">
                                <span class="g-display-block--xs g-font-size-11--xs">Or visit your</span>
                                <span class="g-font-size-16--xs">Dashboard</span>
                            </span>
                        </a>
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--========== END PROMO BLOCK ==========-->

    <!--========== PAGE CONTENT ==========-->
    <!-- Mockup -->
    <div id="js__scroll-to-section" class="container g-padding-y-80--xs g-padding-y-125--xsm">
        <div class="row g-hor-centered-row--md g-row-col--5 g-margin-b-80--xs g-margin-b-100--md">
            <div class="col-sm-5 g-hor-centered-row__col">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">About</p>
                <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">July Flash Sales</h2>
                <p class="g-font-size-18--sm">In partnership with Mega Minds Ltd and Michael Bolaji Photography, Crypto2Naira brings you the best cryptocurrency flash sales yet. Over 3,000 items available for sale, up to 100% cryptocurrency price tag.</p>
                <p>
                    We're creating values for the cryptocurrency community and we aim high at building an excellent platform of exchange from cryptocurrency to cash.
                </p>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5 g-hor-centered-row__col">
                <img class="img-responsive" src="img/mockups/iphone-03.png" alt="Mockup Image">
            </div>
        </div>
        <div class="row g-hor-centered-row--md g-row-col--5">
            <div class="col-sm-5 col-sm-push-7 g-hor-centered-row__col">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Seamless and Easy</p>
                <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">Can't wait for the deal day?</h2>
                <p class="g-font-size-18--sm">Simply visit the e-commerce store and preorder the items you want. Then you just come and pick them up. Easy.</p>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5 col-sm-pull-7 g-hor-centered-row__col g-text-left--xs g-text-right--md">
                <img class="img-responsive" src="img/mockups/image.jpg" alt="Mockup Image">
            </div>
        </div>
    </div>
    <!-- End Mockup -->

    <!-- Video -->
    <section class="s-video__bg" data-vidbg-bg="mp4: include/media/mp4_video.mp4, webm: include/media/webm_video.webm, poster: include/media/fallback.jpg" data-vidbg-options="loop: true, muted: true, overlay: false">
        <div class="container g-position--overlay g-text-center--xs">
            <div class="g-padding-y-50--xs g-margin-t-50--xs g-margin-t-100--sm g-margin-b-100--xs g-margin-b-250--md">
                <h2 class="g-font-size-36--xs g-font-size-50--sm g-font-size-60--md g-color--white">Cash in a Flash,</h2>
                <h2 class="g-font-size-36--xs g-font-size-50--sm g-font-size-60--md g-color--white">Too Beautiful to Resist.</h2>
            </div>
        </div>
    </section>
    <!-- End Video -->

    <!-- Mockup -->
    <div class="container g-margin-t-o-100--xs g-margin-t-o-230--md">
        <div class="center-block s-mockup-v1">
            <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                <img class="img-responsive" src="img/mockups/p.jpeg" alt="Mockup Image">
            </div>
        </div>
    </div>
    <!-- End Mockup -->

    <!-- Portfolio -->
    <div class="container g-padding-y-80--xs g-padding-y-125--xsm">
        <div class="row g-margin-b-30--xs">
            <div class="col-sm-4">
                <div class="g-margin-t-20--md g-margin-b-40--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Super Deals</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md">100% OFF</h2>
                    <p>Get these products at 100% cryptocurrency, no cash at all.<br>
                    [TBC, BTC and GRC accepted.]
                    </p>
                </div>
            </div>

            <div class="col-sm-8">
                <!-- Gallery -->
                <div id="js__grid-portfolio-gallery" class="s-portfolio__paginations-v1 cbp">
                @foreach($pro as $p)
                    <div class="s-portfolio__item cbp-item motion graphic">
                        <div class="s-portfolio__img-effect">
                            <?php echo cl_image_tag($p->featured_image, 
                        array( "width" => 970, "height" => 647, "crop" => "fill" )); ?>
                        </div>
                        <div class="s-portfolio__caption-hover--cc">
                            <div class="g-margin-b-25--xs">
                                <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">{{ $p->name }}</h4>
                                <p class="g-color--white-opacity">&#8358;{{ $p->paying_amount }}</p>
                                <p class="g-color--white-opacity"><del>&#8358;{{ $p->naira_price }}</del></p>
                            </div>
                            <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                                <li>
                                    <a href="{{ route('product.show', $p->slug) }}" class="s-icon s-icon--sm s-icon--white-bg g-radius--circle" data-title="View Product">
                                        <i class="ti-fullscreen"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('checkout', $p->slug) }}" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Item -->
                @endforeach
                </div>
                <!-- End Portfolio Gallery -->
            </div>
        </div>
    </div>
    <!-- End Portfolio -->

    <!-- Mockup -->
    <div id="js__scroll-to-section" class="container g-padding-y-80--xs g-padding-y-125--xsm">
        <div class="row g-hor-centered-row--md g-row-col--5 g-margin-b-80--xs g-margin-b-100--md">
            <div class="col-sm-5 g-hor-centered-row__col">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Free Payment Voucher</p>
                <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">Enjoy Free Referral Vouchers</h2>
                <p class="g-font-size-18--sm">After complete registration, depending on which plan you choose, you will be provided with your referral link (not applicable with the BASIC package), with which you earn &#8358;&nbsp;1,000.00 worth coupon for every user that registers for the flash sales with it. The coupons can then be used on checkout while pre-ordering, or on the sales day.</p>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5 g-hor-centered-row__col">
                <img class="img-responsive" src="img/mockups/k.jpg" alt="Mockup Image">
            </div>
        </div>
        <div class="row g-hor-centered-row--md g-row-col--5">
            <div class="col-sm-5 col-sm-push-7 g-hor-centered-row__col">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">First Come First Serve</p>
                <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">Can't wait for the deal day?</h2>
                <p class="g-font-size-18--sm">After your complete registration, you can then go ahead to the store and preorder your preferred item(s) which you will pick up on the sales day without stress.</p>
                <p>
                    You are not limited to the items you preorder alone. On the sales day, you are free to buy as many as you want. [But you can't buy items that has been preordered by other users. So run to the store now and preorder!]
                </p>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5 col-sm-pull-7 g-hor-centered-row__col g-text-left--xs g-text-right--md">
                <img class="img-responsive" src="img/mockups/first.png" alt="Mockup Image">
            </div>
        </div>
    </div>
    <!-- End Mockup -->


    <!-- Mockup -->
    <div id="js__scroll-to-section" class="container g-padding-y-80--xs g-padding-y-125--xsm">
        <div class="row g-hor-centered-row--md g-row-col--5 g-margin-b-80--xs g-margin-b-100--md">
            <div class="col-sm-5 g-hor-centered-row__col">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Just Enough For Everyone</p>
                <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">Over 3,000 items up for grabs</h2>
                <p class="g-font-size-18--sm"></p>
                <p>
                    From Phones and Accessories to Fashion and Home Appliances, all are available up to 100% cryptocurrency. All you have to do is to <em>preorder </em>, and they are yours. Visit the <a href="{{ route('store.index') }}">STORE</a> to peruse through all the categories.
                </p>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5 g-hor-centered-row__col">
                <img class="img-responsive" src="img/mockups/iphone-03.png" alt="Mockup Image">
            </div>
        </div>
        <div class="row g-hor-centered-row--md g-row-col--5">
            <div class="col-sm-5 col-sm-push-7 g-hor-centered-row__col">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Simple Process</p>
                <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">Seamless and Easy Walkthrough</h2>
                <p class="g-font-size-18--sm">Simply choose a plan below to register. Before your registration can be completed, you are to pay your registration fee either through direct bank transfer or through online payment with your credit card. You have 24hrs to do this before your registration will expire. Registration closes on 15th of July, and <b>ONLY</b> registered participants will be allowed to the trade fair.</p>
                <p>
                    Also, you will be provided with a printable payment invoice which serves as your entry tag on the sales day.
                </p>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5 col-sm-pull-7 g-hor-centered-row__col g-text-left--xs g-text-right--md">
                <img class="img-responsive" src="img/mockups/card.jpeg" alt="Mockup Image">
            </div>
        </div>
    </div>
    <!-- End Mockup -->

    @if(!Auth::check())
    <!-- Plan -->
    @include('partials.signup')
    <!-- End Plan -->
    @endif

    <!-- Subscribe -->
    <div class="g-bg-color--primary-to-blueviolet-ltr">
        <div class="g-container--sm g-text-center--xs g-padding-y-80--xs g-padding-y-125--xsm">
            <div class="g-margin-b-60--xs">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-25--xs">Subscribe</p>
                <!-- <h2 class="g-font-size-32--xs g-font-size-36--md g-letter-spacing--1 g-color--white">Join Over 1000+ People</h2> -->
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                    <form class="input-group">
                        <input type="email" class="form-control s-form-v1__input g-radius--left-50" name="email" placeholder="Enter your email">
                        <span class="input-group-btn">
                            <button type="submit" class="s-btn s-btn-icon--md s-btn-icon--white-brd s-btn--white-brd g-radius--right-50"><i class="ti-arrow-right"></i></button>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Subscribe -->

@stop
