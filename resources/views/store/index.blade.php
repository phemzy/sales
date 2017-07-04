@extends('layouts.store')

@section('content')
	
	<main class="site-main page-spacing">
		<!-- Photo Slider -->
		<div class="photo-slider container-fluid no-padding">
			<!-- Main Carousel -->
			<div id="main-carousel" class="carousel slide carousel-fade" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#main-carousel" data-slide-to="0" class="active"></li>
					<li data-target="#main-carousel" data-slide-to="1"></li>
					<li data-target="#main-carousel" data-slide-to="2"></li>
				</ol>
				<div role="listbox" class="carousel-inner">
					<div class="item active">
						<div class="carousel-caption">
							<h3 data-animation="animated fadeInLeft">Phones and Gadgets at its best</h3>
							<p data-animation="animated fadeInRight">From 80% Cryptocurrency, upgrade your gadgets in just one click!</p>
							<div class="col-md-12">
								<a href="{{ route('category', $phone->id)}}" data-animation="animated fadeInUp" title="Shop Now" class="shop-now">Shop Now</a>
							</div>
							<img data-animation="animated fadeInDown" src="commerce/images/ph.jpeg" alt="slider" width="1056" height="345" />
						</div>
					</div>
					<div class="item slide-1">
						<div class="carousel-caption">
							<h3 data-animation="animated fadeInLeft">Fashion and Apparels</h3>
							<p data-animation="animated fadeInRight">Starting from 80% Cryptocurrency, enjoy the best deals here</p>
							<div class="col-md-12">
								<a href="{{ route('category', $fashion->id)}}" data-animation="animated fadeInUp" title="Shop Now" class="shop-now">Shop Now</a>
							</div>
							<img data-animation="animated fadeInDown" src="commerce/images/ap.jpeg" alt="slider" width="722" height="343" />
						</div>
					</div>
					<div class="item slide-2">
						<div class="carousel-caption">
							<h3 data-animation="animated fadeInLeft">Products at its best PRICES</h3>
							<p data-animation="animated fadeInRight">100% Cryptocurrency</p>
							<div class="col-md-12">
								<a href="{{ route('free')}}" data-animation="animated fadeInUp" title="Shop Now" class="shop-now">Shop Now</a>
							</div>
							<img data-animation="animated fadeInDown" src="commerce/images/p.jpg" alt="slider" width="900" height="342" />
						</div>
					</div>
				</div>
			</div><!-- Main Carousel /-  -->
		</div><!-- Photo Slider /- -->
		
		<!-- Ad Banner 1 -->
		<div id="ad-banner-1" class="ad-banner-1 container-fluid no-padding">
			<div class="section-padding"></div>
			<!-- Container -->
			<div class="container">
				<div class="col-md-5 col-sm-5 col-xs-12">
					<div class="modern-box">
						<div class="col-md-7 col-sm-6 col-xs-6">
							<img src="commerce/images/all.jpeg" alt="ad-banner" />
						</div>
						<div class="col-md-5 col-sm-6 col-xs-6">
							<h3 class="ad-heading">Up to 100% Off</h3>
							<h5>All Products</h5>
						</div>
						<a href="{{ route('free')}}" class="shop-now" title="Shop Now">Shop Now<i class="fa fa-caret-right" aria-hidden="true"></i></a>
					</div>
					
					<div class="modern-box modern-ads">
						<div class="col-md-5 col-sm-6 col-xs-6">
							<h3 class="ad-heading">Save up to 80% Off</h3>
							<h5>Electrical and Home Items</h5>
							<br>
						</div>

						<div class="col-md-7 col-sm-6 col-xs-6">
							<img src="commerce/images/ele.jpg" alt="ad-banner" />
						</div>
						<a href="{{ route('category', $elec->id)}}" class="shop-now" title="Shop Now">Shop Now<i class="fa fa-caret-right" aria-hidden="true"></i></a>
					</div>
				</div>
				
				<div class="col-md-7 col-sm-7 col-xs-12">
					<div class="modern-box modern-shop">
						<div class="col-md-7 col-sm-6 col-xs-6">
							<img src="commerce/images/phones.jpeg" alt="ad-banner" />
						</div>
						<div class="col-md-5 col-sm-6 col-xs-6">
							<h3 class="ad-heading">Phones and Gadgets</h3>
						</div>
						<a href="{{ route('category', $phone->id)}}" class="shop-now" title="Shop Now">Shop Now<i class="fa fa-caret-right" aria-hidden="true"></i></a>
					</div>
					
					<div class="modern-box modern-shop-1">
						<div class="col-md-5 col-sm-6 col-xs-6">
							<h3 class="ad-heading">Air Conditioners and TV's</h3>
						</div>
						<div class="col-md-7 col-sm-6 col-xs-6">
							<img src="commerce/images/dealer.jpg" alt="ad-banner" />
						</div>
						<a href="{{ route('category', $air->id)}}" class="shop-now" title="Shop Now">Shop Now<i class="fa fa-caret-right" aria-hidden="true"></i></a>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="discount-box">
								<h3>100% Discount</h3>
								<p>on Every brand</p>
								<a href="{{ route('free')}}" title="Shop Now">Shop Now</a>
							</div>
						</div>
					
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="discount-img-box">
								<img src="commerce/images/fashion.jpeg" width="318" height="270" alt="ad-banner-bg" />
							</div>
							<div class="discount-img-content">
								<h3>Fashion and Clothing</h3>
								<a href="{{ route('category', $fashion->id)}}" title="Shop Now">Shop Now</a>
							</div>
						</div>
					</div>
				</div>
			</div><!-- Container /- -->
		</div><!-- Ad Banner 1 -->
		
		<!-- Our Product -->
		<div class="latest-product our-products container-fluid no-padding woocommerce">
			<div class="section-padding"></div>
			<!-- Container -->
			<div class="container">
				<!-- Section Header -->
				<div class="section-header">
					<h3>Products</h3>
				</div><!-- Section Header /- -->
				<ul id="filters" class="products-categories no-left-padding">
					<li id="latest"><a class="product-link" href="javascript:void(0)">Trending Products</a></li>
				</ul>
				
				<ul class="products product-carousel">
					@foreach($products as $p)
					<li class="product filter-latest filter-all">							
						@include('partials.product_block')
					</li>
					@endforeach
				</ul>
			</div><!-- Container /- -->
			<div class="section-padding"></div>
		</div><!-- Our Product /- -->
		
		<!-- Latest Product -->
		<div id="latest-product" class="latest-product container-fluid no-padding woocommerce">
			<!-- Container -->
			<div class="container">
				<!-- Section Header -->
				<div class="section-header">
					<h3>Latest Products</h3>
				</div><!-- Section Header /- -->
				<ul class="products">
					@foreach($latest as $p)
					<li class="product">							
						<a title="Prouct">
							<span class="new-product">New</span>
							<span class="onsale">{{ $p->crypto_price }}% crypto</span>
							<span class="product-img">
								<?php echo cl_image_tag($p->featured_image, 
                        array( "width" => 270, "height" => 360, "crop" => "fill" )); ?>
							</span>
							<h3>{{ $p->name }}</h3>
							<span class="price"><span class="amount">&#8358;{{ $p->paying_amount }}</span></span>
							<span class="price"><strike>&#8358;{{ $p->naira_price }}</strike></span>
						</a>
						<p class="hover-content">
							<a title="Add To Cart" href="{{ route('product.show', $p->slug) }}" class="button product_type_simple add_to_cart_button"><i class="fa fa-shopping-cart" aria-hidden="true"></i>BUY</a>
							<span>
								<a href="{{ route('product.show', $p->slug) }}" class="icons"><i class="fa fa-eye" aria-hidden="true"></i></a>
							</span>
						</p>
					</li>
					@endforeach
				</ul>
			</div><!-- Container /- -->
		</div><!-- Latest Product /- -->
		
		<!-- Subscribe Section -->
		<div class="subscribe-section container-fluid no-padding">
			<div class="container">
				<div class="subscribe-content">
					<h5>Our Latest Collection</h5>
					<h3>save 100% Off Sale</h3>
					<p>Be the first to know about the latest ones</p>
					<form method="get">
						
						<div class=" col-md-6 col-sm-8 col-xs-10 input-group">
							<input type="text" placeholder="Your Email Address" class="form-control">
							<span class="input-group-btn">
								<button type="submit" title="Sign Up" class="btn btn-default">Sign Up</button>
							</span>
						</div><!-- /input-group -->
					</form>
				</div>
			</div>
		</div><!-- Subscribe Section /- -->
		
	</main>
@stop	
