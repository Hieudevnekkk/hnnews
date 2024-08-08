<div class="header--topbar bg--color-2">
    <div class="container">
        <div class="float--left float--xs-none text-xs-center">
            <!-- Header Topbar Info Start -->
            <ul class="header--topbar-info nav">
                <li><i class="fa fm fa-map-marker"></i>Hà Nội</li>
                <li><i class="fa fm fa-mixcloud"></i>21<sup>0</sup> C</li>
                <li><i class="fa fm fa-calendar"></i>Today ({{ date('d-m-Y') }})</li>
            </ul>
            <!-- Header Topbar Info End -->
        </div>

        <div class="float--right float--xs-none text-xs-center">
            <!-- Header Topbar Action Start -->
            @if (\Auth::user())
                <ul class="header--topbar-action nav">
                    <li><i class="fa fm fa-user-o"></i>Xin chào, {{ \Auth::user()->name }}</li>
                    <li>
                        <form action="{{ route('auth.logout') }}" method="post">
                            @csrf
                            <button class="btn btn-link" type="submit"> <i class="fa fm fa-user-o"></i>Đăng
                                xuất</button>
                        </form>
                    </li>
                </ul>
            @else
                <ul class="header--topbar-action nav">
                    <li><a href="{{ route('auth.register.show') }}"><i class="fa fm fa-user-o"></i>Đăng ký</a></li>
                    <li><a href="{{ route('auth.login.show') }}"><i class="fa fm fa-user-o"></i>Đăng nhập</a></li>
                </ul>
            @endif


            <!-- Header Topbar Action End -->

            <!-- Header Topbar Language Start -->
            <ul class="header--topbar-lang nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fm fa-language"></i>Tiếng Việt<i class="fa flm fa-angle-down"></i></a>

                    <ul class="dropdown-menu">
                        <li><a href="#">Tiếng Việt</a></li>
                        <li><a href="#">Tiếng Anh</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Header Topbar Language End -->

            <!-- Header Topbar Social Start -->
            <ul class="header--topbar-social nav hidden-sm hidden-xxs">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
            </ul>
            <!-- Header Topbar Social End -->
        </div>
    </div>
</div>
