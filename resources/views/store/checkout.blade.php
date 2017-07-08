@extends('layouts.store')

@section('content')
		
	<main class="site-main page-spacing">
		<!-- Page Banner -->
		<div class="page-banner checkout-banner container-fluid no-padding">
			<div class="page-banner-content">
				<h3>Checkout</h3>
			</div>
		</div><!-- Page Banner /- -->
		
		<!-- Checkout -->
		<div class="woocommerce-checkout">
			<div class="section-padding"></div>
			<div class="container">
				<div class="woocommerce row">
					<div class="col-md-6 col-md-offset-3">
						<ul>

						@if($errors->count())
							<h3>Oops!</h3>
							@foreach($errors->all() as $error)
								<li style="color: red">{{ $error }}</li>
							@endforeach
						@endif
						</ul>
					</div>
					
					<form class="checkout woocommerce-checkout row" method="post" name="checkout" action="{{ route('preorder') }}">
						{{ csrf_field() }}
						<input type="hidden" name="product" value="{{ $product->slug }}">
						<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12 woocommerce-billing-fields">
							<h4>Billing Details</h4>
							<div class="col-md-6 col-sm-6 col-xs-12 no-left-padding">
								<input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ Auth::check() ? Auth::user()->first_name : old('first_name') }}" />
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 no-right-padding">
								<input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ Auth::check() ? Auth::user()->last_name : old('last_name') }}" />
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 no-left-padding">
								<input type="text" class="form-control" placeholder="Email" name="email" value="{{ Auth::check() ? Auth::user()->email : old('email') }}" />
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 no-right-padding">
								<input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ Auth::check() ? Auth::user()->profile->number : old('number') }}" />
							</div>

							<div class="col-md-6 col-sm-6 col-xs-12 no-left-padding">
								<input type="text" class="form-control" placeholder="State" name="city" value="{{ Auth::check() ? Auth::user()->profile->city : old('city') }}" />
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 no-right-padding">
								<input type="text" class="form-control" placeholder="Zip" name="zip" />
							</div>
						</div>
						<div class="cart-main col-md-12 col-sm-12 col-xs-12">
							<h4>Your Order Summary</h4>
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
												<?php echo cl_image_tag($product->featured_image, 
                        							array( "width" => 100, "crop" => "fill" )); ?>
											</a>					
										</td>
										<td class="product-name">
											<a title="Product Name" href="#">{{ $product->name }}</a>
											{{-- <h4>SKU<span>: 0522c</span></h4>
											<h4>Color<span>: Yellow</span></h4> --}}
										</td>
										<td data-title="Price" class="product-price">
											<span class="amount">&#8358;{{ $product->naira_price }}</span>
										</td>
										<td data-title="Quantity" class="product-quantity">
											<div class="quantity">
												1
											</div>
										</td>
										<td data-title="Total" class="product-subtotal">
											<span class="amount">&#8358;{{ $product->naira_price }}</span>
										</td>
										<td class="product-remove">
											<a title="Remove this item" class="remove" href="{{ route('store.index') }}"><img src="{{ URL::to('commerce/images/close.png') }}" alt="close" /></a>
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
						
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="cart_totals">
								<h4>Shiping</h4>
								<div class="cart_totals_table">
									<table>
										<tbody>
											<tr class="shipping">
												<th colspan="2">
													<div class="form-group"><input type="checkbox" checked=""><label>Free Shipping</label></div>
													<div class="form-group"><input type="checkbox" checked=""><label>Pickup (Free)</label></div>
												</th>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="totals">
									<h3>Total</h3>
									<h4>&#8358;0</h4>
								</div>							
							</div>
						</div>
						
						<div class="col-md-12 col-sm-12 col-xs-12 woocommerce-checkout-payment">
							<h4>Select Cryptocurrency Type</h4>
							<div class="col-md-12 col-sm-12 col-xs-12 no-padding">
								<select name="crypto_type" id="" class="form-control">
									<option value="">--SELECT--</option>
									<option value="TBC">TBC</option>
									<option value="GRC">GRC</option>
									<option value="BTC">BTC</option>
								</select>
							</div>
						</div>
						
						@if(!Auth::check())

						<div class="place-order col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 50px; margin-top: 30px;">
							<button type="submit" class="button product_type_simple add_to_cart_button">
									Pre-order
							</button>
						</div>
						@else


						<div class="place-order col-md-12 col-sm-12 col-xs-12">
							@if(Auth::user()->hasPaid())
								<button type="button" class="button product_type_simple add_to_cart_button" data-toggle="modal" data-target="#confirm">
									Pre-order
								</button>
							@else
								<button type="button" class="button product_type_simple add_to_cart_button" data-toggle="modal" data-target="#notPaid">
									Pre-order
								</button>
							@endif
						</div>
						<div id="confirm" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Oops!</h4>
						      </div>
						      <div class="modal-body">
						        @if(Auth::user()->order_count != 0)
						        	<p>Hello {{ Auth::user()->first_name }}, You only have {{ Auth::user()->order_count }} {{ str_plural('item', Auth::user()->order_count) }} to order.</p>
						        	<p>Are you sure this is your best choice</p>
						        		</div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">No</button>
								        <button type="submit" class="btn btn-success pull-right">Yes, It is.</button>
								      </div>
								    </div>
						        @elseif(Auth::user()->orders->count() && Auth::user()->order_count == 0)
						        	<p>
						        		Sorry {{ Auth::user()->first_name }}, your have exhausted your pre-order chances. Wait till the deal day.
						        	</p>
						        	</div>
							      	<div class="modal-footer">
							        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">OK</button>
							      </div>
							    </div>
						        @endif

						  </div>
						</div>
					</form>

				</div>
			</div>
			<div class="section-padding"></div>
		</div><!-- Checkout /- -->

		<div id="notPaid" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Oops!</h4>
		      </div>
		      <div class="modal-body">
		        @if(Auth::user()->payments()->where('status', '!=', 'successful')->where('type', 'Sales Registration Fee')->first())
		        	<p>Your registration payment isn't confirmed yet. You can't preorder.</p>
		        @else
		        	<p>You need to complete your registration before you can preorder. Visit your <a href="{{ route('home') }}">DASHBOARD</a> to complete it.</p>
		        @endif
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>
		@endif
	</main>

@stop