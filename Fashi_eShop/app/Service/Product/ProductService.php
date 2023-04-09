<?php

namespace App\Service\Product;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Service\BaseService;

class ProductService extends BaseService implements ProductServiceInterface
{
   // Ghi đè giá trị $repository
   public $repository;

   // Khởi tạo giá trị
   public function __construct(ProductRepositoryInterface $productRepository)
   {
      $this->repository = $productRepository;
   }

   public function find($id)
   {
      $product = $this->repository->find($id);

      $avgRating = 0;
      $sumRating = array_sum(array_column($product->productComments->toArray(), 'rating'));
      $countRating = count($product->productComments);
      if ($countRating != 0) {
         $avgRating = $sumRating / $countRating;
      }

      $product->avgRating = $avgRating;
      return $product;
   }
   // Sản phẩm liên quan
   public function getRelatedProducts($product)
   {
      return $this->repository->getRelatedProducts($product);
   }

   // Sản phẩm nổi bật
   public function getFeaturedProducts()
   {
      return [
         "Nam" => $this->repository->getFeaturedProductsByCategory(1),
         "Nữ" => $this->repository->getFeaturedProductsByCategory(2),
      ];
   }

   // Phân trang
   public function getProductOnIndex($request)
   {
      return $this->repository->getProductOnIndex($request);
   }

   public function getProductByCategory($categoryName, $request)
   {
      return $this->repository->getProductsByCategory($categoryName, $request);
   }
}
