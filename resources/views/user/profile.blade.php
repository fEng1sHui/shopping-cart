@extends('layouts.master')
@section('title')
Sign Up
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-md-offset-2">
		<h1>User profile</h1>
		<hr>
		<h2>My orders</h2>
		@foreach($orders as $order)
		<div class="card">
			<div class="card-header">
				<h5>Date of order: {{ $order['created_at'] }}</h5>
			</div>
			<div class="card-body">
				<ul class="list-group">
					@foreach($order->cart->items as $item)
					<li class="list-group-item">
						<span class="badge badge-pill badge-secondary">{{ $item['qty'] }}</span>
						{{ $item['item']['title'] }}
						<span class="badge badge-success">${{ $item['price'] }}</span>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="card-header">
				<strong>Total Price: ${{ $order->cart->totalPrice }}</strong>
			</div>
		</div>
		</br>
		@endforeach
	</div>
</div>
@endsection