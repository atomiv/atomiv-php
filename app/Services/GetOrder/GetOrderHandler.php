<?php

namespace App\Services\GetOrder;

use App\Repository\OrderRepository;

class GetOrderHandler
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function handle($id){

        return $this->orderRepository->find($id);
    }
}