<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryRequest;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    private $productCategoryService;

    public function __construct(ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productCategories = $this->productCategoryService->searchAndPaginate('name', $request->get('search'));
        return view('backend.category.index')->with(compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request)
    {
        $data = $request->all();

        $this->productCategoryService->create($data);

        return redirect('admin/category')->with('notification', 'Successfully Added Category !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCategories = $this->productCategoryService->find($id);

        return view('backend.category.edit')->with(compact('productCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, $id)
    {
        $data = $request->all();
        $this->productCategoryService->update($data, $id);

        return redirect('admin/category')->with('notification', 'Edit Category Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productCategoryService->delete($id);

        return redirect('admin/category')->with('notification', 'Delete Category Successfully');
    }
}
