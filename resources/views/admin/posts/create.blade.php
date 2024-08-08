@extends('admin.layouts.master')

@section('title')
    Thêm bài viết
@endsection

@section('content')
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Thêm mới bài viết</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Bài viết</a></li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </div>

        </div>
    </div>
    </div>

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="mt-3">
                                        <label for="category_id" class="form-label">Danh mục bài viết</label>
                                        <select type="text" class="form-select" name="category_id" id="category_id">
                                            <option value="" selected>Trống</option>

                                            @foreach ($parentCategories as $parent)
                                                @php($each = '')

                                                @include('admin.categories.nested-category', [
                                                    'category' => $parent,
                                                ])
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="title" class="form-label">Tiêu đề</label>
                                        <input type="text" class="form-control" value="{{ old('title') }}"
                                            name="title" id="title">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="sub_title" class="form-label">Tiêu đề phụ</label>
                                        <input type="text" class="form-control" value="{{ old('sub_title') }}"
                                            name="sub_title" id="sub_title">
                                    </div>
                                    <div class="mt-3">
                                        <label for="slug" class="form-label">Đường dẫn</label>
                                        <input type="text" class="form-control" value="{{ old('slug') }}"
                                            name="slug" id="slug">
                                        @error('slug')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="name_author" class="form-label">Tên tác giả</label>
                                        <input type="text" class="form-control" value="{{ old('name_author') }}"
                                            name="name_author" id="name_author">
                                        @error('name_author')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check form-check-secondary mb-3 mt-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7"
                                                    name="is_hot" value="1" {{ old('is_hot') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="formCheck7">
                                                    Tin nóng
                                                </label>
                                            </div>
                                            <div class="form-check form-check-secondary mb-3 mt-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7"
                                                    name="is_featured" value="1"
                                                    {{ old('is_featured') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="formCheck7">
                                                    Tin đặc trưng
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-check-secondary mb-3 mt-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7"
                                                    name="is_most_popular" value="1"
                                                    {{ old('is_most_popular') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="formCheck7">
                                                    Tin phổ biến nhất
                                                </label>
                                            </div>
                                            <div class="form-check form-check-secondary mb-3 mt-3">
                                                <input class="form-check-input" type="checkbox" id="formCheck7"
                                                    name="is_trending" value="1"
                                                    {{ old('is_trending') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="formCheck7">
                                                    Tin tức xu hướng
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-3">
                                        <label for="image" class="form-label">Ảnh</label>
                                        <input class="form-control" type="file" id="image" name="image">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Hiển thị ảnh -->
                                    <div class="mt-3">
                                        <img id="image-preview" src="" alt="Image Preview" class="img-thumbnail"
                                            style="max-width: 200px; display: none;">
                                    </div>
                                    <div class="input-group mt-3">
                                        <span class="input-group-text">Nội dung</span>
                                        <textarea class="form-control" aria-label="With textarea" rows="2" name="content">{{ old('content') }}</textarea>
                                    </div>
                                    @error('content')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div><!-- end card header -->
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>

    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        //Tạo slug
        $(document).ready(function() {
            function toSlug(str) {
                return str
                    .toLowerCase() // Chuyển thành chữ thường
                    .normalize('NFD') // Phân tách ký tự
                    .replace(/[\u0300-\u036f]/g, '') // Loại bỏ dấu thanh
                    .replace(/[^a-z0-9]+/g, '-') // Thay thế ký tự không phải chữ cái hoặc số bằng dấu gạch nối
                    .replace(/^-|-$/g, ''); // Loại bỏ dấu gạch nối ở đầu và cuối chuỗi
            }

            $('#title').on('input', function() {
                var title = $(this).val();
                var slug = toSlug(title); // Sử dụng hàm tự viết để tạo slug
                $('#slug').val(slug);
            });
        });
        //Hiển thị ảnh
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('image-preview');

            imageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (file) {
                    // Tạo URL tạm thời để hiển thị ảnh
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result; // Cập nhật src của thẻ <img>
                        imagePreview.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.src = '#'; // Đặt lại src nếu không có ảnh
                }
            });
        });
    </script>
@endsection
