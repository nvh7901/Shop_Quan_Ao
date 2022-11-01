<?php

namespace App\Http\Controllers\Front;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Product\ProductServiceInterface;

class CartController extends Controller
{
    private $productService;
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }
    // Trang chủ giỏ hàng
    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('frontend.shop.cart')
            ->with(compact('carts'))
            ->with(compact('total'))
            ->with(compact('subtotal'));
    }
    //Thêm giỏ hàng
    public function add(Request $request)
    {
        if ($request->ajax()) {
            $product = $this->productService->find($request->productId);

            $reponse['cart'] = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->discount ?? $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images' => $product->productImages,
                ],
            ]);

            $reponse['count'] = Cart::count();
            $reponse['total'] = Cart::total();
            return $reponse;
        }
        return back();
    }

    // Xóa giỏ hàng
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $reponse['cart'] = Cart::remove($request->rowId);
            $reponse['count'] = Cart::count();
            $reponse['total'] = Cart::total();

            $reponse['subtotal'] = Cart::subtotal();

            return $reponse;
        }

        return back();
    }
    // Xóa toàn bộ giỏ hàng
    public function destroy()
    {
        Cart::destroy();
    }
    // Cập nhật giỏ hàng
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $reponse['cart'] = Cart::update($request->rowId, $request->qty);

            $reponse['count'] = Cart::count();
            $reponse['total'] = Cart::total();
            $reponse['subtotal'] = Cart::subtotal();

            return $reponse;
        }
    }
}
