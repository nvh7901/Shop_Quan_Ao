<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Brand\BrandServiceInterface;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use App\Service\ProductComment\ProductCommentServiceInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    private $productService;
    private $productCommentService;
    private $productCategoryService;
    private $brandService;

    public function __construct(
        ProductServiceInterface $productService,
        ProductCommentServiceInterface $productCommentService,
        ProductCategoryServiceInterface $productCategoryService,
        BrandServiceInterface $brandService
    ) {
        $this->productService = $productService;
        $this->productCommentService = $productCommentService;
        $this->productCategoryService = $productCategoryService;
        $this->brandService = $brandService;
    }
    // Index Trang chủ
    public function index(Request $request)
    {
        // Lấy ra danh mục sản phẩm trong db
        $categories = $this->productCategoryService->all();
        // Lấy ra danh sách brand trong Db
        $brands = $this->brandService->all();
        // Lấy ra tất cả sản phẩm
        $products = $this->productService->getProductOnIndex($request);
        return view('frontend.shop.index')
            ->with(compact('products'))
            ->with(compact('categories'))
            ->with(compact('brands'));
    }
    // Trang show của chi tiết sản phẩm
    public function show($id)
    {
        // Lấy ra danh mục sản phẩm trong db
        $categories = $this->productCategoryService->all();
        // Lấy ra danh sách brand trong Db
        $brands = $this->brandService->all();
        // Lấy ra sản phẩm chi tiết
        $product = $this->productService->find($id);
        // Sản phẩm liên quan
        $relatedProducts = $this->productService->getRelatedProducts($product);
        return view('frontend.shop.show', compact('product', 'relatedProducts', 'categories', 'brands'));
    }
    // Comment
    public function postComment(Request $request)
    {
        $this->productCommentService->create($request->all());

        return redirect()->back();
    }
    // CTSP theo danh mục sản phẩm
    public function category($categoryName, Request $request)
    {
        // Lấy ra danh mục sản phẩm trong db
        $categories = $this->productCategoryService->all();
        // Lấy ra danh sách brand trong Db
        $brands = $this->brandService->all();
        // Lọc tất cả sản phẩm theo categories

        $products = $this->productService->getProductByCategory($categoryName,  $request);;
        return view('frontend.shop.index', compact('products', 'categories', 'brands'));
        // ->with(compact('products'))
        // ->with(compact('categories'));
    }
}
