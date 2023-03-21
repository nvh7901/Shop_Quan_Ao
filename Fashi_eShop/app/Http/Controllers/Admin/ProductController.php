<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Service\Brand\BrandServiceInterface;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;
    private $brandService;
    private $productCategoryService;

    public function __construct(ProductServiceInterface $productService, BrandServiceInterface $brandService, ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productService = $productService;
        $this->brandService = $brandService;
        $this->productCategoryService = $productCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->productService->searchAndPaginate('name', $request->get('search'));

        return view('backend.product.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = $this->brandService->all();
        $productCategories = $this->productCategoryService->all();

        return view('backend.product.create')
            ->with(compact('brands'))
            ->with(compact('productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags = explode(',', $request->tag);
        $params = [
            'brand_id' => $request->brand_id,
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'featured' => $request->featured,
            'tag' => json_encode($tags),
        ];

        $data = $this->productService->create($params);

        if ($data) {
            return redirect('admin/product')->with('notification', 'Thêm Product thành công !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = $this->productService->find($id);

        return view('backend.product.show')->with(compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = $this->productService->find($id);

        $brands = $this->brandService->all();
        $productCategories = $this->productCategoryService->all();

        return view('backend.product.edit')
            ->with(compact('products'))
            ->with(compact('brands'))
            ->with(compact('productCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tags = explode(',', $request->tag);
        $params = [
            'brand_id' => $request->brand_id,
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'featured' => $request->featured,
            'tag' => json_encode($tags),
        ];

        $data = $this->productService->update($params, $id);
        if ($data) {
            return redirect('admin/product')->with('notification', 'Sửa Product thành công !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->productService->delete($id);

        return redirect('admin/product')->with('notification', 'Xóa Product thành công !');
    }
}
