@extends('layouts.store')

@section('content')
	<main class="site-main page-spacing">
		<!-- Page Banner -->
		<div class="page-banner product-detail container-fluid no-padding">
			<div class="page-banner-content">
				<h3>{{ $product->name }}</h3>
			</div>
		</div><!-- Page Banner /- -->
		
		
		<!-- Product Detail -->
		<div class="Product-detail container-fluid no-padding woocommerce">
			<div class="section-padding"></div>
			<!-- Container -->
			<div class="container">
				<div class="type-product col-md-6 col-sm-7 col-xs-12 product">
					<div class="images">
						<a class="woocommerce-main-image zoom" href="{{ Storage::url($product->featured_image) }}" title="Product Image">
							<?php echo cl_image_tag($product->featured_image, 
                        array( "width" => 473, "height" => 490, "crop" => "fill" )); ?>
						</a>
{{-- 						<div class="thumbnails">
							<a class="zoom" title="Product Image" href="images/product-detail-2.png">
								<img src="images/product-detail-2.png" alt="product-detail-2" />
							</a>
							<a class="zoom" title="Product Image" href="images/product-detail-3.png">
								<img src="images/product-detail-3.png" alt="product-detail-3" />
							</a>
							<a class="zoom" title="Product Image" href="images/product-detail-4.png">
								<img src="images/product-detail-4.png" alt="product-detail-4" />
							</a>
							<a class="zoom" title="Product Image" href="images/product-detail-5.png">
								<img src="images/product-detail-5.png" alt="product-detail-5" />
							</a>
							<a class="zoom" title="Product Image" href="images/product-detail-6.png">
								<img src="images/product-detail-6.png" alt="product-detail-6" />
							</a>
						</div> --}}
					</div>
				</div>
				
				<div class="col-md-6 col-sm-5 col-xs-12">
					<div class="summary entry-summary">
						<h1 class="product_title entry-title">{{ $product->name }}</h1>
						<p class="price"><span class="amount">&#8358; {{ $product->paying_amount }}</span></p>
						<p class="price"><span class="amount"><del>&#8358; {{ $product->naira_price }}</del> <span class="badge">{{ $product->crypto_price }}% OFF</span></span></p>
						<h4>Availability : <span>in Stock</span></h4>

						<div class="quantity">
							Quantity: {{ $product->quantity }}
						</div>
						
							<a href="{{ route('checkout', $product->slug) }}"><button type="submit" class="single_add_to_cart_button button alt" title="Add to Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Pre-Order</button></a>
					</div>
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="product-details-tab">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#ProductDescription" role="tab" data-toggle="tab">Product Description</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="ProductDescription">
								<p class="product-details-content">
									{{ $product->description }}
								</p>
							</div>
						</div>
					</div>
				</div>
			</div><!-- Container /-  -->
			<div class="section-padding"></div>
		</div><!-- Product Detail /-  -->
		
		<!-- Latest Product -->
		<div id="latest-product" class="latest-product container-fluid no-padding woocommerce">
			<!-- Container -->
			<div class="container">
				<!-- Section Header -->
				<div class="section-header">
					<h3>Related Products</h3>
				</div><!-- Section Header /- -->
				<ul class="products">
					@foreach($product->category->products->take(4) as $p)
						@if($p->id == $product->id)

						@else
						<li class="product">							
							<a href="product-detail.html" title="Prouct">
								<span class="new-product">New</span>
								<span class="onsale">15%</span>
								<span class="product-img">
									<?php echo cl_image_tag($p->featured_image, 
                        				array( "width" => 270, "height" => 360, "crop" => "fill" )); ?>
								</span>
								<h3>{{ $p->name }}</h3>
								<span class="price"><span class="amount">&#8358; {{ $p->naira_price }}</span></span>
							</a>
							<p class="hover-content">
								<a title="Add To Cart" href="{{ route('product.show', $p->slug) }}" class="button product_type_simple add_to_cart_button"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Pre-order</a>
								<span>
									<a href="{{ route('product.show', $p->slug) }}" class="icons"><i class="fa fa-heart" aria-hidden="true"></i></a>
									<a href="{{ route('product.show', $p->slug) }}" class="icons"><i class="fa fa-eye" aria-hidden="true"></i></a>
								</span>
							</p>
						</li>
						@endif
					@endforeach
				</ul>
			</div><!-- Container /- -->
		</div><!-- Latest Product /- -->
	</main>
@stop