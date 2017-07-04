@extends('layouts.store')

@section('content')

	<main class="site-main page-spacing">
		<!-- Page Banner -->
		<div class="page-banner cart-banner container-fluid no-padding">
			<div class="page-banner-content">
				<h3>Shopping Cart</h3>
			</div>
		</div><!-- Page Banner /- -->
		
		
		<!-- Cart -->
		<div id="cart-main" class="cart-main">
			<div class="section-padding"></div>
			<div class="container">
				<div class="woocommerce">
					<form method="post" class="col-md-12 col-sm-12 col-xs-12 no-padding">
						<table class="shop_table cart">
							<thead>
								<tr>
									<th class="product-name" colspan="2">Products</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-subtotal">Total</th>
									<th class="product-remove">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<tr class="cart_item">
									<td data-title="Product" class="product-thumbnail">
										<a title="Product Thumbnail" href="">
											<img class="attachment-shop_thumbnail wp-post-image" src="images/cart-1.png" alt="cart" />
										</a>					
									</td>
									<td class="product-name">
										<a title="Product Name" href="#">Modern Chair</a>
										<h4>SKU<span>: 0522c</span></h4>
										<h4>Color<span>: Yellow</span></h4>
									</td>
									<td data-title="Price" class="product-price">
										<span class="amount">$50</span>
									</td>
									<td data-title="Quantity" class="product-quantity">
										<div class="quantity">
											<input type="button" value="-" class="qtyminus btn" data-field="quantity1" />
											<input type="text" name="quantity1" value="0" class="qty btn" />
											<input type="button" value="+" class="qtyplus btn" data-field="quantity1" />
										</div>
									</td>
									<td data-title="Total" class="product-subtotal">
										<span class="amount">$50</span>
									</td>
									<td class="product-remove">
										<a title="Remove this item" class="remove" href=""><img src="images/close.png" alt="close" /></a>
									</td>
								</tr>
								
								<tr class="cart_item">
									<td data-title="Product" class="product-thumbnail">
										<a title="Product Thumbnail" href="">
											<img class="attachment-shop_thumbnail wp-post-image" src="images/cart-2.png" alt="cart" />
										</a>					
									</td>
									<td class="product-name">
										<a title="Product Name" href="#">Modern Chair</a>
										<h4>SKU<span>: 14b55</span></h4>
										<h4>Color<span>: Black</span></h4>
									</td>
									<td data-title="Price" class="product-price">
										<span class="amount">$20</span>
									</td>
									<td data-title="Quantity" class="product-quantity">
										<div class="quantity">
											<input type="button" value="-" class="qtyminus btn" data-field="quantity2" />
											<input type="text" name="quantity2" value="0" class="qty btn" />
											<input type="button" value="+" class="qtyplus btn" data-field="quantity2" />
										</div>
									</td>
									<td data-title="Total" class="product-subtotal">
										<span class="amount">$20</span>
									</td>
									<td class="product-remove">
										<a title="Remove this item" class="remove" href=""><img src="images/close.png" alt="close" /></a>
									</td>
								</tr>
								
								<tr class="cart_item">
									<td data-title="Product" class="product-thumbnail">
										<a title="Product Thumbnail" href="">
											<img class="attachment-shop_thumbnail wp-post-image" src="images/cart-3.png" alt="cart" />
										</a>					
									</td>
									<td class="product-name">
										<a title="Product Name" href="#">Modern Chair</a>
										<h4>SKU<span>: Xdc10</span></h4>
										<h4>Color<span>: Red</span></h4>
									</td>
									<td data-title="Price" class="product-price">
										<span class="amount">$15</span>
									</td>
									<td data-title="Quantity" class="product-quantity">
										<div class="quantity">
											<input type="button" value="-" class="qtyminus btn" data-field="quantity3" />
											<input type="text" name="quantity3" value="0" class="qty btn" />
											<input type="button" value="+" class="qtyplus btn" data-field="quantity3" />
										</div>
									</td>
									<td data-title="Total" class="product-subtotal">
										<span class="amount">$15</span>
									</td>
									<td class="product-remove">
										<a title="Remove this item" class="remove" href=""><img src="images/close.png" alt="close" /></a>
									</td>
								</tr>
							</tbody>
						</table>
					</form>

					<div class="cart-collaterals row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="coupon">
								<h4>Got A Coupon</h4>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Coupon code">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Apply Coupon</button>
									</span>
								</div>
							</div>	
						</div>	
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="cart_totals">
								<h4>Cart Totals</h4>
								<div class="cart_totals_table">
									<table>
										<tbody>
											<tr class="cart-subtotal">
												<th>SubTotal</th>
												<td><span class="amount">$85</span></td>
											</tr>
											<tr class="order-total">
												<th>Total</th>
												<td><strong><span class="amount">$85</span></strong> </td>
											</tr>
										</tbody>
									</table>
								</div>	
							</div>
							<div class="wc-proceed-to-checkout">
								<a title="Proceed To CheckOut" class="btn" href="#">Update Cart</a>
								<a title="Proceed To CheckOut" class="btn" href="#">Proceed to Checkout</a>
							</div>
						</div>
					</div>
				</div>
			</div><!-- container -->
			<div class="section-padding"></div>
		</div><!-- Cart /- -->
	</main>

@stop