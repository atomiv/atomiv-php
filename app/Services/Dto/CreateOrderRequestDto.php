<?php


namespace App\Services\Dto;

class CreateOrderRequestDto
{
    private $customer_id;
    private $order_date;
    private $order_items = [];

    public function getCustomerId(){
        return $this->customer_id;
    }

    public function setCustomerId($customer_id)
    {
        return $this->customer_id = $customer_id;
    }

    public function getOrderDate(){
        return $this->order_date;
    }

    public function setOrderDate($order_date){
        return $this->order_date = $order_date;
    }

    public function getOrderItems(){
        return $this->order_items;
    }

    public function setOrderItems($orderItem)
    {
        array_push($this->order_items,$orderItem);
    }
}