<form action="{{ request()->segment(2) == 'product' ? 'shop' : '' }}">
    {{-- Category --}}
    <div class="filter-widget">
        <h4 class="fw-title">Loại Sản Phẩm</h4>
        <ul class="filter-catagories">
            @foreach ($categories as $category)
                <li><a href="shop/category/{{ $category->name }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
    {{-- Price --}}
    <div class="filter-widget">
        <h4 class="fw-title">Giá Sản Phẩm</h4>
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="minamount" name="price_min">
                    <input type="text" id="maxamount" name="price_max">
                </div>
            </div>
            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                data-min="10" data-max="999" data-min-value="{{ str_replace('$', '', request('price_min')) }}"
                data-max-value="{{ str_replace('$', '', request('price_max')) }}">
                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
            </div>
        </div>
        <button type="submit" class="filter-btn">Filter</button>
    </div>
    {{-- Size --}}
    <div class="filter-widget">
        <h4 class="fw-title">Size</h4>
        <div class="fw-size-choose">
            <div class="sc-item">
                <input type="radio" id="s-size" name="size" value="xl" onchange="this.form.submit();"
                    {{ request('size') == 'xl' ? 'checked' : '' }}>
                <label for="s-size" class="{{ request('size') == 'xl' ? 'active' : '' }}">xl</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="l-size" name="size" value="l" onchange="this.form.submit();"
                    {{ request('size') == 'l' ? 'checked' : '' }}>
                <label for="l-size" class="{{ request('size') == 'l' ? 'active' : '' }}">l</label>
            </div>
            
            <div class="sc-item">
                <input type="radio" id="m-size" name="size" value="m" onchange="this.form.submit();"
                    {{ request('size') == 'm' ? 'checked' : '' }}>
                <label for="m-size" class="{{ request('size') == 'm' ? 'active' : '' }}">m</label>
            </div>

            <div class="sc-item">
                <input type="radio" id="s-size" name="size" value="s" onchange="this.form.submit();"
                    {{ request('size') == 's' ? 'checked' : '' }}>
                <label for="s-size" class="{{ request('size') == 's' ? 'active' : '' }}">s</label>
            </div>
        </div>
    </div>
</form>
