@extends('client.layouts.master')

@section('title')
    {{ $nameCategory }}
@endsection

@section('content')
    <!-- Main Breadcrumb Start -->
    <div class="main--breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="home-1.html" class="btn-link"><i class="fa fm fa-home"></i>Home</a></li>
                <li class="active"><span>{{ $nameCategory }}</span></li>
            </ul>
        </div>
    </div>
    <!-- Main Breadcrumb End -->

    <!-- Main Content Section Start -->
    <div class="main-content--section pbottom--30">
        <div class="container">
            <div class="row">
                <!-- Main Content Start -->
                <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                    <div class="sticky-content-inner">
                        <div class="row">

                            <!-- Automobile Start -->
                            <div class="col-md-12 ptop--30 pbottom--30">
                                <!-- Post Items Title Start -->
                                <div class="post--items-title" data-ajax="tab">
                                    <h2 class="h4">{{ $nameCategory }}</h2>
                                </div>
                                <!-- Post Items Title End -->

                                <!-- Post Items Start -->
                                <div class="post--items post--items-2" data-ajax-content="outer">
                                    <ul class="nav" data-ajax-content="inner">
                                        @foreach ($posts as $post)
                                            <li>
                                                <!-- Post Item Start -->
                                                <div class="post--item">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="post--img">
                                                                <a href="{{ route('detail', $post->slug) }}"
                                                                    class="thumb"><img
                                                                        src="{{ \Storage::url($post->image) }}"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="post--info">
                                                                <ul class="nav meta">
                                                                    <li><a href="#">{{ $post->name_author }}</a></li>
                                                                    <li><a
                                                                            href="#">{{ date_format($post->created_at, 'd-m-Y') }}</a>
                                                                    </li>
                                                                </ul>

                                                                <div class="title">
                                                                    <h3 class="h4"><a
                                                                            href="{{ route('detail', $post->slug) }}"
                                                                            class="btn-link">{{ $post->title }}</a></h3>
                                                                </div>
                                                            </div>

                                                            <div class="post--content">
                                                                <p>{{ $post->sub_title }}</p>
                                                            </div>

                                                            <div class="post--action">
                                                                <a href="{{ route('detail', $post->slug) }}">Đọc
                                                                    tiếp...</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Post Item End -->
                                            </li>

                                            <li>
                                                <!-- Divider Start -->
                                                <hr class="divider">
                                                <!-- Divider End -->
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
                            <!-- Automobile End -->

                            <!-- Pagination Start -->
                            {{-- <div class="col-md-12">
                                <div class="pagination--wrapper ptop--30 pbottom--30 clearfix">
                                    <p class="pagination-hint float--left">Page 02 of 03</p>

                                    <ul class="pagination float--right">
                                        <li><a href="#"><i class="fa fa-long-arrow-left"></i></a></li>
                                        <li><a href="#">01</a></li>
                                        <li class="active"><span>02</span></li>
                                        <li><a href="#">03</a></li>
                                        <li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                            </div> --}}
                            <!-- Pagination End -->
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
    <!-- Main Content Section End -->
@endsection
