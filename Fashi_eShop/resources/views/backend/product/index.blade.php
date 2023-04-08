@extends('backend.layouts.master')
@section('title', 'Quản Lý Sản Phẩm')
@section('content')
    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-actions">
                    <a href="./admin/product/create" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
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
                                    <th>Hình ảnh/ Tên sản phẩm</th>
                                    <th class="text-center">Giá</th>
                                    <th class="text-center" style="width: 150px;">Tag</th>
                                    <th class="text-center">SP nổi bật</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="text-center text-muted">#{{ $product->id }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img style="height: 60px;" data-toggle="tooltip" title="Image"
                                                                data-placement="bottom"
                                                                src="frontend/img/products/{{ $product->productImages[0]->path ?? '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{ $product->name }}</div>
                                                        <div class="widget-subheading opacity-7">
                                                            Loại sản phẩm: {{ $product->productCategory->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">${{ $product->price }}</td>
                                        <td>
                                            @foreach (json_decode($product->tag, true) ?? [] as $tag)
                                                <label class="label label-info border">{{ $tag }}</label>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @if ($product->featured == 1)
                                                <div class="badge badge-success mt-2">
                                                    {{ $product->featured ? 'Có' : 'Không' }}
                                                </div>
                                            @else
                                                <div class="badge badge-danger mt-2">
                                                    {{ $product->featured ? '' : 'Không' }}
                                                </div>
                                            @endif

                                        </td>
                                        <td class="text-center">
                                            <a href="./admin/product/{{ $product->id }}"
                                                class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                                Chi tiết SP
                                            </a>
                                            <a href="./admin/product/{{ $product->id }}/edit" data-toggle="tooltip"
                                                data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-edit fa-w-20"></i>
                                                </span>
                                            </a>
                                            <form class="d-inline" action="./admin/product/{{ $product->id }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                    type="submit" data-toggle="tooltip" data-placement="bottom"
                                                    onclick="return confirm('Bạn có muốn xóa sản phẩm này ?')">
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
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
