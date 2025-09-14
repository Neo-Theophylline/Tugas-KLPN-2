<!-- partial:partials/_settings-panel.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{ request()->is('adminpanel/dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="dashboard" >
        <i class="typcn typcn-device-desktop menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/hero') ? 'active' : '' }}">
      <a class="nav-link" href="hero" >
        <i class="typcn typcn-document-text menu-icon"></i>
        <span class="menu-title">Hero</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/about') ? 'active' : '' }}">
      <a class="nav-link" href="about">
        <i class="typcn typcn-film menu-icon"></i>
        <span class="menu-title">About us</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/services') ? 'active' : '' }}">
      <a class="nav-link"  href="services">
        <i class="typcn typcn-chart-pie-outline menu-icon"></i>
        <span class="menu-title">Services</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/gallery') ? 'active' : '' }}">
      <a class="nav-link"  href="gallery">
        <i class="typcn typcn-th-small-outline menu-icon"></i>
        <span class="menu-title">Gallery</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/testimonials') ? 'active' : '' }}">
      <a class="nav-link"  href="testimonials">
        <i class="typcn typcn-compass menu-icon"></i>
        <span class="menu-title">Testimonials</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/history') ? 'active' : '' }}">
      <a class="nav-link"  href="history">
        <i class="typcn typcn-user-add-outline menu-icon"></i>
        <span class="menu-title">Sejarah</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/worker') ? 'active' : '' }}">
      <a class="nav-link"  href="worker">
        <i class="typcn typcn-globe-outline menu-icon"></i>
        <span class="menu-title">Tenaga Kerja</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/partner') ? 'active' : '' }}">
      <a class="nav-link" href="partner">
        <i class="typcn typcn-mortar-board menu-icon"></i>
        <span class="menu-title">Partner</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('adminpanel/media') ? 'active' : '' }}">
      <a class="nav-link" href="media">
        <i class="typcn typcn-mortar-board menu-icon"></i>
        <span class="menu-title">Media Socials</span>
      </a>
    </li>
  </ul>
</nav>
