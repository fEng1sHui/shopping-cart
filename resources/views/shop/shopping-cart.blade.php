@extends('layouts.master')

@section('title')
Laravel Shopping Cart
@endsection

@section('content')
@if(Session::has('cart'))
<h1>Shopping Cart</h1>
<div class="row">
	<div class="col-sm-12 col-md-12 col-md-offset-12 col-sm-offset-12">
		<ul class="list-group">
			@foreach($products as $product)
			<li class="list-group-item">
				<span class="badge badge-pill badge-secondary">{{ $product['qty'] }}</span>
				<strong>{{ $product['item']['title'] }}</strong>
				<span class="badge badge-success">${{ $product['price'] }}</span>
				<div class="btn-group">
					<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Action
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Reduce by 1</a>
						<a class="dropdown-item" href="{{ route('product.remove', ['id' => $product['item']['id']]) }}">Reduce All</a>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
</div>
</br>
<div class="row">
	<div class="col-sm-12 col-md-12 col-md-offset-12 col-sm-offset-12">
		<strong>Total: ${{ $totalPrice }}</strong>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-12 col-md-12 col-md-offset-12 col-sm-offset-12">
		<a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
	</div>
</div>
@else
<div class="row">
	<div class="col-sm-12 col-md-12 col-md-offset-12 col-sm-offset-12">
		<h1>Your Shopping Cart is empty</h1>
		<p><a href="{{ route('product.index') }}">Don't miss out on great deals! Start shopping</a> or <a href="{{ route('user.signin') }}">log in</a> to view products added.</p>
	</div>
</div>
@endif
@endsection