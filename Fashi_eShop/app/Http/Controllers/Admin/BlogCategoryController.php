<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\BlogCategory\BlogCategoryServiceInterface;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    private $blogCategoryService;

    public function __construct(BlogCategoryServiceInterface $blogCategoryService)
    {
        $this->blogCategoryService = $blogCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogCategories = $this->blogCategoryService->searchAndPaginate('name', $request->get('search'));

        return view('backend.blogCategory.index')->with(compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blogCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = [
            'name' => $request->name,
        ];

        $data = $this->blogCategoryService->create($params);

        return redirect('admin/blogcategory')->with('notification', 'Thêm Category Blog thành công !');
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
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogCategories = $this->blogCategoryService->find($id);

        return view('backend.blogCategory.edit')->with(compact('blogCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = [
            'name' => $request->name,
        ];
        $data = $this->blogCategoryService->update($params, $id);

        return redirect('admin/blogcategory')->with('notification', 'Sửa Category Blog thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->blogCategoryService->delete($id);

        return redirect('admin/blogcategory')->with('notification', 'Xóa Category Blog thành công !');
    }
}
