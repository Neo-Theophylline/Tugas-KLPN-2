<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PolluxUI Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="assetsbackend/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="assetsbackend/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assetsbackend/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset ('assetsbackend/images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('layout.backend.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        @include('layout.backend.sidebar')

        @yield('content')

        @include('layout.backend.footer')
    </div>
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="assetsbackend/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="assetsbackend/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="assetsbackend/js/off-canvas.js"></script>
  <script src="assetsbackend/js/hoverable-collapse.js"></script>
  <script src="assetsbackend/js/template.js"></script>
  <script src="assetsbackend/js/settings.js"></script>
  <script src="assetsbackend/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assetsbackend/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

