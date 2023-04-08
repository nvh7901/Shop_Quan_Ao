<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    ngo.huy.van.2001@gmail.com
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    0868761196
                </div>
            </div>
            <div class="ht-right">
                @if (Auth::check())
                    <a href="./account/logout" class="login-panel">
                        <i class="fa fa-user"></i>
                        {{ Auth::user()->name }} - Đăng xuất
                    </a>
                @else
                    <a href="./account/login" class="login-panel"><i class="fa fa-user"></i>Đăng nhập</a>
                @endif

            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="./index.html">
                            <img src="frontend/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <form action="shop">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <div class="input-group">
                                <input name="search" value="{{ request('search') }}" type="text"
                                    placeholder="Tìm kiếm ....">
                                <button type="submit"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">

                        {{-- Giỏ hàng --}}
                        <li class="cart-icon">
                            <a href="./cart">
                                <i class="icon_bag_alt"></i>
                                <span class="cart-count">{{ Cart::count() }}</span>
                            </a>
                            <div class="cart-hover">

                                <div class="select-button">
                                    <a href="./cart" class="primary-btn view-card">Xem Giỏ Hàng</a>
                                    <a href="./checkout" class="primary-btn checkout-btn">Thanh Toán</a>
                                </div>
                            </div>
                        </li>
                        <li class="cart-price">${{ Cart::total() }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li class="{{ request()->segment(1) == '' ? 'active' : '' }}"><a href="./">Trang Chủ</a></li>
                    <li class="{{ request()->segment(1) == 'shop' ? 'active' : '' }}"><a href="./shop">Sản Phẩm</a></li>
                    <li class="{{ request()->segment(1) == 'blog' ? 'active' : '' }}"><a href="./blog">Blog</a></li>
                    <li><a href="./contact.html">Liên Hệ</a></li>
                    <li><a href="#">Trang</a>
                        <ul class="dropdown">
                            <li><a href="./cart">Giỏ Hàng</a></li>
                            <li><a href="./checkout">Thanh Toán</a></li>
                            <li><a href="./account/register">Đăng Ký</a></li>
                            <li><a href="./account/login">Đăng Nhập</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header End -->
