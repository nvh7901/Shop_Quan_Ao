@extends('backend.layouts.master')
@section('title', 'Chi Tiết Đơn Hàng')
@section('content')

    <!-- Main -->
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">

                        <div class="table-responsive">
                            <h2 class="text-center">Danh Sách Sản Phẩm</h2>
                            <hr>
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Giá</th>
                                        <th class="text-center">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderDetails as $order)
                                        <tr>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                                <img style="height: 60px;" data-toggle="tooltip"
                                                                    title="Image" data-placement="bottom"
                                                                    src="frontend/img/products/{{ $order->product->productImages[0]->path }}">
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{ $order->product->name }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $order->qty }}
                                            </td>
                                            <td class="text-center">${{ $order->amount }}</td>
                                            <td class="text-center">
                                                ${{ $order->total }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <h2 class="text-center mt-5">Chi tiết đơn hàng</h2>
                        <hr>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label" style="padding-top: 0px;">
                                Họ và tên
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $orders->first_name }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label "
                                style="padding-top: 0px;">Email</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $orders->email }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="phone" class="col-md-3 text-md-right col-form-label "
                                style="padding-top: 0px;">Số điện thoại</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $orders->phone }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="street_address" class="col-md-3 text-md-right col-form-label "
                                style="padding-top: 0px;">
                                Street Address</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $orders->street_address }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="payment_type" class="col-md-3 text-md-right col-form-label "
                                style="padding-top: 0px;">Phương thức thanh toán</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $orders->payment_type }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="status" class="col-md-3 text-md-right col-form-label "
                                style="padding-top: 0px;">Trạng thái</label>
                            <div class="col-md-9 col-xl-8">
                                <div class="badge badge-success mt-2">
                                    {{ \App\Utilities\Constant::$order_status[$orders->status] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
