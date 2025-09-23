<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

        <li class="nav-item {{ request()->is('adminpanel/users') ? 'active' : '' }}">
      <a class="nav-link"  href="/adminpanel/users">
        <i class="typcn typcn-device-desktop menu-icon"></i>
        <span class="menu-title">User</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/hero') ? 'active' : '' }}">
      <a class="nav-link"  href="/adminpanel/hero">
        <i class="typcn typcn-star-outline menu-icon"></i>
        <span class="menu-title">Hero</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/about') ? 'active' : '' }}">
      <a class="nav-link"  href="/adminpanel/about">
        <i class="typcn typcn-info-large menu-icon"></i>
        <span class="menu-title">About us</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/services') ? 'active' : '' }}">
      <a class="nav-link"  href="/adminpanel/services">
        <i class="typcn typcn-briefcase menu-icon"></i>
        <span class="menu-title">Services</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/gallery') ? 'active' : '' }}">
      <a class="nav-link"  href="/adminpanel/gallery">
        <i class="typcn typcn-th-large-outline menu-icon"></i>
        <span class="menu-title">Gallery</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/testimonial') ? 'active' : '' }}">
      <a class="nav-link"  href="/adminpanel/testimonial">
        <i class="typcn typcn-message menu-icon"></i>
        <span class="menu-title">Testimonial</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/history') ? 'active' : '' }}">
      <a class="nav-link"  href="/adminpanel/history">
        <i class="typcn typcn-book menu-icon"></i>
        <span class="menu-title">History</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/worker') ? 'active' : '' }}">
      <a class="nav-link"  href="/adminpanel/worker">
        <i class="typcn typcn-group-outline menu-icon"></i>
        <span class="menu-title">Worker</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/partner') ? 'active' : '' }}">
      <a class="nav-link"  href="/adminpanel/partner">
        <i class="typcn typcn-briefcase menu-icon"></i>
        <span class="menu-title">Partner</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/media') ? 'active' : '' }}">
      <a class="nav-link"  href="/adminpanel/media">
        <i class="typcn typcn-social-facebook-circular menu-icon"></i>
        <span class="menu-title">Media Social</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/contact') ? 'active' : '' }}">
      <a class="nav-link"  href="/adminpanel/contact">
        <i class="typcn typcn-mail menu-icon"></i>
        <span class="menu-title">Contact</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/statistic') ? 'active' : '' }}">
      <a class="nav-link"  href="/adminpanel/statistic">
        <i class="typcn typcn-device-desktop menu-icon"></i>
        <span class="menu-title">Statistic</span>
      </a>
    </li>

  </ul>
</nav>