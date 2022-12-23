<?php


namespace App\Services\UpdateOrder;


class UpdateOrderItemRequest
{
    private $product_id;
    private $order_item_id;
    private $quantity;

    public function getProductId(){
        return $this->product_id;
    }

    public function setProductId($productId){
        return $this->product_id = $productId;
    }

    public function getOrderItemId(){
        return $this->order_item_id;
    }

    public function setOrderItemId($order_item_id){
        return $this->order_item_id = $order_item_id;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setQuantity($quantity){
        return$this->quantity = $quantity;
    }
}