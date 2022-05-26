<?php

namespace App\Records;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="orders")
 */
class OrderRecord
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
    private $customerId;

    /**
     * @ORM\Column(type="datetime")
     */
    private $orderDate;

    /**
     * @ORM\OneToMany(targetEntity="OrderItemRecord", mappedBy="order")
     */
    private $orderItems;

    public function getId(){
        return $this->id;
    }

    public function setCustomerId(int $customerId){
        $this->customerId = $customerId;
    }

    public function getCustomerId(){
        return $this->customerId;
    }

    public function setOrderDate(){
        $this->orderDate = Carbon::now()->toDate();
    }

    public function getOrderDate(){
        return $this->orderDate;
    }

    public function addOrderItem(OrderItemRecord $orderItem){
        $this->orderItems[] = $orderItem;
    }

    public function getOrderItems(){
        return $this->orderItems->toArray();
    }
}