<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Brand\BrandServiceInterface;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;
    private $brandService;
    private $productCategoryService;
    public function __construct(
        ProductServiceInterface $productService,
        BrandServiceInterface $brandService,
        ProductCategoryServiceInterface $productCategoryService
    ) {
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['qty'] = 0; //Mặc định khi thêm sản phẩm số lượng = 0. Khi nào muốn thay đổi số lượng thì lúc đấy sẽ edit sản phẩm
        $product = $this->productService->create($data);

        return redirect('admin/product')->with('notification', 'Thêm sản phẩm thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $this->productService->update($data, $id);

        return redirect('admin/product')->with('notification', 'Sửa sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productService->delete($id);

        return redirect('admin/product')->with('notification', 'Xóa sản phẩm thành công');
    }
}
