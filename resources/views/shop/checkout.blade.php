@extends('layouts.master')

@section('title')
	Checkout
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-5 col-md-offset-4 col-sm-offset-3">
            <h1>Checkout</h1>
            <h4>Your Total: ${{ $total }}</h4></br>
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('checkout.submit') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email">
                    </div>

                    <div class="form-group">
                        <label for="name_on_card">Name on Card</label>
                        <input type="text" class="form-control" id="name_on_card" name="name_on_card">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="province">Province</label>
                                <input type="text" class="form-control" id="province" name="province">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="postalcode">Postal Code</label>
                                <input type="text" class="form-control" id="postalcode" name="postalcode">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </div>

                    </div>

                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cc_number">Credit Card Number</label>
                                <input type="text" class="form-control" id="cc_number" name="cc_number">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="expiry">Expiry</label>
                                <input type="text" class="form-control" id="expiry" name="expiry">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cvc">CVC</label>
                                <input type="text" class="form-control" id="cvc" name="cvc">
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <label for="card-element">Credit Card</label>
                        <div id="card-element">
                          <!-- a Stripe Element will be inserted here. -->
                      </div>

                      <!-- Used to display form errors -->
                      <div id="card-errors" role="alert"></div>
                    </div>

                    <div class="spacer"></div>

                    <button type="submit" class="btn btn-success">Submit payment</button>

                </form>
            </div>
        </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ URL::to('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/checkout.js') }}"></script>
@endsection