<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    public function login()
    {
        return view('frontend.account.login');
    }
    // Đăng nhập
    public function checkLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => Constant::user_level_client,
        ];

        $remember = $request->remember;
        if (Auth::attempt($credentials, $remember)) {
            return redirect('');
        } else {
            return back()->with('notification', 'Email hoặc mật khẩu không đúng !');
        }
    }
    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();

        return back();
    }
    // Đăng ký tài khoản khách hàng
    public function register(Request $request) {
        return view('frontend.account.register');
    }

    // Đăng ký tài khoản khách hàng
    public function postRegister(Request $request) {
        if($request->password != $request->password_confirmation) {
            return back()->with('notification', 'Mật khẩu không trùng khớp với nhau !');
        } 
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => Constant::user_level_client,
        ];
        $this->userService->create($data);

        return redirect('/account/login')->with('notification', 'Đăng ký tài khoản thành công');
    }
}
