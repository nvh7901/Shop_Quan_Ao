<?php

namespace App\Service\OrderDetail;

use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Service\BaseService;

class OrderDetailService extends BaseService implements OrderDetailServiceInterface
{
   // Ghi đè giá trị $repository
   public $repository;

   // Khởi tạo giá trị
   public function __construct(OrderDetailRepositoryInterface $OrderDetailRepository)
   {
      $this->repository = $OrderDetailRepository;
   }
   
}
