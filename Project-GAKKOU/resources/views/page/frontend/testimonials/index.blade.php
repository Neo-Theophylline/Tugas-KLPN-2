@extends('layout.frontend.app')
@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Testimonials</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Testimonials</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section">

            <div class="container">

                <div class="row gy-4">
                    @foreach ($testimonials as $testimonial)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="testimonial-item">
                                <img src="{{ asset('storage/' . $testimonial->photo) }}"class="testimonial-img" alt=""
                                    style="width:80px; height:80px; object-fit:cover; border-radius:50%;">

                                <h3>{{ $testimonial->name }}</h3>
                                <td class="align-middle text-wrap">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $testimonial->stars)
                                            <span class="display-6" style="color: gold;">&#9733;</span>
                                        @else
                                            <span class="display-6" style="color: gray;">&#9733;</span>
                                        @endif
                                    @endfor
                                </td>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>{{ $testimonial->description }}</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->
                    @endforeach


                </div>

            </div>

        </section><!-- /Testimonials Section -->

    </main>
@endsection
