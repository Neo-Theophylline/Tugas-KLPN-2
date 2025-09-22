@extends('layout.frontend.app')
@section('content')
    <main class="main">

        <!-- bg welcome section -->

        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                @foreach ($heroes as $hero)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        @if ($hero->photo)
                            <img src="{{ asset('storage/' . $hero->photo) }}" alt="Current Photo">
                        @endif
                        <div class="carousel-container"
                            style="display:flex !important; flex-direction:column !important; justify-content:center !important; align-items:center !important; text-align:center !important; width:100% !important;">
                            <h2 style="width:100%; text-align:center;">{!! str_replace('  ', '<br>', $hero->title) !!}</h2>
                            <p style="width:100%; text-align:center;">{!! str_replace('  ', '<br>', $hero->subtitle) !!}</p>
                        </div>


                    </div>
                @endforeach


                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

                <ol class="carousel-indicators"></ol>

            </div>

        </section>


        <!-- /bg elcome section -->

        <!-- about section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>About</h2>
                <p>About Us<br></p>
            </div>
            <!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    @foreach ($abouts as $about)
                        <div class="col-lg-10 content" data-aos="fade-up" data-aos-delay="100">
                            <p>{!! str_replace('  ', '<br>', $about->prescription) !!}</p>
                            <a href="about" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                        </div>
                    @endforeach
                </div>
            </div>

        </section>
        <!-- /about section -->

        <!-- icon sponsor -->
        <section id="clients" class="clients section light-background">

            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
                    </div><!-- End Client Item -->

                </div>

            </div>

        </section>
        <!-- /icon sponsor -->

        <!-- partnership -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>PARTNER</h2>
                <p>PARTNERSHIP<br></p>
            </div>
            <!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">
                    @foreach ($partners as $partner)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="team-member d-flex align-items-start">
                                <div class="pic"
                                    style="aspect-ratio: 1 / 1; width: 100%; max-width: 200px; overflow:hidden; border-radius:8px; flex-shrink:0;">
                                    <img src="{{ asset('storage/' . $partner->photo) }}" class="img-fluid" alt=""
                                        style="width:100%; height:100%; object-fit:{{ $partner->is_square ? 'contain' : 'cover' }}; object-position:center;">
                                </div>
                                <div class="member-info">
                                    <h4>{{ $partner->name }}</h4>
                                    <span>{{ $partner->position }}</span>
                                    <p>{{ $partner->description }}</p>
                                </div>
                            </div>
                        </div><!-- End Team Member -->
                    @endforeach

                </div>

            </div>
            <!-- End Team Member -->
        </section>
        <!-- /partnership -->

        <!-- 3 foto gallery -->
        <section id="portfolio" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Gallery</h2>
                <p>Photo</p>
            </div>
            <!-- End Section Title -->

            {{-- FOTO --}}
            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($galleries as $gallery)
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">

                                <!-- Judul -->
                                <div>
                                    <h6 style="margin-left:20px; margin-bottom:10px;">
                                        {{ $gallery->title }}
                                    </h6>
                                </div>

                                <!-- Foto di tengah -->
                                <div style="display:flex; justify-content:center; margin-bottom:10px;">
                                    <img src="{{ asset('storage/' . $gallery->photo) }}" alt=""
                                        style="width:336px; height:520px; object-fit:cover;">
                                </div>

                                <!-- Deskripsi -->
                                <div class="portfolio-info" style="text-align:left;">
                                    <p style="margin-left:20px; margin-bottom:10px;">
                                        {{ $gallery->description }}
                                    </p>
                                    <a href="{{ asset('storage/' . $gallery->photo) }}" title="{{ $gallery->title }}"
                                        data-gallery="portfolio-gallery-product" class="glightbox preview-link"
                                        style="display:inline-block; margin-left:40px;">
                                        <i class="bi bi-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section>
        <!-- /3 foto di gallery -->

    </main>
@endsection
