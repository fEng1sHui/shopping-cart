@extends('layouts.master')

@section('title')
Laravel Shopping Cart
@endsection

@section('content')
@if(Session::has('success_message'))
<div class="row">
	<div class="col-sm-12 col-md-12 col-md-offset-12 col-sm-sm-offset-12">
		<div id="charge-message" class="alert alert-success">
			{{ Session::get('success_message') }}
		</div>
	</div> 
</div>
@endif
@foreach($products->chunk(3) as $productChunk)
<div class="row">
	@foreach($productChunk as $product)
	<div class="col-sm-6 col-md-4">
		<div class="img-thumbnail">
			<img src="{{ $product->imagePath }}" alt="..." class="rounded mx-auto d-block img-responsive">
			<div class="caption">
				<h3>{{ $product->title }}</h3>
				<p class="description">{{ $product->description }}</p>
				<div class="clearfix">
					<div class="float-left price">${{ $product->price }}</div>
					<a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success float-right" role="button">Add to cart</a>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endforeach
@endsection
