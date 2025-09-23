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
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
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
    <script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');
    const fileNameInput = document.querySelector('.file-upload-info');

    if (input.files && input.files[0]) {
        // Tampilkan nama file di input text
        fileNameInput.value = input.files[0].name;

        // Tampilkan preview gambar
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        fileNameInput.value = '';
        preview.src = '';
        preview.style.display = 'none';
    }
}
</script>

</body>

</html>
