<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    @include('client.layouts.partials.head')
</head>
<body>

    <!-- Preloader Start -->
    {{-- <div id="preloader">
        <div class="preloader bg--color-1--b" data-preloader="1">
            <div class="preloader--inner"></div>
        </div>
    </div> --}}
    <!-- Preloader End -->

    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Header Section Start -->
        <header class="header--section header--style-1">

            <!-- Header Topbar Start -->
            @include('client.layouts.partials.header_top')
            <!-- Header Topbar End -->

            <!-- Header Mainbar Start -->
            @include('client.layouts.partials.header_main')
            <!-- Header Mainbar End -->

            <!-- Header Navbar Start -->
            @include('client.layouts.partials.nav')
            <!-- Header Navbar End -->
        </header>
        <!-- Header Section End -->

        <!-- Posts Filter Bar Start -->
        @include('client.layouts.partials.posts_filter')
        <!-- Posts Filter Bar End -->

        <!-- News Ticker Start -->
  
        @include('client.layouts.partials.news_ticker')
        <!-- News Ticker End -->

        <!-- Main Content Section Start -->
        @yield('content')
        <!-- Main Content Section End -->

        <!-- Footer Section Start -->
        @include('client.layouts.partials.footer')
        <!-- Footer Section End -->
    </div>
    <!-- Wrapper End -->

    <!-- Sticky Social Start -->
    @include('client.layouts.partials.sticky_social')
    <!-- Sticky Social End -->

    <!-- Back To Top Button Start -->
    <div id="backToTop">
        <a href="#"><i class="fa fa-angle-double-up"></i></a>
    </div>
    <!-- Back To Top Button End -->

    @include('client.layouts.partials.js')
</body>
</html>
