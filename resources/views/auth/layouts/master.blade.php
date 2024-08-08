<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    @include('auth.layouts.partials.head')

</head>

<body>

    <div class="auth-page-wrapper pt-5">

        @yield('content')

        <!-- footer -->
        @include('auth.layouts.partials.footer')
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    @include('auth.layouts.partials.js')
</body>

</html>
