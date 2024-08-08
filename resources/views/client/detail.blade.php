@extends('client.layouts.master')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <!-- Main Breadcrumb Start -->
    <div class="main--breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}" class="btn-link"><i class="fa fm fa-home"></i>Trang chủ</a></li>
                @foreach ($categories as $category)
                    @if ($category->id == $post->category_id)
                        <li><a href="{{ route('category', $category->slug) }}" class="btn-link">
                                {{ $category->name }}</a></li>
                    @endif
                @endforeach


                <li class="active"><span>{{ $post->title }}</span></li>
            </ul>
        </div>
    </div>
    <!-- Main Breadcrumb End -->

    <!-- Main Content Section Start -->
    <div class="main-content--section pbottom--30">
        <div class="container">
            <div class="row">
                <!-- Main Content Start -->
                <div class="main--content col-md-8" data-sticky-content="true">
                    <div class="sticky-content-inner">
                        <!-- Post Item Start -->
                        <div class="post--item post--single post--title-largest pd--30-0">
                            <div class="post--img">
                                <a href="#" class="thumb"><img src="{{ \Storage::url($post->image) }}"
                                        alt=""></a>
                            </div>

                            <div class="post--info">
                                <ul class="nav meta">
                                    <li><a href="#">{{ $post->name_author }}</a></li>
                                    <li><a href="#">{{ date_format($post->created_at, 'd-m-Y') }}</a></li>
                                    <li><span><i class="fa fm fa-eye"></i>{{ $post->views }}</span></li>
                                    <li><a href="#"><i class="fa fm fa-comments-o"></i>02</a></li>
                                </ul>

                                <div class="title">
                                    <h2 class="h4">{{ $post->title }}</h2>
                                </div>
                            </div>

                            <div class="post--content">
                                <p>{{ $post->content }}</p>
                            </div>
                        </div>
                        <!-- Post Item End -->

                        <!-- Post Related Start -->
                        <div class="post--related ptop--30">
                            <!-- Post Items Title Start -->
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Tin cùng thể loại</h2>

                                {{-- <div class="nav">
                                    <a href="#" class="prev btn-link" data-ajax-action="load_prev_related_posts">
                                        <i class="fa fa-long-arrow-left"></i>
                                    </a>

                                    <span class="divider">/</span>

                                    <a href="#" class="next btn-link" data-ajax-action="load_next_related_posts">
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                </div> --}}
                            </div>
                            <!-- Post Items Title End -->

                            <!-- Post Items Start -->
                            <div class="post--items post--items-2" data-ajax-content="outer">
                                <ul class="nav row" data-ajax-content="inner">
                                    @foreach ($post_same_kind as $post_same)
                                        <li class="col-sm-6 pbottom--30">
                                            <!-- Post Item Start -->
                                            <div class="post--item post--layout-1">
                                                <div class="post--img">
                                                    <a href="{{ route('detail', $post_same->slug) }}" class="thumb"><img
                                                            src="{{ \Storage::url($post_same->image) }}"
                                                            alt=""></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">{{ $post_same->name_author }}</a></li>
                                                            <li><a
                                                                    href="#">{{ date_format($post_same->created_at, 'd-m-Y') }}</a>
                                                            </li>
                                                        </ul>

                                                        <div class="title">
                                                            <h3 class="h4"><a
                                                                    href="{{ route('detail', $post_same->slug) }}"
                                                                    class="btn-link">{{ $post_same->title }}</a></h3>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="post--content">
                                                    <p>{{ $post_same->sub_title }}</p>
                                                </div>

                                                <div class="post--action">
                                                    <a href="{{ route('detail', $post_same->slug) }}">Đọc tiếp...</a>
                                                </div>
                                            </div>
                                            <!-- Post Item End -->
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <!-- Post Items End -->
                        </div>
                        <!-- Post Related End -->

                        <!-- Comment List Start -->
                        <div class="comment--list pd--30-0">
                            <!-- Post Items Title Start -->
                            <div class="post--items-title">
                                <h2 class="h4">{{ count($comments) }} Bình luận</h2>

                                <i class="icon fa fa-comments-o"></i>
                            </div>
                            <!-- Post Items Title End -->

                            <ul class="comment--items nav">
                                @foreach ($comments as $item)
                                    <li>
                                        <!-- Comment Item Start -->
                                        <div class="comment--item clearfix">
                                            <div class="comment--img float--left">
                                                <img src="{{ $item->avatar }}" alt="">
                                            </div>

                                            <div class="comment--info">
                                                <div class="comment--header clearfix">
                                                    <p class="name">{{ $item->name }}</p>
                                                    <p class="date">{{ date_format($item->created_at, 'd-m-Y') }}</p>
                                                </div>

                                                <div class="comment--content">
                                                    <p>{{ $item->content }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Comment Item End -->
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- Comment List End -->

                        <!-- Comment Form Start -->
                        <div class="comment--form pd--30-0">
                            <!-- Post Items Title Start -->
                            <div class="post--items-title">
                                <h2 class="h4">Để lại bình luận</h2>

                                <i class="icon fa fa-pencil-square-o"></i>
                            </div>
                            <!-- Post Items Title End -->

                            <div class="comment-respond">
                                <form action="#" data-form="validate">
                                    <p>Đừng lo ! Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh
                                        dấu (*).</p>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>
                                                <span>Bình luận *</span>
                                                <textarea name="comment" class="form-control" required></textarea>
                                            </label>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>
                                                <span>Tên *</span>
                                                <input type="text" name="name" class="form-control" required>
                                            </label>

                                            <label>
                                                <span>Địa chỉ email</span>
                                                <input type="email" name="email" class="form-control" required>
                                            </label>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Đăng</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Comment Form End -->
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
