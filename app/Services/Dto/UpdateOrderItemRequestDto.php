<?php


namespace App\Services\Dto;


class UpdateOrderItemRequestDto extends AbstractDto
{
    private $order_item_id;
    private $product_id;
    private $quantity;

    protected function map(array $data): void
    {
        $this->order_item_id = $data['order_item_id'];
        $this->product_id = $data['product_id'];
        $this->quantity = $data['quantity'];
    }

    public function getOrderItemId(){
        return $this->order_item_id;
    }

    public function getProductId(){
        return $this->product_id;
    }

    public function getQuantity(){
        return $this->quantity;
    }
}