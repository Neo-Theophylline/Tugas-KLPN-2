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
  <link rel="shortcut icon" href="{{ asset('assetsbackend/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ asset('assetsbackend/images/logo-dark.svg') }}" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3"  action="{{ route('signin') }}" method="post">
                @csrf
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg"name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" required>
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"><button type="submit">SIGN IN</button></a>
                </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{ asset('assetsbackend/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('assetsbackend/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assetsbackend/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assetsbackend/js/template.js') }}"></script>
  <script src="{{ asset('assetsbackend/js/settings.js') }}"></script>
  <script src="{{ asset('assetsbackend/js/todolist.js') }}"></script>
</body>

</html>
