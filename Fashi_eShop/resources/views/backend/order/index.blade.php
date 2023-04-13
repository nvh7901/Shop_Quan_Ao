@extends('backend.layouts.master')
@section('title', 'Quản Lý Đơn Hàng')
@section('content')

    <!-- Main -->
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
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
                                    <th>Họ tên khách hàng / Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Tổng tiền</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="text-center text-muted">#{{ $order->id }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        {{-- <div class="widget-content-left">
                                                            <img style="height: 60px;" data-toggle="tooltip" title="Image"
                                                                data-placement="bottom"
                                                                src="frontend/img/products/{{ $order->orderDetails[0]->product->productImages[0]->path }}">
                                                        </div> --}}
                                                        {{ $order->name }}

                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">
                                                            {{-- {{ $order->name }} --}}
                                                        </div>
                                                        <div class="widget-subheading opacity-7">
                                                            {{ $order->orderDetails[0]->product->name }}
                                                            @if (count($order->orderDetails) > 1)
                                                                (and {{ count($order->orderDetails) }} other products)
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img style="height: 60px;" data-toggle="tooltip" title="Image"
                                                        data-placement="bottom"
                                                        src="frontend/img/products/{{ $order->orderDetails[0]->product->productImages[0]->path }}">
                                                </div>

                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ $order->qty }}
                                        </td>
                                        <td class="text-center">
                                            ${{ array_sum(array_column($order->orderDetails->toArray(), 'total')) }}</td>
                                        <td class="text-center">
                                            <div class="badge badge-success">
                                                {{ \App\Utilities\Constant::$order_status[$order->status] }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="./admin/order/{{ $order->id }}"
                                                class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                                Chi Tiết
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
                        {{ $orders->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
