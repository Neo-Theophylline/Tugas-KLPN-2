@extends('layout.backend.app')
@section('css')
    .profile-picture {
        width: 120px !important;
        height: 120px !important;
        object-fit: cover !important;
        display: block;
        margin: 0 auto;
    }
@endsection
@section('content')
<main class="main">
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <div class="row align-items-center">
                <!-- Foto Profil -->
                <div class="col-md-3 text-center mb-3 mb-md-0">
                    <img class="profile-picture" src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('assetsbackend/images/faces/face5.jpg') }}" 
                         alt="Profile Picture"  width="120" height="120">
                </div>

                <!-- Info User -->
                <div class="col-md-9">
                    <h4 class="mb-2">{{ Auth::user()->name ?? 'Guest' }}</h4>
                    <p class="text-muted mb-3">{{ Auth::user()->email ?? '-' }}</p>

                    @auth
                    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
