<?php 

namespace App\Repositories\BlogCategory;

use App\Models\BlogCategory;
use App\Repositories\BaseRepositories;

class BlogCategoryRepository extends BaseRepositories implements BlogCategoryRepositoryInterface {
   public function getModel()
   {
      return BlogCategory::class;
   }
}