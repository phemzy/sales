@extends('layouts.store')

@section('content')
	<main class="site-main page-spacing">
		<!-- Page Banner -->
		<div class="page-banner shop-banner-1 container-fluid no-padding">
			<div class="page-banner-content">
				<h3>{{ $category->name }}</h3>
			</div>
		</div><!-- Page Banner /- -->
		
		
		<!-- Shop 1 -->
		<div class="latest-product shop-1 container-fluid no-padding woocommerce">
			<div class="section-padding"></div>
			<!-- Container -->
			<div class="container">
				<div class="row">
				<!-- Widget Area -->
				<div class="col-md-3 col-sm-3 col-xs-12 widget-area">
					<!-- Widget Search -->
					<aside class="widget widget-search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-search" title="Search" type="button"><span class="icon icon-Search"></span></button>
							</span>
						</div>
					</aside><!-- Widget Search /- -->
					
					<!-- Widget Categories -->
					<aside class="widget widget-categories">
						<h3 class="widget-title">Categories</h3>
						<ul>
							@foreach($categories as $c)
								<li><a href="{{ route('category', $c->id) }}" title="{{ $c->name }}">{{ $c->name }}<span class="pull-right">({{ count($c->products) }})</span></a></li>
							@endforeach
						</ul>
					</aside><!-- Widget Categories /-  -->

						<!-- Widget Latest Post -->
						<aside class="widget widget-latestposts">
							<h3 class="widget-title">Latest Products</h3>
							@foreach($products->take(3) as $p)
							<div class="latest-content">
								<a href="{{ route('product.show', $p->slug) }}" title="Recent Posts"><?php echo cl_image_tag($p->featured_image, 
                        				array( "width" => 79, "height" => 79, "crop" => "fill" )); ?></a>
								<h3><a title="Luxury Living Room" href="{{ route('product.show', $p->slug) }}">{{ $p->name }}</a></h3>
								<p>&#8358;{{ $p->paying_amount }}</p>
							</div>
							@endforeach
						</aside><!-- Widget Latest Post /-  -->
				</div><!-- Widget Area /- -->
				
				<!-- Content Area -->
				<div class="col-md-9 col-sm-9 col-xs-12 content-area">
					@foreach($pros->chunk(3) as $pro)
					<ul class="products">
						@foreach($pro as $p)
							<li class="product">							
								@include('partials.product_block')
							</li>
						@endforeach
					</ul>
					@endforeach
					<nav class="ow-pagination">
						{{ $pros->links() }}
					</nav>
				</div><!-- Content Area /- -->
				</div>
			</div><!-- Container /- -->
			<div class="section-padding"></div>
		</div><!-- Shop 1 /-  -->
	</main>
@stop