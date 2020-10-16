<?php


namespace App\Services;


use App\Repository\OrderItemRepository;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;

class OrderService
{
    private $order;
    private $orderItem;
    private $product;

    public function __construct(OrderRepository $order,OrderItemRepository $orderItem,ProductRepository $product){
        $this->order = $order;
        $this->orderItem = $orderItem;
        $this->product = $product;
    }

    public function getOrder($id){
        return $this->order->find($id);
    }

    public function getAllOrders(){
        return $this->order->all();

    }

    public function save(array $attributes)
    {
        $order = $this->order->save($attributes);

        $attributes['order_id'] = $order->id;

        $items = [];
        foreach ($attributes['items'] as $attribute){
            $product = $this->product->find($attribute['product_id']);

            $items[] = [
                'order_id' => $attributes['order_id'],
                'product_id' => $product->id,
                'product_price' => $product->unit_price,
                'product_code' => $product->code,
                'quantity' => $attribute['quantity']
            ];
        }
        $this->orderItem->saveMany($items);

        return $order->load('orderItems');
    }

    public function update(int $id,array $attributes){

        foreach ($attributes as $item){
            $order_item_id = $item['order_item_id'];
            unset($item['order_item_id']);

            if (key_exists('product_id',$item)){
                $product = $this->product->find($item['product_id']);
                $item['product_code'] = $product->code;
                $item['product_price'] = $product->unit_price;
            }
            $this->orderItem->updateMany($order_item_id,$item);
        }
    }

}
