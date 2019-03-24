@extends('layouts.master')

@section('title')
	Laravel Shopping Cart
@endsection

@section('content')
	@if(Session::has('cart'))
		<div class="row">
			<div class="col-sm-12 col-md-12 col-md-offset-12 col-sm-offset-12">
				<ul class="list-group">
					@foreach($products as $product)
						<li class="list-group-item">
							<span class="badge badge-pill badge-secondary">{{ $product['qty'] }}</span>
							<strong>{{ $product['item']['title'] }}</strong>
							<span class="badge badge-success">{{ $product['price'] }}</span>
							<div class="btn-group">
							  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    Action
							  </button>
							  <div class="dropdown-menu">
							    <a class="dropdown-item" href="#">Reduce by 1</a>
							    <a class="dropdown-item" href="#">Reduce All</a>
							  </div>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-md-offset-12 col-sm-offset-12">
				<strong>Total: {{ $totalPrice }}</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-md-offset-12 col-sm-offset-12">
				<button type="button" class="btn btn-success">Checkout</button>
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-sm-12 col-md-12 col-md-offset-12 col-sm-offset-12">
				<h2>No items in Cart!</h2>
			</div>
		</div>
	@endif
@endsection