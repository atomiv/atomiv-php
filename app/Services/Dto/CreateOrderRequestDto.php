<?php


namespace App\Services\Dto;


use Carbon\Carbon;

class CreateOrderRequestDto
{
    private $customer_id;
    private $order_date;
    private $order_items;

    public function getCustomerId(){
        return $this->customer_id;
    }

    public function getOrderDate(){
        return $this->order_date;
    }

    public function getOrderItems(){
        return $this->order_items;
    }

    private function setOrderItems($orderItems)
    {
        $listOrderItemDtos = [];

        foreach ($orderItems as $item){
           $listOrderItemDtos[]= new CreateOrderItemRequestDto($item);
        }

        return $listOrderItemDtos;
    }
}