<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>DC - @yield('title')</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('front/css/styles.css') }}" rel="stylesheet" />
        <!-- Izitoast -->
        <link rel="stylesheet" href="{{ asset('lib/iziToast/dist/css/iziToast.min.css') }}">
        <!-- Summernotes -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation -->
        @include('fs.layout.nav')
        <!-- End Navigation-->

        <!-- Page Header -->
        @yield('header-section')
        <!-- End Header -->

        <!-- Main Content -->
        @yield('content-section')
        <!-- End Main Content -->

        <!-- Footer-->
        @include('fs.layout.footer')
        <!-- End Footer-->

        <!-- Bootstrap core JS-->
        <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('front/js/scripts.js') }}"></script>
        <!-- Izitoast JS -->
        <script src="{{ asset('lib/iziToast/dist/js/iziToast.min.js') }}"></script>
        <!-- Summernote js -->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <!-- Page level plugins -->
        <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

        @include('lib.izitoast')

        @stack('js')

        <script>
            $(document).ready(function () {
                $('pre').each(function () {
                    $(this).css({
                        "color": "#6531c2",
                        "background-color": "rgb(245 245 245)",
                        "padding": "15px",
                        "border-radius": "5px",
                        "width": "100%"
                    })
                })
            })
        </script>
    </body>
</html>
