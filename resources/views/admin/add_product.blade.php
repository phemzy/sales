@extends('layouts.admin')

@section('content')

<main id="main-container"><div class="content content-boxed">
<div class="row">
<div class="col-xs-6 col-sm-4">
<a class="block block-link-hover3 text-center" href="javascript:void(0)">
<div class="block-content block-content-full">
<div class="h1 font-w700" data-toggle="countTo" data-to="250"></div>
</div>
<div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">In Orders</div>
</a>
</div>
<div class="col-xs-6 col-sm-4">
<a class="block block-link-hover3 text-center" href="javascript:void(0)">
<div class="block-content block-content-full">
<div class="h1 font-w700" data-toggle="countTo" data-to="29"></div>
</div>
<div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Available</div>
</a>
</div>
<div class="col-xs-12 col-sm-4">
<a class="block block-link-hover3 text-center" href="javascript:void(0)">
<div class="block-content block-content-full">
<div class="h1 font-w700 text-danger"><i class="fa fa-times"></i></div>
</div>
<div class="block-content block-content-full block-content-mini bg-gray-lighter text-danger font-w600">Delete Product</div>
</a>
</div>
</div>
<div class="block">
<div class="block-header bg-gray-lighter">
<h3 class="block-title">Add New</h3>
</div>
<div class="block-content block-content-full">
<div class="row">
<div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
<form class="form-horizontal push-30-t push-30" action="{{ route('product.save') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="form-group">
<div class="col-xs-12">
<div class="form-material form-material-primary">
<input class="form-control" type="text" id="slug" name="slug" value="{{ old('slug') }}">
<label for="slug">Slug</label>
</div>
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<div class="form-material form-material-primary">
<input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
<label for="name">Name</label>
</div>
</div>
</div>
<div class="form-group">
<div class="col-xs-12 push-10">
<div class="form-material form-material-primary">
<label>Description</label>
</div>
</div>

</div>
<div class="form-group">
<div class="col-xs-12">
<div class="form-material form-material-primary">
<textarea class="form-control" id="description" name="description" rows="3"></textarea>
<label for="description">{{old('description')}}</label>
</div>
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<div class="form-material">
<select class="js-select2 form-control" id="category_id" name="category_id" style="width: 100%;" data-placeholder="Choose one..">
<option></option>
	@foreach($categories as $c)
		<option value="{{ $c->id }}">{{$c->name}}</option>
	@endforeach
</select>
<label for="category_id">Category</label>
</div>
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<div class="form-material form-material-primary">
<input class="form-control" type="text" id="naira_price" name="naira_price" value="{{ old('naira_price') }}">
<label for="naira_price">Price in NGN (&#8358;)</label>
</div>
</div>
</div>

<div class="form-group">
<div class="col-xs-12">
<div class="form-material form-material-primary">
<input class="form-control" type="text" id="crypto_price" name="crypto_price" value="{{ old('crypto_price') }}">
<label for="crypto_price">Price in Crypto</label>
</div>
</div>
</div>

<div class="form-group">
<div class="col-xs-12">
<div class="form-material form-material-primary">
<input class="form-control" type="text" id="paying_amount" name="paying_amount" value="{{ old('paying_amount') }}">
<label for="paying_amount">Paying Amount</label>
</div>
</div>
</div>

<div class="form-group">
<div class="col-xs-12">
<div class="form-material form-material-primary">
<input class="form-control" type="text" id="quantity" name="quantity" value="">
<label for="quantity">Quantity</label>
</div>
</div>
</div>

<div class="form-group">
<div class="col-xs-12">
<div class="form-material form-material-primary">
<input class="form-control" type="file" id="image" name="image" value="">
<label for="image">Main Image</label>
</div>
</div>
</div>


<div class="form-group">
<div class="col-xs-12">
<button class="btn btn-sm btn-primary" type="submit">Save</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<div class="block">
<div class="block-header bg-gray-lighter">
<h3 class="block-title">Meta Data</h3>
</div>
<div class="block-content block-content-full">
<div class="row">
<div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
<form class="form-horizontal push-30-t push-30" action="base_pages_ecom_product_edit.php" method="post" onsubmit="return false;">
<div class="form-group">
<div class="col-xs-12">
<div class="form-material form-material-primary">
<input class="js-maxlength form-control" type="text" id="product-meta-title" name="product-meta-title" maxlength="55" data-always-show="true" value="The Elder Scrolls V: Skyrim">
<label for="product-meta-title">Title</label>
<div class="help-block text-right">55 Character Max</div>
</div>
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<div class="form-material form-material-primary">
<input class="js-tags-input form-control" type="text" id="product-meta-keywords" name="product-meta-keywords" value="action, rpg">
<label for="product-meta-keywords">Keywords</label>
</div>
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<div class="form-material form-material-primary">
<textarea class="js-maxlength form-control" id="product-meta-description" name="product-meta-description" rows="5" maxlength="115" data-always-show="true">The Elder Scrolls V: Skyrim is an action role-playing open world video game developed by Bethesda Game Studios.</textarea>
<label for="product-meta-description">Description</label>
<div class="help-block text-right">115 Character Max</div>
</div>
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<button class="btn btn-sm btn-primary" type="submit">Save</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<div class="block">
<div class="block-header bg-gray-lighter">
<h3 class="block-title">Images</h3>
</div>
<div class="block-content block-content-full">
<div class="row">
<div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
<form class="dropzone push-30-t push-30" action="base_pages_ecom_product_edit.php"></form>
</div>
</div>
</div>
</div>
</div>
</main>


@stop