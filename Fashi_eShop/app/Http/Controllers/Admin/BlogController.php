<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Service\Blog\BlogServiceInterface;
use Illuminate\Http\Request;
use App\Utilities\File;

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
        return view('backend.blog.index')->with(compact('blogs'));;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'image',
            'title' => 'required|max:150',
            'subtitle' => 'required|max:255',
            'content' => 'required',
        ]);
        $data = $request->all();

        // Xử lý upload file
        if ($request->hasFile('image')) {
            // Chuyển ảnh đến folder blog
            $data['image'] = File::uploadFile($request->file('image'), 'frontend/img/blog');
        }
        $blog = $this->blogService->create($data);
        return redirect('admin/blog')->with('notification', 'Successfully Added Blog !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('backend.blog.edit')
            ->with(compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'image' => 'image',
            'title' => 'required|max:150',
            'subtitle' => 'required|max:255',
            'content' => 'required',
        ]);
        $data = $request->all();

        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            // Upload ảnh mới vào folder blog
            $data['image'] = File::uploadFile($request->file('image'), 'frontend/img/blog');

            // Xóa ảnh cũ
            $file_name_old = $request->get('image');
            if ($file_name_old != '') {
                unlink('frontend/img/blog/' . $file_name_old);
            }
        }

        // Thêm mới vào CSDL
        $this->blogService->update($data, $blog->id);
        return redirect('admin/blog')->with('notification', 'Edit Blog Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $this->blogService->delete($blog->id);

        // Xóa file
        $file_name = $blog->image;
        if ($file_name != '') {
            unlink('frontend/img/blog/' . $file_name);
        }

        return redirect('admin/blog')->with('notification', 'Delete Blog Successfully !');
    }
}
