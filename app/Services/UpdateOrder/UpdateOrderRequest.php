<?php


namespace App\Services\UpdateOrder;


class UpdateOrderRequest
{
    private $order_id;
    private $customer_id;
    private $order_date;
    private $order_items = [];

    public function setOrderId(int $order_id){
        return $this->order_id = $order_id;
    }

    public function getOrderId(){
        return $this->order_id;
    }
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

    public function getOrderItems(): array
    {
        return $this->order_items;
    }

    public function setOrderItems($orderItem)
    {
        $this->order_items[] = $orderItem;
    }
}