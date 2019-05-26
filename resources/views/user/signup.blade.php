@extends('layouts.master')
@section('title')
Sign Up
@endsection
@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1>Sign Up</h1>
			@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $error)
						<p>{{ $error }}</p>
					@endforeach
				</div>
			@endif
			<form action="{{ route('user.signup') }}" method="post">
				<div class="form-group">
					<label for="email">E-Mail</label>
					<input type="text" id="email" name="email" placeholder="example@mail.com" class="form-control">
				</div>
				<div class="form-group">
					<label for="passsword">Password</label>
					<input type="password" id="password" name="password" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Sign Up</button>
				{{ csrf_field() }}
			</form>
		</br>
		<p><a href="{{ route('user.signin') }}">Already have an account?</a></p>
		</div>
	</div>
@endsection