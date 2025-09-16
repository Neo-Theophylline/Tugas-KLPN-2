<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PolluxUI Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('assetsbackend/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsbackend/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsbackend/css/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assetsbackend/images/favicon.png') }}">
</head>

<body>
    <div class="row" id="proBanner">
        <div class="col-12">
            <span class="d-flex align-items-center">
                <i id="bannerClose"></i>
            </span>
        </div>
    </div>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('layout.backend.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            @include('layout.backend.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                @include('layout.backend.footer')
            </div>
        </div>
    </div>
    <!-- container-scroller -->

    <style>
    .star {
        font-size: 30px;
        cursor: pointer;
        color: lightgray;
        transition: 0.2s;
    }
    .star.selected {
        color: gold;
    }
    .star:hover {
        transform: scale(1.2);
    }
</style>

<script>
    const stars = document.querySelectorAll('.star');
    const starsInput = document.getElementById('stars');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            let value = this.getAttribute('data-value');
            starsInput.value = value;

            // reset semua
            stars.forEach(s => s.classList.remove('selected'));

            // kasih warna sesuai value
            for (let i = 0; i < value; i++) {
                stars[i].classList.add('selected');
            }
        });
    });
</script>


    <!-- base:js -->
    <script src="{{ asset('assetsbackend/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('assetsbackend/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('assetsbackend/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assetsbackend/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assetsbackend/js/template.js') }}"></script>
    <script src="{{ asset('assetsbackend/js/settings.js') }}"></script>
    <script src="{{ asset('assetsbackend/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assetsbackend/js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
</body>

</html>
