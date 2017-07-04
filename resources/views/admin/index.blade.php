@extends('layouts.admin')

@section('content')

<main id="main-container">
<div class="content content-boxed">
<div class="row">
<div class="col-sm-6 col-md-3">
<a class="block block-link-hover3 text-center" href="base_pages_ecom_orders.php">
<div class="block-content block-content-full">
<div class="h1 font-w700 text-primary" data-toggle="countTo" data-to="35"></div>
</div>
<div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Pending Orders</div>
</a>
</div>
<div class="col-sm-6 col-md-3">
<a class="block block-link-hover3 text-center" href="javascript:void(0)">
<div class="block-content block-content-full">
<div class="h1 font-w700 text-success" data-toggle="countTo" data-to="28" data-after="%"></div>
</div>
<div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Profit</div>
</a>
</div>
<div class="col-sm-6 col-md-3">
<a class="block block-link-hover3 text-center" href="base_pages_ecom_orders.php">
<div class="block-content block-content-full">
<div class="h1 font-w700" data-toggle="countTo" data-to="109"></div>
</div>
<div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Orders Today</div>
</a>
</div>
<div class="col-sm-6 col-md-3">
<a class="block block-link-hover3 text-center" href="javascript:void(0)">
<div class="block-content block-content-full">
<div class="h1 font-w700">$<span data-toggle="countTo" data-to="8970"></span></div>
</div>
<div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Earnings Today</div>
</a>
</div>
</div>

<div class="row">
<div class="col-lg-6">
<div class="block block-opt-refresh-icon4">
<div class="block-header bg-gray-lighter">
<ul class="block-options">
<li>
<button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
</li>
</ul>
<h3 class="block-title">Top Products</h3>
</div>
<div class="block-content">
<table class="table table-borderless table-striped table-vcenter">
<tbody>
<tr>
<td class="text-center" style="width: 100px;"><a href="base_pages_ecom_product_edit.php"><strong>PID.965</strong></a></td>
<td><a href="base_pages_ecom_product_edit.php">Destiny: The Taken King</a></td>
<td class="hidden-xs text-center">
<div class="text-warning">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="block block-opt-refresh-icon4">
<div class="block-header bg-gray-lighter">
<ul class="block-options">
<li>
<button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
</li>
</ul>
<h3 class="block-title">Latest Orders</h3>
</div>
<div class="block-content">
<table class="table table-borderless table-striped table-vcenter">
<tbody>

<tr>
<td class="text-center"><a href="base_pages_ecom_order.php"><strong>ORD.7109</strong></a></td>
<td class="hidden-xs"><a href="base_pages_ecom_customer.php">Ashley Welch</a></td>
<td><span class="label label-warning">Processing</span></td>
<td class="text-right"><strong>$218,00</strong></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</main>


@stop

@section('scripts')

<script src="{{ URL::to('assets/js/plugins/chartjs/Chart.min.js') }}"></script>
<script src="{{ URL::to('assets/js/pages/base_pages_ecom_dashboard.js') }}"></script>


@stop