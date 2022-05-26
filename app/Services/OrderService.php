<?php


namespace App\Services;


use App\Records\OrderRecord;
use App\Records\OrderItemRecord;
use App\Repository\OrderItemRepository;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;
use App\Services\Dto\CreateOrderRequestDto;
use App\Services\Dto\UpdateOrderRequestDto;
use App\Services\Interfaces\OrderServiceInterface;

class OrderService implements OrderServiceInterface
{
    private $orderRepository;
    private $orderItemRepository;
    private $productRepository;

    public function __construct(OrderRepository $order,OrderitemRepository $orderItem,ProductRepository $product){
        $this->orderRepository = $order;
        $this->orderItemRepository = $orderItem;
        $this->productRepository = $product;
    }

    public function getOrder($id){
        return $this->orderRepository->find($id);
    }

    public function getAllOrders(){
        return $this->orderRepository->all();

    }

    public function insert(CreateOrderRequestDto $request)
    {
        $order = new OrderRecord();

        $order->setCustomerId($request->getCustomerId());
        $order->setOrderDate();


        $order = $this->orderRepository->insert($order);

        $orderItems = $request->getOrderItems();

        foreach ($orderItems as $item){

            $product = $this->productRepository->find($item->getProductId());

            $orderItem = new OrderItemRecord();

            $orderItem->setOrder($order);
            $orderItem->setProductId($product->getId());
            $orderItem->setProductPrice($product->getUnitPrice());
            $orderItem->setProductCode($product->getCode());
            $orderItem->setQuantity($item->getQuantity());

            $this->orderItemRepository->insert($orderItem);
        }


        return $order;
    }

    public function update(UpdateOrderRequestDto $request,int $id){
        foreach ($request->getOrderItems() as $item){

            $product = $this->productRepository->find($item->getProductId());

            $orderItem = $this->orderItemRepository->find($item->getOrderItemId());

            $orderItem->setProductId($product->getId());
            $orderItem->setProductPrice($product->getUnitPrice());
            $orderItem->setProductCode($product->getCode());
            $orderItem->setQuantity($item->getQuantity());

            $this->orderItemRepository->update($orderItem);

        }

        return $this->orderRepository->find($id);

    }

    public function delete(int $id): bool
    {
        $order = $this->orderRepository->find($id);

        return $this->orderRepository->delete($order);
    }
}
