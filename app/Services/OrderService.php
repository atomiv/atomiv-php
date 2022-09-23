<?php


namespace App\Services;


use App\Entities\Order;
use App\Records\OrderItemRecord;
use App\Repository\OrderItemRepository;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;
use App\Services\Dto\CreateOrderRequestDto;
use App\Services\Dto\CreateOrderResponseDto;
use App\Services\Dto\UpdateOrderItemResponseDto;
use App\Services\Dto\UpdateOrderRequestDto;
use App\Services\Dto\UpdateOrderResponseDto;
use App\Services\Interfaces\OrderServiceInterface;
use Carbon\Carbon;

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

    public function add(CreateOrderRequestDto $request): CreateOrderResponseDto
    {
        $order = new Order();

        $order->setCustomerId($request->getCustomerId());
        $order->setOrderDate(Carbon::now());

        $order = $this->orderRepository->add($order);
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



    }

    public function update(UpdateOrderRequestDto $request,int $id): UpdateOrderResponseDto
    {
        $response = new UpdateOrderResponseDto();

        foreach ($request->getOrderItems() as $item){

            $product = $this->productRepository->find($item->getProductId());

            $orderItem = $this->orderItemRepository->find($item->getOrderItemId());

            $orderItem->setProductId($product->getId());
            $orderItem->setProductPrice($product->getUnitPrice());
            $orderItem->setProductCode($product->getCode());
            $orderItem->setQuantity($item->getQuantity());

            $this->orderItemRepository->update($orderItem);

            $orderItemResponse = new UpdateOrderItemResponseDto();
            $orderItemResponse->setId($orderItem->getId());
            $orderItemResponse->setProductId($orderItem->getProductId());
            $orderItemResponse->setQuantity($orderItem->getQuantity());

            $response->setOrderItems($orderItemResponse);
        }

        $order = $this->orderRepository->find($id);


        $response->setId($order->getId());
        $response->setCustomerId($request->getCustomerId());
        $response->setOrderDate($order->getOrderDate());

        return $response;
    }

    public function remove(int $id): void
    {
        $orderRecord = $this->orderRepository->find($id);

        $order = new Order();
        $order->setId($orderRecord->getId());

        $this->orderRepository->remove($order);
    }
}
