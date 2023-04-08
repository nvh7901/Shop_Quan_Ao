@extends('backend.layouts.master')
@section('title', 'Chi tiết Blog')
@section('content')
    <!-- Main -->
    <div class="app-main__inner">
        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a href="./admin/blog/{{ $blog->id }}/edit" class="nav-link">
                    <span class="btn-icon-wrapper pr-2 opacity-8">
                        <i class="fa fa-edit fa-w-20"></i>
                    </span>
                    <span>Chỉnh Sửa</span>
                </a>
            </li>

            <li class="nav-item delete">
                <form action="" method="post">
                    <button class="nav-link btn" type="submit"
                        onclick="return confirm('Do you really want to delete this item?')">
                        <span class="btn-icon-wrapper pr-2 opacity-8">
                            <i class="fa fa-trash fa-w-20"></i>
                        </span>
                        <span>Xóa</span>
                    </button>
                </form>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">
                        <div class="position-relative row form-group">
                            <label for="image" class="col-md-3 text-md-right col-form-label">Hình ảnh</label>
                            <div class="col-md-9 col-xl-8">

                                <img style="height: 200px;" class="rounded-circle" data-toggle="tooltip" title="Avatar"
                                    data-placement="bottom"
                                    src="frontend/img/blog/{{ $blog->image ?? 'default-blog.jpg' }}">

                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label" style="padding-top: 0px;">
                                Tên bài viết
                            </label>
                            <div class="col-md-9 col-xl-8">
                                {{ $blog->title }}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label" style="padding-top: 0px;">
                                Tiêu đề bài viết
                            </label>
                            <div class="col-md-9 col-xl-8">
                                {{ $blog->subtitle }}
                            </div>
                        </div>


                        <div class="position-relative row form-group">
                            <label for="street_address" class="col-md-3 text-md-right col-form-label" style="padding-top: 0px;">
                                Mô tả
                            </label>
                            <div class="col-md-9 col-xl-8">
                                {!! $blog->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
