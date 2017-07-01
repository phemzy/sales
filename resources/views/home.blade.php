@extends('layouts.main')

@section('content')
<!--========== PROMO BLOCK ==========-->
    <div class="s-promo-block-v1 g-bg-color--primary-to-blueviolet-ltr g-fullheight--md">
        <div class="container g-ver-center--md g-padding-y-100--xs">
            <div class="row g-hor-centered-row--md g-margin-t-30--xs g-margin-t-20--sm">

                <div class="col-lg-6 col-lg-offset-3 col-sm-6 g-hor-centered-row__col g-text-center--xs g-text-left--md g-margin-b-60--xs g-margin-b-0--md text-center">
                    <div class="s-promo-block-v1__square-effect g-margin-b-60--xs text-center">
                        <h1 class="g-font-size-32--xs g-font-size-45--sm g-font-size-50--lg g-color--white">Hello,<br>{{ Auth::user()->fullname() }}</h1>
                        @if(Auth::user()->hasPaid())
                            <p class="g-font-size-20--xs g-font-size-26--md g-color--white g-margin-b-0--xs">Welcome to your dashboard.</p>
                        @else
                            <p class="g-font-size-20--xs g-font-size-26--md g-color--white g-margin-b-0--xs">Now let's complete your registration for you...</p>
                        @endif
                    </div>

                    <p class="g-font-size-20--xs g-font-size-26--md g-color--white g-margin-b-0--xs">Kindly choose a payment method below:</p><br>

                    <span class="g-display-block--xs g-display-inline-block--lg g-margin-b-10--xs g-margin-b-10--lg">
                        <a href="" data-toggle="modal" data-target="#bank" class="s-btn s-btn--xs s-btn--white-brd g-padding-x-30--xs g-radius--50">
                            <span class="s-btn__element--left">
                                <i class="g-font-size-32--xs ti-mobile"></i>
                            </span>
                            <span class="s-btn__element--right g-padding-x-10--xs">
                                <span class="g-display-block--xs g-font-size-11--xs">Direct Bank</span>
                                <span class="g-font-size-16--xs">Transfer</span>
                            </span>
                        </a>                        
                    </span>
                    <span class="g-padding-x-0--xs g-padding-x-10--lg">
                        <a href="" data-toggle="modal" data-target="#card" class="s-btn s-btn--xs s-btn--white-brd g-padding-x-30--xs g-radius--50">
                            <span class="s-btn__element--left">
                                <i class="g-font-size-32--xs ti-credit-card"></i>
                            </span>
                            <span class="s-btn__element--right g-padding-x-10--xs">
                                <span class="g-display-block--xs g-font-size-11--xs">Or pay with your</span>
                                <span class="g-font-size-16--xs">Credit Card</span>
                            </span>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!--========== END PROMO BLOCK ==========-->
    <div id="bank" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">PLAN: {{ Auth::user()->plans->name }}</p>
          </div>
          <div class="modal-body">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">Make Payment To:</p>
                <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">MEGA MINDS LTD</h2>
                <p class="g-font-size-18--sm">
                    Account Number : <b>0023098765</b>
                </p>
                <p>
                    Bank : Zenith Bank
                </p>
                <p>
                    Amount : &#8358;{{ number_format(Auth::user()->plans->price, 2) }}
                </p>
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Next:</p>
                
                <p class="g-font-size-18--sm">
                    <form action="">
                        <div class="form-group">
                            <label for="image">Upload Your Proof of Payment here:</label>
                            <input type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="s-btn s-btn--xs btn-primary g-padding-x-30--xs g-radius--50">Upload</button>
                        </div>
                    </form>
                </p>

                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Then:</p>

                <p class="g-font-size-18--sm">
                    Send a mail to <span class="g-color--primary g-letter-spacing--2 g-margin-b-25--xs">flashsales@crypto2naira.com</span> with your details for payment confirmation.
                </p>

                <p>
                    You will receive a confirmation email within one hour and you can proceed to preorder your items!
                </p>

                <p style="color: red;">
                    You have 24hrs to complete your registration before it expires
                </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <div id="card" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">PLAN: {{ Auth::user()->plans->name }}</p>
          </div>
          <div class="modal-body text-center">
                <form method='POST' action='https://voguepay.com/pay/'>

                <input type='hidden' name='v_merchant_id' value='3704-0052968' />
                <input type='hidden' name='memo' value='July Flash Sales Registration Fee' />

                <input type='hidden' name='item_1' value='Registration Fee' />
                <input type='hidden' name='description_1' value='{{Auth::user()->plans->name}} Plan Registration Payment' />
                <input type='hidden' name='price_1' value='{{ Auth::user()->plans->price }}' />

                <input type='hidden' name='total' value='{{ Auth::user()->plans->price }}' />
                 <button class="s-btn s-btn--xs btn-lg btn-primary g-padding-x-30--xs g-radius--50">Click here to proceed</button>
                </form>
               
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <!--========== PAGE CONTENT ==========-->
    <!-- Mockup -->
    <div id="js__scroll-to-section" class="container g-padding-y-80--xs g-padding-y-125--xsm">
        <div class="row g-hor-centered-row--md g-row-col--5 g-margin-b-80--xs g-margin-b-100--md">
            <div class="col-sm-5 g-hor-centered-row__col">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">About</p>
                <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">July Flash Sales</h2>
                <p class="g-font-size-18--sm">In partnership with Mega Minds Ltd, Crypto2Naira brings you the best cryptocurrency flash sales yet. Over 10,000 items available for sale, up to 100% cryptocurrency price tag.</p>
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
                <!-- Portfolio Gallery -->
                <div id="js__grid-portfolio-gallery" class="s-portfolio__paginations-v1 cbp">
                    <!-- Item -->
                    <div class="s-portfolio__item cbp-item logos">
                        <div class="s-portfolio__img-effect">
                            <img src="img/970x647/07.jpg" alt="Portfolio Image">
                        </div>
                        <div class="s-portfolio__caption-hover--cc">
                            <div class="g-margin-b-25--xs">
                                <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Item</h4>
                                <p class="g-color--white-opacity">2,000</p>
                            </div>
                            <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                                <li>
                                    <a href="img/970x647/07.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle" data-title="Item <br/> by KeenThemes Inc.">
                                        <i class="ti-fullscreen"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="s-portfolio__item cbp-item motion graphic">
                        <div class="s-portfolio__img-effect">
                            <img src="img/970x647/08.jpg" alt="Portfolio Image">
                        </div>
                        <div class="s-portfolio__caption-hover--cc">
                            <div class="g-margin-b-25--xs">
                                <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Item</h4>
                                <p class="g-color--white-opacity">2,000</p>
                            </div>
                            <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                                <li>
                                    <a href="img/970x647/08.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle" data-title="Portfolio Item <br/> by KeenThemes Inc.">
                                        <i class="ti-fullscreen"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Item -->
                </div>
                <!-- End Portfolio Gallery -->
            </div>
        </div>
    </div>
    <!-- End Portfolio -->
@stop
