<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex justify-content-center">
    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
      <!-- Logo -->
      <a class="navbar-brand brand-logo">
        <img src="{{ asset('assetsbackend/images/logo.svg') }}" alt="logo"/>
      </a>
      <a class="navbar-brand brand-logo-mini">
        <img src="{{ asset('assetsbackend/images/logo-mini.svg') }}" alt="logo"/>
      </a>
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="typcn typcn-th-menu"></span>
      </button>
    </div>
  </div>

  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <ul class="navbar-nav mr-lg-2">
      <!-- Foto + Nama User -->
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link">
<img class="profile-pic" src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('assetsbackend/images/faces/face5.jpg') }}" alt="profile"/>
          <span class="nav-profile-name">{{ Auth::user()->name ?? 'Guest' }}</span>
        </a>
      </li>
    </ul>

    <!-- Tombol di kanan -->
    <ul class="navbar-nav navbar-nav-right">
      <!-- Tombol Profile -->
      <li class="nav-item">
        <a href="{{ url('adminpanel/profile') }}" class="btn btn-sm btn-primary me-2">
          Profile
        </a>
      </li>

      <!-- Tombol Logout -->
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-sm btn-danger">
            Logout
          </button>
        </form>
      </li>
    </ul>

    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="typcn typcn-th-menu"></span>
    </button>
  </div>
</nav>
