<?php


namespace App\Services\Dto;


class CreateOrderItemRequestDto extends AbstractDto
{
    private $product_id;
    private $quantity;

    protected function map(array $data): void
    {
       $this->product_id = $data['product_id'];
       $this->quantity = $data['quantity'];

    }

    public function getProductId(){

        return $this->product_id;

    }

    public function getQuantity(){

        return $this->quantity;
    }

}