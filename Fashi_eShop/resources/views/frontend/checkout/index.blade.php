@extends('frontend.layouts.master')
@section('title', 'Thanh Toán')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./"><i class="fa fa-home"></i> Trang Chủ</a>
                        <a href="./cart">Giỏ Hàng</a>
                        <span>Thanh Toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="" method="post" class="checkout-form">
                @csrf
                <div class="row">
                    @if (Cart::count() > 0)
                        <div class="col-lg-6">
                            <h4>Thông Tin Khách Hàng</h4>
                            <div class="row">
                                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id ?? '' }}">
                                <div class="col-lg-6">
                                    <label for="fir">Tên<span>*</span></label>
                                    <input type="text" id="name" name="name" value="{{ Auth::user()->name ?? '' }}">
                                </div>
                                
                                <div class="col-lg-6">
                                    <label for="email">Email<span>*</span></label>
                                    <input type="text" id="email" name="email" value="{{ Auth::user()->email ?? '' }}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="town_city">Thánh phố<span>*</span></label>
                                    <input type="text" id="town_city" name="town_city" value="{{ Auth::user()->town_city ?? '' }}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="street">Địa chỉ cụ thể<span>*</span></label>
                                    <input type="text" id="street" class="street-first" name="street_address" value="{{ Auth::user()->street_address ?? '' }}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="phone">Số điện thoại<span>*</span></label>
                                    <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout-content">
                                <input type="text" placeholder="Enter Your Coupon Code">
                            </div>
                            <div class="place-order">
                                <h4>Hóa Đơn Của Khách Hàng</h4>
                                <div class="order-total">
                                    <ul class="order-table">
                                        <li>Sản Phẩm <span>Tiền</span></li>
                                        @foreach ($carts as $cart)
                                            <li class="fw-normal">
                                                {{ $cart->name }} x {{ $cart->qty }}
                                                <span>${{ $cart->price * $cart->qty }}</span>
                                            </li>
                                        @endforeach
                                        <li class="fw-normal">Tổng tiền <span>${{ $subtotal }}</span></li>
                                        <li class="total-price">Tổng các loại tiền <span>${{ $total }}</span></li>
                                    </ul>
                                    <div class="payment-check">
                                        <div class="pc-item">
                                            <label for="pc-check">
                                                Trả tiền mặt
                                                <input type="radio" name="payment_type" value="pay_later" id="pc-check"
                                                    checked>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="pc-item">
                                            <label for="pc-paypal">
                                                Thanh toán online
                                                <input type="radio" name="payment_type" value="online_payment" id="pc-paypal">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="order-btn">
                                        <button type="submit" class="site-btn place-btn">Thanh Toán</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-12">
                            <h4>Không có sản phẩm nào trong giỏ hàng</h4>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
{{-- Ngân hàng: NCB
Số thẻ: 9704198526191432198
Tên chủ thẻ:NGUYEN VAN A
Ngày phát hành:07/15
Mật khẩu OTP:123456 --}}