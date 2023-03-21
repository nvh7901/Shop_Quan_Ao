<?php

namespace App\Http\Controllers\Admin;

use App\Utilities\Constant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $productCategoryService;

    public function __construct(ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }
    public function home()
    {
        $productCategories = $this->productCategoryService->all()->count();
        return view('backend.home')->with(compact('productCategories'));
    }
    // Trang index đăng nhập
    public function getLogin()
    {
        return view('backend.login');
    }
    // Xử lý phần đăng nhập
    public function postLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => [Constant::user_level_host, Constant::user_level_admin],
        ];

        $remember = $request->remember;
        
        if (Auth::attempt($credentials, $remember)) {
            // Mặc định đăng nhập vào trang chủ
            return redirect()->intended('admin');
        } else {
            return back()->with('notification', 'Email hoặc mật khẩu không đúng');
        }
    }
    // Xử lý phần đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
