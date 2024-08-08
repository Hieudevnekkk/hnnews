@extends('client.layouts.master')

@section('title')
    Tìm kiếm
@endsection

@section('content')
    <!-- Main Breadcrumb Start -->
    <div class="main--breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="home-1.html" class="btn-link"><i class="fa fm fa-home"></i>Trang chủ</a></li>
                <li class="active"><span>Tìm kiếm</span></li>
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
                        <!-- Search Widget Start -->
                        <div class="search--widget ptop--30">
                            <form action="{{ route('search') }}" data-form="validate" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input type="search" name="search" placeholder="Search..." class="form-control"
                                        required>

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn-link"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Search Widget End -->

                        <!-- Page Title Start -->
                        <div class="page--title ptop--30">
                            <h2 class="h2">Tìm kiếm kết quả cho: <span>{{ $keySearch }}</span></h2>
                        </div>
                        <!-- Page Title End -->

                        <!-- Post Items Start -->
                        <div class="post--items post--items-5 pd--30-0">
                            <ul class="nav">
                                @foreach ($posts as $post)
                                    <li>
                                        <!-- Post Item Start -->
                                        <div class="post--item post--title-larger">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-12 col-xs-4 col-xxs-12">
                                                    <div class="post--img">
                                                        <a href="{{ route('detail', $post->slug) }}" class="thumb"><img
                                                                src="{{ \Storage::url($post->image) }}" alt=""></a>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 col-sm-12 col-xs-8 col-xxs-12">
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">{{ $post->name_author }}</a></li>
                                                            <li><a
                                                                    href="#">{{ date_format($post->created_at, 'd-m-Y') }}</a>
                                                            </li>
                                                        </ul>

                                                        <div class="title">
                                                            <h3 class="h4"><a href="{{ route('detail', $post->slug) }}"
                                                                    class="btn-link">{{ $post->title }}</a></h3>
                                                        </div>
                                                    </div>

                                                    <div class="post--content">
                                                        <p>{{ $post->sub_title }}</p>
                                                    </div>

                                                    <div class="post--action">
                                                        <a href="{{ route('detail', $post->slug) }}">Đọc tiếp...</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post Item End -->
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Post Items End -->

                        <!-- Pagination Start -->
                        {{-- <div class="pagination--wrapper clearfix bdtop--1 bd--color-2 ptop--60 pbottom--30">
                            <p class="pagination-hint float--left">Page 02 of 03</p>

                            <ul class="pagination float--right">
                                <li><a href="#"><i class="fa fa-long-arrow-left"></i></a></li>
                                <li><a href="#">01</a></li>
                                <li class="active"><span>02</span></li>
                                <li><a href="#">03</a></li>
                                <li>
                                    <i class="fa fa-angle-double-right"></i>
                                    <i class="fa fa-angle-double-right"></i>
                                    <i class="fa fa-angle-double-right"></i>
                                </li>
                                <li><a href="#">20</a></li>
                                <li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li>
                            </ul>
                        </div> --}}
                        <!-- Pagination End -->
                    </div>
                </div>
                <!-- Main Content End -->

                <!-- Main Sidebar Start -->
                @include('client.layouts.partials.sidebar');
                <!-- Main Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Main Content Section End -->
@endsection
