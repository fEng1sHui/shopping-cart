<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('product.index') }}">Brand</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('product.shoppingCart') }}"><i class="fas fa-shopping-cart"></i> Shopping Cart <span class="badge badge-pill badge-secondary">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>
          User Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          @if(Auth::check())
            <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fas fa-user"></i> User Profile</a>
            <a class="dropdown-item" href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
          @else
            <a class="dropdown-item" href="{{ route('user.signup') }}"><i class="fas fa-user-plus"></i> Signup</a>
            <a class="dropdown-item" href="{{ route('user.signin') }}"><i class="fas fa-sign-in-alt"></i> Signin</a>
          @endif
        </div>
      </li>
    </ul>
  </div>
</nav>