<?php

namespace App\Services\BrowseOrders;

use App\Repository\OrderRepository;

class GetAllOrdersHandler
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function handle(){

        return $this->orderRepository->all();
    }
}