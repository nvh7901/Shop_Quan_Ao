<div
    class="product-item item
    @foreach (json_decode($product->tag, true) ?? [] as $tag)                                    
        {{ $tag }} @endforeach">
    <div class="pi-pic">
        <img src="frontend/img/products/{{ $product->productImages[0]->path ?? ' ' }}" alt="">
        <div class="icon">
            <i class="icon_heart_alt"></i>
        </div>
        <ul>
            <li class="w-icon active">
                <a href="javascript:addCart({{ $product->id }})">
                    <i class="icon_bag_alt"></i>
                </a>
            </li>
            <li class="quick-view"><a href="shop/product/{{ $product->id }}">+ Quick View</a></li>
        </ul>
    </div>
    <div class="pi-text">
        <div class="catagory-name" style="font-size: 16px">{{ $product->productCategory->name }}</div>
        <a href="shop/product/{{ $product->id }}">
            <h4>{{ $product->name }}</h2>
        </a>
        <div class="product-price">
            ${{ $product->price }}
        </div>
    </div>
</div>
