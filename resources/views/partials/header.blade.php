<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Brand</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Shopping Cart</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>
          User Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('user.signup') }}"><i class="fas fa-user-plus"></i></i> Signup</a>
          <a class="dropdown-item" href="#"><i class="fas fa-sign-in-alt"></i> Signin</a>
          <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>