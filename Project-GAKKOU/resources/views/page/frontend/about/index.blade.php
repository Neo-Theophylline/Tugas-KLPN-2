@extends('layout.frontend.app')
@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">About</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">About</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- About 2 Section -->
        @foreach ($histories as $history)
            @foreach ($abouts as $about)
                <section id="about-2" class="about-2 section">

                    <div class="container" data-aos="fade-up">

                        <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                            <div class="col-lg-5">
                                <div class="about-img"
                                    style="width:380px; height:480px; overflow:hidden; position:relative;">

                                    <!-- Foto About -->
                                    <img src="{{ asset('storage/' . $about->photo) }}" alt="" id="aboutPhoto"
                                        style="width:100%; height:100%; object-fit:cover; object-position:center;">

                                    <!-- Foto History -->
                                    <img src="{{ asset('storage/' . $history->photo) }}" alt="" id="historyPhoto"
                                        class="d-none"
                                        style="width:100%; height:100%; object-fit:cover; object-position:center;">
                                </div>

                            </div>

                            <div class="col-lg-7">
                                <h3 class="pt-0 pt-lg-5">About and History SMK NEGERI RIZZ</h3>

                                <!-- Tabs -->
                                <ul class="nav nav-pills mb-3">
                                    <li><a class="nav-link active" data-bs-toggle="pill" href="#about-2-tab1">{!! str_replace('  ', '<br>', $about->title) !!}</a>
                                    </li>
                                    <li><a class="nav-link" data-bs-toggle="pill" href="#about-2-tab2">{!! str_replace('  ', '<br>', $history->title) !!}</a></li>
                                </ul><!-- End Tabs -->

                                <!-- Tab Content -->
                                <div class="tab-content">

                                    {{-- ABOUTUS SEC --}}

                                    <div class="tab-pane fade show active" id="about-2-tab1">
                                        <div class="d-flex align-items-center mt-4">
                                        </div>
                                        <p>{!! str_replace('  ', '<br>', $about->description) !!}</p>

                                    </div>
            @endforeach
            {{-- /ABOUTUS SEC --}}

            {{-- HISTORY SEC --}}
            <div class="tab-pane fade" id="about-2-tab2">

                <div class="d-flex align-items-center mt-4">
                </div>
                <p>{!! str_replace('  ', '<br>', $history->description) !!}</p>

            </div>
            {{-- /HISTORY SEC --}}
        @endforeach

        </div>

        </div>

        </div>

        </div>

        </section>
        <!-- /About 2 Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section light-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Clients</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Hours Of Support</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Workers</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section>
        <!-- /Stats Section -->

        <!-- partnership -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>EMPLOYED</h2>
                <p>WORKER<br></p>
            </div>
            <!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    @foreach ($workers as $worker)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="team-member d-flex align-items-start">
                                <div class="pic"
                                    style="aspect-ratio: 1 / 1; width: 100%; max-width: 200px; overflow:hidden; border-radius:8px; flex-shrink:0;">
                                    <img src="{{ asset('storage/' . $worker->photo) }}" class="img-fluid" alt=""
                                        style="width:100%; height:100%; object-fit:{{ $worker->is_square ? 'contain' : 'cover' }}; object-position:center;">
                                </div>
                                <div class="member-info">
                                    <h4>{!! str_replace('  ', '<br>', $worker->name) !!}</h4>
                                    <span>{{ $worker->position }}</span>
                                    <p>{{ $worker->description }}</p>
                                </div>
                            </div>
                        </div><!-- End Team Member -->
                    @endforeach

                </div>

            </div>

        </section>
        <!-- /partnership -->

    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const aboutPhoto = document.getElementById("aboutPhoto");
            const historyPhoto = document.getElementById("historyPhoto");

            // Event bootstrap tab
            document.querySelector('[href="#about-2-tab1"]').addEventListener("shown.bs.tab", function() {
                aboutPhoto.classList.remove("d-none");
                historyPhoto.classList.add("d-none");
            });

            document.querySelector('[href="#about-2-tab2"]').addEventListener("shown.bs.tab", function() {
                historyPhoto.classList.remove("d-none");
                aboutPhoto.classList.add("d-none");
            });
        });
    </script>
@endsection
