<?php
namespace App\Repositories\Product;

use App\Repositories\RepositoriesInterface;

interface ProductRepositoryInterface extends RepositoriesInterface
{
   public function getRelatedProducts($product);
   public function getFeaturedProductsByCategory(int $categoryId);
   public function getProductOnIndex($request);
   public function getProductsByCategory($categoryName, $request);
}
