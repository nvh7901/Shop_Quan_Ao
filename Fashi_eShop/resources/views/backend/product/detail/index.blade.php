@extends('backend.layouts.master')
@section('title', 'Quản lý Chi Tiết SP')
@section('content')

    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-actions">
                    <a href="./admin/product/{{ $products->id }}/detail/create"
                        class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-plus fa-w-20"></i>
                        </span>
                        Thêm Mới
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('backend.components.notification')

                <div class="main-card mb-3 card">

                    <div class="card-header">

                        <form>
                            <div class="input-group">
                                <input type="search" name="search" id="search" placeholder="Tìm kiếm"
                                    class="form-control" value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>&nbsp;
                                        Tìm kiếm
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="pl-4">Tên sản phẩm</th>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productDetails as $productDetail)
                                    <tr>
                                        <td class="text-center">#{{ $productDetail->id }}</td>
                                        <td class="pl-4 text-muted">{{ $productDetail->product->name }}</td>
                                        <td class="text-center">{{ $productDetail->size }}</td>
                                        <td class="text-center">{{ $productDetail->qty }}</td>

                                        <td class="text-center">
                                            <a href="./admin/product/{{ $products->id }}/detail/{{ $productDetail->id }}/edit"
                                                data-toggle="tooltip" data-placement="bottom"
                                                class="btn btn-outline-warning border-0 btn-sm">
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-edit fa-w-20"></i>
                                                </span>
                                            </a>
                                            <form class="d-inline"
                                                action="./admin/product/{{ $products->id }}/detail/{{ $productDetail->id }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                    type="submit" data-toggle="tooltip" data-placement="bottom"
                                                    onclick="return confirm('Bạn có muốn xóa chi tiết sản phẩm này không ?')">
                                                    <span class="btn-icon-wrapper opacity-8">
                                                        <i class="fa fa-trash fa-w-20"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
                        {{ $productDetails->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
