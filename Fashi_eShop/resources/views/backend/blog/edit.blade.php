@extends('backend.layouts.master')
@section('title', 'Chỉnh Sửa Blog')
@section('content')
    <!-- Main -->
    <div class="app-main__inner">

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">

                        @include('backend.components.notification')

                        <form method="post" action="/admin/blog/{{ $blog->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="position-relative row form-group">
                                <label for="image" class="col-md-3 text-md-right col-form-label">Hình ảnh</label>
                                <div class="col-md-9 col-xl-8">
                                    <img style="height: 200px; cursor: pointer;" class="thumbnail rounded-circle"
                                        data-toggle="tooltip" title="Click to change the image" data-placement="bottom"
                                        src="frontend/img/blog/{{ $blog->image }}">
                                    <input name="image" type="file" onchange="changeImg(this)"
                                        class="image form-control-file" style="display: none;" value="">
                                    <input type="hidden" name="image_old" value="{{ $blog->image }}">
                                    <small class="form-text text-muted">
                                        Click vào ảnh để thay đổi (bắt buộc)
                                    </small>
                                </div>
                            </div>

                            @error('title')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="title" class="col-md-3 text-md-right col-form-label">Tên bài viết</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="title" id="title" placeholder="Tên bài viết" type="text"
                                        class="form-control" value="{{ $blog->title }}">
                                </div>
                            </div>
                            @error('subtitle')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="subtitle" class="col-md-3 text-md-right col-form-label">Tiêu đề bài viết</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="subtitle" id="subtitle" placeholder="Tiêu đề bài viết (viết ngắn gọn)" type="text"
                                        class="form-control" value="{{ $blog->subtitle }}">
                                </div>
                            </div>
                            @error('content')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="content" class="col-md-3 text-md-right col-form-label">Mô tả</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea class="form-control" name="content" id="content">{!! $blog->content !!}</textarea>
                                </div>
                            </div>
                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="./admin/blog" class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-times fa-w-20"></i>
                                        </span>
                                        <span>Hủy</span>
                                    </a>

                                    <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-download fa-w-20"></i>
                                        </span>
                                        <span>Lưu</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
