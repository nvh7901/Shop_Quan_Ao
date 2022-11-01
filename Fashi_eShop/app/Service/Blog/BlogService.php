<?php

namespace App\Service\Blog;

use App\Repositories\Blog\BlogRepositoryInterface;
use App\Service\BaseService;

class BlogService extends BaseService implements BlogServiceInterface
{
   // Ghi đè giá trị $repository
   public $repository;

   // Khởi tạo giá trị
   public function __construct(BlogRepositoryInterface $BlogRepository)
   {
      $this->repository = $BlogRepository;
   }
   // Danh sách Blog nổi bật
   public function getRelatestBlogs() {
      return $this->repository->getRelatestBlogs();
   }
   
}
