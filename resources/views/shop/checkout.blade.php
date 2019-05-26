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
        <form action="{{ route('checkout') }}" method="POST" id="payment-form">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" required>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input type="text" class="form-control" id="province" name="province" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="postalcode">Postal Code</label>
                        <input type="text" class="form-control" id="postalcode" name="postalcode" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label for="card-element">Credit Card</label>
                <div id="card-element">
                  <!-- a Stripe Element will be inserted here. -->
              </div>

              <!-- Used to display form errors -->
              <div id="card-errors" role="alert"></div>
          </div>

          <div class="form-group">
            <label for="name_on_card">Card Holder Name</label>
            <input type="text" class="form-control" id="name_on_card" name="name_on_card" required>
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