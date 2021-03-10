<?php


namespace App\Services\Dto;


class UpdateOrderRequestDto
{
    private $order_items;

    public function getOrderItems(){
        return $this->order_items;
    }

    private function setOrderItems($orderItems)
    {
        $listOrderItemDtos = [];

        foreach ($orderItems as $item){
            $listOrderItemDtos[]= new UpdateOrderItemRequestDto($item);
        }

        return $listOrderItemDtos;
    }
}