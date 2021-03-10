<?php


namespace App\Services;


use App\Order;
use App\OrderItem;
use App\Repository\OrderItemRepository;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;
use App\Services\Dto\CreateOrderRequestDto;
use App\Services\Dto\UpdateOrderRequestDto;

class OrderService
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
        $order = new Order();

        $order->customer_id = $request->getCustomerId();
        $order->order_date = $request->getOrderDate();


        $order = $this->orderRepository->insert($order);

        $orderItems = $request->getOrderItems();

        foreach ($orderItems as $item){

            $product = $this->productRepository->find($item->getProductId());

            $orderItem = new OrderItem();

            $orderItem->order_id = $order->id;
            $orderItem->product_id = $product->id;
            $orderItem->product_price = $product->unit_price;
            $orderItem->product_code = $product->code;
            $orderItem->quantity = $item->getQuantity();

            $this->orderItemRepository->insert($orderItem);
        }


        return $order->load('orderItems');
    }

    public function update(int $id,UpdateOrderRequestDto $request){

        foreach ($request->getOrderItems() as $item){

            $product = $this->productRepository->find($item->getProductId());

            $productItem = $this->orderItemRepository->find($item->getOrderItemId());

            $productItem->product_id = $product->id;
            $productItem->product_code = $product->code;
            $productItem->product_price = $product->unit_price;

            $productItem->quantity = $item->getQuantity();

            $this->orderItemRepository->update($productItem);

        }

        return $this->orderRepository->find($id);

    }

    public function delete(int $id){
        $order = $this->orderRepository->find($id);

        $this->orderItemRepository->deleteMany($order->orderItems->pluck('id'));

       return $this->orderRepository->delete($order->id);


    }
}
