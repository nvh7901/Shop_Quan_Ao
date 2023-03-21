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
                    <a href="./account/login" class="login-panel"><i class="fa fa-user"></i>Login</a>
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
                                    placeholder="What do you need?">
                                <button type="submit"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="heart-icon">
                            <a href="#">
                                <i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                        </li>
                        {{-- Giỏ hàng --}}
                        <li class="cart-icon">
                            <a href="./cart">
                                <i class="icon_bag_alt"></i>
                                <span class="cart-count">{{ Cart::count() }}</span>
                            </a>
                            <div class="cart-hover">

                                <div class="select-button">
                                    <a href="./cart" class="primary-btn view-card">VIEW CARD</a>
                                    <a href="./checkout" class="primary-btn checkout-btn">CHECK OUT</a>
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
                {{-- <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Women’s Clothing</a></li>
                            <li><a href="#">Men’s Clothing</a></li>
                            <li><a href="#">Underwear</a></li>
                            <li><a href="#">Kid's Clothing</a></li>
                            <li><a href="#">Brand Fashion</a></li>
                            <li><a href="#">Accessories/Shoes</a></li>
                            <li><a href="#">Luxury Brands</a></li>
                            <li><a href="#">Brand Outdoor Apparel</a></li>
                        </ul>
                    </div>
                </div> --}}
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li class="{{ request()->segment(1) == '' ? 'active' : '' }}"><a href="./">Home</a></li>
                    <li class="{{ request()->segment(1) == 'shop' ? 'active' : '' }}"><a href="./shop">Shop</a></li>
                    <li class="{{ request()->segment(1) == 'blog' ? 'active' : '' }}"><a href="./blog">Blog</a></li>
                    <li><a href="./contact.html">Contact</a></li>
                    <li><a href="#">Pages</a>
                        <ul class="dropdown">
                            <li><a href="./cart">Shopping Cart</a></li>
                            <li><a href="./checkout">Checkout</a></li>
                            <li><a href="./account/register">Register</a></li>
                            <li><a href="./account/login">Login</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header End -->
