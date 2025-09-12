<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
        <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('assetsbackend/images/logo.svg') }}" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('assetsbackend/images/logo-mini.svg') }}" alt="logo"/></a>
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        </button>
    </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <ul class="navbar-nav mr-lg-2">
        <li class="nav-item nav-profile dropdown">
        <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="{{ asset('assetsbackend/images/faces/face5.jpg') }}" alt="profile"/>
            <span class="nav-profile-name">Eugenia Mullins</span>
        </a>
        </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="typcn typcn-th-menu"></span>
    </button>
    </div>
</nav>
<nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <ul class="navbar-nav mr-lg-2">
        <li class="nav-item ml-0">
        <h4 class="mb-0">{{ request()->is('adminpanel/gallery') ? 'active' : '' }}</h4>
        </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-search d-none d-md-block mr-0">
        <div class="input-group">
        </div>
        </li>
    </ul>
    </div>
</nav>
