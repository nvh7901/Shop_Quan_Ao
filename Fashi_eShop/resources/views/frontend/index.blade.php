@extends('frontend.layouts.master')

@section('title', 'Trang chủ')

@section('content')
    <!-- Hero Section Begin -->
    {{-- <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="frontend/img/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="frontend/img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="frontend/img/banner-1.jpg" alt="">
                        <div class="inner-text">
                            <h4>Nam</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="frontend/img/banner-2.jpg" alt="">
                        <div class="inner-text">
                            <h4>Nữ</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="frontend/img/banner-3.jpg" alt="">
                        <div class="inner-text">
                            <h4>Trẻ Em</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad" style="margin-top: 50px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="frontend/img/products/women-large.jpg" style="height: 100%">
                        <h2>Nữ</h2>
                        <a href="./shop">Khám Phá Thêm</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <div class="section-title">
                            <h2>Sản Phẩm Nữ Nổi Bật</h2>
                        </div>
                        <ul>
                            {{-- <li class="active item" data-tag="*" data-category="Nữ">Tất Cả</li>
                            <li class="item" data-tag=".Ao" data-category="Nữ">Quần Áo</li>
                            <li class="item" data-tag=".Tui" data-category="Nữ">Túi Xách</li>
                            <li class="item" data-tag=".Giày" data-category="Nữ">Giày</li>
                            <li class="item" data-tag=".Phụ Kiện" data-category="Nữ">Phụ Kiện</li> --}}
                        </ul>
                    </div>

                    <div class="product-slider owl-carousel Nữ">
                        @foreach ($featuredProduct['Nữ'] as $product)
                            @include('frontend.components.product-item')
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <div class="section-title">
                            <h2>Sản Phẩm Nam Nổi Bật</h2>
                        </div>
                        {{-- <ul>
                            <li class="active item" data-tag="*" data-category="Nam">Tất Cả</li>
                            <li class="item" data-tag=".Quần Áo" data-category="Nam">Quần Áo</li>
                            <li class="item" data-tag=".Túi Xách" data-category="Nam">Túi Xách</li>
                            <li class="item" data-tag=".Giày" data-category="Nam">Giày</li>
                            <li class="item" data-tag=".Phụ Kiện" data-category="Nam">Phụ Kiện</li>
                        </ul> --}}
                    </div>
                    <div class="product-slider owl-carousel Nam">
                        @foreach ($featuredProduct['Nam'] as $product)
                            @include('frontend.components.product-item')
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="frontend/img/products/man-large.jpg" style="height: 100%">
                        <h2>Nam</h2>
                        <a href="./shop">Khám Phá Thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="frontend/img/insta-1.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="frontend/img/insta-2.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="frontend/img/insta-3.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="frontend/img/insta-4.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="frontend/img/insta-5.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="frontend/img/insta-6.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Các Bài Viết Nổi Bật</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-blog">
                            <img src="frontend/img/blog/{{ $blog->image }}" alt="">
                            <div class="latest-text">
                                <div class="tag-list">
                                    <div class="tag-item">
                                        <i class="fa fa-calendar-o"></i>
                                        {{ date('M d, Y', strtotime($blog->created_at)) }}
                                    </div>
                                    {{-- <div class="tag-item">
                                        <i class="fa fa-comment-o"></i>
                                        {{ count($blog->blogComments) }}
                                    </div> --}}
                                </div>
                                <a href="./blog/blog-detail/{{ $blog->id }}">
                                    <h4>{{ $blog->title }}</h4>
                                </a>
                                <p>{{ $blog->subtitle }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="frontend/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="frontend/img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="frontend/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->
@endsection
