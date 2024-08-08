<div class="header--navbar style--1 navbar bd--color-1 bg--color-1" data-trigger="sticky">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav"
                aria-expanded="false" aria-controls="headerNav">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div id="headerNav" class="navbar-collapse collapse float--left">
            <!-- Header Menu Links Start -->
            <ul class="header--menu-links nav navbar-nav" data-trigger="hoverIntent">
                <li class="dropdown">
                    <a href="\" class="">Tranh chủ</a>
                </li>
                @foreach ($categories as $item)
                    @if (!$item->children->isEmpty())
                        <li class="dropdown">
                            <a href="{{ route('category', $item->slug) }}" 
                                >{{ $item->name }}<i class="fa flm fa-angle-down"></i></a>

                            <ul class="dropdown-menu">
                                @foreach ($item->children as $child)
                                    <li><a href="{{ route('category', $child->slug) }}">{{ $child->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ route('category', $item->slug) }}">{{ $item->name }}</a></li>
                    @endif
                @endforeach
            </ul>
            <!-- Header Menu Links End -->
        </div>

        <!-- Header Search Form Start -->
        <form method="post" action="{{ route('search') }}" class="header--search-form float--right"
            data-form="validate">
            @csrf
            <input type="search" name="search" placeholder="Tìm kiếm..." class="header--search-control form-control"
                required>

            <button type="submit" class="header--search-btn btn"><i
                    class="header--search-icon fa fa-search"></i></button>
        </form>
        <!-- Header Search Form End -->
    </div>
</div>
