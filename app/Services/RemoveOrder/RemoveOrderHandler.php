<?php

namespace App\Services\RemoveOrder;

use App\Entities\Order;
use App\Repository\OrderRepository;

class RemoveOrderHandler
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function handle($id){
        $orderRecord = $this->orderRepository->find($id);

        $order = new Order();
        $order->setId($orderRecord->getId());

        $this->orderRepository->remove($order);
    }
}