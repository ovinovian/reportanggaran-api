<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>PROVINSI KEPULAUAN BANGKA BELITUNG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">

    <link rel="shortcut icon" href="{{ asset('assets/images/users/16.png')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'api-anggaran') }}</title>

    @include('layouts.partials.style')

    @yield("style")

</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <main>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.partials.lsidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    @include('layouts.partials.topbar')
                    <!-- end Topbar -->

                    @yield("content")
                    <!-- content -->

                    <!-- Footer Start -->
                    @include('layouts.partials.footer')
                    <!-- end Footer -->

                </div>

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        @include('layouts.partials.rsidebar')
        <!-- /End-bar -->

        @include('layouts.partials.script')

        @yield("script")

        @stack('before-scripts')
        <script src="{{ asset('js/app.js') }}"></script>
        {{-- <script>
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                      return new bootstrap.Tooltip(tooltipTriggerEl)
                    });
        </script> --}}
        @stack('after-scripts')

    </main>
</body>

</html>