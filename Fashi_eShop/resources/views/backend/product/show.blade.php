@extends('backend.layouts.master')
@section('title', 'Chi tiết Sản Phẩm')
@section('content')
    <!-- Main -->
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                @include('backend.components.notification')

                <div class="main-card mb-3 card">
                    <div class="card-body display_data">

                        <div class="position-relative row form-group">
                            <label for="" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Hình ảnh SP</label>
                            <div class="col-md-9 col-xl-8">
                                <ul class="text-nowrap overflow-auto" id="images">
                                    @foreach ($products->productImages as $productImage)
                                        <li class="d-inline-block mr-1" style="position: relative;">
                                            <img style="height: 150px;"
                                                src="frontend/img/products/{{ $productImage->path }}">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="brand_id" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Hình ảnh</label>
                            <div class="col-md-9 col-xl-8">
                                <p><a href="./admin/product/{{ $products->id }}/image"> Quản lý ảnh sản phẩm</a></p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="brand_id" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Quản lý</label>
                            <div class="col-md-9 col-xl-8">
                                <p><a href="./admin/product/{{ $products->id }}/detail">Chi tiết sản phẩm</a></p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="product_category_id" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Loại sản phẩm</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $products->productCategory->name }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Tên sản phẩm</label>
                            <div class="col-md-9 col-xl-8">
                                {{ $products->name }}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="price" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Giá sản phẩm</label>
                            <div class="col-md-9 col-xl-8">
                                <p>${{ $products->price }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="tag" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Tag sản phẩm</label>
                            <div class="col-md-9 col-xl-8">
                                <p>
                                    @foreach (json_decode($products->tag, true) ?? [] as $tag)
                                        <label class="label label-info border">{{ $tag }}</label>
                                    @endforeach
                                </p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="featured" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Sản phẩm nổi bật</label>
                            <div class="col-md-9 col-xl-8">
                                @if ($products->featured == 1)
                                    <div class="badge badge-success mt-2">
                                        {{ $products->featured ? 'Có' : 'Không' }}
                                    </div>
                                @else
                                    <div class="badge badge-danger mt-2">
                                        {{ $products->featured ? '' : 'Không' }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Mô tả</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{!! $products->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
