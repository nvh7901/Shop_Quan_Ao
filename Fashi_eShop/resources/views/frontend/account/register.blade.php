@extends('frontend.layouts.master')
@section('title', 'Đăng Ký Tài Khoản')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Trang Chủ</a>
                        <span>Đăng ký</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Đăng Ký Tài Khoản</h2>
                        @if (session('notification'))
                            <div class="alert alert-warning">
                                {{ session('notification') }}
                            </div>
                        @endif
                        <form action="" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="name">Tên *</label>
                                <input type="text" id="username" name="name" placeholder="VD: Nguyễn Văn A">
                            </div>
                            <div class="group-input">
                                <label for="username">Email *</label>
                                <input type="email" id="username" name="email" placeholder="VD: admin@gmail.com">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật Khẩu *</label>
                                <input type="password" id="pass" name="password" placeholder="123456test.">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="password" id="con-pass" name="password_confirmation" placeholder="123456test.">
                            </div>
                            <button type="submit" class="site-btn register-btn">Đăng Ký</button>
                        </form>
                        <div class="switch-login">
                            <a href="./account/login" class="or-login">Hoặc Đăng Nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
@endsection
