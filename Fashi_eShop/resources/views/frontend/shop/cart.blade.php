@extends('frontend.layouts.master')
@section('title', 'Giỏ Hàng')
@section('content')
   <!-- Breadcrumb Section Begin -->
   <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./"><i class="fa fa-home"></i> Trang Chủ</a>
                        <a href="./shop">Sản Phẩm</a>
                        <span>Giỏ Hàng</span>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <!-- Breadcrumb Section Begin -->

   <!-- Shopping Cart Section Begin -->
   <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                @if (Cart::count() > 0)
                    <div class="col-lg-12"> 
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th class="p-name">Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                        <th>
                                            <i onclick="confirm('Bạn có muốn xóa tất cả sản phẩm ?') === true ? destroyCart() : ''" 
                                            style="cursor: pointer;" class="ti-close"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($carts as $cart)    
                                    <tr data-rowid="{{ $cart->rowId }}">
                                        <td class="cart-pic first-row">
                                            <img style="height: 150px; margin-left: 44px;" src="/frontend/img/products/{{ $cart->options->images[0]->path }}" alt="">
                                        </td>
                                        <td class="cart-title first-row">
                                            <h5>{{ $cart->name }}</h5>
                                        </td>
                                        <td class="p-price first-row">${{ number_format($cart->price, 2) }}</td>
                                        <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{ $cart->qty }}" data-rowid="{{ $cart->rowId }}">
                                            </div>
                                        </div>
                                        </td>
                                        <td class="total-price first-row">${{ number_format($cart->price * $cart->qty, 2) }}</td>
                                        <td class="close-td first-row">
                                            <i onclick="removeCart('{{ $cart->rowId }}')" class="ti-close"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="cart-buttons">
                                    <a href="./shop" class="primary-btn continue-shop">Tiếp tục mua sản phẩm</a>
                                </div>
                            </div>
                            <div class="col-lg-4 offset-lg-4">
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="subtotal">Tổng tiền <span>${{ $subtotal }}</span></li>
                                        <li class="cart-total">Tổng các loại tiền <span>${{ $total }}</span></li>
                                    </ul>
                                    <a href="./checkout" class="proceed-btn">Thanh Toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12">
                        <h3>Không có sản phẩm nào trong giỏ hàng</h3>
                    </div>
                @endif

            </div>
        </div>
   </section>
   <!-- Shopping Cart Section End -->
@endsection