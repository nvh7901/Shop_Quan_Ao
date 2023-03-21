<?php 

namespace App\Service\BlogCategory;

use App\Repositories\BlogCategory\BlogCategoryRepositoryInterface;
use App\Service\BaseService;

class BlogCategoryService extends BaseService implements BlogCategoryServiceInterface {
   public $repository;

   public function __construct(BlogCategoryRepositoryInterface $BlogCategoryRepository)
   {
      $this->repository = $BlogCategoryRepository;
   }
}