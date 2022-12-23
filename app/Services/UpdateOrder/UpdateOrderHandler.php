<?php

namespace App\Services\UpdateOrder;

use App\Entities\OrderItem;
use App\Repository\OrderItemRepository;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;

class UpdateOrderHandler
{
    private $orderRepository;
    private $orderItemRepository;
    private $productRepository;

    public function __construct(OrderRepository $orderRepository, OrderitemRepository $orderItem,ProductRepository $product){
        $this->orderItemRepository = $orderItem;
        $this->productRepository = $product;
        $this->orderRepository = $orderRepository;
    }

    public function handle(UpdateOrderRequest $request): UpdateOrderResponse
    {
        $response = new UpdateOrderResponse();

        $orderRecord = $this->orderRepository->find($request->getOrderId());

        foreach ($request->getOrderItems() as $item){

            $product = $this->productRepository->find($item->getProductId());

            $orderItemRecord = $this->orderItemRepository->find($item->getOrderItemId());

            $orderItem = new OrderItem();

            $orderItem->setId($orderItemRecord->getId());
            $orderItem->setProductId($product->getId());
            $orderItem->setProductPrice($product->getUnitPrice());
            $orderItem->setProductCode($product->getCode());
            $orderItem->setQuantity($item->getQuantity());

            $this->orderItemRepository->update($orderItem);

//            $orderItemResponse = new UpdateOrderItemResponse();
//            $orderItemResponse->setId($orderItem->getId());
//            $orderItemResponse->setProductId($orderItem->getProductId());
//            $orderItemResponse->setQuantity($orderItem->getQuantity());

            $response->setOrderItems($orderItem);
        }

        $response->setId($orderRecord->getId());
        $response->setCustomerId($request->getCustomerId());
        $response->setOrderDate($orderRecord->getOrderDate());

        return $response;
    }
}