<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_items")
 */
class OrderItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="bigint")
     */
    private $orderId;

    /**
     * @ORM\Column(type="integer")
     */
    private $productId;

    /**
     * @ORM\Column(type="string")
     */
    private $productCode;

    /**
     * @ORM\Column(type="decimal")
     */
    private $productPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

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