@extends('frontend.layouts.master')
@section('title', 'Shop')
@section('content')


    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    @include('frontend.shop.components.product-sidebar-filter')
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <form action="">

                                    <div class="select-option">
                                        <select class="sorting" name="sort_by" onchange="this.form.submit()">
                                            <option {{ request('sort_by') == 'latest' ? 'selected' : '' }} value="latest">
                                                Shorting: Latest</option>
                                            <option {{ request('sort_by') == 'oldest' ? 'selected' : '' }} value="oldest">
                                                Shorting: Oldest</option>
                                            <option {{ request('sort_by') == 'name-ascending' ? 'selected' : '' }}
                                                value="name-ascending">Name A - Z</option>
                                            <option {{ request('sort_by') == 'name-descending' ? 'selected' : '' }}
                                                value="name-descending">Name Z - A</option>
                                            <option {{ request('sort_by') == 'price-ascending' ? 'selected' : '' }}
                                                value="price-ascending">Price Ascending </option>
                                            <option {{ request('sort_by') == 'price-descending' ? 'selected' : '' }}
                                                value="price-descending">Price Decrease</option>
                                        </select>
                                        <select class="p-show" name="show" onchange="this.form.submit()">
                                            <option {{ request('show') == '3' ? 'selected' : '' }} value="3">Show: 3
                                            </option>
                                            <option {{ request('show') == '9' ? 'selected' : '' }} value="9">Show: 9
                                            </option>
                                            <option {{ request('show') == '15' ? 'selected' : '' }} value="15">Show: 15
                                            </option>

                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    @include('frontend.components.product-item')
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

@endsection
