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
    <div class="container-fluid page-body-wrapper">
        @yield('content')
    </div>
  </div>
  <!-- container-scroller -->
    <script>
        // ambil elemen
        const fileInput = document.getElementById('fileInput');
        const fileNameField = document.querySelector('.file-upload-info');

        // saat file dipilih
        fileInput.addEventListener('change', function() {
            if (this.files && this.files.length > 0) {
                fileNameField.value = this.files[0].name; // tampilkan nama file
            } else {
                fileNameField.value = "";
            }
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