@extends('backend.layouts.master')
@section('title', 'Product Image')
@section('content')
    <!-- Main -->
    <div class="app-main__inner">

        <div class="row">
            <div class="col-md-12">

                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Product Name</label>
                            <div class="col-md-9 col-xl-8">
                                <input disabled placeholder="Product Name" type="text" class="form-control"
                                    value="Calvin Klein">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="" class="col-md-3 text-md-right col-form-label">Images</label>
                            <div class="col-md-9 col-xl-8">
                                <ul class="text-nowrap" id="images">
                                    @foreach ($productImages as $productImage)
                                        <li class="float-left d-inline-block mr-2 mb-2"
                                            style="position: relative; width: 32%;">
                                            <form action="./admin/product/{{ $products->id }}/image/{{ $productImage->id }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Bạn có muốn xóa ảnh này ?')"
                                                    class="btn btn-sm btn-outline-danger border-0 position-absolute">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                            <div style="width: 100%; height: 220px; overflow: hidden;">
                                                <img src="frontend/img/products/{{ $productImage->path }}" alt="Image">
                                            </div>
                                        </li>
                                    @endforeach

                                    <li class="float-left d-inline-block mr-2 mb-2" style="width: 32%;">
                                        <form method="post" action="./admin/product/{{ $products->id }}/image"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div style="width: 100%; max-height: 220px; overflow: hidden;">
                                                <img style="width: 100%; cursor: pointer;" class="thumbnail"
                                                    data-toggle="tooltip" title="Click to add image" data-placement="bottom"
                                                    src="backend/assets/images/add-image-icon.jpg" alt="Add Image">

                                                <input name="image" type="file"
                                                    onchange="changeImg(this); this.form.submit()"
                                                    accept="image/x-png,image/gif,image/jpg" class="image form-control-file"
                                                    style="display: none;">

                                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-3">
                                <a href="./admin/product/{{ $products->id }}"
                                    class="btn-shadow btn-hover-shine btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-check fa-w-20"></i>
                                    </span>
                                    <span>OK</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
