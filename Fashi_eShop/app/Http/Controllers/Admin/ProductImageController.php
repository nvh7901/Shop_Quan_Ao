<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Service\Product\ProductServiceInterface;
use App\Utilities\File;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        $products = $this->productService->find($product_id);

        $productImages = $products->productImages;

        return view('backend.product.image.index')
            ->with(compact('products'))
            ->with(compact('productImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['path'] = File::uploadFile($request->file('image'), 'frontend/img/products');
            unset($data['image']);

            ProductImage::create($data);
        }

        return redirect('admin/product/'.$product_id.'/image')->with('notification', 'Thêm hình ảnh thành công');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $product_image_id)
    {
        // Xóa file
        $file_name = ProductImage::find($product_image_id)->path;

        if ($file_name != '') {
            unlink('frontend/img/products/'.$file_name);
        }

        // Xóa bản ghi trong DB

        ProductImage::find($product_image_id)->delete();

        return redirect('admin/product/'.$product_id.'/image')->with('notification', 'Xóa hình ảnh thành công');
    }
}
