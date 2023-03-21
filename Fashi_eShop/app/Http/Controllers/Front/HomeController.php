<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Blog\BlogServiceInterface;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $productService;
    private $blogService;

    public function __construct(
        ProductServiceInterface $productService,
        BlogServiceInterface $blogService
    ) {
        $this->blogService = $blogService;
        $this->productService = $productService;
    }
    
    public function index()
    {
        // Sản phẩm nổi bật
        $featuredProduct = $this->productService->getFeaturedProducts();
        // dd($featuredProduct);
        // Danh sách blog
        $blogs = $this->blogService->getRelatestBlogs();
        return view('frontend.index')
            ->with(compact('featuredProduct'))
            ->with(compact('blogs'));
    }
}
