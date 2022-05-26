<?php

namespace App\Entities;

use Carbon\Carbon;


class Order
{

    private $id;


    private $customerId;


    private $orderDate;

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

    public function setOrderDate(string $orderDate){
        $this->orderDate = new Carbon($orderDate);
    }

    public function getOrderDate(){
        return $this->orderDate;
    }

    public function getOrderItems(){
        return $this->orderItems;
    }
}