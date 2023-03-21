<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\OrderController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Front\CheckOutController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\BlogCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// FE
Route::get('/', [HomeController::class, 'index']);
// Route Shop
Route::prefix('shop')->group(function () {
   Route::get('', [ShopController::class, 'index']);
   // Trang chi tiết sản phẩm
   Route::get('product/{id}', [ShopController::class, 'show']);
   Route::post('product/{id}', [ShopController::class, 'postComment']);
   // Chi tiết sản pẩm theo danh mục sản phẩm
   Route::get('category/{categoryName}', [ShopController::class, 'category']);
});
// Route giỏ hàng
Route::prefix('cart')->group(function () {
   Route::get('/', [CartController::class, 'index']);
   // Thêm giỏ hàng
   Route::get('add', [CartController::class, 'add']);
   // Xóa giỏ hàng
   Route::get('delete', [CartController::class, 'delete']);
   // Xóa toàn bộ giỏ hàng
   Route::get('destroy', [CartController::class, 'destroy']);
   // Cập nhật giỏ hàng
   Route::get('update', [CartController::class, 'update']);
});
// Route checkout
Route::prefix('checkout')->group(function () {
   Route::get('', [CheckOutController::class, 'index']);
   // Thanh toán
   Route::post('/', [CheckOutController::class, 'addOrder']);
   // Route thông báo kết quả đặt hàng
   Route::get('/result', [CheckOutController::class, 'result']);
   Route::get('/vnPayCheck', [CheckOutController::class, 'vnPayCheck']);
});
// Route Blog
Route::prefix('blog')->group(function () {
   Route::get('', [\App\Http\Controllers\Front\BlogController::class, 'index']);
   // Trang chi tiết sản phẩm
   Route::get('blog-detail/{id}', [\App\Http\Controllers\Front\BlogController::class, 'show']);
   // Route::post('product/{id}', [ShopController::class, 'postComment']);
});
// Route đăng nhập FE
Route::prefix('account')->group(function () {
   // Đăng nhập
   Route::get('/login', [AccountController::class, 'login']);
   Route::post('login', [AccountController::class, 'checkLogin']);
   // Đăng xuất
   Route::get('logout', [AccountController::class, 'logout']);
   // Đăng ký tài khoản
   Route::get('register', [AccountController::class, 'register']);
   Route::post('register', [AccountController::class, 'postRegister']);
});

// BE admin
Route::prefix('admin')->middleware('CheckAdminLogin')->group(function () {
   // Route trang chủ của admin
   Route::get('home', [\App\Http\Controllers\Admin\HomeController::class, 'home']);
   // Đăng nhập admin rồi trả về trang home
   Route::redirect('', 'admin/home');

   // Đăng nhập admin
   Route::prefix('login')->group(function () {
      Route::get('', [\App\Http\Controllers\Admin\HomeController::class, 'getLogin'])->withoutMiddleware('CheckAdminLogin');
      Route::post('', [\App\Http\Controllers\Admin\HomeController::class, 'postLogin'])->withoutMiddleware('CheckAdminLogin');
   });
   // Đăng xuất admin
   Route::get('logout', [\App\Http\Controllers\Admin\HomeController::class, 'logout']);

   // Route quản lý user
   Route::resource('user', App\Http\Controllers\Admin\UserController::class);
   // Route quản lý category
   Route::resource('category', ProductCategoryController::class);
   // Route quản lý product
   Route::resource('product', ProductController::class);
   // Route quản lý image
   Route::resource('product/{product_id}/image', ProductImageController::class);
   // Route quản lý image
   Route::resource('product/{product_id}/detail', ProductDetailController::class);
   // Route quản lý order
   Route::resource('order', OrderController::class);
   //Route quản lý blog
   Route::resource('blog', BlogController::class);
   //Route quản lý blogCategory
   Route::resource('blogcategory', BlogCategoryController::class);
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
