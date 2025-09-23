@extends('layout.frontend.app')
@section('content')
      <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Services</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">Services</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- partnership -->
    <section id="team" class="team section">

            <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>FEATURES</h2>
        <p>SERVICES<br></p>
      </div>
      <!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

            @foreach ($services as $service)
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"
                            style="aspect-ratio: 1 / 1; width: 100%; max-width: 200px; overflow:hidden; border-radius:8px; flex-shrink:0;">
                            <img src="{{ asset('storage/' . $service->photo) }}" class="img-fluid" alt=""
                                style="width:100%; height:100%; object-fit:{{ $service->is_square ? 'contain' : 'cover' }}; object-position:center;">
                        </div>
                        <div class="member-info">
                            <h4>{{ $service->title }}</h4>
                            <span></span>
                            <p>{{ $service->description }}</p>
                        </div>
                    </div>
                </div><!-- End Team Member -->
            @endforeach

        </div>

      </div>

    </section>
    <!-- /partnership -->

  </main>
@endsection