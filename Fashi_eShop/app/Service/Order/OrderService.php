<?php

namespace App\Service\Order;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Service\BaseService;

class OrderService extends BaseService implements OrderServiceInterface
{
   // Ghi đè giá trị $repository
   public $repository;

   // Khởi tạo giá trị
   public function __construct(OrderRepositoryInterface $OrderRepository)
   {
      $this->repository = $OrderRepository;
   }
}
