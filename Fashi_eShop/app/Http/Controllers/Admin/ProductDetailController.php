<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
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
        $productDetails = $products->productDetails;
        $productDetails = ProductDetail::paginate(5);

        return view('backend.product.detail.index')
            ->with(compact('products'))
            ->with(compact('productDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $products = $this->productService->find($product_id);

        return view('backend.product.detail.create')
            ->with(compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $params = [
            'product_id' => $request->product_id,
            'size' => $request->size,
            'qty' => $request->qty,
        ];
        // dd($params);
        $data = ProductDetail::create($params);

        $this->updateQty($product_id);

        return redirect('admin/product/'.$product_id.'/detail')->with('notification', 'Thêm Product Detail thành công');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id, $product_detail_id)
    {
        $products = $this->productService->find($product_id);

        $productDetails = ProductDetail::find($product_detail_id);

        return view('backend.product.detail.edit')
            ->with(compact('products'))
            ->with(compact('productDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id, $product_detail_id)
    {
        $data = $request->all();

        ProductDetail::find($product_detail_id)->update($data);
        // $this->updateQty($product_id);

        return redirect('admin/product/'.$product_id.'/detail')->with('notification', 'Sửa Product Detail thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $product_detail_id)
    {
        ProductDetail::find($product_detail_id)->delete();

        return redirect('admin/product/'.$product_id.'/detail')->with('notification', 'Xóa Product Detail thành công');
    }

    // Update số lượng sản phẩm
    public function updateQty($product_id)
    {
        $products = $this->productService->find($product_id);
        $productDetails = $products->productDetails;

        $totalQty = array_sum(array_column($productDetails->toArray(), 'qty'));

        $this->productService->update(['qty' => $totalQty], $product_id);
    }
}
