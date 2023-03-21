<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Service\Blog\BlogServiceInterface;
use App\Service\BlogCategory\BlogCategoryServiceInterface;
use App\Utilities\File;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;
    private $blogCategoryService;

    public function __construct(BlogServiceInterface $blogService, BlogCategoryServiceInterface $blogCategoryService)
    {
        $this->blogService = $blogService;
        $this->blogCategoryService = $blogCategoryService;
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
        $blogCategories = $this->blogCategoryService->all();

        return view('backend.blog.create')->with(compact('blogCategories'));
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
            'blog_category_id' => $request->blog_category_id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
        ];

        // Xử lý upload file
        if ($request->hasFile('image')) {
            // Chuyển ảnh đến folder blog
            $params['image'] = File::uploadFile($request->file('image'), 'frontend/img/blog');
        }
        // dd($params);
        $data = $this->blogService->create($params);

        return redirect('admin/blog')->with('notification', 'Thêm Blog thành công !');
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
        $blogCategories = $this->blogCategoryService->all();

        return view('backend.blog.edit')
            ->with(compact('blog'))
            ->with(compact('blogCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $params = [
            'blog_category_id' => $request->blog_category_id,
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

        return redirect('admin/blog')->with('notification', 'Sửa Blog thành công !');
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

        return redirect('admin/blog')->with('notification', 'Xóa Blog thành công !');
    }
}
