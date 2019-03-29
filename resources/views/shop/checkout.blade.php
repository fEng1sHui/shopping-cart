@extends('layouts.master')

@section('title')
	Checkout
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Checkout</h1>
            <h4>Your Total: ${{ $total }}</h4>
            <div class="form-group">
                <div id="card-element">
                      <!-- A Stripe Element will be inserted here. -->
                    </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ URL::to('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/checkout.js') }}"></script>
@endsection