<?php


namespace App\Services\Dto;


class UpdateOrderRequestDto extends AbstractDto
{
    private $order_items;

    protected function map(array $data): void
    {
        $this->order_items = $this->setOrderItems($data);
    }

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