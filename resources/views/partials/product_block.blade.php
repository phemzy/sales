<a title="Prouct">
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
	<a title="Preorder" href="{{ route('product.show', $p->slug) }}" class="button product_type_simple add_to_cart_button"><i class="fa fa-shopping-cart" aria-hidden="true"></i>BUY</a>
</p>