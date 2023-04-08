@extends('backend.layouts.master')
@section('title', 'Chỉnh Sửa User')
@section('content')
    <!-- Main -->
    <div class="app-main__inner">

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">

                        @include('backend.components.notification')

                        <form method="post" action="/admin/user/{{ $user->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @error('image')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="image" class="col-md-3 text-md-right col-form-label">Hình ảnh</label>
                                <div class="col-md-9 col-xl-8">
                                    <img style="height: 200px; cursor: pointer;" class="thumbnail rounded-circle"
                                        data-toggle="tooltip" title="Click to change the image" data-placement="bottom"
                                        src="frontend/img/user/{{ $user->avatar ?? 'default-avatar.jpg' }}" alt="Avatar">
                                    <input name="image" type="file" onchange="changeImg(this)"
                                        class="image form-control-file" style="display: none;" value="">
                                    <input type="hidden" name="image_old" value="{{ $user->avatar }}">
                                    <small class="form-text text-muted">
                                        Click vào ảnh để thay đổi (bắt buộc)
                                    </small>
                                </div>
                            </div>

                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Họ tên</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="name" id="name" placeholder="VD: Nguyễn Văn A" type="text"
                                        class="form-control" value="{{ $user->name }}">
                                </div>
                            </div>

                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="email" id="email" placeholder="Email" type="email"
                                        class="form-control" value="{{ $user->email }}">
                                </div>
                            </div>

                            @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="password" class="col-md-3 text-md-right col-form-label">Mật khẩu</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="password" id="password" placeholder="Mật khẩu" type="password"
                                        class="form-control" value="">
                                </div>
                            </div>

                            @error('city')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="city" class="col-md-3 text-md-right col-form-label">
                                    Thành phố
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="city" id="city" placeholder="Thành phố" type="text"
                                        class="form-control" value="{{ $user->city }}">
                                </div>
                            </div>

                            @error('street_address')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                    Địa chỉ
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="street_address" id="street_address" placeholder="VD: Tòa nhà Keangnam, Phạm Hùng, Cầu Giấy"
                                        type="text" class="form-control" value="{{ $user->street_address }}">
                                </div>
                            </div>

                            @error('phone')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="phone" class="col-md-3 text-md-right col-form-label">Số điện thoại</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="phone" id="phone" placeholder="VD: 0123 456 789" type="text"
                                        class="form-control" value="{{ $user->phone }}">
                                </div>
                            </div>

                            @error('level')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="level" class="col-md-3 text-md-right col-form-label">Vai trò</label>
                                <div class="col-md-9 col-xl-8">
                                    <select name="level" id="level" class="form-control">
                                        <option value="-1">-- Chọn vai trò --</option>
                                        @foreach (\App\Utilities\Constant::$user_status as $key => $value)
                                            <option value={{ $key }}
                                                {{ $user->level == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="./admin/user" class="border-0 btn btn-outline-danger mr-1">
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
@endsection
