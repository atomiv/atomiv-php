<?php

namespace App\Records;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_items")
 */
class OrderItemRecord
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="OrderRecord", inversedBy="orders")
     * @ORM\JoinColumn(name="order_id", nullable=false, referencedColumnName="id")
     */
    protected $order;

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

    public function setOrder(OrderRecord $order){
        $order->addOrderItem($this);

        $this->order = $order;
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