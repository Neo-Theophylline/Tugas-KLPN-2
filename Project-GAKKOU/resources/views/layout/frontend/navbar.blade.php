  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">RIZZ SCHOOL</h1>
      </a>


      <nav id="navmenu" class="navmenu">
        <ul>
      {{-- nav-list --}}
          <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
          <li><a href="about" class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
          <li><a href="services" class="{{ request()->is('services') ? 'active' : '' }}">Services</a></li>
          <li><a href="testimonials" class="{{ request()->is('testimonials') ? 'active' : '' }}">Testimonials</a></li>
          <li><a href="contact" class="{{ request()->is('contact') ? 'active' : '' }}">Contact us</a></li>
      {{-- /nav-list --}}
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>