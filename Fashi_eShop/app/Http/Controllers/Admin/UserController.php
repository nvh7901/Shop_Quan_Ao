<?php

namespace App\Http\Controllers\Admin;

use App\Utilities\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Service\User\UserServiceInterface;
use App\Models\User;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->userService->searchAndPaginate('name', $request->get('search'));
        return view('backend.user.index')
            ->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'avatar' => 'image',
            'name' => 'required|regex:/^[\pL\s]+$/u|max:50',
            'email' => 'required|email|regex:/(.*)@gmail\.com/i',
            /* Validate Password
                + Tối thiểu 6 ký tự
                + 1 chữ thường, 1 chữ viết hoa, 1 số, 1 ký tự đặc biệt
             */
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
                'max: 50',
            ],
            'password_confirmation' => 'required|same:password',
            'street_address' => 'required|max:150',
            'phone' => 'required|numeric|regex:/(0)[0-9]{9}/',
            'level' => 'required_without:user|not_in:-1',
        ]);
        if ($request->get('password') != $request->get('password_confirmation')) {
            return back()->with('notification', 'Mật khẩu phải trùng nhau');
        }

        $data = $request->all();
        $data['password'] = bcrypt($request->get('password'));
        // Xử lý upload file
        if ($request->hasFile('image')) {
            // Chuyển ảnh đến folder user
            $data['avatar'] = File::uploadFile($request->file('image'), 'frontend/img/user');
        }
        $user = $this->userService->create($data);
        return redirect('admin/user')->with('notification', 'Successfully Added User !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.user.show')
            ->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.user.edit')
            ->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'avatar' => 'image',
            'name' => 'required|regex:/^[\pL\s]+$/u|max:50',
            'email' => 'required|email|regex:/(.*)@gmail\.com/i',
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
                'max: 50',
            ],
            'password_confirmation' => 'required|same:password',
            'street_address' => 'required|max:150',
            'phone' => 'required|numeric|regex:/(0)[0-9]{9}/',
            'level' => 'required_without:user|not_in:-1',
        ]);
        $data = $request->all();

        // Xử lý phần mật khẩu
        if ($request->get('password') != null) {
            if ($request->get('password') != $request->get('password_confirmation')) {
                return back()->with('notification', 'Mật khẩu mới phải trùng mật khẩu cũ');
            }

            $data['password'] = bcrypt($request->get('password'));
        } else {
            unset($data['password']);
        }

        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            // Upload ảnh mới vào folder user
            $data['avatar'] = File::uploadFile($request->file('image'), 'frontend/img/user');

            // Xóa ảnh cũ
            $file_name_old = $request->get('image_old');
            if ($file_name_old != '') {
                unlink('frontend/img/user/' . $file_name_old);
            }
        }

        // Thêm mới vào CSDL
        $this->userService->update($data, $user->id);
        return redirect('admin/user')->with('notification', 'Edit User Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->userService->delete($user->id);

        // Xóa file
        $file_name = $user->avatar;
        if ($file_name != '') {
            unlink('frontend/img/user/' . $file_name);
        }

        return redirect('admin/user')->with('notification', 'Delete User Successfully');
    }
}
