@extends('frontend.layouts.master')

@section('title', 'Chi Tiết Bài Viết')

@section('content')

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2>{{ $blogs->title }}</h2>
                            <p><span>{{ date('M d, Y', strtotime($blogs->created_at)) }}</span></p>
                        </div>
                        <div class="blog-large-pic">
                            <img src="frontend/img/blog/{{ $blogs->image }}">
                        </div>
                        <div class="blog-quote" style="margin-top: 20px">
                            <p>“{{ $blogs->subtitle }}.”</p>
                        </div>
                        <p>{!! $blogs->content !!}.</p>
                        <div class="tag-share">
                            <div class="blog-share">
                                <span>Chia Sẻ:</span>
                                <div class="social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection
