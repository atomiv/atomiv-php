<?php


namespace App\Services;


use App\Order;
use App\Repository\OrderItemRepository;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;
use App\Services\Dto\CreateOrderRequestDto;
use Carbon\Carbon;

class OrderService
{
    private $orderRepository;
    private $orderItemRepository;
    private $productRepository;

    public function __construct(OrderRepository $order,OrderItemRepository $orderItem,ProductRepository $product){
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

    public function insert($attributes)
    {
        $order = new Order();
        $order->order_date = Carbon::now();
        $order->customer_id = $attributes['customer_id'];

        $order = $this->orderRepository->insert($order);

        $attributes['order_id'] = $order->id;

        $items = [];
        foreach ($attributes['items'] as $attribute){
            $product = $this->productRepository->find($attribute['product_id']);

            $items[] = [
                'order_id' => $attributes['order_id'],
                'product_id' => $product->id,
                'product_price' => $product->unit_price,
                'product_code' => $product->code,
                'quantity' => $attribute['quantity']
            ];
        }
        $this->orderItemRepository->insertMany($items);

        return $order->load('orderItems');
    }

    public function update(int $id,array $attributes){

        foreach ($attributes as $item){

            $order_item_id = $item['order_item_id'];
            unset($item['order_item_id']);

            if (key_exists('product_id',$item)){
                $product = $this->productRepository->find($item['product_id']);
                $item['product_code'] = $product->code;
                $item['product_price'] = $product->unit_price;
            }

            $order_items = $this->orderItemRepository->update($order_item_id,$item);
        }

        return $this->orderRepository->find($id);

    }

    public function delete(int $id){
        $order = $this->orderRepository->find($id);

        $this->orderItemRepository->deleteMany($order->orderItems->pluck('id'));

       return $this->orderRepository->delete($order->id);


    }
}
