<?php

namespace App\Repositories\Blog;

use App\Models\Blog;
use App\Repositories\BaseRepositories;

class BlogRepository extends BaseRepositories implements BlogRepositoryInterface
{
   public function getModel()
   {
      return Blog::class;
   }
   // Danh sách Blog nổi bật
   public function getRelatestBlogs()
   {
      return $this->model->orderBy('id', 'desc')->limit(3)->get();
   }
}
