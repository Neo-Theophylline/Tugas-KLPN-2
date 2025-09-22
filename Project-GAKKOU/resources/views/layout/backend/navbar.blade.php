<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-150">
             <a class="navbar-brand brand-logo" href="index.html">
                 <img src="{{ asset('assetsbackend/images/faces/face5.jpg') }}" alt="logo"/>
             </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="{{ asset('assetsbackend/images/faces/face5.jpg') }}" alt="profile" />
                    <span class="nav-profile-name">FineeeeeShyyyyyytttttttttttttttttttttttttttttttttttttttttttt</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="mdi mdi-account text-primary"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <!-- Tombol Logout -->
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="mdi mdi-logout text-danger"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
