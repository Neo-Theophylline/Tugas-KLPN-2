<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-150">
             <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('assetsbackend/images/faces/face5.jpg') }}" alt="logo"/></a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="{{ asset('assetsbackend/images/faces/face5.jpg') }}" alt="profile" />
                    <span class="nav-profile-name">FineeeeeShyyyyyytttttttttttttttttttttttttttttttttttttttttttt</span>
                </a> 
            </li>
        </ul>
    </div>
</nav>
<nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item ml-0">
                <h4 class="mb-0">{{ request()->is('adminpanel/dashboard') ? 'AdminPanel - Dashboard' : '' }}</h4>
                <h4 class="mb-0">{{ request()->is('adminpanel/hero') ? 'AdminPanel - Hero' : '' }}</h4>
                <h4 class="mb-0">{{ request()->is('adminpanel/about') ? 'AdminPanel - About Us' : '' }}</h4>
                <h4 class="mb-0">{{ request()->is('adminpanel/gallery') ? 'AdminPanel - Gallery' : '' }}</h4>
                <h4 class="mb-0">{{ request()->is('adminpanel/services') ? 'AdminPanel - Services' : '' }}</h4>
                <h4 class="mb-0">{{ request()->is('adminpanel/testimonials') ? 'AdminPanel - Testimonials' : '' }}</h4>
                <h4 class="mb-0">{{ request()->is('adminpanel/history') ? 'AdminPanel - History' : '' }}</h4>
                <h4 class="mb-0">{{ request()->is('adminpanel/worker') ? 'AdminPanel - Worker' : '' }}</h4>
                <h4 class="mb-0">{{ request()->is('adminpanel/partner') ? 'AdminPanel - Partner' : '' }}</h4>
                <h4 class="mb-0">{{ request()->is('adminpanel/media') ? 'AdminPanel - Media' : '' }}</h4>
            </li>
        </ul>
    </div>
</nav>
