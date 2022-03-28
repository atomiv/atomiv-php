<?php

namespace App\Entities;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="orders")
 */
class Order
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

    public function getId(){
        return $this->id;
    }

    public function setCustomerId(int $customerId){
        $this->customerId = $customerId;
    }

    public function getCustomerId(){
        return $this->customerId;
    }

    public function setOrderDate(string $orderDate){
        $this->orderDate = new Carbon($orderDate);
    }

    public function getOrderDate(){
        return $this->orderDate;
    }
}