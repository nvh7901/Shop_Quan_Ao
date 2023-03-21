@extends('frontend.layouts.master')
@section('title', 'Sản phẩm')
@section('content')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop">Shop</a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.shop.components.product-sidebar-filter')
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img"
                                    src="frontend/img/products/{{ $product->productImages[0]->path ?? '' }}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                @foreach ($product->productImages as $productImage)
                                    <div class="product-thumbs-track ps-slider owl-carousel">

                                        <div class="pt active"
                                            data-ingbigurl="frontend/img/products/{{ $productImage->path }}">
                                            <img src="frontend/img/products/{{ $productImage->path }}" alt="">
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    {{-- <span>{{ $product->tag }}</span> --}}
                                    <h3>{{ $product->name }}</h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i <= $product->avgRating)
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor
                                    <span>({{ count($product->productComments) }})</span>
                                </div>
                                <div class="pd-desc">
                                    <p>{{ $product->content }}</p>
                                    <h4>${{ $product->price }}</h4>
                                </div>
                                <div class="pd-size-choose">

                                    @foreach (array_unique(array_column($product->productDetails->toArray(), 'size')) as $productSize)
                                        <div class="sc-item">
                                            <input type="radio" id="sm-{{ $productSize }}">
                                            <label for="sm-{{ $productSize }}">{{ $productSize }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="quantity">
                                    <a href="javascript:addCart({{ $product->id }})" class="primary-btn pd-cart">Add To
                                        Cart</a>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>CATEGORIES</span>: {{ $product->productCategory->name }}</li>
                                    <li><span>BRANDS</span>: {{ $product->brand->name }}</li>
                                    <li><span>TAGS</span>:
                                        @if ($product->tag)

                                            @foreach (json_decode($product->tag, true) ?? [] as $tags)
                                                <label class="label label-info">{{ $tags }}</label>
                                            @endforeach
                                        @endif
                                    </li>
                                </ul>
                                <div class="pd-share">
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <p>{!! $product->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        @for ($i = 1; $i < 5; $i++)
                                                            @if ($i <= $product->avgRating)
                                                                <i class="fa fa-star"></i>
                                                            @else
                                                                <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor
                                                        <span>({{ count($product->productComments) }})</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price">
                                                        {{ $product->price }}
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>{{ count($product->productComments) }} Comments</h4>
                                        <div class="comment-option">
                                            <div class="co-item">
                                                {{-- $product->productComments lấy ra từ trong model và gán vào 1 biến $productComment --}}
                                                @foreach ($product->productComments as $productComment)
                                                    <div class="avatar-pic">
                                                        <img src="frontend/img/user/{{ $productComment->user->avatar ?? 'default-avatar.jpg' }}"
                                                            alt="">
                                                    </div>
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                            @for ($i = 1; $i < 5; $i++)
                                                                @if ($i <= $productComment->rating)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <h5>{{ $productComment->name }}
                                                            <span>{{ date('M d ,Y', strtotime($productComment->created_at)) }}</span>
                                                        </h5>
                                                        <div class="at-reply">{{ $productComment->messages }}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="personal-rating">
                                            <h6>Your Ratind</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="" method="post" class="comment-form">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="user_id"
                                                    value="{{ \Illuminate\Support\Facades\Auth::user()->id ?? null }}">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name" name="name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email" name="email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages" name="messages"></textarea>
                                                        {{-- Phần đánh giá sao --}}
                                                        <div class="personal-rating">
                                                            <h6>Your Rating</h6>
                                                            <div class="rate">
                                                                <input type="radio" id="star5" name="rating"
                                                                    value="5" />
                                                                <label for="star5" title="text">5 stars</label>
                                                                <input type="radio" id="star4" name="rating"
                                                                    value="4" />
                                                                <label for="star4" title="text">4 stars</label>
                                                                <input type="radio" id="star3" name="rating"
                                                                    value="3" />
                                                                <label for="star3" title="text">3 stars</label>
                                                                <input type="radio" id="star2" name="rating"
                                                                    value="2" />
                                                                <label for="star2" title="text">2 stars</label>
                                                                <input type="radio" id="star1" name="rating"
                                                                    value="1" />
                                                                <label for="star1" title="text">1 star</label>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="site-btn">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="frontend/img/products/{{ $relatedProduct->productImages[0]->path }}"
                                    alt="">
                               
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="shop/product/{{ $relatedProduct->id }}">+ Quick
                                            View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                {{-- <div class="catagory-name">{{ $relatedProduct->tag }}</div> --}}
                                <a href="shop/product/{{ $relatedProduct->id }}">
                                    <h5>{{ $relatedProduct->name }}</h5>
                                </a>
                                <div class="product-price">
                                    ${{ $relatedProduct->price }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->
@endsection
