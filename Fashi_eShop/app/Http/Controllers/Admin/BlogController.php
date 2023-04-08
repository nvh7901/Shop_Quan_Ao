<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Service\Blog\BlogServiceInterface;
use App\Utilities\File;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;

    public function __construct(BlogServiceInterface $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs = $this->blogService->searchAndPaginate('id', $request->get('search'));

        return view('backend.blog.index')->with(compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $params = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
        ];

        // Xử lý upload file
        if ($request->hasFile('image')) {
            // Chuyển ảnh đến folder blog
            $params['image'] = File::uploadFile($request->file('image'), 'frontend/img/blog');
        }
        $data = $this->blogService->create($params);

        return redirect('admin/blog')->with('notification', 'Thêm bài viết thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('backend.blog.show')
            ->with(compact('blog'));
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
        $blog = $this->blogService->find($id);

        return view('backend.blog.edit')->with(compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $params = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
        ];

        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            // Upload ảnh mới vào folder blog
            $params['image'] = File::uploadFile($request->file('image'), 'frontend/img/blog');

            // Xóa ảnh cũ
            $file_name_old = $request->get('image_old');
            if ($file_name_old != '') {
                unlink('frontend/img/blog/'.$file_name_old);
            }
        }

        // Thêm mới vào CSDL
        $data = $this->blogService->update($params, $blog->id);

        return redirect('admin/blog')->with('notification', 'Chỉnh sửa bài viết thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $data = $this->blogService->delete($blog->id);

        // Xóa file
        $file_name = $blog->image;
        if ($file_name != '') {
            unlink('frontend/img/blog/'.$file_name);
        }

        return redirect('admin/blog')->with('notification', 'Xóa bài viết thành công !');
    }
}
