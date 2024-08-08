@extends('admin.layouts.master')

@section('title')
    Danh sách bài viết
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Bài viết</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bài viết</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Danh sách bài viết</h5>
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10px;">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                    </div>
                                </th>
                                <th data-ordering="false">ID</th>
                                <th data-ordering="false">Tiêu đề</th>
                                <th data-ordering="false">Hình ảnh</th>
                                <th data-ordering="false">Tác giả</th>
                                <th data-ordering="false">Lượt xem</th>
                                <th>Nội dung</th>
                                <th>Kích hoạt</th>
                                <th>Tin nóng</th>
                                <th>Tin đặc trưng</th>
                                <th>Tin phổ biến nhất</th>
                                <th>Tin thịnh hành</th>
                                <th>Created By</th>
                                <th>Create Date</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                                value="option1">
                                        </div>
                                    </th>
                                    <td>{{ $post->id }}</td>
                                    <td class="truncate-js">{{ $post->title }}</td>
                                    <td>
                                        <img src="{{ \Storage::url($post->image) }}" alt="Ảnh tin tức" width="100px">
                                    </td>
                                    <td>{{ $post->name_author }}</td>
                                    <td>{{ $post->views }}</td>
                                    <td class="truncate-js"
                                        style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        {{ $post->content }}</td>
                                    <td>
                                        @if ($post->is_active == 1)
                                            <span class="badge bg-primary">Có</span>
                                        @else
                                            <span class="badge bg-danger">Không</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->is_hot == 1)
                                            <span class="badge bg-primary">Có</span>
                                        @else
                                            <span class="badge bg-danger">Không</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->is_featured == 1)
                                            <span class="badge bg-primary">Có</span>
                                        @else
                                            <span class="badge bg-danger">Không</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->is_most_popular == 1)
                                            <span class="badge bg-primary">Có</span>
                                        @else
                                            <span class="badge bg-danger">Không</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->is_trending == 1)
                                            <span class="badge bg-primary">Có</span>
                                        @else
                                            <span class="badge bg-danger">Không</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{ route('admin.posts.show', $post->id) }}"
                                                        class="dropdown-item"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>Xem</a>
                                                </li>
                                                <li><a href="{{ route('admin.posts.edit', $post->id) }}"
                                                        class="dropdown-item edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit</a></li>
                                                <li>
                                                    <form action="{{ route('admin.posts.show', $post->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item remove-item-btn"
                                                            onclick="return confirm('Chắc chắn chưa?')"><i
                                                                class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Xóa</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.querySelectorAll('.truncate-js');
            var maxLength = 70; // Giới hạn số ký tự muốn hiển thị

            elements.forEach(function(element) {
                var text = element.innerText;
                if (text.length > maxLength) {
                    element.innerText = text.substring(0, maxLength) + '...';
                }
            });
        });
    </script>
@endsection
