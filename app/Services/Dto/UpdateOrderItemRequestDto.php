<?php


namespace App\Services\Dto;


class UpdateOrderItemRequestDto
{
    private $order_item_id;
    private $product_id;
    private $quantity;

    public function getOrderItemId(){
        return $this->order_item_id;
    }

    public function getProductId(){
        return $this->product_id;
    }

    public function getQuantity(){
        return $this->quantity;
    }
}