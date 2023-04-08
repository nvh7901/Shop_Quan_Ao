@extends('frontend.layouts.master')
@section('title', 'Đăng Nhập')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Trang Chủ</a>
                        <span>Đăng Nhập</span>
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
                    <div class="login-form">
                        <h2>Đăng Nhập</h2>
                        @if (session('notification'))
                            <div class="alert alert-warning">
                                {{ session('notification') }}
                            </div>
                        @endif
                        <form action="" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="username">Email *</label>
                                <input type="email" id="username" name="email">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật Khẩu *</label>
                                <input type="password" id="pass" name="password">
                            </div>
                            <button type="submit" class="site-btn login-btn">Đăng Nhập</button>
                        </form>
                        <div class="flex items-center justify-end mt-4 switch-login">
                            <a href="{{ url('account/google/redirect') }}">
                                <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                                    style="margin-left: 3em;">
                            </a>
                        </div>
                        <div class="switch-login">
                            <a href="./account/register" class="or-login">Hoặc Tạo Tài Khoản</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
@endsection
