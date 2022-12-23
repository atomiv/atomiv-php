<?php

namespace App\Entities;


class OrderItem
{
    private $id;

    private $order;

    private $productId;


    private $productCode;


    private $productPrice;


    private $quantity;

    public function setId(int $id){
        return $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setOrderId(int $orderId){
        $this->orderId = $orderId;
    }

    public function getOrderId(){
        return $this->orderId;
    }

    public function setProductId(int $productId){
        $this->productId = $productId;
    }

    public function getProductId(){
        return $this->productId;
    }

    public function setProductCode(string $productCode){
        $this->productCode = $productCode;
    }

    public function getProductCode(){
        return $this->productCode;
    }

    public function setProductPrice(float $productPrice){
        $this->productPrice = $productPrice;
    }

    public function getProductPrice(){
        return $this->productPrice;
    }

    public function setQuantity(int $quantity){
        $this->quantity = $quantity;
    }

    public function getQuantity(){
        return $this->quantity;
    }

}