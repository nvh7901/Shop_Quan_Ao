@extends('backend.layouts.master')
@section('title', 'Thêm Product')
@section('content')
    <!-- Main -->
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" action="admin/product" enctype="multipart/form-data">
                            @csrf

                            <div class="position-relative row form-group">
                                <label for="brand_id" class="col-md-3 text-md-right col-form-label">Brand</label>
                                <div class="col-md-9 col-xl-8">
                                    <select name="brand_id" id="brand_id" class="form-control">
                                        <option value="-1">-- Brand --</option>
                                        @foreach ($brands as $brand)
                                            <option value={{ $brand->id }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="product_category_id"
                                    class="col-md-3 text-md-right col-form-label">Category</label>
                                <div class="col-md-9 col-xl-8">
                                    <select name="product_category_id" id="product_category_id" class="form-control">
                                        <option value="-1">-- Category --</option>
                                        @foreach ($productCategories as $productCategory)
                                            <option value={{ $productCategory->id }}>
                                                {{ $productCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="name" id="name" placeholder="Name" type="text"
                                        class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="price" class="col-md-3 text-md-right col-form-label">Price</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="price" id="price" placeholder="Price" type="text"
                                        class="form-control" value="">
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="tag " class="col-md-3 text-md-right col-form-label">Tag</label>
                                <div class="col-md-9 col-xl-8">
                                    <input type="text" name="tag" class="form-control" data-role="tagsinput">
                                </div>
                            </div>
                            {{-- <div class="position-relative row form-group">
                                <label for="tag" class="col-md-3 text-md-right col-form-label">Tag</label>
                                <div class="col-md-9 col-xl-8">
                                    <input type="text" class="form-control" id="tag" name = "tag" data-role="tagsinput">
                                </div>
                            </div> --}}

                            <div class="position-relative row form-group">
                                <label for="featured" class="col-md-3 text-md-right col-form-label">Featured</label>
                                <div class="col-md-9 col-xl-8">
                                    <div class="position-relative form-check pt-sm-2">
                                        <input name="featured" id="featured" type="checkbox" value="1"
                                            class="form-check-input">
                                        <label for="featured" class="form-check-label">Yes</label>

                                    </div>
                                    <div class="position-relative form-check pt-sm-2">
                                        <input name="featured" id="featured" type="checkbox" value="0"
                                            class="form-check-input">
                                        <label for="featured" class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="description" class="col-md-3 text-md-right col-form-label">Description</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="./admin/product" class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-times fa-w-20"></i>
                                        </span>
                                        <span>Cancel</span>
                                    </a>

                                    <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-download fa-w-20"></i>
                                        </span>
                                        <span>Save</span>
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
