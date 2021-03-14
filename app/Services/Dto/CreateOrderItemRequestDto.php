<?php


namespace App\Services\Dto;


class CreateOrderItemRequestDto
{
    private $product_id;
    private $quantity;

    public function getProductId(){
        return $this->product_id;
    }

    public function setProductId($productId){
        return $this->product_id = $productId;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setQuantity($quantity){
        return$this->quantity = $quantity;
    }
}