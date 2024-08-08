@extends('auth.layouts.master')

@section('title')
    Đổi mật khẩu
@endsection

@section('content')
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="index.html" class="d-inline-block auth-logo">
                                <img src="{{ asset('theme/img/HNNEW_1.png') }}" alt="" height="100">
                            </a>
                        </div>
                        <p class="mt-3 fs-15 fw-medium">Hà Nội News – Tin Cập Nhật, Nơi Lắng Nghe Thủ Đô</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Đổi mật khẩu mới</h5>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('auth.password.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $token }}" name="reset_token">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mật khẩu mới <span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Nhập mật khẩu mới" value="{{ old('password') }}" name="password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Lưu</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0">Bạn đã có tài khoản ? <a href="{{ route('auth.login') }}"
                                class="fw-semibold text-primary text-decoration-underline"> Đăng nhập </a> </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->
@endsection
