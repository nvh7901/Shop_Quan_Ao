@extends('backend.layouts.master')
@section('title', 'Chi tiết User')
@section('content')
    <!-- Main -->
    <div class="app-main__inner">
        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a href="./admin/user/{{ $user->id }}/edit" class="nav-link">
                    <span class="btn-icon-wrapper pr-2 opacity-8">
                        <i class="fa fa-edit fa-w-20"></i>
                    </span>
                    <span>Chỉnh Sửa</span>
                </a>
            </li>

            <li class="nav-item delete">
                <form action="" method="post">
                    <button class="nav-link btn" type="submit"
                        onclick="return confirm('Bạn có muốn xóa người dùng này ?')">
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
                                    src="frontend/img/user/{{ $user->avatar ?? 'default-avatar.jpg' }}" alt="Avatar">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label" style="padding-top: 0px;">
                                Họ tên
                            </label>
                            <div class="col-md-9 col-xl-8">
                                {{ $user->name }}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Email</label>
                            <div class="col-md-9 col-xl-8">
                                {{ $user->email }}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="town_city" class="col-md-3 text-md-right col-form-label" style="padding-top: 0px;">
                                Thành phố
                            </label>
                            <div class="col-md-9 col-xl-8">
                                {{ $user->city }}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="street_address" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">
                                Địa chỉ
                            </label>
                            <div class="col-md-9 col-xl-8">
                                {{ $user->street_address }}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="phone" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Số điện thoại</label>
                            <div class="col-md-9 col-xl-8">
                                {{ $user->phone }}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="level" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Vai trò</label>
                            <div class="col-md-9 col-xl-8">
                                {{ \App\Utilities\Constant::$user_status[$user->level] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
