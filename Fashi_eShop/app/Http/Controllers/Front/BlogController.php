<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Blog\BlogServiceInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;

    public function __construct(BlogServiceInterface $blogService)
    {
        $this->blogService = $blogService;
    }

    // Index Blog
    public function index(Request $request)
    {
        $blogRelated = $this->blogService->getRelatestBlogs();
        $blogs = $this->blogService->searchAndPaginate('title', $request->get('search'));
        return view('frontend.blog.index')
            ->with(compact('blogs'))
            ->with(compact('blogRelated'));
    }

    // Show chi tiết Blog\
    public function show(Request $request, $id)
    {
        // Lấy ra blog chi tiết
        $blogs = $this->blogService->find($id);

        return view('frontend.blog.show')->with(compact('blogs'));
    }
}
