@extends('backend.layouts.master')
@section('title', 'Chi tiết Product')
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
                                style="padding-top: 0px;">Images</label>
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
                                style="padding-top: 0px;">Product Images</label>
                            <div class="col-md-9 col-xl-8">
                                <p><a href="./admin/product/{{ $products->id }}/image">Manage images</a></p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="brand_id" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Product Details</label>
                            <div class="col-md-9 col-xl-8">
                                <p><a href="./admin/product/{{ $products->id }}/detail">Manage details</a></p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="brand_id" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Brand</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $products->brand->name }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="product_category_id" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Category</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $products->productCategory->name }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Name</label>
                            <div class="col-md-9 col-xl-8">
                                {{ $products->name }}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="content" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Content</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $products->content }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="price" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Price</label>
                            <div class="col-md-9 col-xl-8">
                                <p>${{ $products->price }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="discount" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Discount</label>
                            <div class="col-md-9 col-xl-8">
                                <p>${{ $products->discount }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="qty" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Qty</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $products->qty }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="weight" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Weight</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $products->weight }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="sku" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">SKU</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $products->sku }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="tag" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Tag</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $products->tag }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="featured" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Featured</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $products->featured ? 'Yes' : 'No' }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description" class="col-md-3 text-md-right col-form-label"
                                style="padding-top: 0px;">Description</label>
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
