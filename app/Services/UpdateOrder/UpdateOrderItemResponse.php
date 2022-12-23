<?php


namespace App\Services\UpdateOrder;


class UpdateOrderItemResponse
{
    private $id;
    private $product_id;
    private $quantity;

    public function setId(int $id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function getProductId(){
        return $this->product_id;
    }

    public function setProductId(int $productId){
        return $this->product_id = $productId;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setQuantity(int $quantity){
        return$this->quantity = $quantity;
    }
}