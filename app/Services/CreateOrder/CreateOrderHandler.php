<?php

namespace App\Services\CreateOrder;

use App\Entities\Order;
use App\Entities\OrderItem;
use App\Repository\OrderItemRepository;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;

class CreateOrderHandler
{
    private $orderRepository;
    private $orderItemRepository;
    private $productRepository;

    public function __construct(OrderRepository $order,OrderitemRepository $orderItem,ProductRepository $product){
        $this->orderRepository = $order;
        $this->orderItemRepository = $orderItem;
        $this->productRepository = $product;
    }

    public function handle(CreateOrderRequest $request): CreateOrderResponse
    {
        $order = new Order();

        $order->setCustomerId($request->getCustomerId());
        $order->setOrderDate($request->getOrderDate());

        $this->orderRepository->add($order);

        $orderItems = $request->getOrderItems();

        $orderResponse =  new CreateOrderResponse();
        foreach ($orderItems as $item) {

            $productRecord = $this->productRepository->find($item->getProductId());

            $orderItem = new OrderItem();

            $orderItem->setOrderId($order->getId());
            $orderItem->setProductId($productRecord->getId());
            $orderItem->setProductPrice($productRecord->getUnitPrice());
            $orderItem->setProductCode($productRecord->getCode());
            $orderItem->setQuantity($item->getQuantity());

            $this->orderItemRepository->add($orderItem);

            $orderResponse->setOrderItems($orderItem);
        }

        $orderResponse->setId($order->getId());
        $orderResponse->setOrderDate($order->getOrderDate());
        $orderResponse->setCustomerId($order->getCustomerId());

        return $orderResponse;
    }
}