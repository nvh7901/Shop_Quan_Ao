@extends('frontend.layouts.master')

@section('title', 'Bài Viết')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Trang Chủ</a>
                        <span>Bài Viết</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                    <div class="blog-sidebar">

                        <div class="recent-post">
                            <h4>Bài Viết Mới</h4>
                            <div class="recent-blog">
                                @foreach ($blogRelated as $blogRelateds)
                                    <a href="#" class="rb-item">
                                        <div class="rb-pic">
                                            <img src="frontend/img/blog/{{ $blogRelateds->image }}" alt="">
                                        </div>
                                        <div class="rb-text">
                                            <h6>{{ $blogRelateds->title }}</h6>
                                            <p><span>{{ date('M d, Y', strtotime($blogRelateds->created_at)) }}</span></p>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-6 col-sm-6">
                                <div class="single-latest-blog">
                                    <img src="frontend/img/blog/{{ $blog->image }}" alt="">
                                    <div class="latest-text">
                                        <div class="tag-list">
                                            <div class="tag-item">
                                                <i class="fa fa-calendar-o"></i>
                                                {{ date('M d, Y', strtotime($blog->created_at)) }}
                                            </div>
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
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
