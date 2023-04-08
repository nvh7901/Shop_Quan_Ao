@extends('backend.layouts.master')
@section('title', 'Thêm Sản Phẩm')
@section('content')
    <!-- Main -->
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" action="admin/product" enctype="multipart/form-data">
                            @csrf

                            @error('product_category_id')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="product_category_id" class="col-md-3 text-md-right col-form-label">
                                    Loại sản phẩm
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <select name="product_category_id" id="product_category_id" class="form-control">
                                        <option value="-1">-- Chọn loại sản phẩm --</option>
                                        @foreach ($productCategories as $productCategory)
                                            <option value={{ $productCategory->id }}>
                                                {{ $productCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @error('name')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Tên SP</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="name" id="name" placeholder="Tên sản phẩm" type="text"
                                        class="form-control" value="">
                                </div>
                            </div>

                            @error('price')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="price" class="col-md-3 text-md-right col-form-label">Giá SP</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="price" id="price" placeholder="VD: 35$" type="text"
                                        class="form-control" value="">
                                </div>
                            </div>

                            @error('tag')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="tag " class="col-md-3 text-md-right col-form-label">Tag</label>
                                <div class="col-md-9 col-xl-8">
                                    <input type="text" name="tag" class="form-control" data-role="tagsinput"
                                        placeholder="Tag sản phẩm">
                                </div>
                            </div>

                            @error('featured')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="featured" class="col-md-3 text-md-right col-form-label">SP Nổi bật</label>
                                <div class="col-md-9 col-xl-8">
                                    <div class="position-relative form-check pt-sm-2">
                                        <input name="featured" id="featured" type="checkbox" value="1"
                                            class="form-check-input">
                                        <label for="featured" class="form-check-label">Có</label>

                                    </div>
                                    <div class="position-relative form-check pt-sm-2">
                                        <input name="featured" id="featured" type="checkbox" value="0"
                                            class="form-check-input">
                                        <label for="featured" class="form-check-label">Không</label>
                                    </div>
                                </div>
                            </div>

                            @error('description')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="description" class="col-md-3 text-md-right col-form-label">Mô tả SP</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea class="form-control" name="description" id="description"></textarea>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="./admin/product" class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-times fa-w-20"></i>
                                        </span>
                                        <span>Hủy</span>
                                    </a>

                                    <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-download fa-w-20"></i>
                                        </span>
                                        <span>Thêm Mới</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
