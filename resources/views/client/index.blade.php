@extends('client.layouts.master')

@section('title')
    Hà Nội News
@endsection

@section('content')
    <div class="main-content--section pbottom--30">
        <div class="container">
            <!-- Main Content Start -->
            <div class="main--content">
                <!-- Post Items Start -->
                <div class="post--items post--items-1 pd--30-0">
                    <div class="row gutter--15">
                        <div class="col-md-6">
                            <!-- Post Item Start -->
                            <div class="post--item post--layout-1 post--title-larger">
                                <div class="post--img">
                                    <a href="{{ route('detail', $post_news[0]->slug) }}" class="thumb">
                                        <div class="" style="max-width: 565px; max-height: 390px"><img
                                                class="mw-100 mh-100" src="{{ \Storage::url($post_news[0]->image) }}"
                                                alt=""></div>
                                    </a>

                                    <div class="post--map">
                                        <div class="map--wrapper">
                                            <div data-map-latitude="23.790546" data-map-longitude="90.375583"
                                                data-map-zoom="6" data-map-marker="[[23.790546, 90.375583]]"></div>
                                        </div>
                                    </div>

                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li><a
                                                    href="{{ route('detail', $post_news[0]->slug) }}">{{ $post_news[0]->name_author }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('detail', $post_news[0]->slug) }}">{{ date_format($post_news[0]->created_at, 'd-m-Y') }}</a>
                                            </li>
                                        </ul>

                                        <div class="title">
                                            <h2 class="h4"><a href="{{ route('detail', $post_news[0]->slug) }}"
                                                    class="btn-link">{{ $post_news[0]->title }}</a></h2>
                                            <p>{{ $post_news[0]->sub_title }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Post Item End -->
                        </div>

                        <div class="col-md-6">
                            <div class="row gutter--15">
                                @for ($i = 1; $i < count($post_news); $i++)
                                    <div class="col-xs-6 hidden-xss">
                                        <!-- Post Item Start -->
                                        <div class="post--item post--layout-1 post--title-large">
                                            <div class="post--img">
                                                <a href="{{ route('detail', $post_news[$i]->slug) }}" class="thumb"><img
                                                        src="{{ \Storage::url($post_news[$i]->image) }}" alt=""></a>

                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a href="#">{{ $post_news[$i]->name_author }}</a></li>
                                                        <li><a
                                                                href="#">{{ date_format($post_news[$i]->created_at, 'd-m-Y') }}</a>
                                                        </li>
                                                    </ul>

                                                    <div class="title">
                                                        <h2 class="h4"><a
                                                                href="{{ route('detail', $post_news[$i]->slug) }}"
                                                                class="btn-link">{{ $post_news[$i]->title }}</a></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post Item End -->
                                    </div>
                                @endfor

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post Items End -->
            </div>
            <!-- Main Content End -->

            <div class="row">
                <!-- Main Content Start -->
                <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                    <div class="sticky-content-inner">
                        <div class="row">
                            <!-- World News Start -->
                            @php
                                $indexCategory = 1;
                            @endphp
                            @foreach ($post_category as $name_category => $posts)
                                @if ($indexCategory == 1 || $indexCategory == 4)
                                    <div class="col-md-6 ptop--30 pbottom--30">
                                        <!-- Post Items Title Start -->
                                        <div class="post--items-title" data-ajax="tab">
                                            <h2 class="h4">
                                                {{ $name_category }}
                                            </h2>

                                            <div class="nav">
                                                <a href="#" class="prev btn-link"
                                                    data-ajax-action="load_prev_world_news_posts">
                                                    <i class="fa fa-long-arrow-left"></i>
                                                </a>

                                                <span class="divider">/</span>

                                                <a href="#" class="next btn-link"
                                                    data-ajax-action="load_next_world_news_posts">
                                                    <i class="fa fa-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Post Items Title End -->

                                        <!-- Post Items Start -->
                                        <div class="post--items post--items-2" data-ajax-content="outer">
                                            <ul class="nav row gutter--15" data-ajax-content="inner">
                                                @foreach ($posts as $key => $post)
                                                    <li class="col-xs-{{ $key == 0 ? '12' : '6' }}">
                                                        <!-- Post Item Start -->
                                                        <div class="post--item post--layout-{{ $key == 0 ? '1' : '2' }}">
                                                            <div class="post--img">
                                                                <a href="{{ route('detail', $post->slug) }}"
                                                                    class="thumb"><img src="{{ \Storage::url( $post->image) }}"
                                                                        alt=""></a>

                                                                <div class="post--info">
                                                                    <ul class="nav meta">
                                                                        <li><a href="#">{{ $post->name_author }}</a>
                                                                        </li>
                                                                        <li><a
                                                                                href="#">{{ date_format($post->created_at, 'd-m-Y') }}</a>
                                                                        </li>
                                                                    </ul>

                                                                    <div class="title">
                                                                        <h3 class="h4"><a
                                                                                href="{{ route('detail', $post->slug) }}"
                                                                                class="btn-link">{{ $post->title }}</a>
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Post Item End -->
                                                    </li>
                                                    @if ($key % 2 == 0)
                                                        <li class="col-xs-12">
                                                            <!-- Divider Start -->
                                                            <hr class="divider">
                                                            <!-- Divider End -->
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>


                                            <!-- Preloader Start -->
                                            <div class="preloader bg--color-0--b" data-preloader="1">
                                                <div class="preloader--inner"></div>
                                            </div>
                                            <!-- Preloader End -->
                                        </div>
                                        <!-- Post Items End -->

                                    </div>
                                @elseif ($indexCategory == 3)
                                    <div class="col-md-12 ptop--30 pbottom--30">
                                        <!-- Post Items Title Start -->
                                        <div class="post--items-title" data-ajax="tab">
                                            <h2 class="h4">{{ $name_category }}</h2>

                                            <div class="nav">
                                                <a href="#" class="prev btn-link"
                                                    data-ajax-action="load_prev_finance_posts">
                                                    <i class="fa fa-long-arrow-left"></i>
                                                </a>

                                                <span class="divider">/</span>

                                                <a href="#" class="next btn-link"
                                                    data-ajax-action="load_next_finance_posts">
                                                    <i class="fa fa-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Post Items Title End -->

                                        <!-- Post Items Start -->
                                        <div class="post--items post--items-2" data-ajax-content="outer">
                                            <ul class="nav row" data-ajax-content="inner">
                                                @foreach ($posts as $key => $post)
                                                    @if ($key == 0)
                                                        <li class="col-md-6">
                                                            <!-- Post Item Start -->
                                                            <div class="post--item post--layout-2">
                                                                <div class="post--img">
                                                                    <a href="{{ route('detail', $post->slug) }}"
                                                                        class="thumb"><img src="{{ \Storage::url($post->image) }}"
                                                                            alt=""></a>

                                                                    <div class="post--info">
                                                                        <ul class="nav meta">
                                                                            <li><a
                                                                                    href="#">{{ $post->name_author }}</a>
                                                                            </li>
                                                                            <li><a
                                                                                    href="#">{{ date_format($post->created_at, 'd-m-Y') }}</a>
                                                                            </li>
                                                                        </ul>

                                                                        <div class="title">
                                                                            <h3 class="h4"><a
                                                                                    href="{{ route('detail', $post->slug) }}"
                                                                                    class="btn-link">{{ $post->title }}</a>
                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Post Item End -->
                                                        </li>
                                                    @endif
                                                @endforeach
                                                <li class="col-md-6">
                                                    <ul class="nav row">
                                                        <li class="col-xs-12 hidden-md hidden-lg">
                                                            <!-- Divider Start -->
                                                            <hr class="divider">
                                                            <!-- Divider End -->
                                                        </li>
                                                        @foreach ($posts as $key => $post)
                                                            @if ($key != 0)
                                                                <li class="col-xs-6">
                                                                    <!-- Post Item Start -->
                                                                    <div class="post--item post--layout-2">
                                                                        <div class="post--img">
                                                                            <a href="{{ route('detail', $post->slug) }}"
                                                                                class="thumb"><img
                                                                                    src="{{ \Storage::url($post->image) }}"
                                                                                    alt=""></a>

                                                                            <div class="post--info">
                                                                                <ul class="nav meta">
                                                                                    <li><a
                                                                                            href="#">{{ $post->name_author }}</a>
                                                                                    </li>
                                                                                    <li><a
                                                                                            href="#">{{ date_format($post->created_at, 'd-m-Y') }}</a>
                                                                                    </li>
                                                                                </ul>

                                                                                <div class="title">
                                                                                    <h3 class="h4"><a
                                                                                            href="{{ route('detail', $post->slug) }}"
                                                                                            class="btn-link">{{ $post->title }}</a>
                                                                                    </h3>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Post Item End -->
                                                                </li>
                                                            @endif
                                                            @if ($key == 2)
                                                                <li class="col-xs-12">
                                                                    <!-- Divider Start -->
                                                                    <hr class="divider">
                                                                    <!-- Divider End -->
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>

                                            <!-- Preloader Start -->
                                            <div class="preloader bg--color-0--b" data-preloader="1">
                                                <div class="preloader--inner"></div>
                                            </div>
                                            <!-- Preloader End -->
                                        </div>
                                        <!-- Post Items End -->
                                    </div>
                                @else
                                    <div class="col-md-6 ptop--30 pbottom--30">
                                        <!-- Post Items Title Start -->
                                        <div class="post--items-title" data-ajax="tab">
                                            <h2 class="h4">{{ $name_category }}</h2>

                                            <div class="nav">
                                                <a href="#" class="prev btn-link"
                                                    data-ajax-action="load_prev_technology_posts">
                                                    <i class="fa fa-long-arrow-left"></i>
                                                </a>

                                                <span class="divider">/</span>

                                                <a href="#" class="next btn-link"
                                                    data-ajax-action="load_next_technology_posts">
                                                    <i class="fa fa-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Post Items Title End -->

                                        <!-- Post Items Start -->
                                        <div class="post--items post--items-3" data-ajax-content="outer">
                                            <ul class="nav" data-ajax-content="inner">
                                                @foreach ($posts as $key => $post)
                                                    <li>
                                                        <!-- Post Item Start -->
                                                        <div class="post--item post--layout-{{ $key == 0 ? '1' : '3' }}">
                                                            <div class="post--img">
                                                                <a href="{{ route('detail', $post->slug) }}"
                                                                    class="thumb"><img src="{{ \Storage::url($post->image) }}"
                                                                        alt=""></a>

                                                                <div class="post--info">
                                                                    <ul class="nav meta">
                                                                        <li><a href="#">{{ $post->name_author }}</a>
                                                                        </li>
                                                                        <li><a
                                                                                href="#">{{ date_format($post->created_at, 'd-m-Y') }}</a>
                                                                        </li>
                                                                    </ul>

                                                                    <div class="title">
                                                                        <h3 class="h4"><a
                                                                                href="{{ route('detail', $post->slug) }}"
                                                                                class="btn-link">{{ $post->title }}</a>
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Post Item End -->
                                                    </li>
                                                @endforeach
                                            </ul>

                                            <!-- Preloader Start -->
                                            <div class="preloader bg--color-0--b" data-preloader="1">
                                                <div class="preloader--inner"></div>
                                            </div>
                                            <!-- Preloader End -->
                                        </div>
                                        <!-- Post Items End -->
                                    </div>
                                @endif
                                @php
                                    $indexCategory++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Main Content End -->

                <!-- Main Sidebar Start -->
                @include('client.layouts.partials.sidebar')
                <!-- Main Sidebar End -->
            </div>
        </div>
    </div>
    </div>
@endsection
