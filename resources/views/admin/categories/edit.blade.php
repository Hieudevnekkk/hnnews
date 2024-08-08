@extends('admin.layouts.master')

@section('title')
    Sửa danh mục
@endsection

@section('content')
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Sửa Danh mục: {{ $model->name }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Danh mục</a></li>
                    <li class="breadcrumb-item active">Sửa<a href="mailto:"></a></li>
                </ol>
            </div>

        </div>
    </div>
    </div>

    <form action="{{ route('admin.categories.update', $model) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div>
                                        <label for="name" class="form-label">Tên danh mục</label>
                                        <input type="text" class="form-control" value="{{ $model->name }}"
                                            name="name" id="name">
                                    </div>
                                    <div class="mt-3">
                                        <label for="slug" class="form-label">Đường dẫn</label>
                                        <input type="text" class="form-control" value="{{ $model->slug }}"
                                            name="slug" id="slug">
                                    </div>
                                    <div class="mt-3">
                                        <label for="parent_id" class="form-label">Category</label>
                                        <select type="text" class="form-select" name="parent_id" id="parent_id">
                                            <option value="" selected>Trống</option>

                                            @foreach ($parentCategories as $parent)
                                                @php($each = '')

                                                @include('admin.categories.nested-category', [
                                                    'category' => $parent,
                                                ])
                                            @endforeach
                                        </select>
                                    </div>
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
        $(document).ready(function() {
            function toSlug(str) {
                return str
                    .toLowerCase() // Chuyển thành chữ thường
                    .normalize('NFD') // Phân tách ký tự
                    .replace(/[\u0300-\u036f]/g, '') // Loại bỏ dấu thanh
                    .replace(/[^a-z0-9]+/g, '-') // Thay thế ký tự không phải chữ cái hoặc số bằng dấu gạch nối
                    .replace(/^-|-$/g, ''); // Loại bỏ dấu gạch nối ở đầu và cuối chuỗi
            }

            $('#name').on('input', function() {
                var title = $(this).val();
                var slug = toSlug(title); // Sử dụng hàm tự viết để tạo slug
                $('#slug').val(slug);
            });
        });
    </script>
@endsection
