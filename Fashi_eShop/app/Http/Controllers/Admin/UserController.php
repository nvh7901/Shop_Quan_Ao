<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Service\User\UserServiceInterface;
use App\Utilities\File;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $params = [
            'name' => $request->name,
            'email' => $request->email,
            'street_address' => $request->street_address,
            'city' => $request->city,
            'phone' => $request->phone,
            'level' => $request->level,
        ];
        $params['password'] = bcrypt($request->get('password'));
        // Xử lý upload file
        if ($request->hasFile('image')) {
            // Chuyển ảnh đến folder user
            $params['avatar'] = File::uploadFile($request->file('image'), 'frontend/img/user');
        }
        $data = $this->userService->create($params);

        return redirect('admin/user')->with('notification', 'Thêm User thành công !');
    }

    /**
     * Display the specified resource.
     *
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
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $params = [
            'name' => $request->name,
            'email' => $request->email,
            'city' => $request->city,
            'street_address' => $request->street_address,
            'phone' => $request->phone,
            'level' => $request->level,
        ];

        // Xử lý phần mật khẩu
        $params['password'] = bcrypt($request->get('password'));

        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            // Upload ảnh mới vào folder user
            $params['avatar'] = File::uploadFile($request->file('image'), 'frontend/img/user');

            // Xóa ảnh cũ
            $file_name_old = $request->get('image_old');
            if ($file_name_old != '') {
                unlink('frontend/img/user/'.$file_name_old);
            }
        }
        // Thêm mới vào CSDL
        $data = $this->userService->update($params, $user->id);

        return redirect('admin/user')->with('notification', 'Sửa User thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->userService->delete($user->id);

        // Xóa file
        $file_name = $user->avatar;
        if ($file_name != '') {
            unlink('frontend/img/user/'.$file_name);
        }

        return redirect('admin/user')->with('notification', 'Xóa User thành công !');
    }
}
